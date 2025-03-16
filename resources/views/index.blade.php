<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="w-screen h-screen flex flex-col bg-gray-100">
    <!-- Header -->
    @include('partials.header')
   
    <!-- Main Content -->
    @yield('content')

    <!-- Bottom Navigation -->
   @include('partials.navbar')
  </body>
</html>
