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
    @include('layouts.cms_navigation', array('currentPage'=>'products'))
    <div class="container-cms">
        <h2><b>Producten overzicht</b></h2>
        <!--CONTENT IN HERE-->
        <!-- Knop om nieuwe producten aan te maken -->
        <br>
        <button type="button" class="btn btn-primary"  onclick="window.location='{{URL::route('newProduct')}}'">Nieuw Product</button>
        <br>
        <!-- producten -->
        @php
            $products = App\Product::all();
            $product_has_subcategory = App\Product_has_subcategory::all();
            $subcategories = App\Subcategory::all();
            $controller = new \App\Http\Controllers\ProductController();
        @endphp
        <table id="table-style">
            <tr id="table-row-style">
                <th id="table-header-style">ID</th>
                <th id="table-header-style">Productnaam</th>
                <th id="table-header-style">Prijs</th>
                <th id="table-header-style">Beschrijving</th>
                <th id="table-header-style">Afbeelding</th>
                <th id="table-header-style">Subcategorie</th>
                <th></th>
            </tr>
            @foreach ($products as $product)
                <tr id="table-row-style">
                    <td id="table-data-style"> {{ $product->id }}</td>
                    <td id="table-data-style"> {{ $product->product_name }}</td>
                    <td id="table-data-style"> {{ $product->price }}</td>
                    <td id="table-data-style"> {{ $product->description }}</td>
                    <td id="table-data-style"><img src="{{URL::asset('/images/'.$product->image)}}" height="100px" width="100px"/></td>
                    @foreach($product_has_subcategory as $subcategory_product)
                        @if($subcategory_product->Product_id == $product->id)
                            @foreach($subcategories as $subcategory)
                                @if($subcategory->id == $subcategory_product->Subcategory_id)
                                    <td id="table-data-style"> {{ $subcategory->subcategory_name }}</td>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <td> <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('editProduct', $product->id)}}'">Bewerken</button></td>
                    <td><form action="verwijderProduct/{{$product->id}}"><input type="submit" class="btn btn-danger" value="Verwijderen"/></form></td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    <script>window.location.href = "{{ route('403') }}"</script>
@endif
</body>
</html>