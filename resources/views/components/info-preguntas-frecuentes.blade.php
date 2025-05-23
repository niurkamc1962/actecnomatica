<!--COMPONENTE PARA MOSTRAR LAS PREGUNTAS FREFUENTES-->
<div>
    <div id="preguntasfrecuentes" class="hosting bg-tecnomatica-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 titlepage">
                    <h2>Preguntas Frecuentes</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    @foreach($datospki as $datopki)
                        @if($datopki->bloquecategoria == 10)
                            <img class="float-left ml-2 rounded-2xl" src="{{ asset('/ficherospki/categoriapki5'.'/'.$datopki->imagenpki) }}">
                        @endif
                        @break
                    @endforeach
                </div>
                <div class="col-md-8 text-justify marcolegal">
                    <div x-data="{ tooltip: false}" class="relative">
                        <div x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false">
                            <div x-data="{muestra1 : false}" >
                                @foreach($datospki as $datopki)
                                    @if($datopki->bloquecategoria == 11)
                                        <div class="row cursor-pointer" x-on:click="muestra1 = !muestra1">
                                            <b>.-</b> {!! $datopki->titulo !!}
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
                                    @if($datopki->bloquecategoria == 12)
                                        <div class="row cursor-pointer" x-on:click="muestra2 = !muestra2">
                                            <b>.-</b>  {!! $datopki->titulo !!}
                                        </div>
                                        <div x-show="muestra2" class="font-italic text-dark  mb-8">
                                            {!! $datopki->contenido !!}
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div x-data="{muestra3 : false}">
                                @foreach($datospki as $datopki)
                                    @if($datopki->bloquecategoria == 13)
                                        <div class="row cursor-pointer" x-on:click="muestra3 = !muestra3">
                                             <b>.-</b> {!! $datopki->titulo !!}
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
                                    @if($datopki->bloquecategoria == 14)
                                        <div class="row cursor-pointer" x-on:click="muestra4 = !muestra4">
                                            <b>.-</b> {!! $datopki->titulo !!}
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
                                    @if($datopki->bloquecategoria == 15)
                                        <div class="row cursor-pointer" x-on:click="muestra5 = !muestra5">
                                            <b>.-</b> {!! $datopki->titulo !!}
                                        </div>
                                        <div x-show="muestra5" class="font-italic text-dark mb-8">
                                            {!! $datopki->contenido !!}
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div x-data="{muestra6 : false}">
                                @foreach($datospki as $datopki)
                                    @if($datopki->bloquecategoria == 16)
                                        <div class="row cursor-pointer" x-on:click="muestra6 = !muestra6">
                                            <b>.-</b> {!! $datopki->titulo !!}
                                        </div>
                                        <div x-show="muestra6" class="font-italic text-dark mb-8">
                                            {!! $datopki->contenido !!}
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div x-data="{muestra7 : false}">
                                @foreach($datospki as $datopki)
                                    @if($datopki->bloquecategoria == 17)
                                        <div class="row cursor-pointer" x-on:click="muestra7 = !muestra7">
                                            <b>.-</b> {!! $datopki->titulo !!}
                                        </div>
                                        <div x-show="muestra7" class="font-italic text-dark mb-8">
                                            {!! $datopki->contenido !!}
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div x-data="{muestra8 : false}">
                                @foreach($datospki as $datopki)
                                    @if($datopki->bloquecategoria == 18)
                                        <div class="row cursor-pointer" x-on:click="muestra8 = !muestra8">
                                            <b>.-</b> {!! $datopki->titulo !!}
                                        </div>
                                        <div x-show="muestra8" class="font-italic text-dark mb-8">
                                            {!! $datopki->contenido !!}
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            <div x-data="{muestra9 : false}">
                                @foreach($datospki as $datopki)
                                    @if($datopki->bloquecategoria == 19)
                                        <div class="row cursor-pointer" x-on:click="muestra9 = !muestra9">
                                            <b>.-</b> {!! $datopki->titulo !!}
                                        </div>
                                        <div x-show="muestra9" class="font-italic text-dark mb-8">
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

            <x-ir-arriba />

        </div>
    </div>
</div>
