    <div class="form-group">
        {!! Form::label('name','Permiso:') !!}
        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=> 'Ingrese Permiso con formato de ruta']) !!}

        @error('name')
            <small class="text-danger">
                {{$message}}
            </small>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('description','Descripcion:') !!}
        {!! Form::text('description', null, ['class' => 'form-control','placeholder'=> 'Ingrese descripcion del Permiso']) !!}

        @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
        @enderror
    </div>
