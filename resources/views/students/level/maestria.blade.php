{{-- \resources\views\campuses\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Nuevo estudiante')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i>Crear nuevo alumno en maestría</h1>
    <hr>

    {{ Form::open(array('url' => 'students')) }}

    <div class="form-group">
        {{ Form::label('request', 'Solicitud de inscripción a la maestría') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('start', 'Inicio de clases') }}
        {{ Form::text('start', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('masters degree', 'Maestría') }}
        {{ Form::text('masters degree', '', array('class' => 'form-control')) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('schedule', 'Horario elegido') }}
        {{ Form::text('schedule', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('alternate schedule', 'Horario alterno') }}
        {{ Form::text('alternate schedule', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('license', 'Matrícula C') }}
        {{ Form::text('license', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('data', 'Datos del alumno') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Nombre completo') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('home', 'Domicilio') }}
        {{ Form::text('home', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Suburb', 'Colonia') }}
        {{ Form::text('Suburb', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('city', 'Ciudad') }}
        {{ Form::text('city', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('cell phone', 'Teléfono celular') }}
        {{ Form::text('cell phone', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Telmex') }}
        {{ Form::text('phone', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('birth', 'Lugar de nacimiento') }}
        {{ Form::text('birth', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('date', 'Fecha de nacimiento') }}
        {{ Form::text('date', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('age', 'Edad') }}
        {{ Form::text('age', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('blood', 'Tipo de sangre') }}
        {{ Form::text('blood', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('allergies', 'Alergias') }}
        {{ Form::text('allergies', '', array('class' => 'form-control')) }}
    </div>
    
    <div class="form-group">
        {{ Form::label('general data', 'Datos academicos') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('original documents', 'Documentos originales recibidos') }}
       
    </div>

    
    <div class="form-group">
        {{ Form::label('certificate', 'Acta de nacimiento') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('prepa certificate', 'Certificado de prepa') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('bachelors certificate', 'Certificado de licenciatura') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('letter', 'Carta de examen profesional') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('title', 'Título') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('identification card', 'Cédula') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('photos', 'Fotos') }}
       
    </div>

   
    <div class="form-group">
        {{ Form::label('school', 'Escuela de origen') }}
        {{ Form::text('home father', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('place', 'Lugar') }}
        {{ Form::text('place', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('profile', 'Perfil de egreso de licenciatura') }}
        {{ Form::text('profile', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('option', '¿Cursa la maestría como opción de titulación de la licenciatura?') }}
        {{ Form::text('option', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Institute', '¿Cómo te enteraste del instituto?') }}
        {{ Form::text('Institute', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('inscription', 'Fecha de la inscripción') }}
        {{ Form::text('inscription', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('promotions', 'Promociones aplicables') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('cost', 'Costo de inscripción') }}
        {{ Form::text('cost', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('percentage', 'Descuento en colegiatura porcentaje') }}
        {{ Form::text('percentage', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('total', 'Total') }}
        {{ Form::text('total', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('duration', 'Duración') }}
        {{ Form::text('duration', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('observations', 'Observaciones') }}
        {{ Form::text('observations', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('documents', 'Documentos') }}
       
    </div>

    <div class="form-group">
        {{ Form::label('archive', 'Ningun archivo seleccionado') }}
       
    </div>


    {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection