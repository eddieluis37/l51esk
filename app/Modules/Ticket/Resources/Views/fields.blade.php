<div class="form-group">
    {!! Form::label('name', 'Nombre Tiquet', ['for' => 'name'] ) !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Escribe el name del tiquet' ]  ) !!}

    {!! Form::label('text', 'Text', ['for' => 'text'] ) !!}
    {!! Form::text('text', null , ['class' => 'form-control', 'id' => 'text', 'placeholder' => 'Escriba la text' ]  ) !!}

    {!! Form::label('description', 'Descripción', ['for' => 'description'] ) !!}
    {!! Form::text('description', null , ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Escriba una breve descripción' ]  ) !!}


    {!! Form::label('Importancia') !!}
    {!! Form::select('importance', (['0' => 'Seleccione nivel de Importancia'] + $importances),null, ['class' => 'form-control']) !!}

</div>