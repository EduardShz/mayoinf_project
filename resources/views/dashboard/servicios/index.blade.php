<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> .: Servicios :. </title><link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
    />
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
    <table align="center" width="95%" cellpadding="4" cellspacing="0">
        <tr>
            <td><a class="btn btn-primary" href="{{route('servicios.create')}}">Añadir Servicio</a></td>
        </tr>
    </table>
    <table align="center" width="95%" cellpadding="4" cellspacing="0">
    <tr align="center">
        <td colspan="11" class="titulo"> Listado de Servicios </td>
    </tr>
    <tr align="center">
        <td class="celdaEncabezado"> &nbsp; </td>
        <td class="celdaEncabezado"> Folio </td>
        <td class="celdaEncabezado"> Usuario </td>
        <td class="celdaEncabezado"> Técnico </td>
        <td class="celdaEncabezado"> Servicio </td>
        <td class="celdaEncabezado"> Unidad </td>
        <td class="celdaEncabezado"> Trabajo a </td>
        <td class="celdaEncabezado"> Fecha Entrada </td>
        <td class="celdaEncabezado"> Fecha Salida </td>
        <td class="celdaEncabezado"> &nbsp; </td>
        <td class="celdaEncabezado"> &nbsp; </td>
    </tr>
    @foreach ($servicios as $servicio)
    @php
        $Usuario_name = $servicio->usuariodata->nombre . " " . $servicio->usuariodata->paterno . " " .
        $servicio->usuariodata->materno;

        $Tecnico_name = $servicio->tecnicodata->nombre . " " . $servicio->tecnicodata->paterno . " " .
        $servicio->tecnicodata->materno;

        $Equipo_name = $servicio->unidades->tipounit->nombre . " " . $servicio->unidades->marcas->nombre . " " . 
        $servicio->unidades->modelo;
    @endphp
    <tr align="center">
        <td>
          <a class="btn btn-warning" href="{{route('servicios.edit',$servicio->id)}}">
            E
          </a>
        </td>
        <td class= >{{$servicio->id}}</td>
        <td class= >{{$Usuario_name}}</td>
        <td class= >{{$Tecnico_name}}</td>
        <td class= >{{$servicio->tiposerv->nombre}}</td>
        <td class= >{{$Equipo_name}}</td>
        @if ($servicio->es_empresa==1)
            <td class= >{{$servicio->usuariodata->empresa->nombre}}</td>
        @else
            <td class= >Usuario</td>
        @endif
        <td>{{$servicio->fecha_entrada}}</td>
        @if ($servicio->fecha_salida==null)
            <td class= >En trabajo</td>
        @else
            <td class= >{{$servicio->fecha_salida}}</td>
        @endif
        <td>
          <a class="btn btn-secondary" href="{{route('servicios.show',$servicio->id)}}" title="Saber mas"> 
            M
          </a>
        </td>
        <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroyServicio{{$servicio->id}}">D</button>
        </td>
        @include('dashboard.servicios.ModalEliminar')
    </tr>
    @endforeach
    </table>
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