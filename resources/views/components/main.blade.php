<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="bg-neutral">
  @include('sweetalert::alert')
  <div class="bg-neutral min-h-screen w-full md:w-2/6 mx-auto">
        @yield('base')
  </div>
</body>
</html>