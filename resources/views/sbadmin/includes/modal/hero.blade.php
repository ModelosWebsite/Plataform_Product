<div class="modal fade" id="staticBackdrop{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Hero</h4>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="">
                <form action="{{route("plataform.product.admin.hero.update", $item->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">titulo</label>
                        <input type="text" class="form-control" name="title" placeholder="Insira o titulo..." value="{{$item->title}}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Descrição</label>
                        <input type="text" class="form-control" name="description" placeholder="Altere a descrição" value="{{$item->description}}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Imagem</label>
                        <input type="file" name="image" class="form-control">
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