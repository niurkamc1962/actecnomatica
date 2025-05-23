<?php

namespace App\Http\Livewire\Admin;


use App\Models\User;
use App\Models\Users_extrapki;
use App\Models\Usuariosnopki;
use App\Notifications\RoleNotificacion;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Notification;
use function PHPUnit\Framework\isEmpty;


class CambiarolespkiIndex extends Component
{

    use WithFileUploads;

    public $ficherocsv = null;
    public $role = null;
    public $contenido = null;
    public $datos = [];
    public $empresa = null;
    public $reeup = null;
    public $usuariospki = [];
    public $usuariosnopki = [];
    public $error = '';
    public $formatocsv= false;

    //reglas de validacion
    protected $rules = [
        'ficherocsv' => 'required|file',
        'role' => 'required',
    ];

    //mensajes para las reglas de validacion
    protected $messages = [
        'ficherocsv.required' => 'El fichero csv es obligatorio y no puede estar vacio.',
        'role.required' => 'El role es obligatorio.',
    ];

    public function mount()
    {
        $this->roles = Role::where('name', 'Titular')
        ->orWhere('name','Representante')
        ->orWhere('name','Aspirante')->orderBy('name')->get();
    }

    public function render()
    {
        //aqui debo chequear primero si hay conexion con el servidor de correo
        //asi no proceso nada en caso de no estar ok el mismo

        if (checkEmailServer() == 'nook')
        {
            $this->error='No hay conexión con el servidor de correo, intente más tarde o llame a los administradores para resolver la situación.';
        }
        return view('livewire.admin.cambiarolespki', ['roles' => $this->roles, 'error' => $this->error]);
    }



    /**********************************************************************
     *
     * Metodo que procesa el fichero csv
     * prepara el arreglo con los correos de usuariospki y usuariosnopki
     * obtiene el nombre de la empresa, codigo reeup
     *
     ********************************************************************/
    public function procesarficherocsv()
    {
        //validando que se haya seleccionado el role y el fichero csv
        $valores = $this->validate();

        //obteniendo nombre y tamano del fichero csv
        $nombreficherocsv = $valores['ficherocsv']->getClientOriginalName();
        $tamanoficherocsv = $valores['ficherocsv']->getSize();
        $role = $valores['role'];
        //guardando en la carpeta storage
        $this->ficherocsv->storeAs('', $nombreficherocsv);
        //obteniendo la ruta para poder abrir el fichero y leerlo
        $ruta_ficherocsv = Storage::path($nombreficherocsv);

        if(($file = fopen( $ruta_ficherocsv,"r")) !== FALSE) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $datos[] = $data;
            }

            //chequeando que en la matriz multidimensional tenga 4 o mas elementos
            //de lo contrario no tiene el formato csv correcto
            if(count($datos[0]) >=4)
            {
                if ((str_contains($datos[0][0],(strtolower($datos[0][0]) == 'empresa o entidad')))
                    &&
                    (str_contains($datos[0][2],(strtolower($datos[0][2]) == 'codigo reeup')) ||
                        str_contains($datos[0][2],(strtolower($datos[0][2]) == 'código reeup')))
                    &&
                    (str_contains($datos[1][0],(strtolower($datos[1][0]) == 'correo electronico')) ||
                        (str_contains($datos[1][0],(strtolower($datos[1][0]) == 'correo electrónico'))))
                ){
                    $this->formatocsv= true;
                }
            }

            if($this->formatocsv)
            {
                //procesando los datos del fichero csv
                foreach ($datos as list($dato1, $dato2, $dato3, $dato4)) {
                    if ((str_contains(strtolower($dato1), 'empresa')) or (str_contains(strtolower($dato1), 'entidad'))) {
                        $this->empresa = mb_convert_encoding($dato2,"UTF-8");
                    }
                    if (str_contains($dato1, '@')) {
                        //buscando si existe el correo o si no para preparar los arreglos
                        $usuario = User::where('email', $dato1)->value('email');
                        if ($usuario) {
                            $this->usuariospki[] = $dato1;
                        } else {
                            $this->usuariosnopki[] = $dato1;
                        }
                    }
                    if ((str_contains(strtolower($dato3), 'codigo')) or (str_contains(strtolower($dato3), 'código')) or (str_contains(strtolower($dato3), 'reeup'))) {
                        $this->reeup = mb_convert_encoding($dato4,"UTF-8");
                    }
                }

                //ejecuto metodo para procesar los usuariospki
                if (count($this->usuariospki) != 0) {
                    $this->procesausuariospki($this->usuariospki, $this->role);
                }
                //ejecuto metodo para usuariosnopki
                if (count($this->usuariosnopki) != 0) {
                    $this->procesausuariosnopki($this->empresa, $this->reeup, $this->usuariosnopki, $this->role);
                }
                return redirect()->route('admin.users.cambiarolespki')->with('info', 'Procesado todos los usuarios para el cambio de Role');
            } else {
                return redirect()->route('admin.users.cambiarolespki')->with('error', 'Error, Fichero CSV no tiene el formato correcto');
            }
        }
        fclose($file);
    }


    /**********************************************************************
     *
     * metodo que recibe los correos de los usuarios pki
     * Cambiarle el role
     * Enviarles notificacion
     * Insertar en la tabla users_extrapki la fecha del cambio de role
     *
     **********************************************************************/
    public function procesausuariospki($usuariospki, $role_id)
    {
        //obteniendo el nombre del role para la notificacion
        $role = Role::findById($role_id);
        $nombreRole = $role->name;

        foreach ($usuariospki as $usuariopki)
        {
            //obtengo los datos del usuario
            $usuariopki = User::whereEmail($usuariopki)->get();

            //obteniendo el role del usuario y actualizandolo
            //$usuarioRole = $usuariopki[0]->roles;

            if($usuariopki[0]->roles()->sync($role_id)) {
                //Crear articulo en la tabla de users_extrapkis
                //especificando el role y la fecha del cambio de role
                Users_extrapki::create([
                    'role_id' => $role_id,
                    'user_id' => $usuariopki[0]->id
                ]);
            }
            $usuariopki[0]->notify(new RoleNotificacion($nombreRole));
        }
    }


    /***************************************************************************
     *
     * metodo que recibe los correos de los usuarios NO pki para insertarlos
     * en la tabla usuariosnopki y enviarles notificacion para que se registren
     * en el proyecto
     *
     **************************************************************************/
    public function procesausuariosnopki($empresa, $reeup, $usuariosnopki, $role_id)
    {
        foreach ($usuariosnopki as $usuarionopki)
        {
            //buscando si ya se inserto ese correo para que no este repetido
            //y asi no enviar notificacion dos veces
            $existeUsuario = Usuariosnopki::where('correo', $usuarionopki)->value('correo');

            //retorna falso si esta vacio existeUsuario por lo que paso a crearlo
            if(!$existeUsuario) {
                //creando el usuarionopki
                $usuario = Usuariosnopki::create([
                    'correo' => $usuarionopki,
                    'empresa' => utf8_encode($empresa),
                    'reeup' => intval($reeup),
                    'role_id' => $role_id
                ]);
                Notification::route('mail',$usuarionopki)
                ->notify(new RoleNotificacion('nuevoRegistro'));
            }
        }
    }

}
