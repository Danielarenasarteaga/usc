@extends('plantilla')

@section('content')

@endsection
    <h3 class="text-center mb-3 pt-3">Editar el Registro {{$campusesActualizar}}</h3>

    <form action="{{route('update' , $campusesActualizar->id)}}" method="POST">
        @method('PUT')
        @csrf
    
        <div class="form-group">
            <input type="text" name="nombre" id="nombre" value="{{$campusActualizar->nombre}}" class="form-control">
        <div>
        
        <div class="form-group">
            <input type="text" name="director" id="director" value="{{$campusActualizar->director}}" class="form-control">
        
        <div class="form-group">
            <input type="text" name="direccion" id="direccion" value="{{$campusActualizar->direccion}}" class="form-control">
        
            <div class="form-group">
            <input type="text" name="telefono" id="telefono" value="{{$campusActualizar->telefono}}" class="form-control">
        
        </div>

        <button type="submit" class="btn btn-warning btn-block">Editar nota</button>

    </form>
    @if (session('update'))
        <div class="alert alert-success mt-3">
            {{session('update')}}
        <div>
    @endif

@endsection