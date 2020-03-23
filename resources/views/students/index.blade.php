{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1>
        <i class="fa fa-users"></i> Estudiantes 
    </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Carrera</th>
                    <th>Télefono celular</th>
                    <th>Telmex</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                <tr>

                    <td>{{ $student->name }}</td>
                    <td>{{ $student->type }}</td>
                    <td>{{ $student->career }}</td>
                    <td>{{ $student->cell_phone }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
               
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['students.destroy', $student->id] ]) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

        {{$students->links()}}
    </div>

    <a href="{{ route('students.create') }}" class="btn btn-success">Nuevo Student</a>

</div>

@endsection