@extends('layouts.app')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i>Modificar Estudiante</h1>
    <hr>

    {{ Form::model($studentesActualizar, array('route' => array('studentes.update', $studentesActualizar->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('type', 'Tipo') }}
        {{ Form::text('type', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('career', 'Carrera') }}
        {{ Form::text('career', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('cell-phone', 'Teléfono celular') }}
        {{ Form::text('cell-phone', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Telmex') }}
        {{ Form::text('phone', '', array('class' => 'form-control')) }}
    </div>
    
    {{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection