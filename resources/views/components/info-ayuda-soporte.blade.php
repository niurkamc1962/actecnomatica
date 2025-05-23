<div>
    <div id="ayuda" class="hosting">
        <div class="container">
            <div class="row">
                <div class="col-md-12 titlepage">
                    <h2>Ayuda y soporte</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 marcolegal">
                    @foreach($datospki as $datopki)
                        @if (($datopki->bloquecategoria >= 21) && ($datopki->bloquecategoria <= 27))
                            @if($datopki->documentopki)
                                <a href="{{asset('ficherospki/categoriapki5/'.$datopki->documentopki)}}" target="_blank" class="mt-4">
                                    {!! $datopki->contenido !!}
                                </a>
                            @else
                                @if($datopki->documentospki)
                                <a href="{{asset('ficherospki/categoriapki5/'.substr($datopki->documentospki, strpos($datopki->documentospki,'-')+1))}}" target="_blank" class="mt-4">
                                    {!! $datopki->contenido !!}
                                </a>
                                @endif
                                {{--@php
                                    $documentos = explode(',',$datopki->documentospki);
                                    $cantidaddocumentos = count($documentos);
                                @endphp
                                @foreach($documentos as $documento)
                                    <a href="{{asset('ficherospki/categoriapki5/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank" >
                                        {!! substr($documento,strpos($documento,'-')+1)  !!}
                                    </a>
                                @endforeach--}}
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <x-ir-arriba />
        </div>
    </div>
</div>
