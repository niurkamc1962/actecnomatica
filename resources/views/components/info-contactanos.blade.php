<div>
    <div id="contactanos" class="hosting bg-tecnomatica-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 titlepage">
                    <h2>Contáctanos</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 marcolegal">
                    <div class="flex flex-col justify-center items-center">
                        {!! Form::open(['route' => 'enviar_correo', 'method'=>'post']) !!}
                        @csrf
                        <div class="form-group">
                            {!! Form::label('nombre','Remitente:') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=> 'Ingrese nombre del remitente']) !!}

                            @error('nombre')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('correo','Correo:') !!}
                            {!! Form::text('correo', null, ['class' => 'form-control','placeholder'=> 'Ingrese dirección correo del remitente']) !!}

                            @error('correo')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('mensaje','Información:') !!}
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
                        {!! Form::submit('Enviar Correo',['class'=>'btn miboton']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <x-ir-arriba />
        </div>

    </div>
</div>
