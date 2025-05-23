@extends('adminlte::page')

@section('title', 'Admin PKI TM')

@section('content_header')
    <h2>Datos del Usuario: </h2>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put', 'class' => 'form-horizontal']) !!}
            {!! Form::token() !!}
            <div class="form-inline">
                {!! Form::label('name', 'Usuario: ',['class' => 'ml-2 mr-2 control-label']) !!}
                {!! Form::text('name', $user->name, ['class'=>'form-control col-md-8', 'readonly']) !!}
            </div>
            <div class="form-inline mt-3">
                {!! Form::label('email', 'Correo: ',['class' => 'ml-2 mr-2 control-label']) !!}
                {!! Form::text('email', $user->email, ['class'=>'form-control  col-md-8', 'readonly']) !!}
            </div>

            <div class="form-inline mt-3">
                {!! Form::label('empresa', 'Empresa: ',['class' => 'ml-2 mr-2 control-label']) !!}
                {!! Form::text('empresa', $user->empresa, ['class'=>'form-control  col-md-8', 'readonly']) !!}
            </div>
            <div class="form-inline mt-3">
                {!! Form::label('reeup', 'Reeup: ',['class' => 'ml-2 mr-2 control-label']) !!}
                {!! Form::text('reeup', $user->reeup, ['class'=>'form-control  col-md-8', 'readonly']) !!}
            </div>

            <div class="form-inline mt-3">
                {!! Form::label('cargo', 'Cargo: ',['class' => 'mr-2 control-label']) !!}
                {!! Form::text('cargo', $user->cargo, ['class'=>'form-control  col-md-8', 'readonly']) !!}
            </div>
            <div class="form-inline mt-3">
                {!! Form::label('Telefono', 'Telefonos: ',['class' => 'mr-2 control-label']) !!}
                {!! Form::text('Telefono', $user->telefonofijo . $user->telefonomovil, ['class'=>'form-control  col-md-8', 'readonly']) !!}
            </div>
            <div class="form-group mt-3">
                <h2 class="h5">Cambiar Role</h2>
                @foreach($roles as $role)
                    <div>
                        <label>
                            @if(Auth::user()->hasRole('SuperAdmin'))
                                {!! Form::radio('role', $role->id, $user->getRoleNames()->contains($role->name)? 'selected' : null, ['class' => 'mr-1'] ) !!}
                                {{$role->name}}
                            @else
                            @if($role->name != 'SuperAdmin')
                                {!! Form::radio('role', $role->id, $user->getRoleNames()->contains($role->name)? 'selected' : null, ['class' => 'mr-1'] ) !!}
                                {{$role->name}}
                            @endif
                                @endif
                        </label>
                    </div>
                @endforeach
            </div>
                <div class="mt-4">
                    {!! Form::submit('Cambiar Role', ['class' => 'btn btn-primary mt-2']) !!}
                    <a href="{{route('admin.users.index')}}" class="btn btn-danger mt-2">Cancelar</a>
                </div>
            {!! Form::close() !!}
        </div>
        <div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th colspan="2">Historial de Cambio de Role</th>
                        </tr>
                    <tr>
                        <th>Role</th>
                        <th>Fecha Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    	<tr>
                    		<td>Usuario</td>
                    		<td>{{$user->created_at}}</td>
                    	</tr>
                        @if (count($historial_roles) > 0)
                            @foreach($historial_roles as $historial)
                        <tr>
                            <td>{{$historial->role}}</td>
                            <td>{{$historial->created_at}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>Solamente tiene el role de Usuario de Cuando se creo</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
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


