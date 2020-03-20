{{-- \resources\views\Careeres\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Nuevo Career')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i>Nuevo Career</h1>
    <hr>

    {{ Form::open(array('url' => 'Careeres')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection