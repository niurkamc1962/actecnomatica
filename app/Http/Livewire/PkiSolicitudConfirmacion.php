<?php

namespace App\Http\Livewire;

use App\Models\Datospki;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use function view;

class PkiSolicitudConfirmacion extends Component
{
    public function render()
    {
        $datospki = Datospki::all();
        $imagenpki = DB::table('datospkis')->where('categoriaspki_id',4)->where('bloquecategoria',10)->get();
        $articulo = DB::table('datospkis')->where('categoriaspki_id',4)->where('bloquecategoria',14)->get();
        //dd($articulo[0]->contenido);
        return view('livewire.pki-solicitud-confirmacion', (['imagenpki' => $imagenpki[0]->imagenpki, 'contenido' => $articulo[0]->contenido]))->layout('layouts.appSolicitud');
    }
}
