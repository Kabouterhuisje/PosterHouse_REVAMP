<!DOCTYPE html>
<html class="html-cms">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="body-cms">
@if (Auth::check() && Auth::user()->role == "admin")
    @include('layouts.cms_navigation', array('currentPage'=>'categories'))
    <div class="container-cms">
        <form action="{{ route('nieuwCategory') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
            <input type="hidden" name="id" value="-1"/>
            <br> <br>
            Categorienaam: <br>
            <input type="text" name="category_name" value="" required> <br> <br>
            <br>
            <input class="btn btn-primary" type="submit" value="Aanmaken"/>
        </form>
    </div>
@else
    <script>window.location.href = "{{ route('403') }}"</script>
@endif
</body>
</html>