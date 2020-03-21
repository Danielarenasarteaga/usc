@extends('layouts.app')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i>Modificar Education</h1>
    <hr>

    {{ Form::model($educationActualizar, array('route' => array('educations.update', $educationActualizar->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    
    {{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection