<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alerta!</title>
</head>
<body>
    <h1>Sr. Admin</h1>
    <p>Hay un pedido listos para subastar de : {{ $nombre }}</p>
    <p>recuerda realizar este proceso desde la App de escritorio</p>
    <br><br>
    <h3>Cliente</h3>
    <h4>Nombre: {{ $nombre }}</h4>
    <h4>Email: {{ $email }}</h4>
    <h4>Teléfono: {{ $telefono }}</h4>
    <br><br>
    <h1>Productor</h1>
    <h4>Nombre: {{ $nombre_p }}</h4>
    <h4>Email: {{ $email_p }}</h4>
    <br>
    <h3>Producto</h3>
    <h4>Nombre: {{ $producto_p }}</h4>
    <h4>Cantidad: {{ $cantidad_p }}kg</h4>
    <br>
    MAIPO GRANDE 
</body>
</html>