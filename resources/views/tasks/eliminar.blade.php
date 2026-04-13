
@extends('layouts.app')

@section('tituloPagina', 'Eliminar Tarea')

@section('contenido')


    <div class="tasks-container form">
        <table class="table tasks-table" background-color="white">            
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tarea</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha</th>
                <th scope="col">Completado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tasks->id }}</td>
                    <td>{{ $tasks->name }}</td>
                    <td>{{ $tasks->description }}</td>
                    <td>{{ $tasks->date }}</td>
                    <td>{{ $tasks->completed ? 'Sí' : 'No' }}</td>
                </tr>
            </tbody>
        </table>
        
        <form action="{{ route('tasks.destroy', $tasks->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-cancelar">Eliminar</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">Cancelar</a>
        </form>

    </div>
@endsection