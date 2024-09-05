<div class="mt-4 mb-4">
  @include("livewire.site.components.style")

  <div class="container">
          
      <div class="d-flex justify-content-center">
        <div class="container-scroll">
          <div class="iconChevron-left">
              <i class="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                  </svg>
              </i>
          </div>
          
          <ul>
              <li>
                  <button class="category {{ $category == null ? 'active' : '' }}" wire:click="getItems(null)">Todos</button>
              </li>
              @if (isset($categories) && count($categories) > 0)
                  @foreach ($categories as $item)
                      @if ($item['category'] != "Pratos" && $item['category'] != "Bebidas" && $item['category'] != "Prato do Dia")
                        <li>
                          <button 
                              class="category {{ $category == $item['category'] ? 'active' : '' }}" 
                              wire:click="getItems('{{ $item['category'] }}')">
                              {{ $item['category'] }}
                          </button>
                       </li>
                      @endif
                  @endforeach
              @endif
          </ul>
          
          <div class="iconChevron-right active">
              <i class="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                  </svg>
              </i>
          </div>
        </div>
      </div>
  </div>


  <div class="untree_co-section product-section before-footer-section" style="margin-top: 3rem;">
    <div class="container">
        <div class="row">
          @if (isset($getCollectionsItens) and $getCollectionsItens->count() > 0)
            @foreach($getCollectionsItens as $item)
              <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="#">
                  @if ($item['image'] != null)
                    <img src="https://kytutes.com/storage/{{$item['image']}}" class="img-fluid product-thumbnail">
                  @else 
                    <img src="{{asset("notfound.png")}}" class="menu-img img-fluid" alt="">
                  @endif
                  <h3 class="product-title">{{ $item['name'] ?? '' }}</h3>
                  <strong class="product-price">{{ number_format($item['price'] ?? 0, 2, ',', '.') }} kz</strong>

                  <span class="icon-cross" wire:click="addToCart('{{$item['name'] ?? ''}}')">
                    <img src="{{asset("cross.svg")}}" class="img-fluid">
                  </span>
                </a>
              </div> 
            @endforeach
          @else
              <div class="rounded col-md-12 d-flex justify-content-center align-items-center flex-column mt-5" style="height: 20rem; border: 1px dashed #000;">
                  <h5 class="text-muted text-center text-uppercase">A consulta não retornou nenhum resultado</h5>
              </div>
          @endif
      </div>
    </div>
  </div>

  {{-- Javascript --}}
  <script>
          const tabs = document.querySelectorAll(".container-scroll button");
          const rightArrow = document.querySelector(".container-scroll .iconChevron-right i");
          const leftArrow = document.querySelector(".container-scroll .iconChevron-left i");
          const tabsList = document.querySelector(".container-scroll ul");
          const leftArrowContainer = document.querySelector(".container-scroll .iconChevron-left");
          const rightArrowContainer = document.querySelector(".container-scroll .iconChevron-right");
      
          const removeAllActiveClasse = () => {
          tabs.forEach((tab) => {
              tab.classList.remove("active");
          })
          }
      
          tabs.forEach((tab) => {
          tab.addEventListener("click", () => {
              removeAllActiveClasse();
              tab.classList.add("active");
          })
          });
      
          const manageIcons = () => {
          if(tabsList.scrollLeft >= 20) {
              leftArrowContainer.classList.add("active");
          }else {
              leftArrowContainer.classList.remove("active");
          }
      
          let maxScrollValue = tabsList.scrollWidth - tabsList.clientWidth - 20;
      
          if(tabsList.scrollLeft >= maxScrollValue) {
              rightArrowContainer.classList.remove("active");
          }else {
              rightArrowContainer.classList.add("active");
          }
          }
      
          rightArrow.addEventListener("click", () => {
          manageIcons();
          tabsList.scrollLeft += 200;
          });
      
          leftArrow.addEventListener("click", () => {
          manageIcons();
          tabsList.scrollLeft -= 200;
          });
      
          tabsList.addEventListener("scroll", manageIcons);
      
          /* Eventos Mouse Para Movimentar com este Evento */
          let dragging = false;
      
          const drag = (e) => {
          // Se for falso executa este evento: MouseMove
          if(!dragging) return;
      
          tabsList.classList.add("dragging");
          tabsList.scrollLeft -= e.movementX; 
          }
      
          // Evento MouseMove
          tabsList.addEventListener("mousemove", drag);
      
          // Evento MouseDown
          tabsList.addEventListener("mousedown", () => {
          dragging = true;
          });
      
          // Evento MouseUp
          document.addEventListener("mouseup", () => {
          dragging = false;
          tabsList.classList.remove("dragging");
          })
  </script> 
   
  <script>
      let currentScrollPosition = 0;
      let scrollAmount = 320;
  
      let sCont = document.queryselector(".storys-container"):
      let hScroll = document.queryselector(".horizontal-scroll");
      
      let maxScroll = -sCont.offsetwidth + hScroll.offsetwidth;
  
      function scrollHorizontally(val) {
        currentScrollPosition += (val * scrollAmount);
  
        sCont.style.left = currentScrollPosition + "px";
  
      }
  </script>  

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
</div>