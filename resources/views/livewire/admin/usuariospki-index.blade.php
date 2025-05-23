<div>
    <div class="card">
        @if($users->count())
            <div class="card-header">
                <div class="px-6 py-4">
                    <input wire:model="search" class="flex-1 mx-4 col-md-10"  placeholder="Ingrese nombre, empresa o correo que desee buscar" >
                    <a class="btn btn-info btn-sm" href="{{route('admin.users.pdfpki',['opcion'=>'usuario', 'busqueda'=>$search])}}">Generar PDF</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped responsive">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Correo</th>
                        <th>Fecha Registro</th>
                        <!--<th>Roles</th>-->
                        <th colspan="2" style="text-align: center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{ucwords(strtolower($user->empresa))}}</td>
                                <td><a href="mailto:{{$user->email}}"> {{$user->email}}</a></td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</td>
                                <!--<td>
                                    @if(count($user->getRoleNames()) != 0)
                                        {{$user->getRoleNames()}}
                                    @endif
                                </td>-->
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{route('admin.users.edit', $user)}}">Detalle</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.users.destroy',$user)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="inline pagination pagination-sm">
                    {{ $users->links() }}
                </div>
            </div>
        @else
            <div class="card-body align-center">
                <strong>No existen registros de usuarios confirmados</strong>
            </div>
        @endif
    </div>
</div>

