<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> .: Datos Servicios :. </title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('assets/HeaderBootstrap.css')}}">
</head>
<header>
    <nav class="top">
        <img src="{{asset('images/LogoMayo.png')}}" alt="">
        <a href="{{route('home')}}">Inicio</a>
            <a href="{{route('servicios.index')}}">Servicios</a>
            <a href="#">Unidades</a>
            <a href="#">Personas</a>
            <a href="#">Empresas</a>
    </nav>
    
    <nav class="bottom">
        <div aria-labelledby="navbarDropdown">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesión') }}
            </a>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>
</header>
<body>
    @php
        $Usuario_name = $servicios->usuariodata->nombre . " " . $servicios->usuariodata->paterno . " " .
        $servicios->usuariodata->materno;

        $Tecnico_name = $servicios->tecnicodata->nombre . " " . $servicios->tecnicodata->paterno . " " .
        $servicios->tecnicodata->materno;

        $Equipo_name = $servicios->unidades->tipounit->nombre . " " . $servicios->unidades->marcas->nombre . " " . 
        $servicios->unidades->modelo;
    @endphp
    <table align="center" width="95%" cellpadding="4" cellspacing="0">
        <tr>
            <td><a class="btn btn-outline-danger" href="{{route('servicios.showpdf',$servicios->id)}}" target="_blank">Imprimir Reporte PDF</a></td>
        </tr>
    </table>
    <br>
    <div class="maincontainer d-flex justify-content-between">
        <div class="sideA">
            <b>Servicio</b><br><br>
            <b>Folio {{$servicios->id}}</b><br><br>
            <b>Usuario: </b><font>{{$Usuario_name}}</font><br><br>
            <b>Técnico: </b><font>{{$Tecnico_name}}</font><br><br>
            <b>Servicio:</b><font>{{$servicios->tiposerv->nombre}}</font><br><br>
            @if ($servicios->es_empresa==1)
                <b>Trabajo a: </b><font>{{$servicios->usuariodata->empresa->nombre}}</font><br><br>
            @else
                <b>Trabajo a: </b><font>Usuario</font><br><br>
            @endif
            <b>Fecha de entrada: </b><font>{{$servicios->long_entrada_format}}</font><br><br>
            <b>Estado del Servicio: </b><font>{{$servicios->tipostate->nombre}}</font><br><br>
            @if ($servicios->fecha_salida==null)
                <b>Fecha de Salida: </b><font>En trabajo</font><br><br>
            @else
                <b>Fecha de Salida: </b><font>{{$servicios->long_salida_format}}</font><br><br>
            @endif
        </div>
        <div class="sideB">
            @php
                $responsable = $servicios->unidades->responsable->nombre . " " . $servicios->unidades->responsable->paterno . " " .
                $servicios->unidades->responsable->materno;
            @endphp
                <b>Unidad</b><br><br><br><br>
                <b>Tipo de Unidad: </b><font>{{$servicios->unidades->tipounit->nombre}}</font><br><br>
                <b>Marca: </b><font>{{$servicios->unidades->marcas->nombre}}</font><br><br>
                <b>Modelo: </b><font>{{$servicios->unidades->modelo}}</font><br><br>
                <b>Número de Serie: </b><font>{{$servicios->unidades->no_serie}}</font><br><br>
                <b>Descripción: </b><font>{{$servicios->unidades->descripcion}}</font><br><br>
                <b>Responsable/Dueño: </b><font>{{$responsable}}</font><br><br>
        </div>
    </div>
    
    @if ($serviciosAdd->isEmpty())
        
    @else
    <br><b>Servicios Adicionales</b><br><br>
    @foreach ($serviciosAdd as $servicioAdd)
        @php
            $count = 1; 
        @endphp
        <b>Servicio Adicional {{$count}}</b><br><br>
        <b>Descripción: </b><font>{{$servicioAdd->descripcion}}</font><br><br>
        <b>Observaciones: </b><font>{{$servicioAdd->observaciones}}</font><br><br>
        <b>Fecha de Trabajo: </b><font>{{$servicioAdd->long_trabajo_format}}</font><br><br>
    @endforeach
        
    @endif
    <!-- Bootstrap JavaScript Libraries -->
    <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
  ></script>
  
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"
  ></script>
</body>
</html> 