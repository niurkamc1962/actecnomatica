@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Crear Empresa</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.empresaspki.store', 'method'=>'POST']) !!}
                @include('admin.empresaspki.partials.forms')
                {!! Form::submit('Crear Empresa',['class'=>'btn btn-primary']) !!}
                <a href="{{route('admin.empresaspki.index')}}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop


