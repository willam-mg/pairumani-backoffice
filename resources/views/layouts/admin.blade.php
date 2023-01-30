<!doctype html>
<html lang="en">
    <head>
        <title>{{ env('APP_NAME') }}</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- Material Kit CSS -->
        <link href="{{asset('css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
        <!-- select2-bootstrap4-theme -->
        <link rel="stylesheet" href="{{asset('/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/maps.css')}}">
        <script src="{{asset('js/core/jquery.min.js')}}"></script>
        @stack('styles')
    </head>
    <body>
        <div class="wrapper ">
            <div class="sidebar" data-color="green" data-background-color="#ffff" data-image="{{asset('img/sidebar-1.jpg')}}">
                <!--
                    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

                    Tip 2: you can also add an image using data-image tag
                -->
                <div class="logo text-center">
                    {{-- <a href="{{ route('home') }}" class="simple-text logo-mini">
                        {{ env('APP_NAME1') }}
                    </a> --}}
                    <a href="{{ route('home') }}" class="simple-text logo-normal">
                        {{ env('APP_NAME') }}
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    @include('layouts.partials.nav')
                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-minimize">
                                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                                </button>
                            </div>
                            <a class="navbar-brand" href="javascript:;">{{ env('APP_NAME') }}</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">person</i> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                                        <p class="d-lg-none d-md-block">
                                            Account
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="content">
                    <!-- your content here -->
                    @yield('header')
                    @if(Session::has('message'))
                        <div class="container-fluid">
                            <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
                                {{ Session::get('message') }}
                                @if($errors->any())
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <script>
                                    $('.alert').slideDown();
                                    setTimeout(function(){ $('.alert').slideUp(); }, 10000);
                                </script>
                            </div>
                        </div>
                    @endif
                    @yield('contenido')
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="float-left">
                            <ul>
                                <li>
                                    © {{ env('APP_NAME') }} {{ date('Y') }}
                                </li>
                            </ul>
                        </nav>
                        <!-- your footer here -->
                    </div>
                </footer>
            </div>
        </div>
        {{-- <script src="{{asset('js/core/jquery.min.js')}}"></script> --}}
        <script src="{{asset('js/core/popper.min.js')}}"></script>
        <script src="{{asset('js/core/bootstrap-material-design.min.js')}}"></script>
        <script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{asset('js/material-dashboard.js?v=2.1.2')}}"></script>
        <script src="{{asset('js//plugins/jquery.validate.min.js')}}"></script>
        <script src="{{asset('js/plugins/jasny-bootstrap.min.js')}}"></script>
        <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
        <script src='https://maps.googleapis.com/maps/api/js?&libraries=places&key={{ env('GOOGLE_MAPS_KEY')}}'></script>
	    <script src="{{asset('js/locationpicker.jquery.js')}}"></script>
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2bs4').select2({
                theme: 'bootstrap4'
                })
            });

            // twice send form control
            $('form').on('submit', function () {
                $(this).find(':submit').attr('disabled', 'true');
            })
        </script>
        @stack('scripts')
    </body>
</html>