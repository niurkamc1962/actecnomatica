@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h1>Listado de Aspirantes</h1>
@stop

@section('content')
    {{--@livewire('admin.aspirantespki-index')--}}
    @livewire('admin.todospki-index',['tiporole' => 'aspirante'])
@stop

@section('css')
    @livewireStyles()
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @livewireScripts()
    <script> console.log('Hi!'); </script>
@stop



