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
    @include('layouts.cms_navigation', array('currentPage'=>'subcategories'))
    @php
        $parts=parse_url(url()->current());
        $path_parts=explode('/', $parts['path']);
        $subcategory = App\Subcategory::where('id', '=', $path_parts[count($path_parts)-1] )->first();
    $categories = App\Category::all();
    @endphp
    <div class="container-cms">
        <form action="{{ route('wijzigSubcategory') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
            <input type="hidden" name="id" value="{{ $subcategory->id}}" />
            <br> <br>
            Subcategorienaam: <br>
            <input type="text" name="subcategory_name" value="{{ $subcategory->subcategory_name }}" required> <br> <br>
            Categorie van: <br>
            <select name="subcategory_from" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" name="subcategory_from">{{ $category->category_name }}</option>
                @endforeach
            </select><br><br>
            <br>
            <input class="btn btn-primary" type="submit" value="Wijzigen"/>
        </form>
    </div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>