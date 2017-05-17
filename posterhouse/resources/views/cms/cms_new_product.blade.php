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
    @include('layouts.cms_navigation', array('currentPage'=>'products'))
    <div class="container-cms">
        <form action="{{ route('nieuwProduct') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
            <input type="hidden" name="id" value="-1"/>
            <br> <br>
            Productnaam: <br>
            <input type="text" name="product_name" value="" required> <br> <br>
            Afbeelding:
            <input type="file" accept=".jpeg, .jpg, .png" name="image" value="" required> <br>
            Omschrijving: <br>
            <textarea rows="5" cols="60" name="description" required></textarea> <br>
            Prijs: <br>
            <input type="number" name="price" min="0" required>  <br>

            <br>
            <input class="btn btn-primary" type="submit" value="Aanmaken"/>
        </form>
    </div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>