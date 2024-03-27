<form action="{{route('servicios.create')}}" id="userForm" method="GET" enctype="multipart/form-data">
<div class="modal fade" id="searchUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Personas</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table align="center" width="95%" cellpadding="4" cellspacing="0">
          <tr align="center">
              <td colspan="5" class="titulo"> Listado de Personas </td>
          </tr>
        </table>
        <table align="center" width="95%" cellpadding="4" cellspacing="0">
          <tr align="center">
            <td width="5%" class=""> 
              <a type="button" id="userResetSearchBtn" href="{{route('servicios.create')}}" class="btn btn-secondary">Borrar Filtros</a>
            </td>
            <td width="18%" class=""> 
              <input type="text" id="xNombre" name="nombre" class="form-control" placeholder="Nombre" value="{{request('nombre')}}"><input type="submit" id="userQsearch1" value="Buscar" class="btn btn-primary">
            </td>
            <td width="18%" class=""> 
              <input type="text" id="xTelefono" name="telefono" class="form-control" placeholder="Telefono" value="{{request('telefono')}}"><input type="submit" id="userQsearch2" value="Buscar" class="btn btn-primary">
            </td>
            <td width="18%"  class="">
              <input type="text" id="xCorreo" name="correo" class="form-control" placeholder="Correo" value="{{request('correo')}}"><input type="submit" id="userQsearch3" value="Buscar" class="btn btn-primary">
            </td>
            <td width="18%" class="">
              <input type="text" id="xEmpresa" name="empresa" class="form-control" placeholder="Empresa" value="{{request('empresa')}}"><input type="submit" id="userQsearch4" value="Buscar" class="btn btn-primary">
            </td>
        </tr>
        </table>
        <table align="center" width="95%" cellpadding="4" cellspacing="0">
          <tr align="center">
              <td class="celdaEncabezado"> &nbsp; </td>
              <td class="celdaEncabezado"> Nombre </td>
              <td class="celdaEncabezado"> Teléfono </td>
              <td class="celdaEncabezado"> Correo </td>
              <td class="celdaEncabezado"> Empresa </td>
              <td class="celdaEncabezado"> Tipo </td>
          </tr>
          @foreach ($personas as $persona)
          @php
              $name = $persona->nombre . " " . $persona->paterno . " " .
              $persona->materno;
          @endphp
          <tr align="center">
              <td align="center"><input type="button" id="usubmit" value="q" class="btn btn-primary" data-bs-dismiss="modal" onclick="usersubmit('{{$name}}','{{$persona->id}}')"></td>
              <td align="center">{{$name}}</td>
              <td align="center">{{$persona->telefono}}</td>
              <td align="center">{{$persona->correo}}</td>
              <td align="center">{{$persona->empresa->nombre}}</td>
              <td align="center">{{$persona->tipopers->nombre}}</td>
          </tr>
          @endforeach
        </table>
        <table align="center" width="95%" cellpadding="4" cellspacing="0">
          <tr class="d-flex justify-content-center">
            <td colspan="5" id="userPagination">{{$personas->appends([
              'nombre' => $nombre,
              'telefono' => $telefono,
              'correo' => $correo,
              'empresa' => $empresa,
              'page_unit' => $unidades->currentPage()])
              ->links()}}</td>
          </tr>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</form>