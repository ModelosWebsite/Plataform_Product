<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$item->id ?? ""}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Anúncio</h4>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="">
                <form action="{{route("anuncio.management.update.quadrado")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $item->id ?? ""}}">
                    <div class="form-group">
                        <label class="form-label">Titulo</label>
                        <input type="text" value="{{$item->name ?? ""}}" name="name" class="form-control" placeholder="Insira a informação...">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Descrição</label>
                        <input type="text" name="description" class="form-control" value="{{$item->description ?? ""}}" placeholder="Insira a informação...">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Link</label>
                        <input type="text" name="link" class="form-control" value="{{$item->link ?? ""}}" placeholder="Insira o link">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Fotografia</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  