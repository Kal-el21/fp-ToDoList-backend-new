
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
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('coreUi/assets/favicon/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset('coreUi/assets/favicon/apple-icon-60x60.png')  }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('coreUi/assets/favicon/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('coreUi/assets/favicon/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('coreUi/assets/favicon/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('coreUi/assets/favicon/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('coreUi/assets/favicon/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('coreUi/assets/favicon/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('coreUi/assets/favicon/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('coreUi/assets/favicon/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('coreUi/assets/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('coreUi/assets/favicon/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('coreUi/assets/favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{ asset('coreUi/assets/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="{{asset('#ffffff')}}">
        <meta name="msapplication-TileImage" content="{{asset('coreUi/assets/favicon/ms-icon-144x144.png')}}">
        <meta name="theme-color" content="{{asset('#ffffff')}}">
        <!-- Vendors styles-->
        <link rel="stylesheet" href="{{asset('coreUi/vendors/simplebar/css/simplebar.css')}}">
        <link rel="stylesheet" href="{{asset('coreUi/css/vendors/simplebar.css')}}">
        <!-- Main styles for this application-->
        <link href="{{asset('coreUi/css/style.css')}}" rel="stylesheet">
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        <link href="{{asset('coreUi/css/examples.css')}}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-iFYnumxmAfPWEvBBHVgQ1pcH7Bj9XLrhznQ6DpVFtF3dGwlEAqe4cmd4NY4cJALM" crossorigin="anonymous">
        <script src="{{asset('coreUi/js/config.js')}}"></script>
        <script src="{{asset('coreUi/js/color-modes.js')}}"></script>
      </head>
      <body>
        @yield('content')
        <!-- CoreUI and necessary plugins-->
        <script src="{{asset('coreUi/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
        <script src="{{asset('coreUi/vendors/simplebar/js/simplebar.min.js')}}"></script>
        <script>
          const header = document.querySelector('header.header');

          document.addEventListener('scroll', () => {
            if (header) {
              header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
          });
        </script>
        <script>
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js" integrity="sha384-vaeoe43yarg/Wh3n+r4/PYyWggBr7VzI5l/1UeGOtIN4cgSvWlyBeZ7DlBEukNeq" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.min.js" integrity="sha384-humjD9K3JKNs28Z7E9JA0aCMIPJswRs7wfgY8y3Us4sxTzEFt6Dkjjw43GoY/B2x" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-niNYYckQibt1N/4Vwtj/TLAamZiTtWORHyq6GKNha1Q7YgJUrCOUCW5MG+5GEJvD" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-lq81hPVVc9Tw3o7QTGQy4Ugq41J9G1HkNiTcbIx1FPum0jj+DTukgB0003dTtEb+" crossorigin="anonymous"></script>
      </body>
    </html>
