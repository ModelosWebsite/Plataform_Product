<!-- Modal -->
<div class="modal fade" id="credential{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Meus Dados de Acesso</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("plataform.product.admin.background.profile.update",$data->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Nome: </label>
                    <input class="form-control" name="name" type="text" value="{{$data->name ?? ""}}" placeholder="Insira o seu nome">
                </div>
                

                <div class="form-group">
                    <label class="form-label" for="name">Email: </label>
                    <input class="form-control" name="email" type="text" value="{{$data->email ?? ""}}" placeholder="Insira o seu email">
                </div>

                <div class="form-group">
                    <label class="form-label" for="name">Palavra-Passe: </label>
                    <input class="form-control" name="password" type="text"  placeholder="Insira uma nova password">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary px-3" type="submit">Salvar</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>