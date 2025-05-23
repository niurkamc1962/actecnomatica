<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de usuarios pki</title>
</head>
<body>
<table class="table table-striped responsive">
    <thead>
    <tr>
        <th colspan="5">Listado  Clientes PKI Tecnomática </th>
    </tr>
    <tr>
        <th colspan="5">
            @if(isset($search))
                Criterio de busqueda: {{$search}}
            @endif
        </th>
    </tr>
    <tr>
        <th colspan="5">Total: {{$total}} {{$pdfrole}}</th>
    </tr>

    <tr>
        <th>Nombre</th>
        <th>Empresa</th>
        <th>Correo</th>
        @if($pdfrole == 'todospki')
            <th>Role</th>
        @endif
        <th>Fecha Registro</th>
        @if($pdfrole != 'usuariospki')
            <th>Fecha Role</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{ucwords(strtolower($user->empresa))}}</td>
            <td>
                <a href="mailto:{{$user->email}}"> {{$user->email}}</a>
            </td>
            @if($pdfrole == 'todospki')
            <td>
                {{{$user->role}}}
            </td>
            @endif
            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</td>
            @if($pdfrole != 'usuariospki')
                <td>fecha</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
