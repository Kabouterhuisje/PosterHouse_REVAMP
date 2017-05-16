<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Producten</title>
</head>
<body style="padding-bottom: 167px;">

@include('layouts.header', array('title'=>'Home'))

<div class="container-fluid">
    <div class="content-wrapper">
        <div class="item-container">
            <div class="container">
                <div class="col-md-12">
                    <div class="img-responsive center-block" style="margin-top:8%;">
                        <div style="text-align:center">
                            <img id="item-display" src="{{ URL::to('/') }}/images/posters/{{ $product->image }}" height="400" width="250"></img>
                        </div>
                    </div>
                </div>
                <div style="text-align:center;">
                    <form method="post" action="winkelmandje.php?action=add&id=">
                        <input type="hidden" name="hidden_name" value="{{ $product->product_name }}" />
                        <input type="hidden" name="hidden_price" value="{{ $product->price }}" />
                        <p>{{ $product->description }}</p>
                        <div class="btn-group cart">
                            <input required type="number" name="quantity" class="form-control" min="1" value="1" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

</body>
</html>