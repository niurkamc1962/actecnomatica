@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($categoriaspki, ['route' => ['admin.categoriaspki.update',$categoriaspki], 'method'=>'put']) !!}
                @include('admin.categoriaspki.partials.forms')
                {!! Form::submit('Actualizar Categoria',['class'=>'btn btn-primary']) !!}
                <a href="{{route('admin.categoriaspki.index')}}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop


