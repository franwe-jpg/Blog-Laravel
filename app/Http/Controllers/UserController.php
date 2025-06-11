<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Phone;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
     public function __construct()
    {
      
        $this->middleware('can:user.index')->only('index');
        $this->middleware('can:user.create')->only('create', 'store');
        $this->middleware('can:user.edit')->only('edit', 'update');
        $this->middleware('can:user.show')->only('show');
        $this->middleware('can:user.destroy')->only('destroy'); 
    }   


    Public function index()
    {
        $users = User::orderBy('id', 'desc')
            ->with('phone')
            ->paginate(7);
        return view('users.index', ['users' => $users]);
    }

    Public function create(){
        $roles = Role::all();
        return view('users.create', [
            'roles' => $roles,
        ]);
    }

    Public function store(StoreUserRequest $request){
        $user = User::create([   //creo un user local con los datos del request ya que luego necesito el id para el phone.
            'name' => $request->name,
            'dni' => $request->dni,
            'email' => $request->email,
            'password' =>Hash::make($request->password),

        ]);
        if ($request->filled('number')){
            Phone::create([
                'number' => $request->number,
                'user_id' => $user->id,
            ]);
        }
        // Asignar roles seleccionados (sobrescribe los anteriores)
        $user->syncRoles($request->roles ?? []); // Método específico de Laravel Permission        

         return redirect()->route('user.index');
    }

    Public function show(User $user){
        return view('users.show', [
            'user' => $user 
        ]);
    }

    public function edit(User $user){
        $roles = Role::all();
        return view('users.edit', [
            'user' => $user,  //pasamos el post a la vista
            'roles' => $roles,
        ]); 
    }
    
    public function update(UpdateUserRequest $request, User $user, Phone $phone){
        
     // Asignar roles seleccionados (sobrescribe los anteriores)
    $user->syncRoles($request->roles ?? []); // Método específico de Laravel Permission    

       // Primero actualizas el usuario
    $user->update($request->only(['name', 'dni', 'email', 'password']));

    // Luego actualizas o creas el teléfono
    $user->phone()->updateOrCreate(
        [], // condiciones (vacías porque ya se asocia con el user_id implícitamente)
        ['number' => $request->input('number')]
    );

    return redirect()->route('user.index')->with('info', 'Se actualizaron los cambios exitosamente');
    } 

    Public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.index');
    }

    
}
