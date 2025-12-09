<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Nông sản Việt')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Import CSS & JS -->
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans bg-white">
  <!-- Header -->
  @include('partials.header')

  <!-- Main content -->
  <main class="min-h-screen">
    @yield('content')
  </main>

  <!-- Footer -->
  @include('partials.footer')
</body>
</html>
