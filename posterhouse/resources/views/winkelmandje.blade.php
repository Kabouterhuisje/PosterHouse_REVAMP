<!DOCTYPE html>
<html>
<head>
    <title>Winkelmandje</title>
</head>
<body>
@include('layouts.header', array('title'=>'Home'))
<br /><br /><br />
<div class="container" style="width:700px;">
    <h3>Order Details</h3>
    <form method='post' action="{{ route('continuePurchase') }}">
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Productnaam</th>
                <th width="10%">Aantal</th>
                <th width="20%">Prijs</th>
                <th width="15%">Totaal</th>
                <th width="5%">Actie</th>
            </tr>
                @foreach (session('shopping_cart') as $key => $obj)
                    <tr>
                        <td>{{ $obj[0] }}</td>
                        <td><input type="number" name="quantity" min="1" value="{{ $obj[2] }}"></td>
                        <td>{{ $obj[1] }}</td>
                        <td>{{ $obj[2] * $obj[1] }}</td>
                        <td><a href="{{ route('flushItem', $key) }}"><span class="text-danger">Remove</span></a></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right"></td>
                    <td></td>
                </tr>

        </table>
    </div>
    <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
    <input type='submit' name='checkout' style='margin-top:5px;' class='btn btn-success' value='Afrekenen' />
    <input type='submit' name='verder' style='margin-top:5px;' class='btn btn-primary' value='Verder winkelen' />
    </form>
    <br /><b><p style='color: red'>Wij maken gebruik van de gegevens die u heeft opgeslagen in uw account. <br /> Controleer voordat u een bestelling plaatst of deze gegevens nog kloppen!</p></b>
</div>
<br />
@include('layouts.footer')
</body>
</html>