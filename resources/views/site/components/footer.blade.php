<!-- Footer -->
<footer id="footer" class="footer" style="background: var(--color); color: var(--letra);">

     <div class="container-fluid px-3 px-md-3 px-lg-4">
      @foreach ($contacts as $item)
        <div class="row gy-3">
          <div class="col-lg-3 col-md-6 d-flex">
            <i class="bi bi-geo-alt icon"></i>
            <div>
              <h4>Endereço</h4>
              <p>
                {{$item->endereco ?? NULL}}
              </p>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-links d-flex">
            <i class="bi bi-telephone icon"></i>
            <div>
              <h4>Reservas</h4>
              <p>
                <strong>Telefone:  </strong>+244 {{$item->telefone ?? NULL}}<br>
                <strong>Email:  </strong>{{$item->email ?? NULL}}<br>
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links d-flex">
            <i class="bi bi-clock icon"></i>
            <div>
              <h4>Hora de Funcionamento</h4>
              <p>
                <strong>{{$item->atendimento ?? NULL}}</strong> 
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Siga-nos</h4>
            <div class="social-links d-flex">
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
          </div>

        </div>
      @endforeach
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Fort-Code</span></strong>. Todos direitos reservados
        <div >
          <a type="button" class="text-white" data-bs-toggle="modal" data-bs-target="#privacity">
            Politicas de Privacidade |  
          </a>
          <a type="button" class="text-white" data-bs-toggle="modal" data-bs-target="#conditions">
            Termos e Condições  
          </a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->
  @include("site.rules.privacy")
  @include("site.rules.conditions")