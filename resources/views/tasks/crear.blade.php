@extends('layouts.app')

@section('tituloPagina', 'Agregar Tarea')

@section('contenido')

    <div class="tasks-container form">
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
            <a href="{{ route('tasks.index') }}" class="btn btn-editar">Volver al Listado</a>
        </form>
    </div>

@endsection