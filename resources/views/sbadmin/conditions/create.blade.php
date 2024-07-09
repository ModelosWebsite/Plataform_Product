<!-- Modal -->
<div class="modal fade" id="termsCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Politicas e Termos</h3>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("admin.conditions.create")}}" method="post">
                @csrf
                <div class="">
                    <div class="form-group">
                        <label class="form-label">Escreva a sua Politica de privacidade</label>
                        <textarea name="privacity" class="form-control" placeholder="Insira uma descrição...."></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Escreva o seu Termo de Condições</label>
                        <textarea name="term" class="form-control" placeholder="Insira uma descrição...."></textarea>
                    </div>
                </div>
                <style>
                    textarea{
                        width: 35rem;
                        height: 200px;
                        margin: 10px;
                    }
                </style>

           <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
           </div>
       </form>
        </div>
      </div>
    </div>
</div>