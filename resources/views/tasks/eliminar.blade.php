
@extends('layouts.app')

@section('tituloPagina', 'Dar de baja Tarea/Usuario')

@section('contenido')

    <div class="tasks-container form">

    @if($tipo == 'task')

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

    @elseif($tipo == 'user')
    
        <table class="table tasks-table" background-color="white">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>********</td>
                    <td>
                    @if($user->fk_role == 1)
                    Administrador
                    @else
                    Usuario
                    @endif
                    </td>
                </tr>
            </tbody>
        </table>

        
        @if($user->status == 1)
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @elseif($user->status == 0)
            <form action="{{ route('users.reload', $user->id) }}" method="POST">
        @endif

            @csrf
            @method('DELETE')
            @if($user->status == 1)
            <button type="submit" class="btn btn-cancelar">Baja</button>
            @elseif($user->status == 0)
            <button type="submit" class="btn btn-guardar">Alta</button>
            @endif
            <a href="{{ route('tasks.index') }}" class="btn btn-cancelar">Cancelar</a>
        </form>

    @endif

    </div>
@endsection