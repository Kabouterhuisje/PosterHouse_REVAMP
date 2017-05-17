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
    @include('layouts.cms_navigation', array('currentPage'=>'subcategories'))
    <div class="container-cms">

        <h2><b>Producten overzicht</b></h2>
        <!--CONTENT IN HERE-->
        <!-- Knop om nieuwe subcategories aan te maken -->
        <br>
        <button type="button" class="btn btn-primary"  onclick="window.location='{{URL::route('newSubcategory')}}'">Nieuwe subcategorie</button>
        <br>

        <!-- subcategories -->
        @php
            $subcategories = App\Subcategory::all();
            $controller = new \App\Http\Controllers\SubcategoryController();
            $categories= App\Category::all();
        @endphp

        <table id="table-style">
            <tr id="table-row-style">
                <th id="table-header-style">ID</th>
                <th id="table-header-style">Subcategorienaam</th>
                <th id="table-header-style">Subcategorie van</th>
                <th></th>
            </tr>
            @foreach ($subcategories as $subcategory)
                <tr id="table-row-style">
                    <td id="table-data-style"> {{ $subcategory->id }}</td>
                    <td id="table-data-style"> {{ $subcategory->subcategory_name }}</td>
                    <td id="table-data-style"> {{ $subcategory->Category_id }}</td>
                    <td> <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('editSubcategory', $subcategory->id)}}'">Bewerken</button></td>
                    <td><form action="verwijderSubcategory/{{$subcategory->id}}"><input type="submit" class="btn btn-danger" value="Verwijderen"/></form></td>
                </tr>
            @endforeach
        </table>
    </div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>