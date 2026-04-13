<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
   
    public function index()
    {
        $query = tasks::query();
        $datos = $query->orderBy('id', 'asc')->paginate(5);
        return view('tasks.index', compact('datos'));
    }
    
    public function filtro(Request $request)
    {
        $tasks = [];

        if ($request->has('fecha') && $request->fecha != '') {
            $tasks = Tasks::whereDate('date', $request->fecha)->get();
        }

        return view('tasks.filtro', compact('tasks'));
    }
    
    public function create()
    {
        //crear una nueva tarea
        return view('tasks.crear'); //mostrar la vista crear
    }
   
    public function show($id)
    {
        //mostrar tareas
        $tasks = tasks::findOrFail($id); //buscar la tarea por su id, si no se encuentra, lanzar una excepción
        return view('tasks.eliminar', compact('tasks')); //mostrar la vista mostrar con los datos de la tarea a mostrar
    }

  
    public function edit($id)
    {
        //ediar tareas
        $tasks = tasks::findOrFail($id); //buscar la tarea por su id, si no se encuentra, lanzar una excepción
        return view('tasks.editar', compact('tasks')); //mostrar la vista editar con los datos de la tarea a editar

    }


    public function store(Request $request)
    {
        //almacenar datos en la BD
        $tasks = new tasks(); //crear una nueva instancia del modelo tasks
        $tasks->name = $request->post('name'); //asignar el valor del campo name del formulario al atributo name del modelo 
        $tasks ->description = $request->post('description'); //asignar el valor del campo description del formulario al atributo description del modelo
        $tasks->date = $request->post('date'); //asignar el valor del campo date del formulario al atributo date del modelo
        $tasks->completed = $request->has('completed'); //asignar el valor del campo completed del formulario al atributo completed del modelo
        $tasks->save(); //guardar el modelo en la base de datos   
        
        return redirect()->route('tasks.index')-> with('success', 'Tarea creada correctamente'); //redireccionar a la página de inicio
    }
   
    public function update(Request $request, $id)
    {
        //actualizar tareas
        $tasks = tasks::findOrFail($id); //buscar la tarea por su id, si no se encuentra, lanzar una excepción
        $tasks->name = $request->post('name'); //asignar el valor del campo name del formulario al atributo name del modelo 
        $tasks ->description = $request->post('description'); //asignar el valor del campo description del formulario al atributo description del modelo
        $tasks->date = $request->post('date'); //asignar el valor del campo date del formulario al atributo date del modelo
        $tasks->completed = $request->has('completed'); //asignar el valor del campo completed del formulario al atributo completed del modelo
        $tasks->save(); //guardar el modelo en la base de datos   
        
        return redirect()->route('tasks.index')-> with('success', 'Tarea actualizada correctamente'); //redireccionar a la página de inicio
    }

    public function destroy($id)
    {
        //eliminar tareas
        $tasks = tasks::findOrFail($id); //buscar la tarea por su id, si no se encuentra, lanzar una excepción
        $tasks->delete(); //eliminar la tarea de la base de datos

        return redirect()->route('tasks.index')-> with('success', 'Tarea eliminada correctamente'); //redireccionar a la página de inicio
    }

}
