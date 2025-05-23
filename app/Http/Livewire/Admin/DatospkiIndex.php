<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Datospki;
use Livewire\WithPagination;

class DatospkiIndex extends Component
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
        $datospki = Datospki::where('titulo', 'LIKE', '%'.$this->search.'%')
            ->orWhere('contenido', 'LIKE', '%'.$this->search.'%')
            ->orderBy('categoriaspki_id')
            ->paginate($this->cantidad);
        return view('livewire.admin.datospki-index', compact('datospki'));
    }
}
