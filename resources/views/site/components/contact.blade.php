<!-- ======= Contact Section ======= -->
<section id="contact" class="contact" style="">
    <div class="section-header">
      <h2>Contacto</h2>
      <p>Precisa de ajuda <span>Contacte-nos</span></p>
    </div>
      <div class="container-fluid px-3 px-md-3 px-lg-4" data-aos="fade-up">
    
          @foreach ($contacts as $item)
            <div class="row gy-4">
    
              <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                  <i class="icon bi bi-map flex-shrink-0" style="background: var(--color); color: var(--letra)"></i>
                  <div>
                    <h3>Endereço</h3>
                    <div>{{$item->endereco ?? NULL}}</div>
                  </div>
                </div>
              </div><!-- End Info Item -->
    
              <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                  <i class="icon bi bi-envelope flex-shrink-0" style="background: var(--color); color: var(--letra)"></i>
                  <div>
                    <h3>Email</h3>
                    <div>{{$item->email ?? NULL}}</div>
                  </div>
                </div>
              </div><!-- End Info Item -->
    
              <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                  <i class="icon bi bi-telephone flex-shrink-0" style="background: var(--color); color: var(--letra)"></i>
                  <div>
                    <h3>Telefone</h3>
                    <div>+244 {{$item->telefone ?? NULL}}</div>
                  </div>
                </div>
              </div><!-- End Info Item -->
    
              <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                  <i class="icon bi bi-share flex-shrink-0" style="background: var(--color); color: var(--letra)"></i>
                  <div>
                    <h3>Atendimento</h3>
                    <div>
                      {{$item->atendimento ?? NULL}}
                    </div>
                  </div>
                </div>
              </div><!-- End Info Item -->
    
            </div>
          @endforeach
      </div>
    </section>
    <!-- End Contact Section -->