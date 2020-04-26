<!DOCTYPE html>
<html lang="en">

<head>
    @include('housekeeping::partials.head')
    <link href="{{ mix('css/housekeeping/style.css', '/vendor/duck-funk-core') }}" rel="stylesheet" type="text/css" />
</head>

<body>

@yield('content')

@yield('scripts')

</body>

</html>
