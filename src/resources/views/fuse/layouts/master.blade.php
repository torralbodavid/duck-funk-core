<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        @include('duck-funk-core::layouts.head')
  </head>
<body>
  @include('duck-funk-core::layouts.header')
    <div class="wrapper">
        <div class="container-fluid">
        @include('duck-funk-core::layouts.settings')
          @yield('content')
        </div>
    </div>
    @include('duck-funk-core::layouts.footer')
    @include('duck-funk-core::layouts.footer-script')
    </body>
</html>
