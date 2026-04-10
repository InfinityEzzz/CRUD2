@extends('layouts.app')

@section('titulo', 'Buscar tareas por fecha')
 
@section('contenido')

  <div class="tasks-container">
    <div class= "mb-3">
        <form action="{{ route('tasks.fecha') }}" method="GET" class="d-flex">
            <input type="date" name="fecha" class="form-control me-2" placeholder="Selecciona una fecha">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
  </div>

@endsection
