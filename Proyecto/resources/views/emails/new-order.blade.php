<!DOCTYPE html>
<html>

<head>
<title>Nuevo Pedido</title>

</head>

<body>

    <p>Se ha realizado un nuevo pedido!</p>
    <p>estos son los datos su  pedido:</p>

    <ul>
        <li>
            <strong>Nombre:</strong>
            {{$user->name}}
        </li>
        <li>
            <strong>E-mail:</strong>
            {{$user->email}}
        </li>
        <li>
            <strong>Fecha del pedido: </strong>
            {{$cart->order_date}}
        </li>
    </ul>
    <hr>


    <p>Detalles del pedido</p>
    <ul>
        @foreach ($cart->details as $detail)
        <li>

            {{$detail->product->name}} x{{$detail->quantity}}
            (${{$detail->quantity *$detail->product ->price}})

        </li>
        @endforeach
    </ul>
    <p>
        <strong>Importe a pagar:</strong> {{$cart->total}}
    </p>
    <hr>
    <p>
    <a href="{{url('/admin/orders/'.$cart->id)}}">Haz click aquí</a>
        para ver más información sobre este pedido.
    </p>


    <img src="data:image/png;base64, {!! base64_encode(\QrCode::format('png')->size(100)->generate('producto-'.$cart->id)) !!} ">


</body>

</html>
