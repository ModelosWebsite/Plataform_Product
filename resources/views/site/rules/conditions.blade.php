<!-- Modal -->
<div class="modal fade" id="conditions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Termos da Entidade {{$companyName->companyname}}, NIF: {{$companyName->companynif}}</h4>
          <button style="font-size: 30px" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if (isset($termos))
            <p style="text-align: justify">
                {{$termos->term}}
            </p>
          @else
              <p style="text-align: justify">{{ isset($companies->termsPBs->term) ? $companies->termsPBs->term : "" }}</p>
          @endif
        </div>
      </div>
    </div>
  </div>
  