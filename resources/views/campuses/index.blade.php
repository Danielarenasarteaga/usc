{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1>
        <i class="fa fa-users"></i> Campus 
    </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Director</th>
                    <th>Dirección</th>
                    <th>Télefono</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($campuses as $campus)
                <tr>

                    <td>{{ $campus->name }}</td>
                    <td>{{ $campus->director }}</td>
                    <td>{{ $campus->address }}</td>
                    <td>{{ $campus->phone }}</td>
                    
                    <td>
               
                    <a href="{{ route('campuses.edit', $campus->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['campuses.destroy', $campus->id] ]) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

        {{$campuses->links()}}
    </div>

    <a href="{{ route('campuses.create') }}" class="btn btn-success">Nuevo Campus</a>

</div>

@endsection