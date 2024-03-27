<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> .: Subir Unidades :. </title>
</head>
<body>
    <h1>Subir Unidades</h1>

    <form action="{{ route('unidades.store') }}" method="post">
        @csrf

        <label for="">Descripción</label>
        <input type="text" name="descripcion">
        <br>
        <button type="submit">Enviar</button>
        
    </form>
</body>
</html> 