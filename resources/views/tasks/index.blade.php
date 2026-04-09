@extends('layouts.app')

@section('titulo', 'Lista de Tareas')
 
@section('contenido')

  <div class="tasks-container">
    <table class="table tasks-table" background-color="white">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tarea</th>
          <th scope="col">Descripción</th>
          <th scope="col">Fecha</th>
          <th scope="col">Completado</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datos as $tarea)
          <tr>
            <td>{{ $tarea->id }}</td>
            <td>{{ $tarea->name }}</td>
            <td>{{ $tarea->description }}</td>
            <td>{{ $tarea->date }}</td>
            <td>{{ $tarea->completed ? 'Sí' : 'No' }}</td>
            <td>
                <a href="{{ route('tasks.edit', $tarea->id) }}" class="btn btn-editar">Editar</a>
                <a href="{{ route('tasks.show', $tarea->id) }}" class="btn btn-borrar">Eliminar</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
      
    <div class="d-flex justify-content-left">
        {{ $datos->links() }} <!-- Agregar paginación -->   
    </div>
    <a href="{{ route('tasks.create') }}" class="btn btn-crear" justify-text-center>Crear Tarea</a>
  
  </div>


@endsection
