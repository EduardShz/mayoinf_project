<form action="{{route('servicios.create')}}" id="userForm" method="GET" enctype="multipart/form-data">
<div class="modal fade" id="searchUnidad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Unidades</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table align="center" width="95%" cellpadding="4" cellspacing="0">
          <tr align="center">
              <td colspan="5" class="titulo"> Listado de Unidades </td>
          </tr>
        </table>
        <table align="center" width="95%" cellpadding="4" cellspacing="0">
          <tr align="center">
            <td width="5%" class=""> 
              <a type="button" id="unitResetSearchBtn" href="{{route('servicios.create')}}" class="btn btn-secondary">Borrar Filtros</a>
            </td>
            <td width="19%" class=""> 
              <input type="text" name="tipo" class="form-control" placeholder="Tipo Ej:Impresora" value="{{request('tipo')}}"><input type="submit" id="unitQsearch1" value="Buscar" class="btn btn-primary">
            </td>
            <td width="19%" class=""> 
              <input type="text" name="marca" class="form-control" placeholder="Marca" value="{{request('marca')}}"><input type="submit" id="unitQsearch2" value="Buscar" class="btn btn-primary">
            </td>
            <td width="19%"  class="">
              <input type="text" name="modelo" class="form-control" placeholder="Modelo" value="{{request('modelo')}}"><input type="submit" id="unitQsearch3" value="Buscar" class="btn btn-primary">
            </td>
            <td width="19%" class="">
              <input type="text" name="no_serieQ" class="form-control" placeholder="No. de Serie" value="{{request('no_serieQ')}}"><input type="submit" id="unitQsearch4" value="Buscar" class="btn btn-primary">
            </td>
            <td width="19%" class="">
              <input type="text" name="responsables" class="form-control" placeholder="Responsable/Dueño" value="{{request('responsables')}}"><input type="submit" id="unitQsearch5" value="Buscar" class="btn btn-primary">
            </td>
        </tr>
        </table>
        <table align="center" width="95%" cellpadding="4" cellspacing="0">
          <tr align="center">
              <td class="celdaEncabezado"> &nbsp; </td>
              <td class="celdaEncabezado"> Tipo </td>
              <td class="celdaEncabezado"> Marca </td>
              <td class="celdaEncabezado"> Modelo </td>
              <td class="celdaEncabezado"> No. de Serie </td>
              <td class="celdaEncabezado"> Descripción </td>
              <td class="celdaEncabezado"> Unidad Empresarial </td>
              <td class="celdaEncabezado"> Estado </td>
              <td class="celdaEncabezado"> Responsable/Dueño </td>
          </tr>
          @foreach ($unidades as $unidad)
          @php
            $responsablesubmit = $unidad->responsable->nombre . " " . $unidad->responsable->paterno . " " .
            $unidad->responsable->materno;
          @endphp
          <tr align="center">
              <a>
              <td align="center"><input type="button" id="usubmit" value="q" class="btn btn-primary" data-bs-dismiss="modal" 
              onclick="unitsubmit('{{$unidad->tipounit->nombre}}','{{$unidad->marcas->nombre}}','{{$unidad->modelo}}','{{$unidad->no_serie}}','{{$unidad->descripcion}}','{{$responsablesubmit}}','{{$unidad->id}}')"></td>
              <td align="center">{{$unidad->tipounit->nombre}}</td>
              <td align="center">{{$unidad->marcas->nombre}}</td>
              <td align="center">{{$unidad->modelo}}</td>
              <td align="center">{{$unidad->no_serie}}</td>
              <td align="center">{{$unidad->descripcion}}</td>
              @if ($unidad->es_empresa==0)
                <td align="center">No</td>
              @else
                <td align="center">Sí</td>
              @endif
              <td align="center">{{$unidad->tipostate->nombre}}</td>
              @php
                if ($unidad->es_empresa==0) {
                  $responsable = $unidad->responsable->nombre . " " . $unidad->responsable->paterno . " " .
                  $unidad->responsable->materno;
                }else {
                  $responsable = $unidad->responsable->nombre . " " . $unidad->responsable->paterno . " " .
                  $unidad->responsable->materno . " - Empresa: " . $unidad->responsable->empresa->nombre;
                }
              @endphp
              <td align="center">{{$responsable}}</td>
              </a>
          </tr>
          @endforeach
        </table>
        <table align="center" width="95%" cellpadding="4" cellspacing="0">
          <tr class="d-flex justify-content-center">
            <td colspan="5" id="unitPagination">{{ $unidades->appends([
              'tipo' => $tipo,
              'marca' => $marca,
              'modelo' => $modelo,
              'no_serieQ' => $no_serieQ,
              'responsables' => $responsables,
              'page_user' => $personas->currentPage()])
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