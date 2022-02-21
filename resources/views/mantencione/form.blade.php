
         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="..\..\vendor\adminlte\dist\img\AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>



<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('diagnostico:') }}
            {{ Form::text('diagnostico', $mantencione->diagnostico, ['class' => 'form-control' . ($errors->has('diagnostico') ? ' is-invalid' : ''), 'placeholder' => 'Diagnostico']) }}
            {!! $errors->first('diagnostico', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('fecha_mantención:') }}
            {{ Form::date('fecha_mantencion', $mantencione->fecha_mantencion, ['class' => 'form-control' . ($errors->has('fecha_mantencion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Mantención']) }}
            {!! $errors->first('fecha_mantencion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripción:') }}
            {{ Form::text('descripcion', $mantencione->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado_mantención:') }}
           {!!Form::select('estado_mantencion',['Operativo' => 'Operativo', 'Dado de baja' => 'Dado de baja'], null, [ 'class' => 'form-control'. ($errors->has('estado_mantencion') ? 'is-invalid' : ''), 'placeholder' => 'Seleccione']) !!}
            {!! $errors->first('estado_mantencion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    
        <div class="form-group">
            {{ Form::label('Codigo_Equipo:') }}
            {{ Form::select('id_equipo', $equipos,$mantencione->id_equipo,['class' => 'form-control' . ($errors->has('id_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione']) }}
            {!! $errors->first('id_equipo', '<div class="inval id-feedback">:message</p>') !!}
                
                
                {{-- <select name="id_equipo" id="id_equipo" class ="form-control">
                    <option value="" >Seleccione</option>
                    @foreach($equipos2 as $e)
                         <option value="{{$e->cod_equipo}}">{{$e->cod_equipo}}</option>
                    @endforeach
               </select>   --}}
   
        </div>
        
        <div class="form-group">
            {{ Form::label('imagen1') }}
            {{ Form::file('imagen1',$mantencione->imagen1, ['class' => 'form-control' . ($errors->has('imagen1') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
            {!! $errors->first('imagen1', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imagen2') }}
            {{ Form::file('imagen2',  $mantencione->imagen2, ['class' => 'form-control' . ($errors->has('imagen2') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
            {!! $errors->first('imagen2', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('imagen3') }}
            {{ Form::file('imagen3', $mantencione->imagen3, ['class' => 'form-control' . ($errors->has('imagen3') ? ' is-invalid' : ''), 'placeholder' => 'Id Equipo']) }}
            {!! $errors->first('imagen3', '<div class="invalid-feedback">:message</p>') !!}
        </div>

   


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
