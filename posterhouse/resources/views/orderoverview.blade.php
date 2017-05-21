<!DOCTYPE html>
<html>
<head>
    <title>Order Overview</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container"><br /><br /><br /><br />
    <div class="jumbotron">
        <h1>Bedankt voor je bestelling!</h1>
        <p>Hieronder vind je een overzicht van uw bestelling.<br />
            Heeft u klachten over uw bestelling of bent u niet tevreden met het resultaat?<br />
            Neem dan contact op met onze deskundige door naar de contactpagina te gaan.
        </p>
    </div>
    <h2>Overzicht van uw bestelling:</h2>
    <table class="table table-bordered">
        <tr>
            <th width="40%">Productnaam</th>
            <th width="10%">Aantal</th>
            <th width="20%">Prijs</th>
            <th width="15%">Totaal</th>
        </tr>
        <?php $total = 0 ?>
        @foreach (session('shopping_cart') as $key => $obj)
            <tr>
                <td>{{ $obj[0] }}</td>
                <td>{{ $obj[2] }}</td>
                <td>{{ $obj[1] }}</td>
                <td>{{ $obj[2] * $obj[1] }}</td>
            </tr>
            <?php $total = $total + ($obj[2] * $obj[1]) ?>
        @endforeach
        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right">€ {{ number_format($total, 2) }}</td>
        </tr>
    </table><br />
    <form method="post" action="{{ route('insertOrder') }}">
        <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
        <input type="hidden" name="totalPrice" value=" {{ number_format($total, 2) }} ">
        <input type='submit' name='closeOveriew' style='margin-top:5px;' class='btn btn-success' value='Klik hier om door te gaan' />
    </form>
</div>
</body>
</html>