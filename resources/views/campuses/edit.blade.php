@extends('layouts.app')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i>Modificar Campus</h1>
    <hr>

    {{ Form::model($campusesActualizar, array('route' => array('campuses.update', $campusesActualizar->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('director', 'Director') }}
        {{ Form::text('director', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Dirección') }}
        {{ Form::text('address', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Teléfono') }}
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>
    
    {{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection