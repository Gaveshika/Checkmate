<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkmate</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield("style")
  </head>
  <body class="d-flex flex-column h-100">
    <div>
      @include("include.header")
      @yield("content")
      @include("include.footer")
    </div>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  </body>
</html>
