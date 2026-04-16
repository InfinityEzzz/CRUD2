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

        return view('tasks.index', [
            'items' => $datos,
            'tipo' => 'tareas'
        ]);
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
        return view('tasks.crear',[
            'tipo' => 'task',
        ]);
    }
   
    public function show($id)
    {
        //mostrar tareas
        $tasks = tasks::findOrFail($id); //buscar la tarea por su id, si no se encuentra, lanzar una excepción
        return view('tasks.eliminar',[ 
        'tasks' => $tasks,
        'tipo' => 'task',
        ]); 
    }
  
    public function edit($id)
    {
       $tasks = tasks::findOrFail($id); //buscar la tarea por su id, si no se encuentra, lanzar una excepción
        return view('tasks.editar',[ 
        'tasks' => $tasks,
        'tipo' => 'task',
        ]); 
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
        $tasks = tasks::findOrFail($id); //buscar la tarea por su id, si no se encuentra, lanzar una excepción
        $tasks ->status = 0;
        $tasks ->save();

        return redirect()->route('tasks.index')-> with('success', 'Tarea eliminada correctamente'); //redireccionar a la página de inicio
    }


}
