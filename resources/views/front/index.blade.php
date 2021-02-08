<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{settings()->name}} | {{@$title}}</title>


    @include('front._css')

</head>

<body style="direction: rtl;">
@include('front._header')

@yield('content')



@include('front._footer')

@include('front._js')

</body>
</html>
