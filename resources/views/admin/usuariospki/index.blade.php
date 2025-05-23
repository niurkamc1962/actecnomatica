@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    {{--<a href="{{route('admin.users.create')}}" class="btn btn-primary float-right">Crear Usuario</a>--}}
    <h1>Listado de Usuarios</h1>
@stop

@section('content')
    @livewire('admin.todospki-index',['tiporole' => 'usuario'])
@stop

@section('css')
    @livewireStyles()
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts()
    <script> console.log('Hi!'); </script>
@stop



