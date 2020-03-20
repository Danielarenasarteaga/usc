{{-- \resources\views\campuses\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Nuevo campus')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i>Nuevo Campus</h1>
    <hr>

    {{ Form::open(array('url' => 'campuses')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('director', 'Director') }}
        {{ Form::text('director', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Dirección') }}
        {{ Form::text('address', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Teléfono') }}
        {{ Form::text('phone', '', array('class' => 'form-control')) }}
    </div>
    
    {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection