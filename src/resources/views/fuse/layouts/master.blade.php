<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>{{ $page->meta_title }}</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        @include('duck-funk-core::fuse.layouts.head')
  </head>
<body>
  @include('duck-funk-core::fuse.layouts.header')
    <div class="wrapper">
        <div class="container-fluid">
          @yield('content')
        </div>
    </div>
    @include('duck-funk-core::fuse.layouts.footer')
    @include('duck-funk-core::fuse.layouts.footer-script')
    </body>
</html>
