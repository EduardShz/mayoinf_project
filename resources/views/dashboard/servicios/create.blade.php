<!DOCTYPE html>
<html lang="en">
<head>
    <title> .: Añadir Servicios :. </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
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
    <form name="CreateServ" action="{{route('servicios.store')}}" method="POST" id="xCreateServ">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <p>Añadir Servicio</p>
    <div class="maincontainer d-flex justify-content-between">
    <div class="sideA">
        <b>Usuario: </b><input type="hidden" id="idUser" name="usuario" value="{{ old('usuario') }}">
        <input type="text" id="nameUser" name="usuarioname" class="" value="{{ old('usuarioname') }}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchUsuario">Buscar Usuario
        </button>
        <br><br>
        <b>Servicio: </b>
        <select name="tipo_servicio_id" class="select">
            <option value="">Elegir una de las opciones</option>
            @foreach ($tiposervs as $tiposerv)
                <option value="{{ $tiposerv->id }}" {{ old('tipo_servicio_id') == $tiposerv->id ? 'selected' : '' }}>{{ $tiposerv->nombre }}</option>
            @endforeach
        </select>
        <br><br>
        <b>Descripción: </b><input type="text" name="descripcion" class="" value="{{ old('descripcion') }}"><br><br>
        <b>Accesorios: </b><input type="text" name="accesorios" class="" value="{{ old('accesorios') }}"><br><br>
        <b>Fecha de entrada: </b><input type="datetime-local" name="fecha_entrada" class="" value="{{ old('fecha_entrada') }}"><br><br>
        <b>Fecha de salida: </b><input type="datetime-local" name="fecha_salida" class="" value="{{ old('fecha_salida') }}"><br>
    </div>
    <div class="sideB">
        <b>Técnico: </b>
        <select name="tecnico" class="select">
            <option value="0"%>Elegir una de las opciones</option>
            @foreach ($tecnicos as $tecnico)
                @php
                    $name = $tecnico->nombre . " " . $tecnico->paterno . " " .
                    $tecnico->materno;
                @endphp
                <option value="{{ $tecnico->id }}" {{ old('tecnico') == $tecnico->id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
          </select>
        <br><br>
        <b>Es trabajo para empresa del usuario: </b>
            <div class="form-outline form-white mb-4 d-flex justify-content-left">
                <div class="form-check form-check-inline d-flex justify-content-left">
                    <input class="form-check-input" type="radio" name="es_empresa" id="es_empresa_si"
                    value="0" {{ old('es_empresa') == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="es_empresa_si">Si</label>
                </div>

                <div class="form-check form-check-inline d-flex justify-content-left">
                    <input class="form-check-input" type="radio" name="es_empresa" id="es_empresa_no"
                    value="1" {{ old('es_empresa') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="es_empresa_no">No</label>
                </div>
            </div>
        <b>Observaciones: </b><input type="text" name="observaciones" class="" value="{{ old('observaciones') }}"><br><br>
        <b>Estado del Servicio: </b>
        <select name="tipo_estado_id" class="select">
            <option value="0"%>Elegir una de las opciones</option>
            @foreach ($tipoestados as $tipoestado)
                <option value="{{$tipoestado->id}}" {{ old('tipo_estado_id') == $tipoestado->id ? 'selected' : '' }}>{{$tipoestado->nombre}}</option>
            @endforeach
          </select>&nbsp;&nbsp;
    </div>
    </div>
    <br><br>
    <b>Unidad</b>&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchUnidad">Buscar Unidad
    </button>
    <br><br>
    <b>Tipo de Unidad: </b><input type="hidden" id="idUnidad" name="unidade_id">
        <input type="text" id="tipoUnidad" name="unidadtipo" class="" readonly>
    <br><br>
    <b>Marca: </b><input type="text" id="marcaUnidad" name="unidadmarca" class="" readonly><br><br>
    <b>Modelo: </b><input type="text" id="modeloUnidad" name="unidadmodelo" class="" readonly><br><br>
    <b>Número de Serie: </b><input type="text" id="noserieUnidad" name="unidadnoserie" class="" readonly><br><br>
    <b>Descripción: </b><input type="text" id="descripcionUnidad" name="unidaddescripcion" class="" readonly><br><br>
    <b>Responsable/Dueño: </b><input type="text" id="responsableUnidad" name="unidadresponsable" class="" readonly><br><br>
    <div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form>
    
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
<script>
    function usersubmit(user, id) {
        document.getElementById("nameUser").value = user;
        document.getElementById("idUser").value = id;

        localStorage.setItem('usuario', id);
        localStorage.setItem('usuarioname', user);
    }

    function unitsubmit(tipo,marca,modelo,noserie,descripcion,responsable,id) {
        document.getElementById("tipoUnidad").value = tipo;
        document.getElementById("marcaUnidad").value = marca;
        document.getElementById("modeloUnidad").value = modelo;
        document.getElementById("noserieUnidad").value = noserie;
        document.getElementById("descripcionUnidad").value = descripcion;
        document.getElementById("responsableUnidad").value = responsable;
        document.getElementById("idUnidad").value = id;

        localStorage.setItem('unidadtipo', tipo);
        localStorage.setItem('unidadmarca', marca);
        localStorage.setItem('unidadmodelo', modelo);
        localStorage.setItem('unidadnoserie', noserie);
        localStorage.setItem('unidaddescripcion', descripcion);
        localStorage.setItem('unidadresponsable', responsable);
        localStorage.setItem('unidade_id', id);
    }
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('searchUsuario')) {
        var miModalFiltros = new bootstrap.Modal(document.getElementById('searchUsuario'));
        miModalFiltros.show();
        localStorage.removeItem('searchUsuario');
    }

    document.getElementById('userQsearch1').addEventListener('click', function () {
        localStorage.setItem('searchUsuario', 'true');
    });
    document.getElementById('userQsearch2').addEventListener('click', function () {
        localStorage.setItem('searchUsuario', 'true');
    });
    document.getElementById('userQsearch3').addEventListener('click', function () {
        localStorage.setItem('searchUsuario', 'true');
    });
    document.getElementById('userQsearch4').addEventListener('click', function () {
        localStorage.setItem('searchUsuario', 'true');
    });
    document.getElementById('userPagination').addEventListener('click', function () {
        localStorage.setItem('searchUsuario', 'true');
    });
    document.getElementById('userResetSearchBtn').addEventListener('click', function () {
        localStorage.setItem('searchUsuario', 'true');
    });
});

document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('searchUnidad')) {
            var miModal2 = new bootstrap.Modal(document.getElementById('searchUnidad'));
            miModal2.show();
            localStorage.removeItem('searchUnidad');
        }
    
        document.getElementById('unitQsearch1').addEventListener('click', function () {
            localStorage.setItem('searchUnidad', 'true');
        });
        document.getElementById('unitQsearch2').addEventListener('click', function () {
            localStorage.setItem('searchUnidad', 'true');
        });
        document.getElementById('unitQsearch3').addEventListener('click', function () {
            localStorage.setItem('searchUnidad', 'true');
        });
        document.getElementById('unitQsearch4').addEventListener('click', function () {
            localStorage.setItem('searchUnidad', 'true');
        });
        document.getElementById('unitQsearch5').addEventListener('click', function () {
            localStorage.setItem('searchUnidad', 'true');
        });
        document.getElementById('unitPagination').addEventListener('click', function () {
            localStorage.setItem('searchUnidad', 'true');
        });
        document.getElementById('unitResetSearchBtn').addEventListener('click', function () {
            localStorage.setItem('searchUnidad', 'true');
    });
    });

    document.addEventListener('DOMContentLoaded', function() {

    const form = document.querySelector('#xCreateServ');
    if (form) {
        const formElements = document.querySelectorAll('#xCreateServ input, #xCreateServ select');
        formElements.forEach(element => {
            if (element.type !== 'radio') {
                element.addEventListener('change', () => {
                    localStorage.setItem(element.name, element.value);
                });

                if (localStorage.getItem(element.name)) {
                    element.value = localStorage.getItem(element.name);
                }
            } else {
                if (element.checked) {
                    localStorage.setItem(element.name, element.value);
                }
                element.addEventListener('change', () => {
                    if (element.checked) {
                        localStorage.setItem(element.name, element.value);
                    }
                });
            }
        });

        const radioElements = document.querySelectorAll('#xCreateServ input[type="radio"]');
        radioElements.forEach(radio => {
            if (localStorage.getItem(radio.name) === radio.value) {
                radio.checked = true;
            }
        });

        form.addEventListener('submit', () => {
            formElements.forEach(element => {
                localStorage.removeItem(element.name);
            });
        });
    }
});
</script>
</body>
</html> 
@include('dashboard.servicios.ModalUsuario')
@include('dashboard.servicios.ModalUnidad')