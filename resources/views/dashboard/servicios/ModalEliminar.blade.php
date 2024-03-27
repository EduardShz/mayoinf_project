<div class="modal fade" id="destroyServicio{{$servicio->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-aling-center">
        
        <h6 class="modal-title text-aling-center">Seguro que quieres eliminar el servicio {{$servicio->id}}?</h6>

      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a class="btn btn-danger" href="{{route('servicios.destroy', $servicio->id)}}"> Eliminar </a>
      </div>
    </div>
  </div>
</div>