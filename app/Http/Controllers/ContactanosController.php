<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){
        return view('emails.contactanos');
    }

    /**
     * Funcion para enviar correo
     */
    public function enviarCorreo(Request $request) {
        //dd($request);
        $request->validate([
            'nombre' =>'required',
            'correo' => 'required|email',
            'mensaje' => 'required'
        ]);

        //$correo = new ContactanosMailable($request->all());

        //Mail::to('killa@tm.cupet.cu')->send($correo);
        $cuerpo = $request->nombre .' , '.$request->mensaje;
        /*Mail::to($request->correo)
            ->send(new ContactanosMailable($cuerpo));*/

        Mail::send('emails.contactoEmail',
            array(
            'name' => $request->nombre,
            'email' => $request->correo,
            'user_message' => $request->mensaje

        ),function($message) use ($request){
            $message->from($request->correo);
            $message->to('pkitm@tm.cupet.cu', 'Administrador PKI')->subject('Correo contacto');
        });


        return redirect()->route('welcome')->with('info','Mensaje enviado');
    }
}
