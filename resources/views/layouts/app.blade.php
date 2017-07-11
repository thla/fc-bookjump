<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bookjump</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/bookjump.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>

    @include ('layouts.nav')

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">BookJump</h1>
        <p class="lead blog-description">The first rule of bookjump is don't talk about bookjump.</p>
      </div>
    </div>

      @yield ('content')
      @include ('layouts.footer')
  </body>
</html>
