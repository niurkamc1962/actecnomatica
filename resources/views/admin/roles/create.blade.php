@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Crear Role</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store', 'method'=>'POST']) !!}
                @include('admin.roles.partials.forms')
                {!! Form::submit('Crear Role',['class'=>'btn btn-primary']) !!}
                <a href="{{route('admin.roles.index')}}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop


