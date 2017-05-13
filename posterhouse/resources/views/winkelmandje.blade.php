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
    <?php echo "<form method='post'>"; ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Productnaam</th>
                <th width="10%">Aantal</th>
                <th width="20%">Prijs</th>
                <th width="15%">Totaal</th>
                <th width="5%">Actie</th>
            </tr>
            <tr>
                <td>Itemnaam</td>
                <td><input type="number" name="quantity" min="1" value="Aantal"></td>
                <td>$5000</td>
                <td>$5000</td>
                <td><a href="#"><span class="text-danger">Remove</span></a></td>
            </tr>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">$5000</td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
<br />
@include('layouts.footer')
</body>
</html>