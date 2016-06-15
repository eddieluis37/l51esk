
var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

var vm = new Vue({
    http: {
        root: '/root',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
        }
    },

    el: '#UserController',

    data: {
        newUser: {
            id: '',
            first_name: '',
            email: '',
            username: ''
        },

        success: false,

        edit: false
    },

    methods: {

        fetchUser: function () {
            this.$http.get('/api/users', function (data) {
                this.$set('users', data)
            })
        },

        RemoveUser: function (id) {
            var ConfirmBox = confirm("Are you sure, you want to delete this User?")

            if(ConfirmBox) this.$http.delete('/api/users/' + id)

            this.fetchUser()
        },

        EditUser: function (id) {
            var user = this.newUser

            this.newUser = { id: '', first_name: '', email: '', username: ''}

            this.$http.patch('/api/users/' + id, user, function (data) {
                console.log(data)
            })

            this.fetchUser()

            this.edit = false

        },

        ShowUser: function (id) {
            this.edit = true

            this.$http.get('/api/users/' + id, function (data) {
                this.newUser.id = data.id
                this.newUser.first_name = data.first_name
                this.newUser.email = data.email
                this.newUser.username = data.username
            })
        },

        AddNewUser: function () {
            // User input
            var user = this.newUser

            // Clear form input
            this.newUser = { first_name:'', email:'', username:'' }

            // Send post request
            this.$http.post('/api/users/', user)

            // Show success message
            self = this
            this.success = true
            setTimeout(function () {
                self.success = false
            }, 5000)

            // Reload page
            this.fetchUser()

        }

    },

    computed: {
        validation: function () {
            return {
                first_name: !!this.newUser.first_name.trim(),
                email: emailRE.test(this.newUser.email),
                address: !!this.newUser.username.trim()
            }
        },

        isValid: function () {
            var validation = this.validation
            return Object.keys(validation).every(function (key) {
                return validation[key]
            })
        }
    },

    ready: function () {
        this.fetchUser()
    }


});