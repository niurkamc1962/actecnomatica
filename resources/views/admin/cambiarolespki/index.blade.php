@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Cambio de Roles desde fichero CSV</h1>
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
    @livewire('admin.cambiarolespki-index')
@stop

@section('css')
    @livewireStyles()
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts()
@stop



