<div>
    <div class="card">
        @if($usuariosnopki->count())

            <div class="card-body">
                <table class="table table-striped responsive">
                    <thead>
                    <tr>
                        <th>Correo</th>
                        <th>Empresa</th>
                        <th>Reeup</th>
                        <th>Fecha CSV</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuariosnopki as $usuarionopki)
                        <tr>
                            <td><a href="mailto:{{$usuarionopki->correo}}"> {{$usuarionopki->correo}}</a></td>
                            <td>{{ucwords(strtolower($usuarionopki->empresa))}}</td>
                            <td>{{$usuarionopki->reeup}}</td>
                            <td>{{ \Carbon\Carbon::parse($usuarionopki->created_at)->format('d-m-Y')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="inline pagination pagination-sm">
                    {{ $usuariosnopki->links() }}
                </div>
            </div>
        @else
            <div class="card-body align-center">
                <strong>No existen registros de usuarios no PKI</strong>
            </div>
        @endif
    </div>
</div>


