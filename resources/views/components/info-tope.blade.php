<!-- COMPONENTE QUE MUESTRA LA PARTE INICIAL DEL PROYECTO, QUIENES SOMOS, SERVICIOS QUE PRESTAMOS, COMO CONTRATAR NUESTROS SERVICIOS -->
<div>
    <section class="banner_main">
        <div class="container bg-tecnomatica-light">
            <div class="row d_flex">
                <div class="col-md-5">
                    <div style="padding-top: 70px;">
                        <h2>Quienes somos</h2>
                        <div class="text-justify mb-6 marcolegal">
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 11)
                                    {!! $datopki->contenido !!}
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <h2>Servicios que prestamos</h2>
                        <div class="row ml-4 mb-6 text-justify marcolegal">
                            <div x-data="{ tooltip: false}" class="relative">
                                <div x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false">
                                    <div x-data="{muestra1 : false}" >
                                        @foreach($datospki as $datopki)
                                            @if($datopki->bloquecategoria == 21)
                                                <div class="row cursor-pointer font-sans"  x-on:click="muestra1 = !muestra1">
                                                    <img src="{{ asset('/ficherospki/categoriapki1'.'/'.$datopki->iconopki) }}" width="35" height="35" >&nbsp;
                                                    {!! $datopki->titulo !!}
                                                </div>
                                                <div x-show="muestra1" class="font-italic text-dark mb-8">
                                                    {!! $datopki->contenido !!}
                                                </div>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <div x-data="{muestra2 : false}">
                                        @foreach($datospki as $datopki)
                                            @if($datopki->bloquecategoria == 22)
                                                <div class="row cursor-pointer font-sans" x-on:click="muestra2 = !muestra2">
                                                    <img src="{{ asset('/ficherospki/categoriapki1'.'/'.$datopki->iconopki) }}" width="35" height="35" >&nbsp;
                                                    {!! $datopki->titulo !!}
                                                </div>
                                                <div x-show="muestra2" class="font-italic text-dark mb-8">
                                                    {!! $datopki->contenido !!}
                                                </div>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <div x-data="{muestra3 : false}">
                                        @foreach($datospki as $datopki)
                                            @if($datopki->bloquecategoria == 23)
                                                <div class="row cursor-pointer font-sans" x-on:click="muestra3 = !muestra3">
                                                    <img src="{{ asset('/ficherospki/categoriapki1'.'/'.$datopki->iconopki) }}" width="35" height="35" >&nbsp;
                                                    {{$datopki->titulo}}
                                                </div>
                                                <div x-show="muestra3" class="font-italic text-dark mb-8">
                                                    {!! $datopki->contenido !!}
                                                </div>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <div x-data="{muestra4 : false}">
                                        @foreach($datospki as $datopki)
                                            @if($datopki->bloquecategoria == 24)
                                                <div class="row cursor-pointer font-sans" x-on:click="muestra4 = !muestra4">
                                                    <img src="{{ asset('/ficherospki/categoriapki1'.'/'.$datopki->iconopki) }}" width="35" height="35" >&nbsp;
                                                    {!! $datopki->titulo !!}
                                                </div>
                                                <div x-show="muestra4" class="font-italic text-dark mb-8">
                                                    {!! $datopki->contenido !!}
                                                </div>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <div x-data="{muestra5 : false}">
                                        @foreach($datospki as $datopki)
                                            @if($datopki->bloquecategoria == 25)
                                                <div class="row cursor-pointer font-sans" x-on:click="muestra5 = !muestra5">
                                                    <img src="{{ asset('/ficherospki/categoriapki1'.'/'.$datopki->iconopki) }}" width="35" height="35" >&nbsp;
                                                    {!! $datopki->titulo !!}
                                                </div>
                                                <div x-show="muestra5" class="font-italic text-dark mb-8">
                                                    {!! $datopki->contenido !!}
                                                </div>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="text-img mt-4">
                        @foreach($datospki as $datopki)
                            @if($datopki->bloquecategoria == 11)
                                <!--<img src="{{ asset("images/carrousel/".$datopki->imagenpki) }}" class="d-block w-100 h-100 rounded-xl transform scale-95" alt="...">-->
                                <img src="{{ asset("/ficherospki/categoriapki1/".$datopki->imagenpki) }}" class="d-block w-100 h-100 rounded-xl transform scale-95" alt="...">
                                @break
                            @endif
                        @endforeach

                    </div>

                    <div class="row ml-4">
                        <h2>Como contratar nuestros servicios</h2>
                        <div class="mb-6 text-justify marcolegal">
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 31)
                                    {!! $datopki->contenido  !!}
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <x-ir-arriba />
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ mix('js/app.js') }}" ></script>
    @endpush

</div>
