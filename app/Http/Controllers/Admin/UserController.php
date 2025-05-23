<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users_extrapki;
use App\Notifications\RoleNotificacion;
use Barryvdh\DomPDF\PDF;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Notification;
use Spatie\Permission\Models\Role;
use Swift_Mailer;
use Swift_SmtpTransport;
use function event;
use function redirect;
use function view;


class UserController extends Controller
{

    /**
     *  Metodo para registrar usuarios en el proyecto
     *  Enviando correo de confirmacion al usuario
     *
     * @param array $input
     * @return mixed
     * @throws ValidationException
     */
    public function registrarUsuario(Request $request) {

        /*
         * 13/Abril/2022 MODIFICACION PARA CHEQUEAR CONEXION CON EL SERVIDOR DE CORREO
         *
         * Chequeo de conexion con el servidor de Correo, desde el helpers.php
         * asi no se queda a medias el registro del usuario
         */
        $retorna = checkEmailServer();

        if($retorna == 'ok') {
            //entro por aqui ya que hay conexion con el servidor de correo
            $request->validate([
                'name' => ['required', 'min:3', 'max:50'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'contrasena' => ['required', 'min:8', 'same:contrasena_confirmacion'],
            ],[
                'name.required' => 'Nombre(s) y Apellidos son obligatorio',
                'name.max' => 'Nombre(s) y Apellidos no debe exceder 50 caracteres',
                'email.required' => 'Correo es obligatorio',
                'email.unique' => 'Dirección de correo ya está registrada',
                'contrasena.required' => 'Contraseña es obligatoria',
                'contrasena.min' => 'La contraseña no debe ser menor de 8 caracteres',
                'contrasena_confirmacion.same' => 'Las contraseñas no coindiden',
            ]);
            //creando el usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->contrasena),
                'empresa' => ucwords(strtolower($request->empresa)),
                'reeup' => $request->reeup,
                'telefonomovil' => $request->telefonomovil,
                'telefonofijo' => $request->telefonofijo,
                'cargo' => $request->cargo
            ]);
            //Evento de registrar,enviar correo de confirmacion
            event(new Registered($user));
            //asignando el role de Usuario
            $user->assignRole('Usuario');
            return redirect()->route('solicitar_confirmacion');
        }else{
            //entro por aqui cuando no hay comunicacion con el servidor de correo
            //dd('En estos momentos tenemos problemas,intente registrarse mas tarde, Disculpe las molestias');
            $articulo = DB::table('datospkis')->where('categoriaspki_id',4)->where('bloquecategoria',15)->get();
            return view('errors.errorConfirmacionCorreo', (['imagenpki' => $articulo[0]->imagenpki, 'contenido' => $articulo[0]->contenido]))->layout('layouts.appSolicitud');
        }
    }


    /**
     * Metodo que envia correo de notificacion de registro
     *
     * @throws ValidationException
     */
    /*public function correoRegistroUsuario($user)
    {
        $usuario = $user->name;
        $correo = $user->email;

        Mail::send('emails.correoRegistroUsuario',
            array(
                'nombre' => $usuario,
                'correo' => $correo,
                'mensaje' => 'Un nuevo usuario se ha registrado en el sitio.'

            ),function($message) {
                //$message->from($this->correo);
                $message->to('pki@tm.cupet.cu', 'PKI')->subject('Registro de Usuario ');
            });
    }*/


    /**
     * Llama la vista que esta en admin/users/index que  es
     * la que tiene el formato de adminlte y llama al componente
     * livewire UsersIndex para mostrar los administradores
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Metodo que muestra formulario editar para asignar role al usuario.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(User $user)
    {
        //$roles = Role::all();
        
        // Octubre/2022 Adicione esta consulta para que no muestre los roles a los que no se puede cambiar manualmente
        //Que son SuperAdmin y Usuario
        $roles = Role::whereNotIn('name',['SuperAdmin', 'Usuario'])->get();        
        
        /***************************************************************
         * adicionado para obtener los datos de users_extraspki
         * donde aparece las fechas de las asignaciones de los roles
         **************************************************************/

        $historial_roles = DB::table('users')
            ->leftJoin('users_extrapkis', 'users.id', '=', 'users_extrapkis.user_id')
            ->join('roles','users_extrapkis.role_id','=','roles.id')
            ->select('users_extrapkis.role_id', 'users_extrapkis.created_at', 'roles.name as role')
            ->where('users.id','=',$user->id)
            ->get();
            //dd($historial_roles[0]);
        return view('admin.users.edit',compact('user','roles', 'historial_roles'));
    }

    /**
     * Actualizar la informacion del usuario, asignando los roles
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //obteniendo el role viejo para comparar con el nuevo y en caso de ser diferente actualizar el mismo
        $role_old = $user->roles()->get();
        $role_new = $request->role;

        /***************************************************************************/
        /* modificacion 1/Marzo/2022 para que no envie notificacion en caso de cambiar
        /* el role de usuario a role de Aspirante, Representante o Titular
        /***************************************************************************/
        //obteniendo el nombre del role_new para la comparacion
        $role_dato = Role::findById($role_new);

        if($role_old[0]->id != $role_new){
            //indica que cambio el role por lo que paso a la pregunta de si es
            //aspirante, titular o representante para enviarle notificacion
            if(($role_dato->name != 'Usuario') and ($role_dato->name != 'SuperAdmin') and ($role_dato->name != 'Admin')) {
                //Chequeando servidor de correo para que no de erroe el envio de correo de notificacion de cambio de Role
                $retorna = checkEmailServer();

                if($retorna == 'ok')
                {
                    //envio notificacion y actualizo el role
                    $user->notify(new RoleNotificacion($role_dato->name));
                    //actualizando el role viejo por el nuevo
                    if($request->role)
                    {
                        $user->roles()->sync($request->role);
                    }

                    /****************************************************************
                    * ADICIONADO EN OCTUBRE/2022 PARA TENER HISTORIAL DE LOS CAMBIOS
                    * DE ROLE DEL USUARIO INSERTANDO EN LA TABLA USERS_EXTRAPKIS
                     ****************************************************************/
                    Users_extrapki::create([
                        'role_id' => $role_new,
                        'user_id' => $user->id
                    ]);
                }else{
                    //indica que no se pudo cambiar el role ya que no hubo comunicacion
                    //con el servidor de correo DEBO MOSTRAR UN ALERT
                    dd('no se pudo cambiar el role por no tener comunicacion con el servidor');
                }
            }
        }


        //inicializando la ruta de redireccionar por si falla la validacion y no se pone ningun role.
        $ruta = "admin.home";
        //obteniendo el role para determinar a que parte regresar de los usuarios
        $roleUsuario = $user->getRoleNames();

        switch ($roleUsuario[0]){
            case "Admin":
            case "SuperAdmin":
                $ruta = "admin.users.index";
                break;

            case "Usuario":
                $ruta = 'admin.users.usuariospki';
                break;

            case "Aspirante":
                $ruta = 'admin.users.aspirantespki';
                break;

            case "Representante":
                $ruta = 'admin.users.representantespki';
                break;

            case "Titular":
                $ruta = 'admin.users.titularespki';
                break;
        }

        return redirect()->route($ruta)->with('info', 'Actualizado el Role del usuario con exito');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        //aqui debe ser borrado logico y no fisico para mantener historial del mismo
        $user->delete();
        return redirect()->route('admin.home')->with('info','Usuario eliminado satisfactoriamente');
    }



    /**
     * Metodo que muestra la vista de los usuarios que ya confirmaron correo y estan registrados en el sitio
     *
     * @return Application|Factory|View
     *
     */
    public function usuariospki()
    {
        return view('admin.usuariospki.index');
    }


    /**
     * Metodo que muestra la vista de los usuarios que NO ESTAN registrados en el sitio
     *
     * @return Application|Factory|View
     *
     */
    public function usuariosnopki()
    {
        return view('admin.usuariosnopki.index');
    }



    /**
     * Metodo que muestra la vista de los usuarios aspirantes
     *
     * @return Application|Factory|View
     *
     */
    public function aspirantespki()
    {
        return view('admin.aspirantespki.index');
    }



    /**
     *
     * Metodo que muestra la vista de los usuarios representantes
     *
     * @return Application|Factory|View
     *
     */
    public function representantespki()
    {
        return view('admin.representantespki.index');
    }


    /**
     *
     * Metodo que muestra la vista de los usuarios titulases
     *
     * @return Application|Factory|View
     *
     */
    public function titularespki()
    {
        return view('admin.titularespki.index');
    }

    /**
     *
     * Metodo que muestra la vista de los usuarios pendientes
     *
     * @return Application|Factory|View
     *
     */
    public function pendientespki()
    {
        return view('admin.pendientespki.index');
    }


    /**
     * Metodo que muestra la vista de todos los tipos de usuarios pki(usuario, aspirante, representante, titular)
     *
     * @return Application|Factory|View
     *
     */
    public function todospki()
    {
        return view('admin.todospki.index');
    }


    /**
     * Metodo para crear el fichero pdf y si se puso algun concepto de filtro lo genera tambien
     */
    public function pdfpki(Request $request)
    {
        $pdfrole = $request->opcion;
        $search = $request->busqueda;

        /*$users = User::role($pdfrole)->where(function ($query) use ($search){
            $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('empresa', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%');
        })->get();*/

        if($pdfrole == 'todospki') {
            if (isset($search)) {
                $users = User::select('users.id', 'users.name', 'users.email', 'users.empresa', 'users.reeup', 'users.telefonomovil', 'users.telefonofijo', 'users.cargo', 'users.created_at', 'roles.name as role')
                    ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->where(function ($query) use($search) {
                        $query->where('users.name', 'LIKE', '%' . $search . '%')
                            ->orWhere('users.empresa', 'LIKE', '%' . $search . '%')
                            ->orWhere('users.email', 'LIKE', '%' . $search . '%')
                            ->orWhere('roles.name', 'LIKE', '%' . $search . '%');
                    })->get();
            } else {
                $users = User::select('users.id', 'users.name', 'users.email', 'users.empresa', 'users.reeup', 'users.telefonomovil', 'users.telefonofijo', 'users.cargo', 'users.created_at', 'roles.name as role')
                    ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->get();
            }
        }else{
            $users = User::role($pdfrole)->where(function ($query) use ($search){
                $query->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('empresa', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%');
            })->get();


        }
        $total=count($users);
        $pdflistado = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin/pdflistado',compact('users','pdfrole', 'total', 'search'))->setPaper('a4','landscape');
        $ficheropdf = $pdfrole.'.pdf';
        return $pdflistado->download($ficheropdf);
    }

    /**
     * Metodo que muestra la vista para el cambio de roles seleccionando el fichero csv
     *
     * @return void
     */
    public function cambiarolespki()
    {
        return view('admin.cambiarolespki.index');
    }


}
