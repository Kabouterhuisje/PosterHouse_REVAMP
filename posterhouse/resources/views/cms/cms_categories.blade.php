<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="html-cms">
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

        <h2><b>Categorieën overzicht</b></h2>
        <!--CONTENT IN HERE-->
        <!-- Knop om nieuwe categories aan te maken -->
        <br>
        <button type="button" class="btn btn-primary"  onclick="window.location='{{URL::route('newCategory')}}'">Nieuwe Categorie</button>
        <br>

        <!-- categories -->
        @php
            $categories = App\Category::all();
            $controller = new \App\Http\Controllers\CategoryController();
        @endphp

        <table id="table-style">
            <tr id="table-row-style">
                <th id="table-header-style">ID</th>
                <th id="table-header-style">Categorienaam</th>
                <th></th>
            </tr>
            @foreach ($categories as $category)
                <tr id="table-row-style">
                    <td id="table-data-style"> {{ $category->id }}</td>
                    <td id="table-data-style"> {{ $category->category_name }}</td>
                    <td> <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('editCategory', $category->id)}}'">Bewerken</button></td>
                    <td><form action="verwijderCategory/{{$category->id}}"><input type="submit" class="btn btn-danger" value="Verwijderen"/></form></td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    <script>window.location.href = "{{ route('403') }}"</script>
@endif
</body>
</html>