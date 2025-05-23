@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Editar Informacion</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            {!! Form::model($datospki, ['route' => ['admin.datospki.update',$datospki->id], 'method'=>'patch', 'files'=>true]) !!}
                {!! Form::token() !!}
                <div class="form-group">
                    {!! Form::label('titulo','Titulo:') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control','placeholder'=> 'Ingrese titulo de la informacion']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('contenido','Contenido:') !!}
                    <!--{!! Form::textarea('contenido', $datospki->contenido, ['class' => 'form-control', 'rows' => 10, 'cols' => 40, 'name' => 'contenido', 'id' => 'contenido']) !!}-->
                    <textarea id="editor" name="contenido" class="form-control w-full" cols="80" rows=10">
                        {{$datospki->contenido}}
                    </textarea>
                </div>
                <div class="form-group">
                    {!! Form::label('tooltip','Tooltip:') !!}
                    {!! Form::text('tooltip', null, ['class' => 'form-control','placeholder'=> 'Ingrese informacion flotante']) !!}
                </div>

                <div class="form-group">
                    {!! Form::Label('categoriaspki', 'Categoria PKI: ') !!}
                    @if(auth()->user()->hasRole('SuperAdmin'))
                        {!! Form::select('categoriaspki', $categoriaspki, $datospki->categoriaspki_id, ["class" => "form-control"]) !!}
                    @else
                        {!! Form::select('categoriaspki', $categoriaspki, $datospki->categoriaspki_id, ["class" => "form-control",'readonly']) !!}
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('bloquecategoria','Bloque:') !!}
                    @if(auth()->user()->hasRole('SuperAdmin'))
                        {!! Form::number('bloquecategoria', null, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::number('bloquecategoria', null, ['class' => 'form-control', 'readonly']) !!}
                    @endif
                </div>

                <!-- DIV PARA EL TRATAMIENTO DE LOS DOCUMENTOSPKI   -->
                <div class="row">
                    <div class="col-md-10 form-group">
                        @if($datospki->documentospki != null)
                            {!! Form::Label('documento', 'Documento(s):') !!}<br>
                            @php
                                $documentos = explode(',',$datospki->documentospki);
                                $cantidaddocumentos = count($documentos);
                            @endphp
                            @if($cantidaddocumentos >= 1)
                                @foreach($documentos as $documentopki)
                                    <a class="btn btn-primary btn-xs" href="{{ url('/ficherospki/categoriapki'.$datospki->categoriaspki_id.'/'.substr($documentopki,strpos($documentopki,'-')+1))}}" target="_blank" >
                                        {!! substr($documentopki,strpos($documentopki,'-')+1) !!}
                                    </a>&nbsp;&nbsp;
                                    @php
                                      $id_documentopki = substr($documentopki,0,strpos($documentopki,'-'));
                                    @endphp
                                    {!! Form::checkbox('eliminadocumentospki[]',"{{$id_documentopki}}",false,['class' => 'form-group']) !!}&nbsp;Eliminar
                                    <br>
                                @endforeach
                            @endif
                        @endif
                        <!-- PREGUNTANDO SI TIENE DOCUMENTOpki inicialmente EN LA TABLA DATOSPKI.DOCUMENTOPKI PARA MOSTRARLO -->
                        @if($datospki->documentopki != null)
                            <a class="btn btn-primary btn-xs" href="{{ url('/ficherospki/categoriapki'.$datospki->categoriaspki_id.'/'.$datospki->documentopki)}}" target="_blank" >
                                {!! $datospki->documentopki !!}
                            </a>&nbsp;&nbsp;
                            {!! Form::checkbox('eliminadocumentopki',"{{$datospki->id}}",false,['class' => 'form-group']) !!}&nbsp;Eliminar
                            <br>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        {!! Form::Label('Nuevos DOCUMENTO(s): ') !!}
                        {!! Form::file('nuevosdocumentospki[]', ['class' => 'form-control', 'multiple' => true]) !!}
                    </div>
                </div>
                <div>&nbsp;</div>

                <!-- DIV PARA EL TRATAMIENTO DEL ICONOPKI  -->
                <div class="row">
                    <div class="col-md-10 form-group">
                        @if($datospki->iconopki != null)
                            {!! Form::Label('icono', 'Icono:') !!}
                            {{--<a class="btn btn-primary btn-xs" href="{{ url('/ficherospki/categoriapki'.$datospki->categoriaspki_id.'/'.$datospki->iconopki)}}" target="_blank" >
                                {{$datospki->iconopki}}
                            </a>--}}
                            <img src="{{ asset('/ficherospki/categoriapki'.$datospki->categoriaspki_id.'/'.$datospki->iconopki) }}" width="50" height="55" />
                            {{--<a class="btn btn-danger btn-xs ml-4" href="{{route('admin.datospki.eliminaficheropki',['id' => $datospki->id,'tipo' => 'iconopki'])}}">Eliminar icono</a>--}}
                            {!! Form::checkbox('eliminaiconopki',"{{$datospki->id}}",false, ['class' => 'form-group']) !!} Eliminar
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        @if($datospki->iconopki != null)
                            {!! Form::Label('Modificar ICONO : ') !!}
                        @else
                            {!! Form::Label('Adicionar ICONO: ') !!}
                        @endif
                        {!! Form::file('iconopki', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div>&nbsp;</div>

                <!-- DIV PARA EL TRATAMIENTO DE LA IMAGENPKI -->
                <div class="row">
                    <div class="col-md-10 form-group">
                        @if($datospki->imagenpki != null)
                            {!! Form::Label('imagen', 'Imagen:') !!}
                            <img src="{{ asset('/ficherospki/categoriapki'.$datospki->categoriaspki_id.'/'.$datospki->imagenpki) }}" width="50" height="55" />
                            {!! Form::checkbox('eliminaimagenpki',"{{$datospki->id}}",false, ['class' => 'form-group']) !!} Eliminar
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        @if($datospki->imagenpki != null)
                            {!! Form::Label('Modificar IMAGEN : ') !!}
                        @else
                            {!! Form::Label('Adicionar IMAGEN: ') !!}
                        @endif
                            {!! Form::file('imagenpki', ['class' => 'form-control']) !!}
                    </div>
                </div>

                {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                <a href="{{route('admin.datospki.index')}}" class="btn btn-danger">Cancelar/Finalizar</a>

            {!! Form::close() !!}
        </div>
    </div>

    @push('js')
        <script src="{{ asset('vendor/ckeditor4/ckeditor.js') }}"></script>

        <script>
            CKEDITOR.replace('editor');
            CKEDITOR.config.entities = false;
            CKEDITOR.config.uicolor = '#9AB8F3';

        /*CKEDITOR.replace('editor');
            CKEDITOR.config.entities = false;*/

            /*ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( 'CKEditor error: '+error );
                } );*/
        </script>
    @endpush
@stop




