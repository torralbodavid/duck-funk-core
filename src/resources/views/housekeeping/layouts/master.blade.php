<!DOCTYPE html>
<html lang="en">

<head>
    @include('housekeeping::partials.head')

<!-- datepicker -->
    <link href="{{ mix('css/bootstrap-datepicker.min.css', '/vendor/duck-funk-core') }}" rel="stylesheet" type="text/css" />

    <!-- jvectormap -->
    <link href="{{ mix('css/jquery-jvectormap-2.0.2.css', '/vendor/duck-funk-core') }}" rel="stylesheet" type="text/css" />

    <link href="{{ mix('css/bootstrap.min.css', '/vendor/duck-funk-core') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/metismenu.min.css', '/vendor/duck-funk-core') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/icons.css', '/vendor/duck-funk-core') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/housekeeping/style.css', '/vendor/duck-funk-core') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/select2.min.css', '/vendor/duck-funk-core') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/filepond.css', '/vendor/duck-funk-core') }}" rel="stylesheet" type="text/css" />
</head>

<body>

@yield('content')

@yield('scripts')

</body>

</html>
