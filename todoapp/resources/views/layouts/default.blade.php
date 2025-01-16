<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkmate</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield("style")
  </head>
  <body>
    <div>
      @include("include.header")
      @yield("content")
    </div>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  </body>
</html>
