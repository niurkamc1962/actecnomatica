<!-- PLANTILLA QUE MUESTRA MENSAJE AL USUARIO SOBRE ERROR DE CONFIRMACION DE CORREO -->
<div>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-justify text-tecnomatica-dark font-semibold">
                                <img class="mt-8 mb-4 rounded-2xl scale-75" src="{{ asset('/ficherospki/categoriapki4'.'/'.$imagenpki) }}" >
                            </div>

                            <div class="col-md-6 JustifyRight mt-10 marcolegal ">
                                <div class="font-bold text-tecnomatica-dark text-center text-2xl">
                                    <h2>{!! $contenido !!}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>





