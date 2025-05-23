@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    @if(auth()->user()->email == 'superadmin@tm.cupet.cu')
        <a href="{{route('admin.categoriaspki.create')}}" class="btn btn-primary btn-sm float-right">Nueva Categoria</a>
    @endif
    <h1>Listado de categoriaspki</h1>
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
                        <th>Categoria</th>
                        <th>Descripcion</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                @if(count($categoriaspki))
                    @foreach($categoriaspki as $categoriapki)
                        <tr>
                            <td>{{ $categoriapki->id }}</td>
                            <td>{{$categoriapki->categoria}}</td>
                            <td>{{$categoriapki->descripcion}}</td>
                            <td width="10px">
                                <a href="{{route('admin.categoriaspki.edit',$categoriapki)}}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td width="10px">
                                @if(auth()->user()->email == 'superadmin@tm.cupet.cu')
                                    <form action="{{route('admin.categoriaspki.destroy',$categoriapki)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    @if($categoriaspki->hasPages(2))
                        <div class="px-6 py-3">
                            {{$categoriaspki->links()}}
                        </div>
                    @endif
                @else
                    <tr><td colspan="5" align="center">No se ha incorporado categoria</td></tr>
                @endif
            </table>
        </div>
    </div>
@stop


