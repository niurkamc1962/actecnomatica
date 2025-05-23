@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
        <a href="{{route('admin.empresaspki.create')}}" class="btn btn-primary btn-sm float-right">Nueva Empresa</a>
    <h1>Listado de Empresaspki</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif


    <div class="card">
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>REEUP</th>
                        <th>Entidad</th>
                        <th>OSDE</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                @if(count($empresaspki))
                    @foreach($empresaspki as $empresapki)
                        <tr>
                            <td>{{ $empresapki->id }}</td>
                            <td>{{$empresapki->reeup}}</td>
                            <td>{{$empresapki->entidad}}</td>
                            <td>{{$empresapki->osde}}</td>
                            <td width="10px">
                                <a href="{{route('admin.empresaspki.edit',$empresapki)}}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td width="10px">
                                @if(auth()->user()->hasRole('Admin'))
                                    <form action="{{route('admin.empresaspki.destroy',$empresapki)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    @if($empresaspki->hasPages(2))
                        <div class="px-6 py-3">
                            {{$empresaspki->links()}}
                        </div>
                    @endif
                @else
                    <tr><td colspan="5" align="center">No se ha incorporado Empresa</td></tr>
                @endif
            </table>
        </div>
    </div>
@stop


