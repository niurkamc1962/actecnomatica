<!-- COMPONENTE QUE MUESTRA LA SECCION INFORMACION GENERAL-->
<div>
    <div id="informacion" class="why">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Información General</h2>
                        <p>
                            @foreach($datospki as $datopki)
                                @if(($datopki->categoriaspki_id == 2) && ($datopki->bloquecategoria == 10))
                                <!-- Esta es el texto que aparece debajo del titulo Informacion General -->
                                    {!! $datopki->contenido !!}
                                    @break
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="Services-box">
                            @foreach($datospki as $datopki)
                                <div class="block w-11/12 my-4 mx-auto justify-center" x-data="{selected:null , tooltip: false}" >
                                    @if($datopki->bloquecategoria > 10)
                                        <div class="flex align-center flex-col">
                                            {{--<div @click="selected !== 0 ? selected = 0 : selected = null,tooltip = false"
                                                class="cursor-pointer marcolegal inline-block hover:opacity-75 hover:shadow hover:-mb-3">--}}
                                            <h3 @click="selected !== 0 ? selected = 0 : selected = null,tooltip = false"
                                                 class="cursor-pointer align-center">
                                                <div class="flex items-center">
                                                    <img src="{{ asset('/ficherospki/categoriapki2'.'/'.$datopki->iconopki) }}" width="35" height="35" style="float: left; text-align: center;">
                                                    <div x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false" class="align-center">
                                                    &nbsp;&nbsp;{!! $datopki->contenido !!}
                                                    </div>
                                                </div>
                                                <div class="relative" x-cloack x-show.transition.origin.top="tooltip">
                                                    <div class="absolute left-40  -top-30  z-5 w-80 h-15 p-2 -mt-1 text-sm leading-tight transform rounded-lg shadow-lg text-white bg-tecnomatica-dark">
                                                        {!! $datopki->tooltip !!}
                                                    </div>
                                                </div>
                                            </h3>
                                            <p x-show="selected == 0" class="py-2 px-2 ml-3">
                                                @php
                                                    $documentos = explode(',',$datopki->documentospki);
                                                @endphp
                                                @foreach($documentos as $documento)
                                                    @if($documento != null)
                                                        <a href="{{asset('ficherospki/categoriapki2/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank" class="font-weight-bold">
                                                            <i class="fas fa-file-download" aria-hidden="true"></i>&nbsp;&nbsp;{!! substr($documento,strpos($documento,'-')+1, strpos($documento,'.')-3)  !!}
                                                        </a>
                                                        <br>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @foreach($datospki as $datopki)
                        @if($datopki->bloquecategoria == 10)
                        <!-- Esta es la imagen que aparece en el lateral de las opciones -->
                            <img src="{{ asset('/ficherospki/categoriapki2'.'/'.$datopki->imagenpki) }}" width="500" height="250" >
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
            <x-ir-arriba />
        </div>
    </div>
</div>

