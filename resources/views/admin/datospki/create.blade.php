@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Crear Informacion</h1>
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
            {!! Form::open(['route' => 'admin.datospki.store', 'method'=>'POST', 'files'=>true]) !!}
            {!! Form::token() !!}

                <div class="form-group">
                    {!! Form::label('titulo','Titulo:') !!}@error('titulo') <span class="text-danger font-bold">{{ $message }}</span>@enderror
                    {!! Form::text('titulo', null, ['class' => 'form-control','placeholder'=> 'Ingrese titulo de la informacion']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('contenido','Contenido:') !!}
                    <!--Form::textarea('contenido', null, ['class' => 'form-control','rows' => 4, 'cols' => 40, 'name' => 'contenido', 'id' => 'contenido']) -->
                    <textarea  name="contenido" id="editor" class="form-control w-full" cols="80" rows=10"></textarea>
                </div>
                <div class="form-group">
                    {!! Form::label('tooltip','Tooltip:') !!}
                    {!! Form::text('tooltip', null, ['class' => 'form-control','placeholder'=> 'Ingrese texto flotante a mostrar']) !!}
                </div>

                <div class="form-group w-50">
                    {!! Form::Label('categoriaspki', 'Categoria PKI: ') !!}@error('categoriaspki') <span class="text-danger font-bold">{{ $message }}</span>@enderror
                    {!! Form::select('categoriaspki', $categoriaspki, null, ["class" => "form-control", 'placeholder'=>'Seleccione', 'onChange'=>'muestraCategoria()']) !!}

                </div>
                <div class="form-group w-50 flex-1">
                    {!! Form::label('bloque','Bloque: ') !!}@error('bloquecategoria') <span class="text-danger font-bold">{{ $message }}</span>@enderror
                    {!! Form::number('bloquecategoria', null, ['class' => 'form-control']) !!}
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {!! Form::Label('Documento: ') !!} <span class="text-danger">El documento no puede exceder de 20MB</span>
                        {!! Form::file('documentopki[]', ['class' => 'form-control', 'multiple'=>true]) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {!! Form::Label('Icono: ') !!} <span class="text-danger">El icono debe ser de dimension pequeña</span>
                        {!! Form::file('iconopki', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        {!! Form::Label('Imagen: ') !!} <span class="text-danger">La imagen no puede exceder de 20MB</span>
                        {!! Form::file('imagenpki', ['class' => 'form-control']) !!}
                    </div>
                </div>



            <div class="mt-4">
                {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
                <a href="{{route('admin.datospki.index')}}" class="btn btn-danger">Cancelar</a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    @push('js')
        <script src="{{ asset('vendor/ckeditor4/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace('editor');
            CKEDITOR.config.entities = false;

            /*ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( 'CKEditor error: '+error );
                } );*/
        </script>
    @endpush

@stop




