<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
//use App\Models\Empresas;


class SolicitudServicios extends Component
{
    public $nombreapellidos;
    public $correo;
    //public $empresa;
    public $reeup;

    protected $rules = [
        'nombreapellidos' => 'required',
        'correo' => 'required|email',
        'empresa' => 'required',
        'reeup' => 'required',
    ];

    public function render()
    {
        //$empresas = Empresas::all();
        return view('livewire.solicitud-servicios')->layout('layouts.appsolicitud');
    }

    /**
     * funcion para obtener los datos de solicitud del servicio
     *
     */
    public function enviarSolicitud()
    {
        $this->validate();
        $nombreapellidos = $this->nombreapellidos;
        $correo = $this->correo;
        //$id_empresa = $this->empresa;
        $reeup = $this->reeup;

        //buscando el nombre de la empresa
        //$empresa = DB::table('empresas')->where('id',$id_empresa)->value('empresa');

        //aqui envio correo de notificacion al comercial
        //muestro mensaje de que se envio solicitud al que lo solicitud ademas
        //de un flash message y redirecciono a la pagina inicial

        Mail::send('emails.enviarSolicitudCorreo',
            array(
                'nombre' => $nombreapellidos,
                'correo' => $correo,
                //'empresa' => $empresa,
                'reeup' => $reeup,
                'mensaje' => 'Enviar notificacion al usuario una vez aprobada su solicitud'

            ),function($message) {
                $message->from('pki@tm.cupet.cu');
                $message->to('gestioncomercial@tm.cupet.cu', 'Gestion Comercial TM')->subject('Solicitud Servicio PKI');
            });

        return redirect()->route('welcome');
    }

    public function cancelar(){
        return redirect()->route('welcome');
    }
}
