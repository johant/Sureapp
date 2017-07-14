<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Bar Academy Essentials Diageo - MKTools</title>
    <link rel="stylesheet" href="/zendero/css/normalize.css">
    <link rel="stylesheet" href="/zendero/css/framework.css">
    <link rel="stylesheet" href="/zendero/css/style.css">
    <link rel="stylesheet" href="/zendero/css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
      @stack('styles')
    <style>
        .list li{position:relative;padding-bottom:10px}
          ul{margin:0;padding:0;list-style:none;}
        </style>
<link href="/adminlte/plugins/iCheck/square/blue.css" rel="stylesheet">
    @stack('scripts')
</head>
    <body>
        <div class="preload"></div>
        <header class="space-inter">
            <div class="container container-flex space-between">
                <figure class="logo"><img src="/zendero/img/logos.png" alt=""></figure>
                <nav class="custom-wrapper" id="menu">
                    <div class="pure-menu"></div>
                    <ul class="container-flex list-unstyled">
                        <li><a href="/" class=""> {{ auth()->user()->name }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="container">
            </div>
        </header>
        @yield('content')
        <section class="footer">
            <footer>
                <div class="container">
                    <figure class="logo"><img src="/zendero/img/logos.png" alt=""></figure>
                    <nav>
                    </nav>
                    {{-- <div class="divider-2"></div> --}}
                    <div class="divider-2" style="width: 80%;"></div>
                    <p>© 2017 - All Rights Reserved. Designed & Developed by <span class="c-white">Marketing Tools</span></p>
                </div>
            </footer>
        </section>
<!-- jQuery 2.2.3 -->
<script src="/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function() {
      $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
    </body>
</html>
