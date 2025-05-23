<div>
    <div class="card">

        @if($users->count())
            <div class="card-header">
                <div class="px-6 py-4">
                    <input wire:model="search" class="form-control"  placeholder="Ingrese el nombre o correo del usuario a buscar" >
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped responsive">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Fecha Registro</th>
                        <th style="text-align: center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td><a href="mailto:{{$user->email}}"> {{$user->email}}</a></td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</td>
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
                <strong>No existen registros de usuarios PENDIENTES CONFIRMACION</strong>
            </div>
        @endif
    </div>
</div>


