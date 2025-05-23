@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    @if(auth()->user()->hasRole('SuperAdmin'))
        <a href="{{route('admin.roles.create')}}" class="btn btn-primary btn-sm float-right">Nuevo Role</a>
    @endif
    <h1>Listado de Roles</h1>
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
                        <th>Role</th>
                        <td>Descripcion</td>
                        @if(auth()->user()->hasRole('SuperAdmin'))
                        <th colspan="2">Acción</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(count($roles))
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>{{$role->description}}</td>
                                @if(auth()->user()->hasRole('SuperAdmin'))
                                    <td width="10px">
                                        <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                    <td width="10px">
                                            <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="4" align="center">No se ha incorporado role</td> </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

