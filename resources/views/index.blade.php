@extends('layouts.navfooter')
@section('content')

<!--home section-->
<section class="container-fluid pt-5">
    <!--xxl screen-->
    <div class="row p-0">
      <div class="col-md-5 col-12 my-auto d-xxl-block d-xl-none d-none">
        <div class="home-xxl display-1 text1 home-text">Transform</div>
        <div class="home-xxl display-6 text2- home-text fw-bold">
          Your Space with Our Expert Cleaning
        </div>
        <div class="home-xxl fw-bold pt-5 mb-3">
          <i class="bi bi-caret-right-fill"></i> WE OFFER FREE ESTIMATE!
        </div>
        <div class="home-xxl-btn btn btn-home btn-home1 text-white">
           <a href="{{route('services.index')}} ">Explore Our Services </a> 
        </div>
      </div>
      <div class="col-md-7 px-0 d-xxl-block d-xl-none d-none">
        <div class="image-column">
          <div class="image-overlay"></div>
          <img
            id="homeimg-xxl"
            class="img-fluid"
            src="assets/images/home-img-lg.jpeg"
            alt="Property we serviced"
          />
        </div>
      </div>
    </div>
    <!--xl screen-->
    <div class="row">
      <div
        class="col-md-5 col-12 my-auto ps-md-5 ps-sm-0 d-xxl-none d-md-block d-none"
      >
        <div class="display-3 text1 home-text">Transform</div>
        <div class="h2 text2- home-text fw-bold">
          Your Space with Our Expert Cleaning
        </div>
        <div class="fw-bold pt-5 mb-3">
          <i class="bi bi-caret-right-fill"></i> WE OFFER FREE ESTIMATE!
        </div>
        <div class="btn btn-home btn-home1 text-white">
          <a href="{{route('services.index')}}">Explore Our Services </a> 
        </div>
      </div>
      <div class="col-md-7 px-0 d-xxl-none d-md-block d-none">
        <div class="image-column">
          <div class="image-overlay"></div>
          <img
            id="homeimg"
            class="img-fluid"
            src="assets/images/home-img-lg.jpeg"
            alt="Property we serviced"
          />
        </div>
      </div>
    </div>
    <!--sm screen-->
    <div class="row">
      <div class="col-12 px-0 d-md-none d-sm-block d-block">
        <div class="image-column-sm">
          <div class="image-overlay"></div>
          <img
            id="homeimg-sm"
            class="img-fluid"
            src="assets/images/home-img.jpeg"
            alt="Property we serviced"
          />
        </div>
      </div>
      <div
        class="col-12 my-auto ps-md-5 ps-sm-0 text-center d-md-none d-sm-block d-block"
      >
        <div class="display-3 text1 home-text">Transform</div>
        <div class="h2 text2- home-text fw-bold">
          Your Space with Our Expert Cleaning
        </div>
        <div class="fw-bold pt-5 mb-3">
          <i class="bi bi-caret-right-fill"></i> WE OFFER FREE ESTIMATE!
        </div>
        <div class="btn btn-home btn-home1 text-white">
          <a href="{{route('services.index')}}">Explore Our Services</a> 
        </div>
      </div>
    </div>
  </section>
  <!--end of home section-->

  <!--services section-->
  <section class="container">
    <div class="row">
      <div
        class="section-header display-4 col-12 text-center my-5 pt-md-5 pt-4"
      >
        SERVICES
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-4 mb-sm-5 mb-4">
        <div class="card service-card h-100" style="width: 100%">
          <a href="{{url('gutter_cleaning')}}">
            <div class="card-body p-4">
              <h5 class="card-title h4 mb-3 service-card-header">
                Gutter Cleaning
              </h5>
              <p class="card-text service-card-text">
                Ensure a clear path for rainwater with our professional gutter
                cleaning. We remove debris, preventing clogs and potential
                damage
              </p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-4 mb-sm-5 mb-4">
        <div class="card service-card h-100" style="width: 100%">
          <a href="{{url('gutter_guard_installation')}}">
            <div class="card-body p-4">
              <h5 class="card-title h4 mb-3 service-card-header">
                Gutter Guard Installation
              </h5>
              <p class="card-text service-card-text">
                Upgrade your gutters with our guard installation, keeping them
                debris-free for a low-maintenance solution to optimal water
                flow
              </p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-4 mb-sm-5 mb-4">
        <div class="card service-card h-100" style="width: 100%">
          <a href="{{ url('solar_cleaning') }}">
            <div class="card-body p-4">
              <h5 class="card-title h4 mb-3 service-card-header">
                Solar Panel Cleaning
              </h5>
              <p class="card-text service-card-text">
                Boost your solar panel efficiency with our gentle cleaning
                service. Let the sun shine brighter on your sustainable energy
                source
              </p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-4 mb-sm-5 mb-4">
        <div class="card service-card h-100" style="width: 100%">
          <a href="{{ url('window_cleaning') }}">
            <div class="card-body p-4">
              <h5 class="card-title h4 mb-3 service-card-header">
                Window Cleaning
              </h5>
              <p class="card-text service-card-text">
                See the world more clearly through streak-free windows. Our
                professional cleaning enhances natural light and provides a
                crystal-clear view
              </p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-4 mb-sm-5 mb-4">
        <div class="card service-card h-100" style="width: 100%">
          <a href="{{ url('roof_cleaning') }}">
            <div class="card-body p-4">
              <h5 class="card-title h4 mb-3 service-card-header">
                Roof Cleaning
              </h5>
              <p class="card-text service-card-text">
                Give your roof a fresh look! Our roof wash removes moss,
                algae, and stains, restoring its beauty and preserving its
                integrity
              </p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-4 mb-sm-5 mb-4">
        <div class="card service-card h-100" style="width: 100%">
          <a href="{{ url('power_wash') }}">
            <div class="card-body p-4">
              <h5 class="card-title h4 mb-3 service-card-header">
                Power Wash
              </h5>
              <p class="card-text service-card-text">
                Revitalize your exterior with our power wash service. Blast
                away dirt and stains from various surfaces, instantly
                enhancing your home's appeal
              </p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!--end of services section-->

  <!--area of experties section-->
  <section class="container">
    <div class="row my-5 pt-md-5 pt-4">
      <div
        class="col-lg-6 col-md-10 col-12 px-4 my-auto mx-auto d-lg-none d-md-block d-sm-block d-none"
      >
        <div class="section-header display-5 mb-lg-5 mb-4 text-center">
          Where We Excel
        </div>
        <img
          class="expertise-img-md"
          src="https://images.pexels.com/photos/6195129/pexels-photo-6195129.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
          alt="cleaners"
        />
      </div>
      <div
        class="col-lg-6 col-md-10 col-12 px-4 my-auto mx-auto d-lg-none d-md-none d-sm-none d-block"
      >
        <div class="section-header display-5 mb-lg-5 mb-4 text-center">
          Where We Excel
        </div>
        <img
          class="img-fluid"
          src="https://images.pexels.com/photos/6195129/pexels-photo-6195129.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
          alt="cleaners"
        />
      </div>
      <div class="col-lg-6 col-md-10 col-12 text-center my-auto mx-auto p-4">
        <div
          class="section-header display-5 mb-lg-5 mb-4 d-lg-block d-md-none d-none"
        >
          Where We Excel
        </div>
        <div class="expertise-head h4">Residential Cleaning</div>
        <div class="expertise-text">
          We clean challenging exterior spaces, letting you unwind while we
          tackle the hard work. Enjoy peace of mind in your home sanctuary.
        </div>
        <div class="expertise-head h4 mt-4">Commercial Space Cleaning</div>
        <div class="expertise-text">
          Our commercial exterior cleaning ensures a pristine look, making a
          lasting impression for your clientele.
        </div>
      </div>
      <div class="col-lg-6 px-4 my-auto mx-auto d-lg-block d-md-none d-none">
        <img
          class="img-fluid"
          src="https://images.pexels.com/photos/6195129/pexels-photo-6195129.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
          alt="cleaners"
        />
      </div>
    </div>
  </section>
  <!--end of area of experties section-->
@endsection