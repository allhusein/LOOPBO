<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Loop App</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('assets_backend/images/favicon.ico') }}">

        <link href="{{ asset('assets_backend/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets_backend/css/bootstrap-material-design.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets_backend/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets_backend/css/style.css')}}" rel="stylesheet" type="text/css">

    </head>
    <body>


    <!-- Begin page -->
    {{-- <div class="accountbg"></div> --}}
    <div class="wrapper-page">
        <div class="display-table">
            <div class="display-table-cell">
                <diV class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                        <div class="text-center pt-3">
                                            <a href="{{route('home')}}">
                                                <img src="{{asset('assets_backend/images/logo-login.png')}}" alt="logo-loop" height="170" />
                                            </a>
                                        </div>
                                        <div class="px-3 pb-3">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group text-right row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-raised btn-block waves-effect waves-light" type="submit">Log In</button>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register.mahasiswa') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Belum punya akun ?</a>
                                                @endif
                                                </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </diV>
            </div>
        </div>
    </div>



        <!-- jQuery  -->
        <script src="{{ asset('assets_backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets_backend/js/popper.min.js') }}"></script>
         <script src="{{ asset('assets_backend/js/bootstrap-material-design.js') }}"></script>
         <script src="{{ asset('assets_backend/js/modernizr.min.js') }}"></script>
         <script src="{{ asset('assets_backend/js/detect.js') }}"></script>
         <script src="{{ asset('assets_backend/js/fastclick.js') }}"></script>
         <script src="{{ asset('assets_backend/js/jquery.slimscroll.js') }}"></script>
         <script src="{{ asset('assets_backend/js/jquery.blockUI.js') }}"></script>
         <script src="{{ asset('assets_backend/js/waves.js') }}"></script>
         <script src="{{ asset('assets_backend/js/jquery.nicescroll.js') }}"></script>
         <script src="{{ asset('assets_backend/js/jquery.scrollTo.min.js') }}"></script>
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


        <!-- App js -->
        <script src="{{ asset('assets_backend/js/app.js') }}"></script>

    </body>
</html>
