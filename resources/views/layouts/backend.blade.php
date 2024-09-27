<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="shortcut icon" href="{{ asset('assets_backend/images/favicon.ico') }}">

    <title>Lopp Apps - {{ $title }} Page</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="4ghel" name="developer" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @include('backend.include.style')

    @stack('after-style')

</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <div id="wrapper">
        @include('backend.include.sidebar')
        <div class="content-page">
            <div class="content">
                @include('backend.include.topbar')

                <div class="page-content-wrapper dashborad-v">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            @yield('breadcrumb')
                                        </ol>
                                    </div>
                                    <h4 class="page-title">{{ $title }}</h4>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        @yield('content-backend')

                    </div>
                </div>
            </div>
            <footer class="footer">
                © 2022 Loop App - Developed By 4ghel's Team
            </footer>
        </div>
    </div>

    @include('backend.include.script')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @stack('after-script')
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.need-alert').on('click', function (event) {
      event.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
    }).then((result) => {
    if (result.isConfirmed) {
    $(".need-alert").submit();
    }
})
})

</script>

</html>
