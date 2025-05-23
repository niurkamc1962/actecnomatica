@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Editar Empresa</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($empresaspki, ['route' => ['admin.empresaspki.update',$empresaspki], 'method'=>'put']) !!}
                @include('admin.empresaspki.partials.forms')
                {!! Form::submit('Actualizar Empresa',['class'=>'btn btn-primary']) !!}
                <a href="{{route('admin.empresaspki.index')}}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop


