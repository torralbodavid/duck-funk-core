<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ $page->meta_title }}</title>
        <meta content="{{ $page->meta_description }}" name="description" />

        @if($page->no_robots)
            <meta name="robots" content="noindex, nofollow">
        @endif
        @include('duck-funk-core::fuse.layouts.head')
    </head>
    <body class="pb-0">
        @yield('content')
        @include('duck-funk-core::fuse.layouts.footer-script')
    </body>
</html>
