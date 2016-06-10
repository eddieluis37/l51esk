new Vue({

    el: 'body',

    data: {
        nuevaTarea: '',

        tareas: [
            {nombre: 'hacer la compra'},
            {nombre: 'para la compra'},
            {nombre: 'editar la compra'},
        ],
    },

    methods: {
        guardarTarea: function (tarea) {

            if (tarea.trim()) {
                this.tareas.push({nombre: tarea});
                this.nuevaTarea = '';
            } else {
                alert('Debes introducir un nombre para la tarea');
            }
        },
        eliminarTarea: function (tarea) {
            if (confirm('¿Eliminar ' + tarea.nombre + '?'))
                this.tareas.$remove(tarea);

        }

    }
});