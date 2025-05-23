<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class PendientespkiIndex extends Component
{
    use WithPagination;

    public $search;

    //Definiendo los estilos de paginacion de Bootstrap
    protected $paginationTheme = "bootstrap";

    //metodo para reiniciar la busqueda
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        /*$roles = Role::all();
        $users = User::role('Aspirante')->where(function ($query){
            $query->where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('email', 'LIKE', '%'.$this->search.'%');
        })->paginate();
        return view('livewire.admin.pendientespki-index', compact('users', 'roles'));
        */
        $users = User::whereNull('email_verified_at')->where(function ($query){
            $query->where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('empresa', 'LIKE', '%'.$this->search.'%')
                ->orWhere('email', 'LIKE', '%'.$this->search.'%');
        })->paginate();
        //dd($users);
        return view('livewire.admin.pendientespki-index', compact('users'));
    }
}



