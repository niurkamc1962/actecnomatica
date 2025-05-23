<?php

namespace App\Http\Livewire;

use App\Models\Datospki;
use App\Models\User;
use App\Models\UsersExtrapki;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
//use App\Models\Empresas;


class PkiSolicitudRegistro extends Component
{
    public $usuario;
    public $correo;

    public function render()
    {
        $datospki = Datospki::all();
        return view('livewire.pki-solicitud-registro', compact('datospki'))->layout('layouts.appSolicitud');
    }


    public function cancelar(){
        return redirect()->route('welcome');
    }

}
