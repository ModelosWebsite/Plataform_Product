<!-- Modal -->
<div class="modal fade" id="productEdit{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Editar Produto</h3>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("plataform.product.admin.products.update")}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="form-group">
                    <label class="form-label">Nome</label>
                    <input type="text" value="{{$product->title}}" name="title" class="form-control" placeholder="Insira a informação...">
                </div>

                <div class="form-group">
                    <label class="form-label">Descrição</label>
                    <input type="text" value="{{$product->description}}" name="description" class="form-control" placeholder="Insira a informação...">
                </div>

                <div class="form-group">
                    <label class="form-label">Preço</label>
                    <input type="text" value="{{$product->price}}" name="price" class="form-control" placeholder="Insira o preço do produto...">
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