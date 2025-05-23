@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Editar Permiso</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($permiso, ['route' => ['admin.permisos.update',$permiso], 'method'=>'put']) !!}
                @include('admin.permisos.partials.forms')
                {!! Form::submit('Actualizar Permiso',['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.permisos.index')}}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop


