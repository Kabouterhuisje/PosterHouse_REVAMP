<!DOCTYPE html>
<html class="html-cms">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="body-cms">
    @include('layouts.cms_navigation', array('currentPage'=>'subcategories'))
    <div class="container-cms">
        <form action="{{ route('nieuwSubcategory') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
            <input type="hidden" name="id" value="-1"/>
            <br> <br>
            Subcategorienaam: <br>
            <input type="text" name="subcategory_name" value="" required> <br> <br>
            Subcategorie van: <br>
            @php
                $categories = App\Category::all();
            @endphp
            <select name="subcategory_from" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" name="subcategory_from">{{ $category->category_name }}</option>
                @endforeach
            </select><br><br>
            <br>
            <input class="btn btn-primary" type="submit" value="Aanmaken"/>
        </form>
    </div>
</body>
</html>