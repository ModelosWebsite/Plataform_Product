<section class="slider_section" id="slider_section" style="margin-top: 4rem;">
    <div class="slider_bg_box" style="object-fit: cover;width:100%; height:100%">
      <img src="{{Storage::url(isset($heroImage->image) ? "arquivos/background/$heroImage->image" : "")}}" alt="">
    </div>
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach ($hero as $item)
        <div class="carousel-item active">
          <div class="container-fluid px-3 px-md-3 px-lg-4">
            <div class="row">
              <div class="col-md-7 ">
                <div class="detail-box">
                  <h1>
                    {{$item->title}}
                  </h1>
                  <p style="font-size: 1.5rem">
                    {{$item->description}}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </section>