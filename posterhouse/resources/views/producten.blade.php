<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Producten</title>
</head>
<body style="padding-bottom: 167px;">

@include('layouts.header', array('title'=>'Home'))

<!-- sidemenu -->
<div class="row" style="margin-top:5%;">
    <div class="col-sm-3">
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1" style="text-align:left; overflow:hidden;">
            <h4>Filter op categorie</h4>
            <ul class="nav navbar-nav">
                <div class="col-lg">
                    @foreach ($categories as $category)
                        <form action='producten.php' method='get'>
                            <li><a href='?category={{ $category->category_name }}'>{{ $category->category_name }}</a></li>
                        </form>
                        @foreach ($subcategories as $subcategory)
                            @if ($subcategory->Category_id == $category->id)
                                <form action='producten.php' method='get'>
                                    <li style='margin-left:10%'><a href='?subcategory={{ $subcategory->subcategory_name }}'>{{ $subcategory->subcategory_name }}</a></li>
                                </form>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </ul>
        </div>
    </div>

    <!-- artikelen -->
    <div class="col-sm-6" style="margin-bottom:2%; text-align:center;">
        <h2>Artikelen</h2>
        @foreach ($products as $product)
            <div class='col-xs-6 col-md-3' align='center'>
                <img src='{{ URL::to('/') }}/images/posters/{{ $product->image }}' height='250' width='180'/>
                <p>€{{ $product->price }}</p>
                <a href="{{ route('productdetails', $product) }}">{{ $product->product_name }}</a>
            </div>
        @endforeach
    </div>
</div>

<!-- Paginering -->
<div class="fixed-bottom">
    <div class="container center">
        {!! $products->links() !!}
    </div>
</div>

@include('layouts.footer')

</body>
</html>