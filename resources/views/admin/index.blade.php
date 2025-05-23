@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <div class="p-15 text-4xl m-10">
        @if(Session::has('AdminPKIError'))
            <div class="alert alert-danger">
                {{ Session::get('AdminPKIError') }}
            </div>
        @endif
        @if(Session::has('AdminRolesError'))
            <div class="alert alert-danger">
                {{ Session::get('AdminRolesError') }}
            </div>
        @endif
        <p>En esta sesión del proyecto será posible administrar el mismo.</p>
        <p>Podrá administrar los usuarios, certificados, roles, etc</p>
    </div>

@stop

@section('css')
    @livewireStyles
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts
    <script> console.log('Hi!'); </script>
@stop

