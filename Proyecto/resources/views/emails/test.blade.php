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

        </li>
        <li>
            <strong>E-mail:</strong>

        </li>
        <li>
            <strong>Fecha del pedido: </strong>

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

</body>

</html>


