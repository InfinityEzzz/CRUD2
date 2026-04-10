@extends('layouts.app')

@section('titulo', 'Tareas para la fecha seleccionada')
 
@section('contenido')

  <div class="tasks-container">
        
    @if($tasks->isEmpty())
            <p class="no-tasks">No hay tareas pendientes.</p>
        @else

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
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-borrar">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        @endif
                    
        <a href="{{ route('tasks.index') }}" class="btn btn-crear">Volver al Listado</a>

  </div>


@endsection
