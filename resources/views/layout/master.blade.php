<!DOCTYPE html>
<html>
    <head>
        <title>Encuestas Online</title>
                <style>
          body{
            background: #f7f9fc !important;
            font-family: 'lato', sans-serif;
          }
          .post{
              background: #fff;
              box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
              padding: 20px;
          }
        </style>
        {{-- {!! MaterializeCSS::include_css() !!} --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>

    <body>
      <div class="container">
          <!-- TOP MENU -->
          <div class="row" style="padding-top:10px;">
              <div class="center-align">
                  @if(Auth::check() && request()->is('surveys/*'))
                    <a class="btn blue waves-effect waves-light lighten-1 white-text" href="/"> Inicio </a>
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/logout"> Salir </a>
                    <a class="btn-flat disabled" href="#" style="text-transform:none;">{{ Auth::user()->email }}</a>
                  @endif
              </div>
          </div>
         <!-- End TOP MENU -->

         <!-- BODY OF PAGE -->
          <div class="row">
              <div class="col s12 m10 offset-m1 l8 offset-l2" style="margin-top:10px;">
                @yield('content')
              </div>
          </div>
         <!-- End BODY OF PAGE -->
      </div>
    </body>
    <script src="{{ URL::asset('jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

    {{-- {!! MaterializeCSS::include_js() !!} --}}
    <script src="{{ URL::asset('init.js') }}"></script>

</html>
