<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <title>@yield('title') - Reddut</title>
  </head>
  <body>
      <nav class="navbar navbar-default navbar-static-top">
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
                      Reddut
                  </a>
                  @yield('navbar')
              </div>

              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                  <!-- Left Side Of Navbar -->
                  <ul class="nav navbar-nav">
                      &nbsp;
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">
                      <!-- Authentication Links -->
                      @if (Auth::guest())
                          <li><a href="{{ url('/login') }}">Login</a></li>
                          <li><a href="{{ url('/register') }}">Register</a></li>
                      @else
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu" role="menu">
                                  <li>
                                      <a href="{{ url('/logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>

                                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>
                                  <li><a href="#">View Profile</a></li>
                              </ul>
                          </li>
                      @endif
                  </ul>
              </div>
          </div>
      </nav>
    <div class="body container">


          @yield('content')

    </div>
    <footer>
      <div class="container">
        <div class="column">
          <p><a href="{{ url('/about/') }}">About & Features</a></p>
          <p><a href="{{ url('/suggestions/') }}">Give a suggestion</a></p>
          <p><a href="{{ url('/contact/') }}">Contact</a></p>
        </div>
        <div class="column">
          <p><a href="https://www.facebook.com/JordyPe" target='_blank'>Facebook</a></p>
          <p><a href="https://github.com/perjor" target='_blank'>Github</a></p>
          <p><a href="https://twitter.com/viperwooz" target='_blank'>Twitter</a></p>
        </div>
        <div class="column">
          <p>Made by Jordy Pereira</p>
          <p>School project</p>
          <p>Reddut &copy</p>
        </div>
      </div>

    </footer>


    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <script>
      jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.document.location = $(this).data("href");
        });
      });
    </script>
  </body>
</html>
