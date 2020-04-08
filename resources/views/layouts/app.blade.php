<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css" integrity="sha256-i397iDijTcJqMf2j733J1b+WKakC2U8Y3k2eMScEugA=" crossorigin="anonymous" />

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="{{ asset('jAlert/dist/jAlert.css') }}">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('datetimepicker/build/jquery.datetimepicker.min.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body>
    <div class="div-loader" id="loading">
        <div class="loader"></div>
    </div>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('images/ic_logo.png')}}" alt="Logo" style="with:100px;">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (!Auth::guest())
                        <li><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
                        <li><a href="{{ route('campuses.index') }}">{{ __('Campus') }}</a></li>
                        <li><a href="{{ route('careeres.index') }}">{{ __('Careers') }}</a></li>
                        <li><a href="{{ route('educations.index') }}">{{ __('Education Level') }}</a></li>
                        <li><a href="{{ route('students.index') }}">{{ __('Students') }}</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        @role('Admin') {{-- Laravel-permission blade helper --}}
                                        <a href="#"><i class="fa fa-btn fa-unlock"></i>Admin</a>
                                        @endrole
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container" id="divSuccess">
            <div class="alert alert-success">
            </div>
        </div>
        <div class="container" id="divError">
            <div class="alert alert-warning">
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include ('errors.list') {{-- Including error file --}}
            </div>
        </div>

        @yield('content')

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js" integrity="sha256-ASBoVF7YsFeFNsTSQXGollow0nMkiNhagGJF4/h58sQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.fa.min.js" integrity="sha256-u/DZtNLWZSvkNdIL4PTQzEJUAFLzM758asxZnhd+5R4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script src="{{ asset('jAlert/dist/jAlert.min.js')}}"></script>
    <script src="{{ asset('js/jquery.combobox.js')}}"></script>
    <script src="{{ asset('datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

        function divSuccessShow(message) {
            $("#divSuccess div").html(message);
            $("#divSuccess").show(500);

            setTimeout(function() {
                $("#divSuccess").hide(500);
            }, 5000);
        };

        function divErrorShow(message) {
            $("#divError div").html(message);
            $("#divError").show(500);

            setTimeout(function() {
                $("#divError").hide(500);
            }, 5000);
        };

        $(function() {
            $(document).ready(function() {
                $("#divSuccess").hide();
                $("#divError").hide();
            });
        });
    </script>
    @yield('script')

</body>
</html>
