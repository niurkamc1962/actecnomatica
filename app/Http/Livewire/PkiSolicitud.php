<?php

namespace App\Http\Livewire;

//use App\Models\Empresas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class PkiSolicitud extends Component
{
    public $showDivFormulario = false;    //para mostrar o no el div de Formulario Previo
    public $showButtonFormulario = true;  //para mostrar o esconder boton de Formulario Previo

    public $usuario;
    public $correo;
    //public $empresa;
    public $reeup;
    public $telefonomovil;
    public $telefonofijo;

    /*protected $rules = [
        'usuario' => 'required',
        'correo' => 'required|email',
        'empresa' => 'required',
    ];*/

    /**
     * Metodo para obtener los datos del usuario Autenticado
     * Utilizandolo para enviarlo con el correo
     */
    public function mount()
    {
        $autenticado = Auth::user();
        $this->usuario_id = $autenticado->id;
        $this->usuario = $autenticado->name;
        $this->correo = $autenticado->email;
    }


    /**
     * Metodo que muestra pantalla inicial
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $datospki = DB::table('datospkis')
            ->orderBy('categoriaspki_id')
            ->get();
        //$empresas = Empresas::all();
        $usuario = User::find(Auth::user()->id);
        return view('livewire.pki-solicitud', compact('datospki', 'usuario'));
    }


    /**
     *  Metodo para abrir o cerrar DIV que muestra formulario previo
     *
     */
    public function openDivFormulario() {
        $this->showDivFormulario =! $this->showDivFormulario;
        $this->showButtonFormulario =! $this->showButtonFormulario;
    }

    /**
     * Metodo que cancela el formulario previo y regresa a la vista solicitud
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function cancelar(){
        $this->openDivFormulario();
        $datospki = DB::table('datospkis')
            ->orderBy('categoriaspki_id')
            ->get();
        //$empresas = Empresas::all();
        $usuario = User::find(Auth::user()->id);
        return view('livewire.pki-solicitud', compact('datospki'));
    }


    /**
     * Metodo que envia correo de solicitud de Servicio del usuario
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enviarSolicitud()
    {

        Mail::send('emails.correoSolicitudServicio',
            array(
                'nombre' => $this->usuario,
                'correo' => $this->correo,
                //'empresa' => $this->empresa,
                'reeup' => $this->reeup,
                'telefonomovil' => $this->telefonomovil,
                'telefonofijo' => $this->telefonofijo,
                'mensaje' => 'Enviar notificacion al usuario una vez aprobada su solicitud'

            ),function($message) {
                $message->from($this->correo);
                $message->to('pki@tm.cupet.cu', 'PKI')->subject('Solicitud Servicio PKI');
            });

        
        $this->openDivFormulario();
        $datospki = DB::table('datospkis')
            ->orderBy('categoriaspki_id')
            ->get();
        $empresas = Empresas::all();
        $usuario = User::find(Auth::user()->id);
        return view('livewire.pki-solicitud', compact('datospki', 'empresas'));
    }


    /**
     * Metodo para mostrar formulario de Registro
     *
     */
    public function solicitudRegistro() {
        return view('livewire.pki-solicitud-registro')->layout('layouts.appSolicitud');
    }
}
