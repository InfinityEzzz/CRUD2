<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return view('autentication.login');
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('autentication.login')
                ->withErrors($validator)
                ->withInput();
        }       

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('tasks.index');
        } else {
            return redirect()->route('autentication.error');    
        }  
    }

    public function register()
    {
        return view('autentication.register');
    }

    public function registerUser(Request $request)
    {
        //almacenar datos en la BD
        $user = new User(); //crear una nueva instancia del modelo User
        $user->name = $request->post('name'); //asignar el valor del campo name del formulario al atributo name del modelo
        $user->email = $request->post('email'); //asignar el valor del campo email del formulario al atributo email del modelo
        $user->password = $request->post('password'); //asignar el valor del campo password del formulario al atributo password del modelo
        $user->fk_role = 2; //asignar un valor predeterminado al atributo role del modelo
        $user->save(); //guardar el modelo en la base de datos   
        return redirect()->route('autentication.login'); //redireccionar al usuario a la página de login después de registrarse    
    }

    public function logout()
    {
        return redirect()->route('autentication.login');
    }
  
    public function error()
    {
        return view('autentication.error');
    }

  public function denied()
    {
        return view('autentication.denied');
    }
    public function usuarios_index()
    {
        $usuarios = User::all();

        return view('tasks.index', [
            'items' => $usuarios,
            'tipo' => 'usuarios'
        ]);
    }

    public function usuarios_create()
    {
        return view('tasks.crear',[
            'tipo' => 'user',
        ]);
    }

    public function usuarios_store(Request $request)
    {
        //almacenar datos en la BD
        $user = new user(); 
        $user->name = $request->post('name'); 
        $user->email = $request->post('email'); 
        $user->password = $request->post('password');
        $user ->fk_role = $request ->post('role');
        $user->save(); //guardar el modelo en la base de datos   
        
        return redirect()->route('tasks.index')-> with('success', 'Usuario creado correctamente'); //redireccionar a la página de inicio
    }

    public function usuarios_show($id)
    {
        $users = user::findOrFail($id); 
        return view('tasks.eliminar', [ 
        'user' => $users,
        'tipo' => 'user',
        ]); 
    }

    public function usuarios_edit($id)
    {
        $users = user::findOrFail($id); 
        return view('tasks.editar', [ 
        'user' => $users,
        'tipo' => 'user',
        ]); 
    }

    public function usuarios_alta($id)
    {
        $user = user::findOrFail($id); 
        $user ->status = 1;
        $user->save();  
        return redirect()->route('tasks.index')-> with('success', 'Usuario dado de alta correctamente'); 

    }

    public function usuarios_update(Request $request, $id)
    {
        $user = user::findOrFail($id); 
        $user->name = $request->post('name'); 
        $user ->email = $request->post('email');        
        $user ->password = $request->post('password');
        $user ->fk_role = $request->post('role');
   
        $user->save();  
        return redirect()->route('tasks.index')-> with('success', 'Usuario actualizado correctamente'); 
    } 

    public function usuarios_destroy($id)
    {
        $user = user::findOrFail($id); 
        $user ->status = 0;
        $user->save();  
        return redirect()->route('tasks.index')-> with('success', 'Usuario dado de baja correctamente'); 
    }







}


    