<?php

namespace App\Http\Livewire\Admin;

use App\Models\Empresaspki;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class EmpresaspkiIndex extends Component
{
    use WithPagination;

    public $search;
    public $cantidad = '50';    //cantidad inicial de articulos por pagina.


    //Definiendo los estilos de paginacion de Bootstrap
    protected $paginationTheme = "bootstrap";

    //funcion para reiniciar la busqueda
    public function updatingSearch(){
        $this->resetPage();
    }


    public function render()
    {
        $empresaspki = Empresaspki::where('reeup', 'LIKE', '%'.$this->search.'%')
            ->orWhere('entidad', 'LIKE', '%'.$this->search.'%')
            ->orWhere('osde', 'LIKE', '%'.$this->search.'%')
            ->orderBy('empresaspki_id')
            ->paginate($this->cantidad);
        return view('livewire.admin.empresaspki-index', compact('empresaspki'));
    }

}
