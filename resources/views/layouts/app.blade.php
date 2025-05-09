
<!DOCTYPE html><!--
    * CoreUI - Free Bootstrap Admin Template
    * @version v5.1.1
    * @link https://coreui.io/product/free-bootstrap-admin-template/
    * Copyright (c) 2024 creativeLabs Łukasz Holeczek
    * Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
    -->
    <html lang="en">
      <head>
        <base href="./">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <title>CoreUI Free Bootstrap Admin Template</title>
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('coreUi/assets/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('coreUi/assets/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('coreUi/assets/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('coreUi/assets/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('coreUi/assets/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('coreUi/assets/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('coreUi/assets/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('coreUi/assets/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('coreUi/assets/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('coreUi/assets/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('coreUi/assets/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('coreUi/assets/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('coreUi/assets/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('coreUi/assets/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('coreUi/assets/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <!-- Vendors styles-->
        <link rel="stylesheet" href="{{ asset('coreUi/vendors/simplebar/css/simplebar.css') }}">
        <link rel="stylesheet" href="{{ asset('coreUi/') }}css/vendors/simplebar.css">
        <!-- Main styles for this application-->
        <link href="{{ asset('coreUi/css/style.css') }}" rel="stylesheet">
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        <link href="{{ asset('coreUi/css/examples.css') }}" rel="stylesheet">
        <script src="{{ asset('coreUi/js/config.js') }}"></script>
        <script src="{{ asset('coreUi/js/color-modes.js') }}"></script>
        <link href="{{ asset('coreUi/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
      </head>
      <body>

        @include('includes.sidebar')

            @include('includes.navbar')

            @yield('content')

            @include('includes.footer')
        </div>

        <!-- CoreUI and necessary plugins-->
        <script src="{{ asset('coreUi/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js') }}"></script>
        <script src="{{ asset('coreUi/vendors/simplebar/js/simplebar.min.js') }}"></script>
        <script>
          const header = document.querySelector('header.header');

          document.addEventListener('scroll', () => {
            if (header) {
              header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
          });
        </script>
        <!-- Plugins and scripts required by this view-->
        <script src="{{ asset('coreUi/vendors/chart.js/js/chart.umd.js') }}"></script>
        <script src="{{ asset('coreUi/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
        <script src="{{ asset('coreUi/vendors/@coreui/utils/js/index.js') }}"></script>
        <script src="{{ asset('coreUi/js/main.js') }}"></script>
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
        @endif

        {{-- toast notif sweetalert2 --}}
        <script>
            @if (session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            @endif
        </script>
        {{-- Chart --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



      </body>
    </html>
