<div>
    <div class="card">
        <div class="card-header">
            <div class="px-6 py-4">
                    <input wire:model="search" class="form-control"  placeholder="Ingrese el nombre o correo del usuario a buscar" >
            </div>
        </div>

        @if($users->count())
            <div class="card-body">
                <table class="table table-striped responsive">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Roles</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td><a href="mailto:{{$user->email}}"> {{$user->email}}</a></td>
                                <td>
                                    @if(count($user->getRoleNames()) != 0)
                                        @php
                                            $reemplazar = array('[','"',']');
                                        @endphp
                                        {{str_replace($reemplazar,"",$user->getRoleNames())}}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a>
                                </td>
                                {{--<td>
                                    <form action="{{route('admin.users.destroy',$user)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>--}}
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
            <div class="card-body">
                <strong>No existe registro con la busqueda especificada</strong>
            </div>
        @endif
    </div>
</div>
