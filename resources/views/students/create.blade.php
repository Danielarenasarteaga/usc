{{-- \resources\views\campuses\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Nuevo estudiante')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i>Nuevo estudiante</h1>
    <hr>

    {{ Form::open(array('url' => 'students')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
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
        {{ Form::label('cell phone', 'Teléfono celular') }}
        {{ Form::text('cell phone', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Telmex') }}
        {{ Form::text('phone', '', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection