<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

use Spatie\Permission\Models\Role;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    public $search;

    //Definiendo los estilos de paginacion de Bootstrap
    protected $paginationTheme = "bootstrap";

    //metodo para reiniciar la busqueda
    public function updatingSearch(){
        $this->resetPage();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Metodo inicial de los administradores(users)
     */
    public function render()
    {
        $roles = Role::all();        

        $users = User::role(['SuperAdmin','Admin'])->where(function ($query){
            $query->where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('email', 'LIKE', '%'.$this->search.'%');
        })->paginate();

        return view('livewire.admin.users-index', compact('users', 'roles'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        //creando el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->name),
        ]);
        //asignando los roles al usuario con el metodo sync
        $user->roles()->sync($request->roles);

        //retornando a la pagina anterior con mensaje de sesion
        return redirect()->route('admin.users')->with('info', 'Se creo l usuario con exito');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //actualizando solamente el nombre del usuario y los roles
        $user->update([
            'name'=>$request->name,
        ]);

        //asignando los roles al usuario con el metodo sync
        $user->roles()->sync($request->roles);

        //retornando a la pagina anterior con mensaje de sesion
        return redirect()->route('admin.users')->with('info', 'Se asignaron los roles al usuario con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('info','Usuario eliminado satisfactoriamente');
    }


    public function usuariospki()
    {
        $roles = Role::all();
        $users = User::role('Usuario')->where(function ($query){
            $query->where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('email', 'LIKE', '%'.$this->search.'%');
        })->paginate();
        return view('livewire.admin.users-index', compact('users', 'roles')->layout('admin.users.index'));

    }


}
