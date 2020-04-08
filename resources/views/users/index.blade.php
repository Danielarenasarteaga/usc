{{-- \resources\views\lines\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Usuarios')

@section('style')
    <style type="text/css">
        .cel-text-vertical-middle {
            vertical-align: middle !important;
        }

        .cel-commands {
            width: 100px !important;
        }

        .divAdd {
            width: 100px;
            position: absolute;
            left: 0px;
        }

        .img_radius {
            height: 50px;
           border-radius: 50%;
        }
    </style>
@endsection

@section('content')

<div class="container">

    <h3 style="font-weight: bold;">
        <i class="fa fa-key"></i> Usuarios
    </h3>

    <form id="frmExport" method="get">
        <input type="hidden" id="searchPhrase" name="searchPhrase">
        <input type="hidden" id="searchRole" name="searchRole">
        <input type="hidden" id="searchLine" name="searchLine">
    </form>
    <table id="grid-data" class="table table-condensed table-hover table-striped">
        <thead>
            <tr>
                <th data-column-id="id" data-type="numeric" data-visible="false">id</th>
                <th data-column-id="role" data-css-class="cel-text-vertical-middle" data-header-css-class="cel-text-vertical-middle">{{ __('Role') }}</th>
                <th data-column-id="picture" data-formatter="picture" data-sortable="false">{{ __('Picture') }}</th>
                <th data-column-id="name" data-css-class="cel-text-vertical-middle" data-header-css-class="cel-text-vertical-middle">{{ __('Name') }}</th>
                <th data-column-id="email" data-css-class="cel-text-vertical-middle" data-header-css-class="cel-text-vertical-middle">{{ __('Email') }}</th>
                <th data-column-id="commands" data-formatter="commands" data-sortable="false" data-css-class="cel-commands cel-text-vertical-middle" data-header-css-class="cel-commands cel-text-vertical-middle">{{ __('Actions') }}</th>
            </tr>
        </thead>
    </table>

</div>

@include ('users.create')

@endsection

@section('script')

    <script type="text/javascript">
        var roles = JSON.parse($('<textarea />').html("{{ $roles }}").text());
        var campus = JSON.parse($('<textarea />').html("{{ $campus }}").text());
    </script>
    <script src="{{ asset('modules/users/index.js') }}"></script>
@endsection
