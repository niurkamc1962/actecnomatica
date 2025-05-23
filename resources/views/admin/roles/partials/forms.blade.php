    <div class="form-group">
        {!! Form::label('name','Role:') !!}
        {!! Form::text('name', null, ['class' => 'form-control','placeholder'=> 'Ingrese nombre del Role']) !!}

        @error('name')
            <small class="text-danger">
                {{$message}}
            </small>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('description','Descripcion:') !!}
        {!! Form::text('description', null, ['class' => 'form-control','placeholder'=> 'Ingrese descripcion del Role']) !!}

        @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
        @enderror
    </div>
    <h2 class="h3">Lista de Permisos</h2>
    @foreach($permissions as $permission)
        <div class="form-group">
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                {{ $permission->description }}
            </label>
        </div>
    @endforeach
