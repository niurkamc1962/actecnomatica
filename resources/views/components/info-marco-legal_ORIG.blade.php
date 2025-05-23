<div>
    <div id="marcolegal" class="hosting">
        <div class="container">
            <div class="row">
                @foreach($datospki as $datopki)
                    @if($datopki->bloquecategoria == 10)
                        <div class="col-md-4">
                            <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->imagenpki) }}" width="150" height="150" style="float: left" />
                        </div>
                        <div class="col-md-4 titlepage">
                            <h2>{!! $datopki->titulo !!}</h2>
                        </div>
                        @break
                    @endif
                @endforeach
            </div>

            <div class="row">
                {{--  Decreto Ley 199.99 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 11)
                                        <div class="align-middle marcolegal">
                                            <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                            @if ($datopki->documentopki)
                                                <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                    {!! $datopki->contenido !!}
                                                </a>
                                            @else
                                                @php
                                                    $documentos = explode(',',$datopki->documentospki);
                                                    $cantidaddocumentos = count($documentos);
                                                @endphp
                                                @foreach($documentos as $documento)
                                                    <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank" >
                                                        {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>

                {{-- Resolucion 2 del 2016 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 12)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>

                {{-- Nuevos decretos --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 13)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                                <br>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>

                {{-- NC ISO IEC 2016 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 14)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>

                {{-- Tarifas de Precios --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 15)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>

                {{-- DPC Cuba ver.1--}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 16)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>

                {{-- ADICIONANDO OTRA FILA DE INFORMACION  --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 17)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                                <br>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>


                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">&nbsp;</div>
                </div>
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">&nbsp;</div>
                </div>
            </div>


            <x-ir-arriba />

        </div>
    </div>
</div>
