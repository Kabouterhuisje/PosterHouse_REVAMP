<!DOCTYPE html>
<html class="html-cms">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="body-cms">
    @include('layouts.cms_navigation', array('currentPage'=>'products'))
    @php
        $parts=parse_url(url()->current());
        $path_parts=explode('/', $parts['path']);
        $product = App\Product::where('id', '=', $path_parts[count($path_parts)-1] )->first();
    @endphp
    <div class="container-cms">
        <form action="{{ route('wijzigProduct') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
            <input type="hidden" name="id" value="{{ $product->id}}" />
            <br> <br>
            Productnaam: <br>
            <input type="text" name="product_name" value="{{ $product->product_name }}" required> <br> <br>
            Afbeelding:
            <input type="file" accept=".jpeg, .jpg, .png" name="image" value="{{ $product->image }}"> <br>
            Omschrijving: <br>
            <textarea rows="5" cols="60" name="description" required>{{ $product->description }} </textarea> <br>
            Prijs: <br>
            <input type="number" step="any" name="price" min="0" value="{{ $product->price }}" required>  <br>
            Subcategorie: <br>
            @php
                $subcategories = App\Subcategory::all();
            @endphp
            <select name="subcategory" required>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" name="subcategory">{{ $subcategory->subcategory_name }}</option>
                @endforeach
            </select><br><br>
            <br>
            <input class="btn btn-primary" type="submit" value="Wijzigen"/>
        </form>
    </div>
</body>
</html>