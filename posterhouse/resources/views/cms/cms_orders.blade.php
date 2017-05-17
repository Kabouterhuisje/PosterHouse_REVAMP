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
    @include('layouts.cms_navigation', array('currentPage'=>'orders'))
    <div class="container-cms">

        <h2><b>Producten overzicht</b></h2>
        <br>

        <!-- orders -->
        @php
            $orders = App\Order::all();
            $users = App\User::all();
            $controller = new \App\Http\Controllers\OrderController();
        @endphp

        <table id="table-style">
            <tr id="table-row-style">
                <th id="table-header-style">ID</th>
                <th id="table-header-style">Totaalprijs</th>
                <th id="table-header-style">Datum</th>
                <th id="table-header-style">User</th>
                <th></th>
            </tr>
            @foreach ($orders as $order)
                <tr id="table-row-style">
                    <td id="table-data-style"> {{ $order->id }}</td>
                    <td id="table-data-style"> {{ $order->total_price }}</td>
                    <td id="table-data-style"> {{ $order->date_created }}</td>
                    @foreach($users as $user)
                        @if($user->id == $order->id)
                            <td id="table-data-style"> {{ $user->name }}</td>
                        @endif
                    @endforeach
                    <td><form action="verwijderOrder/{{$order->id}}"><input type="submit" class="btn btn-danger" value="Verwijderen"/></form></td>
                </tr>
            @endforeach
        </table>
    </div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>