@extends('layouts.app')

@section('tituloPagina', 'Buscar tareas por fecha')
 
@section('contenido')

  <div class="tasks-container">
    <div class= "mb-3">
        <form action="{{ route('tasks.filtro') }}" method="GET" class="d-flex">
            <input type="date" name="fecha" class="form-control me-2" placeholder="Selecciona una fecha">
            <button type="submit" class="btn btn-guardar">Buscar</button>
        </form>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-primary ">Volver al Listado</a>
   
    @if(!empty($tasks) && count($tasks) > 0)
    <br>
    <br>
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
    
        @foreach ($tasks as $task)
          <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->date }}</td>
            <td>{{ $task->completed ? 'Sí' : 'No' }}</td>
            <td>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-editar">Editar</a>
                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-cancelar">Eliminar</a>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  

    @elseif(request('fecha'))
    <br>
    <br>
    <p class="no-tasks">No se encontraron tareas para esa fecha.</p>
    @endif

  </div>

@endsection
