<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Main Menu :.</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{asset('assets/glider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/HomeStyleSheet.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Carrusel.css')}}">
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
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
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
    @if (Auth::user()->sexo == 0)
      <p class="MainTitle">Bienvenido, {{ Auth::user()->name }}</p>
    @else
      <p class="MainTitle">Bienvenida, {{ Auth::user()->name }}</p>
    @endif

    <p class="MainSubTitle">Últimos Servicios Finalizados</p>
    <div class="carousel">
     <div class="carousel__contenedor">
       <button type="button" aria-label="Anterior" class="carousel__anterior">
         <i class="fas fa-chevron-left"></i>
       </button>
       <div class="carousel__lista">
       
        @foreach ($servicios as $servicio)

           <div class="carousel__elemento">
                <img src="{{asset('images/LogoMayo.png')}}" alt="">
           <div class="carousel__ele-inside">
 
             <div class="carousel__ele-insideA">
              @php
                $Usuario_name = $servicio->usuariodata->nombre . " " . $servicio->usuariodata->paterno . " " .
                $servicio->usuariodata->materno;
              @endphp
              
             <b>Usuario: </b><font>{{$Usuario_name}}</font><br><br>

             @if ($servicio->es_empresa==1)
              <b>Trabajo a: </b><font>{{$servicio->usuariodata->empresa->nombre}}</font><br><br>
             @else
              <b>Trabajo a: </b><font>Usuario</font><br><br>
             @endif

             @php
                $Tecnico_name = $servicio->tecnicodata->nombre . " " . $servicio->tecnicodata->paterno . " " .
                $servicio->tecnicodata->materno;

                $Equipo_name = $servicio->unidades->tipounit->nombre . " " . $servicio->unidades->marcas->nombre . " " . 
                $servicio->unidades->modelo;
             @endphp

             <b>Técnico: </b><font>{{$Tecnico_name}}</font><br><br>
             <b>Equipo: </b><font>{{$Equipo_name}}</font><br><br>
             <b>Servicio: </b><font>{{$servicio->tiposerv->nombre}}</font><br><br>
             <b>Fecha de Entrada: </b><font>{{$servicio->short_entrada_format}}</font><br><br>
             <b>Fecha de Salida: </b><font>{{$servicio->short_salida_format}}</font>
             </div>
 
             <div class="carousel__ele-insideB">
                 <b>#{{$servicio->id}}</b><br><br><br><br><br><br><br><br><br><br>
                 <a class="btn-1" href="{{route('servicios.show', $servicio->id)}}"> Saber más </a>
             </div>
           </div>
         </div>
        @endforeach
       </div>
       <button type="button" aria-label="Siguiente" class="carousel__siguiente">
         <i class="fas fa-chevron-right"></i>
       </button>
     </div>
     <div role="tablist" class="carousel__indicadores"></div>
   </div>

   <p class="MainSubTitle">Últimos Servicios Iniciados</p>
    <div class="carousel">
     <div class="carousel__contenedor">
       <button type="button" aria-label="Anterior" class="carousel__anterior2">
         <i class="fas fa-chevron-left"></i>
       </button>
       <div class="carousel__lista2">
       
        @foreach ($iniservis as $iniserv)

           <div class="carousel__elemento2">
                <img src="{{asset('images/LogoMayo.png')}}" alt="">
           <div class="carousel__ele-inside">
 
             <div class="carousel__ele-insideA">
              @php
                $Usuario_name = $iniserv->usuariodata->nombre . " " . $iniserv->usuariodata->paterno . " " .
                $iniserv->usuariodata->materno;
              @endphp
              
             <b>Usuario: </b><font>{{$Usuario_name}}</font><br><br>

             @if ($iniserv->es_empresa==1)
              <b>Trabajo a: </b><font>{{$iniserv->usuariodata->empresa->nombre}}</font><br><br>
             @else
              <b>Trabajo a: </b><font>Usuario</font><br><br>
             @endif

             @php
                $Tecnico_name = $iniserv->tecnicodata->nombre . " " . $iniserv->tecnicodata->paterno . " " .
                $iniserv->tecnicodata->materno;

                $Equipo_name = $iniserv->unidades->tipounit->nombre . " " . $iniserv->unidades->marcas->nombre . " " . 
                $iniserv->unidades->modelo;
             @endphp

             <b>Técnico: </b><font>{{$Tecnico_name}}</font><br><br>
             <b>Equipo: </b><font>{{$Equipo_name}}</font><br><br>
             <b>Servicio: </b><font>{{$iniserv->tiposerv->nombre}}</font><br><br>
             <b>Fecha de Entrada: </b><font>{{$iniserv->short_entrada_format}}</font>
             </div>
 
             <div class="carousel__ele-insideB">
                 <b>#{{$iniserv->id}}</b><br><br><br><br><br><br><br><br><br>
                 <a class="btn-1" href="{{route('servicios.show', $iniserv->id)}}"> Saber más </a>
             </div>
           </div>
         </div>
        @endforeach
       </div>
       <button type="button" aria-label="Siguiente" class="carousel__siguiente2">
         <i class="fas fa-chevron-right"></i>
       </button>
     </div>
     <div role="tablist" class="carousel__indicadores2"></div>
   </div>

  <script src="{{asset('js/glider.min.js')}}"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="{{asset('js/carrusel.js')}}"></script>	
</body>
</html>