{{-- \resources\views\careeres\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1>
        <i class="fa fa-users"></i> Carreras 
    </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($Careeres as $Career)
                <tr>

                    <td>{{ $Career->name }}</td>
                    <td>{{ $Career->type }}</td>
                                       
                    <td>
                    <a href="{{ route('careeres.edit', $Career->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['Careeres.destroy', $Career->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('careeres.create') }}" class="btn btn-success">Nueva Carrera</a>

</div>

@endsection