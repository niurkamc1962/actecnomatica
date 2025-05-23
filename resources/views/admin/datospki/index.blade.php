@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    @if(auth()->user()->hasRole('SuperAdmin'))
        <a href="{{route('admin.datospki.create')}}" class="btn btn-primary btn-sm float-right">Adicionar Información</a>
    @endif
    <h1> Información del Proyecto</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
    @livewire('admin.datospki-index')

@stop

@section('css')
    @livewireStyles()
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop

@section('js')
    @livewireScripts()
    <script src="{{ mix('js/app.js') }}"></script>
@stop
