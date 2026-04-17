@extends('layouts.app')
 
@section('contenido')

  <!-- ---------------------------------------------------------------- -->
  @if($tipo == 'tareas')
  
  <h1 class="h1">Lista de Tareas</h1>

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
        @foreach ($items as $tarea)
          @if($tarea->status === 1)
            <tr>
              <td>{{ $tarea->id }}</td>
              <td>{{ $tarea->name }}</td>
              <td>{{ $tarea->description }}</td>
              <td>{{ $tarea->date }}</td>
              <td>{{ $tarea->completed ? 'Sí' : 'No' }}</td>
              @if(auth()->user()->fk_role === 1)
                <td>
                    <a href="{{ route('tasks.edit', $tarea->id) }}" class="btn btn-editar">Editar</a>
                    <a href="{{ route('tasks.show', $tarea->id) }}" class="btn btn-cancelar">Eliminar</a>
                </td>
              @else
                <td>N/A</td>
              @endif
            </tr>
            @else
          @endif
        @endforeach

      </tbody>
    </table>
          
    <div class="d-flex justify-content-left">
        {{ $items->links() }} <!-- Agregar paginación -->   
    </div>

    @if(auth()->user()->fk_role === 1)
      <a href="{{ route('tasks.create') }}" class="btn btn-crear" justify-text-center>Agregar Tarea</a>
    @else

    @endif

  </div>

    <!-- ----------------------------------------------------- -->
    @elseif($tipo == 'usuarios')
  
    <h1 class="h1">Lista de Usuarios</h1>

    <div class="tasks-container">
    
    <table class="table tasks-table" background-color="white">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Usuario</th>
          <th scope="col">Correo Electrónico</th>
          <th scope="col">Contraseña</th>
          <th scope="col">Permisos</th>
          <th scope="col">Estatus</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
    
        @foreach ($items as $usuario)
          <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>*****</td>
            <td>
            @if($usuario->fk_role == 1)
              Administrador
            @else
              Usuario
            @endif
            </td>

            <td>
            @if($usuario->status == 1)
              Activo
            @else
              Inactivo
            @endif
            </td>
            <td>
                <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-editar">Editar</a>
                @if($usuario->status == 1)
                <a href="{{ route('users.show', $usuario->id) }}" class="btn btn-cancelar">Baja</a>
                @elseif($usuario->status == 0)
                <a href="{{ route('users.show', $usuario->id) }}" class="btn btn-primary">Alta</a>
                @endif
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>

    <a href="{{ route('users.create') }}" class="btn btn-usuario" justify-text-center>Agregar Usuario</a>
    
    @else ($items->isEmpty())
        <p class="no-tasks">Sin datos disponibles.</p>

    </div>

    @endif
        

@endsection

