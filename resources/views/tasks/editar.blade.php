@extends('layouts.app')

@section('tituloPagina', 'Editar Tarea')

@section('contenido')

    <div class="tasks-container form">
        <form action="{{ route('tasks.update', $tasks->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la Tarea</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ $tasks->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $tasks->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="due_date" class="form-label">Fecha de Vencimiento</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $tasks->due_date ? $tasks->due_date->format('Y-m-d') : '' }}">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed" {{ $tasks->completed ? 'checked' : '' }}>
                <label class="form-check-label" for="completed">Completado</label>
            </div>
            <button type="submit" class="btn btn-guardar">Actualizar</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-editar">Volver al Listado</a>
        </form>
    </div>

@endsection