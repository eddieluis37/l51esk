@extends('layouts.master')

@section('head_extra')
@endsection

@section('content')

    <div id="UserController" style="padding-top: 2em">

        <div class="alert alert-danger" v-if="!isValid">
            <ul>
                <li v-show="!validation.first_name">Nombre es requerido.</li>
                <li v-show="!validation.email">Escriba un correo valido.</li>
                <li v-show="!validation.address">Address field is required.</li>
            </ul>
        </div>

        <form action="#" @submit.prevent="AddNewUser" method="POST">

            <div class="form-group">
                <label for="first_name">Nombre:</label>
                <input v-model="newUser.first_name" type="text" id="first_name" name="first_name" placeholder="Escriba nombre" uppercase="" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input v-model="newUser.email" type="text" id="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input v-model="newUser.username" type="text" id="username" name="username" class="form-control">
            </div>

            <div class="form-group">
                <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="!edit">Add New User</button>

                <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="edit" @click="EditUser(newUser.id)">Edit User</button>
            </div>

        </form>

        <div class="alert alert-success" transition="success" v-if="success">Add new user successful.</div>

        <hr>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>USERNAME</th>
            <th>CREATED_AT</th>
            <th>UPDATED_AT</th>
            <th>CONTROLLER</th>
            </thead>

            <tbody>
            <tr v-for="user in users">
                <td>@{{ user.id }}</td>
                <td>@{{ user.first_name }}</td>
                <td>@{{ user.email }}</td>
                <td>@{{ user.username }}</td>
                <td>@{{ user.created_at }}</td>
                <td>@{{ user.updated_at }}</td>
                <td>
                    <button class="btn btn-default btn-sm" @click="ShowUser(user.id)">Edit</button>
                    <button class="btn btn-danger btn-sm" @click="RemoveUser(user.id)">Remove</button>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection

@push('scripts')
<script src="/js/script.js"></script>

<style>
    .success-transition {
        transition: all .5s ease-in-out;
    }
    .success-enter, .success-leave {
        opacity: 0;
    }
</style>
@endpush