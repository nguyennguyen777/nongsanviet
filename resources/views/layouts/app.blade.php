<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Nông sản Việt')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Import CSS & JS -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-white">
  <!-- Header -->
  @include('partials.header')

  <!-- Hero -->
  @include('partials.hero')

  <!-- Main content -->
  <main class="min-h-screen">
    @yield('content')
  </main>

  <!-- Footer -->
  @include('partials.footer')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

  @stack('scripts')
</body>

</html>