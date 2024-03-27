<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte De Servicio {{$servicios->id}}</title>
    <link rel="stylesheet" href="{{public_path('assets/pdfclass.css')}}">
</head>
<style>
    .container_img{
        background-image:url('C:\xampp\htdocs\mayoinf-project\public\images\LogoMayoBlur.jpg');
    }
</style>
<body>
    <div id="header">
        @php
            $Usuario_name = $servicios->usuariodata->nombre . " " . $servicios->usuariodata->paterno . " " .
            $servicios->usuariodata->materno;
        
            $Tecnico_name = $servicios->tecnicodata->nombre . " " . $servicios->tecnicodata->paterno . " " .
            $servicios->tecnicodata->materno;
        
            $Equipo_name = $servicios->unidades->tipounit->nombre . " " . $servicios->unidades->marcas->nombre . " " . 
            $servicios->unidades->modelo;
        @endphp
        <div class="header__topside">

            <img class="header__topside_img" src="{{public_path('images/LogoMayo.jpg')}}">
            <div class="header__topsideB">
                <p class="header__topside_titulo">FORMATO DE ENTREGA DE TRABAJO</p>
                <p class="header__topside_folio"> {{$servicios->id}} </p>
            </div>
            
            <br><br><br><br>
            <div class="header__topsideC">
                <font class="header__topside_fecha">Fecha: <font style="color: black">{{$servicios->short_salida_format}}</font></font><br>
                <font class="header__topside_hora" style="color: rgb(8, 22, 150)">Hora: <font style="color: black">{{$servicios->fecha_salida_12h}}</font></font>
            </div>
        </div>
        <div class="header__midside">
            <div class="header__midsideA">
                <p>Recibe (NOMBRE): <font class="header__midsideA_user" style="color: black">{{$Usuario_name}}</font></p>
                @if ($servicios->es_empresa==1)
                    <p>Empresa: <font class="header__midsideA_emp" style="color: black">{{$servicios->usuariodata->empresa->nombre}}</font></p>
                @else
                    <p>Empresa: <font class="header__midsideA_emp" style="color: black">Trabajo al usuario</font></p>
                @endif
                <p>Dirección: <font class="header__midsideA_address" style="color: black">{{$servicios->usuariodata->empresa->direccion}}</font></p>
            </div>
            <div class="header__midsideB">
                @if ($servicios->es_empresa==1)
                    <p class="header__midsideB_rfc">RFC: <font style="color: black">{{$servicios->usuariodata->empresa->rfc}}</font></p>
                    <p class="header__midsideB_area">Área: <font style="color: black">{{$servicios->usuariodata->empresa->e_area}}</font></p>
                    <p class="header__midsideB_tel">Teléfono: <font style="color: black">{{$servicios->usuariodata->empresa->telefono}}</font></p>
                    <p class="header__midsideB_mail">Correo: <font style="color: black">{{$servicios->usuariodata->empresa->correo}}</font></p>
                @else
                    <p class="header__midsideB_rfc">RFC: </p>
                    <p class="header__midsideB_area">Área: </p>
                    <p class="header__midsideB_tel">Teléfono: <font style="color: black">{{$servicios->usuariodata->telefono}}</font></p>
                    <p class="header__midsideB_mail">Correo: <font style="color: black">{{$servicios->usuariodata->correo}}</font></p>
                @endif
            </div>
        </div>
        <div class="header__botside">
            <font class="header__botside_tipo-A">Tipo de </font><br>
            <font class="header__botside_tipo-B">Servicios: <font class="header__botside_tipo-C" style="color: black">{{$servicios->tiposerv->nombre}}</font></font>
        </div>
    </div>

    <div id="footer">
        <div class="footer__sideA">
            <div class="footer__sideA-A">
                <p class="footer__sideA_title">AVISO DE CONFORMIDAD</p><br>
            </div>
            <div class="footer__sideA-B">
                <p class="footer__sideA-B_disclaimer">Personal de la Empresa MAYO INFORMÁTICA realiza la entrega de los trabajos solicitados conforme a lo cotizado. La firma de las 
                    partes conviene que los trabajos realizados son de entera satisfacción del solicitante, para lo cual firma de conformidad y visto bueno de la entrega del mismo.
                </p><br><br>
            </div>
        </div>
        <div class="footer__sideB">
            <p class="footer__sideB_contact">Marcelino García Barragán No. 134 Alto Col. Guadalupe Borja</p><br>
            <p class="footer__sideB_contact">Tel: 993 350 0585&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;www.mayoinformatica.com.mx</p>
        </div>
    </div>

    <div id="container">
        <div class="container_img">
        </div>
        <div class="container__blockA">
            <div class="container__blockA-A">
                <p class="container__blockA_title">DESCRIPCIÓN</p><br>
            </div>
            <div class="container__blockA-B">
                <p class="container__blockA-B_text">
                    {{$servicios->descripcion}}
                </p>
            </div>
        </div>
        <div class="container__blockA">
            <div class="container__blockA-A">
                <p class="container__blockA_title">OBSERVACIONES</p><br>
            </div>
            <div class="container__blockA-B">
                <p class="container__blockA-B_text">
                    {{$servicios->observaciones}}
                </p>
            </div>
        </div>
        <div class="container__blockC">
                <div class="container__blockC-A">
                    <br><br><br>
                    <p class="container__blockA-B_textA">
                        Firma de conformidad quien recibe
                    </p>
                </div>
                <div class="container__blockC-B">
                    <br><br><br>
                    <p class="container__blockA-B_textB">
                        Firma de quien entrega
                    </p><br>
                    <p class="container__blockA-B_textC">
                        {{$Tecnico_name}}
                    </p><
                </div>
        </div>
    </div>

</body>
</html>