@extends('layouts.app')

@section('title', '| Edit Post')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

<h1><i class='fa fa-user-plus'></i>Modificar Carrera</h1>
<hr>
            {{ Form::model($careeresActualizar, array('route' => array('careeres.update', $careeresActualizar->id), 'method' => 'PUT')) }}
            
            <div class="form-group">
                {{ Form::label('name', 'Nombre') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('type', 'Tipo') }}

                {!! Form::select('type', $educations, null, ['class' => 'form-control']) !!}
            </div>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    </div>
    </div>
</div>

@endsection