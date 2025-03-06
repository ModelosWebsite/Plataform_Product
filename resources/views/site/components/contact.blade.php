<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container-fluid" data-aos="fade-up">
      <div class="section-header text-center mb-3">
          <p><span>Contato</span></p>
      </div>

      @foreach ($contacts as $item)
      <div class="row g-2">
          <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
              <div class="info-item d-flex align-items-center p-3 rounded shadow-sm">
                  <i class="icon bi bi-map flex-shrink-0 fs-4" style="background: var(--color); color: var(--letra)"></i>
                  <div class="ms-2">
                      <h4 class="fw-bold mb-1">Endereço</h4>
                      <p class="mb-0">{{$item->endereco ?? 'Não disponível'}}</p>
                  </div>
              </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
              <div class="info-item d-flex align-items-center p-3 rounded shadow-sm">
                  <i class="icon bi bi-envelope flex-shrink-0 fs-4" style="background: var(--color); color: var(--letra)"></i>
                  <div class="ms-2">
                      <h4 class="fw-bold mb-1">Email</h4>
                      <p class="mb-0">{{$item->email ?? 'Não disponível'}}</p>
                  </div>
              </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
              <div class="info-item d-flex align-items-center p-3 rounded shadow-sm">
                  <i class="icon bi bi-telephone flex-shrink-0 fs-4" style="background: var(--color); color: var(--letra)"></i>
                  <div class="ms-2">
                      <h4 class="fw-bold mb-1">Telefone</h4>
                      <p class="mb-0">+244 {{$item->telefone ?? 'Não disponível'}}</p>
                  </div>
              </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
              <div class="info-item d-flex align-items-center p-3 rounded shadow-sm">
                  <i class="icon bi bi-share flex-shrink-0 fs-4" style="background: var(--color); color: var(--letra)"></i>
                  <div class="ms-2">
                      <h4 class="fw-bold mb-1">Atendimento</h4>
                      <p class="mb-0">{{$item->atendimento ?? 'Não disponível'}}</p>
                  </div>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</section>
<!-- End Contact Section -->