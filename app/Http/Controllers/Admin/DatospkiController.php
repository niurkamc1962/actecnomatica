<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Datospki;
use App\Models\Documentospki;
use Illuminate\Http\Request;
use App\Models\Categoriaspki;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class DatospkiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$datospki = Datospki::paginate(100);
        $datospki = DB::table('datospkis')
            ->orderBy('categoriaspki_id')
            ->paginate();
        return view('admin.datospki.index', compact('datospki'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categoriaspki = Categoriaspki::all();
        $categoriaspki = Categoriaspki::pluck('categoria','id')->toArray();
        return view('admin.datospki.create', compact('categoriaspki'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'titulo' => 'required',
            'categoriaspki' => 'required',
            'bloquecategoria' => 'required',
        ]);

        if($validator->fails()){
            return redirect('admin/datospki/create')
            ->withErrors($validator)->withInput();
        }

        $datopki = new Datospki();

        /*if($request->hasFile('documentopki'))
        {
            $documentopki = $request->file('documentopki');
            $nombredocumento = $request->file('documentopki')->getClientOriginalName();
            $tamanodocumento = $request->file('documentopki')->getSize();
            if ($tamanodocumento == null){
                return redirect()->route('admin.datospki.index')->with('error','El fichero excede el tamano permitido, No se actualizo la informacion');
            }
            //subiendo el documento a la carpeta correspondiente
            $carpeta = 'public\ficherospki\categoriapki' . $request->categoriaspki[0];
            //Validar si se subio el documento para que no de error
            $documentopki->move(base_path($carpeta), $nombredocumento);
            $datopki->documentopki = $nombredocumento;
        }*/
        if($request->hasFile('iconopki'))
        {
            $iconopki = $request->file('iconopki');
            $nombreicono = $request->file('iconopki')->getClientOriginalName();
            $tamanoicono = $request->file('iconopki')->getSize();
            if ($tamanoicono == null){
                return redirect()->route('admin.datospki.index')->with('error','El ICONO excede el tamano permitido, No se actualizo la informacion');
            }
            //subiendo el icono a la carpeta correspondiente
            $carpeta = 'public\ficherospki\categoriapki' . $request->categoriaspki[0];
            //Validar si se subio el icono para que no de error
            $iconopki->move(base_path($carpeta), $nombreicono);
            $datopki->iconopki = $nombreicono;
        }
        if($request->hasFile('imagenpki'))
        {
            $imagenpki = $request->file('imagenpki');
            $nombreimagen= $request->file('imagenpki')->getClientOriginalName();
            $tamanoimagen= $request->file('imagenpki')->getSize();
            //$nombretemporal = $iconopki->getFileName();
            if ($tamanoimagen== null){
                return redirect()->route('admin.datospki.index')->with('error','La IMAGEN excede el tamano permitido, No se actualizo la informacion');
            }
            //subiendo el imagenpa la carpeta correspondiente
            $carpeta = 'public\ficherospki\categoriapki' . $request->categoriaspki[0];
            //Validar si se subio la imagen para que no de error
            $imagenpki->move(base_path($carpeta), $nombreimagen);
            $datopki->imagenpki = $nombreimagen;
        }
        $datopki->titulo = $request->titulo;
        $datopki->contenido = $request->contenido;
        $datopki->tooltip = $request->tooltip;
        $datopki->categoriaspki_id = $request->categoriaspki[0];
        $datopki->bloquecategoria = $request->bloquecategoria;

        $datopki->save();

        //adicionado el 12/Febrero/2022 para poder subir varios documentospki en caso de ser necesario

        //obteniendo el id del datospki nuevo
        $ultimo_datopki = Datospki::all()->last()->id;

        //ahora chequeando si hay documentospki y cuantos
        if($request->hasFile('documentopki'))
        {
            $documentospki = $request->documentopki;

            foreach ($documentospki as $documentopki){
                $nombredocumento = $documentopki->getClientOriginalName();
                $tamanodocumento = $documentopki->getSize();
                //print_r('documento'.$nombredocumento.' tamano: '.$tamanodocumento. ' datopki_id: '.$ultimo_datopki.' categoria: '.$request->categoriaspki[0]);
                if ($tamanodocumento == null){
                    return redirect()->route('admin.datospki.index')->with('error','El fichero excede el tamano permitido, No se actualizo la informacion');
                }
                //subiendo el documento a la carpeta correspondiente
                $carpeta = 'public/ficherospki/categoriapki' . $request->categoriaspki[0];
                //Validar si se subio el documento para que no de error
                $documentopki->move(base_path($carpeta), $nombredocumento);

                //Insertando el documentopki en la tabla documentospki con el id del datopki
                $docupki = new Documentospki();
                $docupki->documentopki = $nombredocumento;
                $docupki->datospki_id = $ultimo_datopki;
                $docupki->save();
            }
        }
        return redirect()->route('admin.datospki.index')->with('info', 'Informacion creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datospki  $datospki
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriaspki = Categoriaspki::all();
        $datospki = DB::table('datospkis')
            ->leftJoin('documentospkis', 'datospkis.id','=', 'documentospkis.datospki_id')
            ->select('datospkis.id',
                'datospkis.titulo',
                'datospkis.contenido',
                'datospkis.categoriaspki_id',
                'datospkis.bloquecategoria',
                'datospkis.iconopki',
                'datospkis.tooltip',
                'datospkis.imagenpki',
                'datospkis.documentopki as documentopki',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT(documentospkis.id,"-",documentospkis.documentopki)) as documentospki')
            )
            ->groupBy('datospkis.bloquecategoria')
            ->where('datospkis.id','=',$id)
            ->orderBy('datospkis.bloquecategoria')
            ->get();
        $datospki = $datospki[0];
        //dd($datospki);
        return view('admin.datospki.show', compact('datospki', 'categoriaspki'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datospki  $datospki
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriaspki = Categoriaspki::pluck('categoria','id')->toArray();

        //cambiando la consulta porque ahora puede tener mas de un documento
        $datospki = DB::table('datospkis')
            ->leftJoin('documentospkis', 'datospkis.id','=', 'documentospkis.datospki_id')
            ->select('datospkis.id',
                'datospkis.titulo',
                'datospkis.contenido',
                'datospkis.categoriaspki_id',
                'datospkis.bloquecategoria',
                'datospkis.iconopki',
                'datospkis.tooltip',
                'datospkis.imagenpki',
                'datospkis.documentopki as documentopki',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT(documentospkis.id,"-",documentospkis.documentopki)) as documentospki')
            )
            ->groupBy('datospkis.bloquecategoria')
            ->where('datospkis.id','=',$id)
            ->orderBy('datospkis.bloquecategoria')
            ->get();

        $datospki = $datospki[0];
        return view('admin.datospki.edit', compact('datospki', 'categoriaspki'));
    }

    /**
     * Actualiza la informacion
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datospki  $datospki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'titulo' => 'required',
            'categoriaspki' => 'required',
            'bloquecategoria' => 'required',
        ]);

        if($validator->fails()){
            return redirect()
             ->route('admin.datospki.edit',$datospki->id)
            ->with('error','No se actualizo la informacion correctamente');
        }

        $categoriapki = $request->categoriaspki[0];

        $datospki = Datospki::find($id);
        $datospki->titulo = $request->titulo;
        $datospki->contenido = $request->contenido;
        $datospki->tooltip = $request->tooltip;
        $datospki->categoriaspki_id = $categoriapki;
        $datospki->bloquecategoria = $request->bloquecategoria;

        /*****************************************************************************************************************/
        /* ADICIONADO 18/FEBRERO/2022 PARA asociar MAS DE UN DOCUMENTO EN CASO DE SER NECESARIO a un articulo
        /*****************************************************************************************************************/

        //Preguntando si hay que eliminar el documentopki que estaba en la tabla datospki
        if($request->eliminadocumentopki){
            //obteniendo el nombre del documentopki a borrar de la tabla datospkis
            $documentoeliminar = $datospki->documentopki;
            $eliminadocumento = public_path().'/ficherospki/categoriapki'.$categoriapki.'/'.$documentoeliminar;
            if(file_exists($eliminadocumento)){
                unlink($eliminadocumento);
            }
            //print_r('eliminando documentopki'.$eliminadocumento);
        }else{
            //entro por aqui para ver si tiene documentopki en la tabla datospki y asi solo limpiar el
            //campo de la tabla datospkis.documentopki e insertar en la tabla documentospki.documentopki
            //con el id del datospki correspondiente
            if ($datospki->documentopki != null){
                $documentopki = new Documentospki();
                $documentopki->documentopki = $datospki->documentopki;
                $documentopki->datospki_id = $id;
                $documentopki->save();
            }
        }
        //limpiando el campo de la tabla datospkis.documentopki
        $datospki->documentopki = null;

        //Tratamiento de los documentospki, primero ver si hay que eliminar para despues ver si hay nuevos documentospki
        //dd($request->eliminadocumentospki);
        if($request->eliminadocumentospki !== null) {
            //indica que se marco algun documento para eliminar
            $eliminadocumentospki = $request->eliminadocumentospki;
            foreach ($eliminadocumentospki as $deldocumentospki) {
                $first = stripos($deldocumentospki, 'e(');
                $last = stripos($deldocumentospki, ');');
                $iddocumentopki = substr($deldocumentospki, $first + 2, $last - ($first + 2));
                $documentopki = Documentospki::find($iddocumentopki);
                $documentopkieliminar = $documentopki->documentopki;
                if ($documentopki !== null) {
                    Documentospki::find($iddocumentopki)->delete();
                    $eliminadocumentopki = public_path() . '/ficherospki/categoriapki' . $categoriapki . '/' . $documentopkieliminar;
                    unlink($eliminadocumentopki);
                }
            }
        }
        //Preguntando si hay nuevos documentopki
        //dd(count($request->nuevosdocumentospki));
        if ($request->nuevosdocumentospki !== null) {
            $documentospkinuevo = $request->nuevosdocumentospki;
            foreach ($documentospkinuevo as $documentopkinuevo) {
                $nombredocumentopki = $documentopkinuevo->getClientOriginalName();
                $tamanodocumentopki = $documentopkinuevo->getSize();
                $carpetacopiar = 'public/ficherospki/categoriapki' . $categoriapki;
                if (($documentopkinuevo) && ($tamanodocumentopki != null)) {
                    //indica que tiene el tamano permitido por lo que subo el documentopki
                    $documentopkinuevo->move(base_path($carpetacopiar), $nombredocumentopki);
                    //ahora inserto en la tabla documentospki
                    $documentopki = new Documentospki();
                    $documentopki->documentopki = $nombredocumentopki;
                    $documentopki->datospki_id = $id;
                    $documentopki->save();
                }else{
                    return redirect()
                        ->route('admin.datospki.edit', $datospki)
                        ->with('error', 'No se actualizo la informacion, uno de los ficheros excede el tamaño permitido');
                }
            }
        }

        /*****************************************************************************************************************/
        /* MODIFICADO PARA QUE SOLO ANALIZE EL ICONO Y LA IMAGEN EN CASO DE CAMBIAR,
        /* EL TRATAMIENTO DE LOS DOCUMENTOSPKI ESTA ARRIBA APARTE
        /* 18/FEBRERO/2022
        /*****************************************************************************************************************/

        //preguntando si se va a eliminar el icono
        if($request->eliminaiconopki !== null) {
            //indica que se marco para eliminar
            $iconopkieliminar = $datospki->iconopki;
            if ($iconopkieliminar !== null) {
                $eliminaiconopki = public_path() . '/ficherospki/categoriapki' . $categoriapki . '/' . $iconopkieliminar;
                unlink($eliminaiconopki);
            }
            //poniendo en blanco el campo del icono
            $datospki->iconopki = '';
        }

        //preguntando si se va a eliminar la imagen
        if($request->eliminaimagenpki !== null) {
            //indica que se marco para eliminar
            $imagenpkieliminar = $datospki->imagenpki;
            if ($imagenpkieliminar !== null) {
                $eliminaimagenpki = public_path() . '/ficherospki/categoriapki' . $categoriapki . '/' . $imagenpkieliminar;
                unlink($eliminaimagenpki);
            }
            //poniendo en blanco el campo del icono
            $datospki->imagenpki = '';
        }

        if(($request->iconopki) OR ($request->imagenpki))
        {
            //si entro por aqui es porque tiene  imagen o icono a subir como fichero
            if($request->iconopki){
                $iconopki = $request->iconopki;
                $nombreicono = $iconopki->getClientOriginalName();
                $tamanoicono = $iconopki->getSize();
                $iconoUp = $this->tratamientofichero($iconopki, $nombreicono, $tamanoicono, 'icono', $datospki, $categoriapki);
                if($iconoUp == 'ok') {
                    $datospki->iconopki = $nombreicono;
                }else{
                    //indica que el documento excede el tamano permitido para subir al servidor
                    return redirect()
                        ->route('admin.datospki.edit', $datospki)
                        ->with('error', 'El fichero excede el tamano permitido, No se actualizo la informacion');
                }
            }
            if($request->imagenpki){
                $imagenpki = $request->imagenpki;
                $nombreimagen = $imagenpki->getClientOriginalName();
                $tamanoimagen = $imagenpki->getSize();
                $imagenUp = $this->tratamientofichero($imagenpki, $nombreimagen, $tamanoimagen, 'imagen', $datospki, $categoriapki);
                if($imagenUp == 'ok') {
                    $datospki->imagenpki = $nombreimagen;
                }else{
                    //indica que el documento excede el tamano permitido para subir al servidor
                    return redirect()
                        ->route('admin.datospki.edit', $datospki)
                        ->with('error', 'El fichero excede el tamano permitido, No se actualizo la informacion');
                }
            }
        }


        $datospki->save();
        /*return redirect()
            ->route('admin.datospki.edit',$datospki->id)
            ->with('info','Actualizada la informacion correctamente');*/
        return redirect()
            ->route('admin.datospki.index')
            ->with('info','Actualizada la informacion correctamente');

    }

    /**
     * Metodo para subir el fichero ya sea una imagen o icono del datospki
     *
     */
    public function tratamientofichero($fichero, $nombrefichero, $tamano, $tipo, $datospki, $categoriapki)
    {
        /*if($tipo == 'documento') {
            //$datocampopki = $datospki->documentopki;
        }*/
        if($tipo == 'icono') {
            $datocampopki = $datospki->iconopki;
        }
        if($tipo == 'imagen') {
            $datocampopki = $datospki->imagenpki;
        }

        $carpetaborrar = '/ficherospki/categoriapki' . $categoriapki;
        $carpetacopiar = 'public/ficherospki/categoriapki' . $categoriapki;

        if (($fichero) && ($tamano != null)) {
            //indica que hay fichero a subir y esta en el rango del tamano permitido
            if ($datocampopki) {
                //indica que debo eliminar el fichero anterior
                $eliminar = public_path() . $carpetaborrar . '/' . $datocampopki;
                if (file_exists($eliminar)) {
                    unlink($eliminar);
                }
            }
            //subiendo el documento a la carpeta correspondiente
            $fichero->move(base_path($carpetacopiar), $nombrefichero);
            $mensaje = 'ok';
        }else{
            $mensaje = 'nook';
        }
        return $mensaje;
    }


    /**
     * Eliminar datopki con sus ficherospki en caso de tenerlos.
     *
     * @param  \App\Models\Datospki  $datospki
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //antes de eliminar de la bd debo quitar los ficheros asociados a este datopki en la carpeta correspondiente

        //dd($id);

        $datospki = Datospki::find($id);
        $iconopki = $datospki->iconopki;
        $imagenpki = $datospki->imagenpki;
        $categoriapki = $datospki->categoriaspki_id;

        //buscando los documentos en la tabla documentospki
        $documentospki_eliminar = DB::table('documentospkis')
            ->select('id','documentopki')
            ->where('datospki_id','=',$id)
            ->get();

        //eliminando los documentos
        //dd($documentospki_eliminar);
        if($documentospki_eliminar){
            //significa que tiene documentos por lo que paso a eliminarlos del directorio
            foreach ($documentospki_eliminar as $documentopki_eliminar)
            {
                //dd($documentopki_eliminar->id);
                //dd($documentopki_eliminar);
                $eliminadocumentopki = public_path() . '/ficherospki/categoriapki' . $categoriapki . '/' . $documentopki_eliminar->documentopki;
                unlink($eliminadocumentopki);
                Documentospki::find($documentopki_eliminar->id)->delete();
            }
        }
        //eliminando iconopki
        if($iconopki){
            $icono_eliminar = public_path().'/ficherospki/categoriapki'.$categoriapki.'/'.$iconopki;
            unlink($icono_eliminar);
        }
        //eliminando imagenpki
        if($imagenpki){
            $imagen_eliminar = public_path().'/ficherospki/categoriapki'.$categoriapki.'/'.$imagenpki;
            unlink($imagen_eliminar);
        }
        //$datospki->documentospki()->delete();
        $datospki->delete();


        return redirect()->route('admin.datospki.index')->with('info','Eliminado con exito la informacion');
    }

    /*
     *
     * Funcion para eliminar solamente el fichero del datopki
     * y poner vacio ese campo
     *
     */
    public function eliminaficheropki($id, $tipo)
    {
        $datospki = Datospki::find($id);
        $documento = $datospki->$tipo;
        //dd($documento);
        $categoria = $datospki->categoriaspki_id;
        $documento_eliminar = public_path().'/ficherospki/categoriapki'.$categoria.'/'.$documento;
        unlink($documento_eliminar);
        //ahora actualizando el datopki para que no tenga informacion en el campo del fichero 'tipo'
        $datospki->$tipo = NULL;
        $datospki->save();
        $categoriaspki = Categoriaspki::pluck('categoria','id')->toArray();
        return view('admin.datospki.edit', compact('datospki', 'categoriaspki'))->with('Eliminado el fichero satisfactoriamente');
    }
}
