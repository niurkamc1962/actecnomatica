@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Informacion</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <b>Titulo:</b>
                    {!! $datospki->titulo !!}
                </div>
                <div class="form-group">
                    <b>Contenido:</b><br />
                    {!!  wordwrap($datospki->contenido, 100, "\n")!!}
                </div>
                <div class="form-group">
                    <b>Tooltip:</b>
                    {!! $datospki->tooltip !!}
                </div>

                <div class="form-group">
                    <b>Sesion: </b>
                    @foreach($categoriaspki as $categoriapki)
                        @if( $datospki->categoriaspki_id == $categoriapki->id )
                            {!! $categoriapki->categoria !!}
                        @endif
                    @endforeach
                </div>

                <div class="form-group">
                    <b>Documento(s):</b><br />
                    @if($datospki->documentospki != null)
                        @php
                            $documentos = explode(',',$datospki->documentospki);
                            $cantidaddocumentos = count($documentos);
                        @endphp
                        @if($cantidaddocumentos >= 1)
                            @foreach($documentos as $documentopki)
                                <a class="btn btn-primary btn-xs" href="{{ url('/ficherospki/categoriapki'.$datospki->categoriaspki_id.'/'.substr($documentopki,strpos($documentopki,'-')+1))}}" target="_blank" >
                                    {!! substr($documentopki,strpos($documentopki,'-')+1) !!}
                                </a>
                                <br>
                            @endforeach
                        @endif
                    @endif
                <!-- PREGUNTANDO SI TIENE DOCUMENTOpki inicialmente EN LA TABLA DATOSPKI.DOCUMENTOPKI PARA MOSTRARLO -->
                    @if($datospki->documentopki != null)
                        <a class="btn btn-primary btn-xs" href="{{ url('/ficherospki/categoriapki'.$datospki->categoriaspki_id.'/'.$datospki->documentopki)}}" target="_blank" >
                            {!! $datospki->documentopki !!}
                        </a>
                    @endif
                </div>

                <div class="form-group">
                    <b>Icono:</b><br />
                    @if($datospki->iconopki)
                        <img src="{{ asset('/ficherospki/categoriapki'.$datospki->categoriaspki_id.'/'.$datospki->iconopki) }}" width="50" height="55" />
                    @endif
                </div>

                <div class="form-group">
                    <b>Imagen:</b><br />
                    @if($datospki->imagenpki)
                        <img src="{{ asset('/ficherospki/categoriapki'.$datospki->categoriaspki_id.'/'.$datospki->imagenpki) }}" width="50" height="55" />
                    @endif
                </div>

                <a href="{{route('admin.datospki.index')}}" class="btn btn-primary">Regresar</a>

        </div>
    </div>
@stop




