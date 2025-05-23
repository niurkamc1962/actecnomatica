<div>
    <div id="contractuales" class="why">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Documentos Contractuales</h2>
                    </div>
                    <div class="justify ml-12 mr-6 mb-4 marcolegal">
                        @foreach($datospki as $datopki)
                            @if (($datopki->categoriaspki_id == 6) && ($datopki->bloquecategoria == 10))
                                {!! $datopki->contenido !!}
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    @foreach($datospki as $datopki)
                        @if (($datopki->categoriaspki_id == 6) && ($datopki->bloquecategoria == 10))
                            <img src="{{ asset('/ficherospki/categoriapki6/'.$datopki->imagenpki) }}"  style="float: left; background-color: #0dcaf0" >
                            @break
                        @endif
                    @endforeach
                </div>
                <div class="col-md-8 text-justify text-tecnomatica-dark font-semibold">
                    @foreach($datospki as $datopki)
                        @if ($datopki->bloquecategoria > 10)
                        <p>
                        <div class="row">
                             <div class="col-md-1">
                                <img src="{{ asset('/ficherospki/categoriapki6/'.$datopki->iconopki) }}"  style="float: left" >
                            </div>
                            <div>
                                {{--<a href="{{asset('ficherospki/categoriapki6/'.$datopki->documentopki)}}" target="_blank" class="p-1.5 marcolegal">
                                    {!! $datopki->contenido !!}
                                </a>--}}
                                @if($datopki->documentopki)
                                    <a href="{{asset('ficherospki/categoriapki6/'.$datopki->documentopki)}}" target="_blank" class="p-1.5">
                                        {!! $datopki->contenido !!}<br>
                                    </a>
                                @else
                                    @php
                                        $documentos = explode(',',$datopki->documentospki);
                                    @endphp
                                    @foreach($documentos as $documento)
                                        <a href="{{asset('ficherospki/categoriapki6/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank" >
                                            {!! $datopki->contenido !!}<br>
                                        </a>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        </p>
                        @endif
                    @endforeach
                </div>
            </div>
            <x-ir-arriba />
        </div>
    </div>
</div>
