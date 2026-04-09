<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
   
    public function index()
    {
        //página de inicio
        $datos = tasks::orderby('id', 'asc')->paginate(5); //obtener todos los datos de la tabla tasks
        return view('tasks.index', compact('datos')); //enviar los datos a la vista tasks.index
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
        $tasks->due_date = $request->post('due_date'); //asignar el valor del campo due_date del formulario al atributo due_date del modelo
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
        $tasks->due_date = $request->post('due_date'); //asignar el valor del campo due_date del formulario al atributo due_date del modelo
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
