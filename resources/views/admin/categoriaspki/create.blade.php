@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Crear Categoria</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categoriaspki.store', 'method'=>'POST']) !!}
                @include('admin.categoriaspki.partials.forms')
                {!! Form::submit('Crear Categoria',['class'=>'btn btn-primary']) !!}
                <a href="{{route('admin.categoriaspki.index')}}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop


