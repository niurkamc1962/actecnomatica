<div>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    PKI Tecnomatica
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div id="contactos" class="hosting">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 titlepage">
                                        <h2>Contactenos</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="flex flex-col justify-center items-center">

                                            {!! Form::open(['route' => 'enviar_correo', 'method'=>'post']) !!}
                                            @csrf
                                            <div class="form-group">
                                                {!! Form::label('nombre','Destinatario:') !!}
                                                {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=> 'Ingrese nombre del remitente']) !!}

                                                @error('nombre')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('correo','Correo:') !!}
                                                {!! Form::text('correo', null, ['class' => 'form-control','placeholder'=> 'Ingrese direccion correo']) !!}

                                                @error('correo')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('mensaje','Informacion:') !!}
                                                {{--{!! Form::text('mensaje', null, ['class' => 'form-control','placeholder'=> 'Cuerpo del correo']) !!}--}}
                                                {!! Form::textarea('mensaje', null,[
                                                        'class' => 'form-control',
                                                        'rows' => 3
                                                    ]) !!}

                                                @error('mensaje')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                            {!! Form::submit('Enviar Correo',['class'=>'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
</div>
