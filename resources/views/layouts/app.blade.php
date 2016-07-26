
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="NotGael">
    <link rel="icon" href="../../favicon.ico">

    <title>TH14</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="padding-top: 50px;">
    <!-- Test -->


    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">TH14</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li {{ Request::path() == 'rappels' ? 'class=active' :  null }} >
                <a href="{{ url('/rappels') }}">Rappels</a></li>
              <li {{ Request::path() == 'articles' ? 'class=active' :  null }} >
                <a href="{{ url('/articles') }}">Articles</a></li>
              <li {{ Request::path() == 'photos' ? 'class=active' :  null }} >
                <a href="{{ url('/photos') }}">Photos</a></li>
              <li {{ Request::path() == 'admin' ? 'class=active' :  null }} >
                <a href="{{ url('/admin') }}">Admin</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">



              <!-- Authentication Links -->
              @if (Auth::guest())
                  <li><a href="{{ url('/login') }}">Login</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
              @else
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
              </li>
              @endif

            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

    @yield('content')

    <p>Rappel : {{ Request::path() == 'rappels' ? "oui" :  "non" }}</p>
    <p>Articles : {{ Request::path() == 'articles' ? "oui" :  "non" }}</p>
    <p>Photos : {{ Request::path() == 'photos' ? "oui" :  "non" }}</p>
    <p>Admin : {{ Request::path() == 'admin' ? "oui" :  "non" }}</p>


  </div>
    <!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
