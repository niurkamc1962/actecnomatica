<!-- PLANTILLA QUE MUESTRA FORMULARIO DE REGISTRO DE USUARIO -->

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-justify text-tecnomatica-dark font-semibold">
                @foreach($datospki as $datopki)
                    @if(($datopki->categoriaspki_id == 4) && ($datopki->bloquecategoria == 10))
                        <img class="mt-8 mb-4 rounded-2xl scale-75" src="{{ asset('/ficherospki/categoriapki4'.'/'.$datopki->imagenpki) }}" >
                        {{$datopki->contenido}}<br><br>
                    @elseif (($datopki->categoriaspki_id == 4) && ($datopki->bloquecategoria == 11))
                        <b>.-</b> {{$datopki->contenido}}<br>
                    @elseif (($datopki->categoriaspki_id == 4) && ($datopki->bloquecategoria == 12))
                        <b>.-</b> {{$datopki->contenido}}<br>
                    @endif
                @endforeach
            </div>

            <div class="col-md-6 JustifyRight mt-6">
                <div class="font-bold text-tecnomatica-dark text-center text-2xl">
                    <h2>Formulario Registro</h2>
                </div>
                <div class="font-bold text-danger text-center">
                    * Campos obligatorios
                </div>


                {!! Form::open(['route' =>'registrar-usuario', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                {!! Form::token() !!}

                <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('name','* Nombres(s) y Apellidos') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        <p>
                            @error('name') <span class="text-danger font-bold">{{ $message }}</span>@enderror
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('cargo','Cargo') !!}
                        {!! Form::text('cargo', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('email','* Correo') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        <p>
                            @error('email') <span class="text-danger font-bold">{{ $message }}</span>@enderror
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('telefonofijo','Teléfono Fijo') !!}
                        {!! Form::text('telefonofijo', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('telefonomovil','Teléfono Movil') !!}
                        {!! Form::text('telefonomovil', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('empresa','Empresa') !!}
                        {!! Form::text('empresa', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('reeup','Codigo Reeup') !!}
                        {!! Form::text('reeup', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('contrasena','* Contraseña: ') !!}
                        {!! Form::password('contrasena', ['class' => 'form-control']) !!}
                        <p>
                            @error('contrasena') <span class="text-danger font-bold">{{ $message }}</span>@enderror
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('contrasena_confirmacion','* Repetir contraseña') !!}
                        {!! Form::password('contrasena_confirmacion', ['class' => 'form-control']) !!}
                        <p>
                            @error('contrasena_confirmacion') <span class="text-danger font-bold">{{ $message }}</span>@enderror
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{route('welcome')}}" class="btn btn-danger">Cancelar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


