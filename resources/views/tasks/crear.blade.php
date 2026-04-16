@extends('layouts.app')

@section('tituloPagina', 'Agregar Tarea/Usuario')

@section('contenido')

    <div class="tasks-container form">

        @if($tipo == 'task')

        <form action="{{ route('tasks.store') }}" method="POST"> 
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la Tarea</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="due_date" class="form-label">Fecha de Vencimiento</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed">
                <label class="form-check-label" for="completed">Completado</label>
            </div>
            <button type="submit" class="btn btn-guardar">Crear</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-cancelar">Cancelar</a>
        </form>

        @elseif($tipo == 'user')

        <form action="{{ route('users.store') }}" method="POST"> 
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Usuario</label>
                <input type="text" value="" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electronico</label>
                <input class="form-control" value="" id="email" name="email" required></input>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" value="" class="form-control" id="password" name="password" required>
            </div>
            
            <label for="role" class="form-label">Permisos</label>
            <div class="mb-3">
                <select name="role" id="role" multiple>
                <option value="1">Administrador</option>
                <option value="2">Usuario</option>
                </select>
            </div>
            <button type="submit" class="btn btn-guardar">Crear</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-cancelar">Cancelar</a>
        </form>

        @endif

   </div>

@endsection