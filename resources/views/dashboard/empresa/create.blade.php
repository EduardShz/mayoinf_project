<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> .: Subir Empresa :. </title>
</head>
<body>
    <h1>Subir Empresa</h1>

    <form action="{{ route('empresa.store') }}" method="post">
        @csrf

        <label for="">Nombre</label>
        <input type="text" name="nombre">
        <br>
        
        <button type="submit">Enviar</button>
        
    </form>
</body>
</html> 