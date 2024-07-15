<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Dados Pessoais e Historicos</h4>
            <span class="btn-close" data-dismiss="modal" aria-label="Close">&times;</span>
        </div>
        <div class="modal-body">
            <div class="">
                <form action="{{route("plataform.product.admin.about.update")}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <div class="">
                        <div class="form-group">
                            <label class="form-label">Descrição:</label>
                            <textarea name="p1" class="form-control" id="" cols="30" rows="5" placeholder="Insira uma breve Descrição...">{{$item->p1}}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição 1:</label>
                            <textarea name="p2" class="form-control" id="" cols="30" rows="5" placeholder="Insira uma breve Descrição...">{{$item->p2}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Actualizar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  