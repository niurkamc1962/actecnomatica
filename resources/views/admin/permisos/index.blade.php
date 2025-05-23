@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    @if(auth()->user()->hasRole('SuperAdmin'))
        <a href="{{route('admin.permisos.create')}}" class="btn btn-primary btn-sm float-right">Nuevo Permiso</a>
    @endif
    <h1>Listado de Permisos</h1>
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
                        <th>Permiso</th>
                        <td>Descripcion</td>
                        @if(auth()->user()->hasRole('SuperAdmin'))
                        <th colspan="2">Acción</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(count($permisos))
                        @foreach($permisos as $permiso)
                            <tr>
                                <td>{{$permiso->name}}</td>
                                <td>{{$permiso->description}}</td>
                                @if(auth()->user()->hasRole('SuperAdmin'))
                                    <td width="10px">
                                        <a href="{{route('admin.permisos.edit',$permiso)}}" class="btn btn-sm btn-primary">Editar</a>
                                    </td>

                                    <td width="10px">
                                        <form action="{{route('admin.permisos.destroy',$permiso)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="4" align="center">No se ha incorporado permisos a los roles</td> </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

