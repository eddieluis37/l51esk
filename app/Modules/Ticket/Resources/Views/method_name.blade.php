
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>JS Bin</title>
</head>
<body>
@{{ nombre }}

<input type="text"
       v-model="nuevaTarea"
       placeholder="Introduce tarea">

<input type="submit"
       value="Añadir tarea"
@click="guardarTarea(nuevaTarea)">

<h4>Tareas</h4>

<ul v-for="tarea in tareas">
    <li>
        <a href="#"
        @click="eliminarTarea(tarea)">X</a>
        @{{ tarea.nombre }}
    </li>
</ul>
   <pre>
    @{{ $data | json }}
  </pre>

</body>
<script src="/js/vue.js"></script>
<script src="/js/script.js"></script>