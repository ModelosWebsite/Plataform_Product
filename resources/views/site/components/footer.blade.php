<!-- Footer -->
<footer id="footer" class="footer py-4" style="background: var(--color); color: var(--letra);">
  <div class="container-fluid px-3 px-md-4">
      @foreach ($contacts as $item)
      <div class="row gy-4 align-items-center">
          <div class="col-lg-3 col-md-6 d-flex align-items-center">
              <i class="bi bi-geo-alt icon fs-4 text-light me-2"></i>
              <div>
                  <h4 class="fw-bold">Endereço</h4>
                  <p class="mb-0">{{$item->endereco ?? 'Não disponível'}}</p>
              </div>
          </div>
          
          <div class="col-lg-3 col-md-6 d-flex align-items-center">
              <i class="bi bi-telephone icon fs-4 text-light me-2"></i>
              <div>
                  <h4 class="fw-bold">Reservas</h4>
                  <p class="mb-0">
                      <strong>Telefone:</strong> +244 {{$item->telefone ?? 'Não disponível'}}<br>
                      <strong>Email:</strong> {{$item->email ?? 'Não disponível'}}
                  </p>
              </div>
          </div>
          
          <div class="col-lg-3 col-md-6 d-flex align-items-center">
              <i class="bi bi-clock icon fs-4 text-light me-2"></i>
              <div>
                  <h4 class="fw-bold">Hora de Funcionamento</h4>
                  <p class="mb-0"><strong>{{$item->atendimento ?? 'Não disponível'}}</strong></p>
              </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
              <h4 class="fw-bold">Siga-nos</h4>
              <div class="social-links d-flex gap-3">
                  <a href="#" class="text-light fs-5"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="text-light fs-5"><i class="bi bi-instagram"></i></a>
              </div>
          </div>
      </div>
      @endforeach
  </div>

  <div class="container text-center mt-4">
      <div class="copyright">
          &copy; <strong>Fort-Code</strong>. Todos direitos reservados
          <div class="mt-2">
              <a type="button" class="text-white text-decoration-none me-2" data-bs-toggle="modal" data-bs-target="#privacity">Políticas de Privacidade</a> |
              <a type="button" class="text-white text-decoration-none me-2" data-bs-toggle="modal" data-bs-target="#conditions">Termos e Condições</a> |
              <a href="{{route('plataform.product.login.view')}}" class="text-white text-decoration-none">Login</a>
          </div>
      </div>
  </div>
</footer>
<!-- End Footer -->
@include("site.rules.privacy")
@include("site.rules.conditions")