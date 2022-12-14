<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Felicitaciones</title>
</head>
<body>
    <h1>Felicitaciones!</h1>
    <p></p>
    <p>Fuiste seleccionado para realizar el transporte de:</p>
    <br>
    <h3>Datos de envio</h3>
    <h5>Numero Solicitud: {{ $numero_soli }}</h5>
    <h5>Direccion: {{ $direccion }}</h5>
    <h5>Pais: {{ $pais }}</h5>
    <h5>Ciudad: {{ $ciudad }}</h5>
    <br>
    <h3>Cliente</h3>
    <h5>Nombre: {{ $nombre }}</h5>
    <h5>Email: {{ $email }}</h5>
    <h5>Teléfono: {{ $telefono }}</h5>
    <br>
    <p>Puedes retirar en bodega</p>
</body>
</html>