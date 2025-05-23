<div>
    <div class="card">
        <div class="card-header">
            <div class="px-6 py-4 flex items-center">
                {{-- Poniendo para seleccionar la cantidad de articulos por paginas --}}
                {{--<span>Mostrar</span>
                <div class="flex items-center mx-auto">
                    <select wire:model="cantidad" class="mx-2 px-4 form-control">
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <span>entradas</span>
                </div>--}}
                <input wire:model="search" class="form-control flex-1 mx-4"  placeholder="Ingrese la palabra a buscar" >
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th width="30%">Titulo</th>
                    <th width="60%">Contenido</th>
                    <th>Categoria</th>
                    <th>Bloque</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                    @if(count($datospki))
                        @foreach($datospki as $datopki)
                            <tr>
                                <td>{{$datopki->titulo}}</td>
                                <td>
                                    {{--@php
                                        echo substr($datopki->contenido,0,60).'...';
                                    @endphp--}}
                                    {{--{{ Str::words($datopki->contenido, 20, '...') }}--}}
                                    {!! html_entity_decode(Str::words($datopki->contenido, 20, '...') ) !!}
                                </td>
                                <td>{{ $datopki->categoriaspki_id }}</td>
                                <td>{{ $datopki->bloquecategoria }}</td>
                                <td width="10px">
                                    <a href="{{route('admin.datospki.edit',$datopki->id)}}" class="btn btn-sm btn-primary rounded rounded-2xl">Editar</a>
                                </td>
                                <td width="10px">
                                    <a href="{{route('admin.datospki.show',$datopki->id)}}" class="btn btn-sm bg-orange rounded rounded-2xl">Mostrar</a>
                                </td>
                                <td width="10px">
                                    @if(auth()->user()->hasRole('SuperAdmin'))
                                        <form action="{{route('admin.datospki.destroy',$datopki->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger rounded rounded-2xl">Eliminar</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach


                        @if($datospki->hasPages(2))
                            <div class="px-6 py-3">
                                {{$datospki->links()}}
                            </div>
                        @endif
                    @else
                        <tr><td colspan="5" align="center">No se ha incorporado informacion en el proyecto</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
