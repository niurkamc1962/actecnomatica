<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Usuariosnopki;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class TodospkiIndex extends Component
{

    use WithPagination;

    public $search;

    public $tiporole;

    public function mount($tiporole){
        $this->tiporole = $tiporole;
    }

    //Definiendo los estilos de paginacion de Bootstrap
    protected $paginationTheme = "bootstrap";

    //metodo para reiniciar la busqueda
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        //$roles = Role::all();
        $roles = Role::whereNotIn('name',['SuperAdmin','Admin', 'Usuario'])->get();

        if($this->tiporole == 'todospki')
        {
            $users = User::select('users.id','users.name','users.email','users.empresa','users.reeup','users.telefonomovil','users.telefonofijo','users.cargo','users.created_at','roles.name as role',
                DB::raw('DATE_FORMAT(users_extrapkis.created_at,"%d-%m-%Y") as extrapkis'))
                ->leftJoin('users_extrapkis','users.id','=','users_extrapkis.user_id')
                ->join('model_has_roles','model_has_roles.model_id','=','users.id')
                ->join('roles','model_has_roles.role_id','=','roles.id')
                ->where(function ($query){
                    $query->where('users.name', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('users.empresa', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('users.email', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('roles.name', 'LIKE', '%'.$this->search.'%');
                })->paginate();

            return view('livewire.admin.todospki-index', compact('users', 'roles'));
        }else{
            /***********************************************************************
            * adicionado en Octubre 2022 para los usuariosNOpki
            *********************************************************************/
            if($this->tiporole == 'usuariosnopki')
            {
                $usuariosnopki = DB::table('usuariosnopkis')->paginate(10);
                return view('livewire.admin.usuariosnopki-index', compact('usuariosnopki'));
            }else{
                $users = User::role($this->tiporole)
                    ->select('users.id','users.name','users.email','users.empresa','users.reeup','users.telefonomovil','users.telefonofijo','users.cargo','users.created_at',
                        DB::raw('DATE_FORMAT(users_extrapkis.created_at,"%d-%m-%Y") as extrapkis'))
                    ->leftJoin('users_extrapkis','users.id','=','users_extrapkis.user_id')
                    ->where(function ($query){
                        $query->where('name', 'LIKE', '%'.$this->search.'%')
                            ->orWhere('empresa', 'LIKE', '%'.$this->search.'%')
                            ->orWhere('email', 'LIKE', '%'.$this->search.'%');
                    })->paginate();
                //dd($users);
                if($this->tiporole == 'titular')
                {
                    $vistatiporole = $this->tiporole.'espki-index';
                }else{
                    $vistatiporole = $this->tiporole.'spki-index';
                }
                return view('livewire.admin.'.$vistatiporole, compact('users', 'roles'));
            }

        }

    }
}
