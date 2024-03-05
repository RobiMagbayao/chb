<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clean House Bros</title>
    <!--css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/navfooter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/contactus.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/location.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/aboutus.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/faqs.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/services.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/legal.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/user.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin.css')}}" />

    <!--favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/images/favicon.png')}}" />
    <!--bootstrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Antonio:wght@400;700&family=Playfair+Display:wght@400;700&family=Poppins&display=swap"
      rel="stylesheet"
    />
 @stack('styles')
  </head>
  <body>
    <!--navigation section-->
    <header class="m-0 p-0 fixed-top">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <nav class="navbar nav-bar navbar-expand-lg pe-2">
              <a class="navbar-brand ps-lg-3 ps-1 py-2" href="{{route('app.index')}}">
                <img
                  src="/assets/images/logo1.png"
                  height="50"
                  class="d-inline-block align-top"
                  alt="logo"
              /></a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#nav-menu"
                aria-controls="nav-menu"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="nav-menu">
                <ul
                  class="navbar-nav d-flex align-items-center ms-auto mb-2 mb-lg-0 pe-lg-4 pe-0"
                >
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('app.index')}}">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="{{route('services.index')}}"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      Services
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a
                          class="dropdown-item"
                          href="{{url('gutter_cleaning')}}"
                          >Gutter Cleaning</a
                        >
                      </li>
                      <li>
                        <a
                          class="dropdown-item"
                          href="{{url('gutter_guard_installation')}}"
                          >Gutter Guard Installation</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ url('solar_cleaning') }}"
                          >Solar Panel Cleaning</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ url('roof_cleaning') }}"
                          >Roof Cleaning</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ url('window_cleaning') }}"
                          >Window Cleaning</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item" href="{{ url('power_wash') }}"
                          >Power Wash</a
                        >
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('location.index')}}">Locations</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contactus.index')}}">Contact Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"  href="{{route('aboutus.index')}}">About Us</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="{{route('services.index')}}"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                    <i class="bi bi-person-circle"></i>@auth <span>{{Auth::user()->name}}</span> @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      @if (Route::has('login'))
                        @auth
                          @if (Auth::user()->user_type === 'ADMIN')
                            <li>
                              <a
                                class="dropdown-item"
                                href="{{route('admin.index')}}"
                                >Dashboard</a
                              >
                            </li>
                          @else
                          <li>
                            <a
                              class="dropdown-item"
                              href="{{route('user.index')}}"
                              >Account</a
                            >
                          </li>
                          <li>
                            <a
                              class="dropdown-item"
                              href="{{route('user.userQuotes')}}"
                              >Quotes</a
                            >
                          </li>
                          <li>
                            <a
                              class="dropdown-item"
                              href="{{route('user.userBookings')}}"
                              >Bookings</a
                            >
                          </li>
                          @endif
                          <li>
                            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();" class="dropdown-item">Logout</a>
                            <form action="{{route('logout')}}" method="POST" id="formLogout">@csrf</form>
                          </li>
                          @else
                            <li>
                              <a
                                class="dropdown-item"
                                href="{{route('login')}}"
                                >Login</a
                              >
                            </li>
                            <li>
                              <a
                                class="dropdown-item"
                                href="{{route('register')}}"
                                >Register</a
                              >
                            </li>
                        @endauth  
                      @endif
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!--end of navigation section-->

    @yield('content')

    <!--footer section-->
    <footer class="container-fluid">
      <div class="row footer-main mt-5 pt-5">
        <div
          class="footer-header col-md-4 col-sm-3 col-12 ps-0 d-sm-block d-none"
        >
          <img
            class="footer-img footer-img1"
            src="https://images.pexels.com/photos/1438832/pexels-photo-1438832.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
            alt="house"
          />
        </div>
        <div class="d-sm-none d-block text-center mb-3">
          <img class="footer-img-sm" src="/assets/images/logo2.png" alt="logo" />
        </div>
        <div
          class="footer-header col-md-4 col-sm-6 col-12 display-1 my-auto px-sm-2 px-0"
        >
          TRUSTED<br />IN THE<br />BAY AREA
        </div>
        <div
          class="footer-header col-md-4 col-sm-3 col-12 pe-0 d-sm-block d-none"
        >
          <img
            class="footer-img footer-img2"
            src="https://images.pexels.com/photos/262405/pexels-photo-262405.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
            alt="house"
          />
        </div>
      </div>

      <div class="row">
        <div class="footer-subhead col-12 mb-4 mt-5">WHERE TO?</div>
        <div
          class="footer-categories col-lg-6 col-md-8 col-sm-12 d-sm-block d-none text-center mx-auto"
        >
          <ul class="menu-footer ps-0">
            <li><a href="{{route('services.index')}}">Services</a></li>
            <li><a href="{{route('location.index')}}">Locations</a></li>
            <li><a href="{{route('contactus.index')}}">Contact Us</a></li>
            <li><a href="{{route('faq.index')}}">FAQs</a></li>
            <li><a href="{{route('aboutus.index')}}">About Us</a></li>
            <li><a href="{{route('privatepolicy.index')}}">Legal</a></li>
          </ul>
        </div>
        <div
          class="footer-categories col-12 d-sm-none d-block text-center mx-auto"
        >
          <ul class="menu-footer ps-0">
            <li><a href="{{route('services.index')}}">Services</a></li>
            <li><a href="{{route('location.index')}}">Locations</a></li>
            <li><a href="{{route('contactus.index')}}">Contact Us</a></li>
          </ul>
          <ul class="menu-footer ps-0">
            <li><a href="{{route('faq.index')}}">FAQs</a></li>
            <li><a href="{{route('aboutus.index')}}">About Us</a></li>
            <li><a href="{{route('privatepolicy.index')}}">Legal</a></li>
          </ul>
        </div>
        <div class="footer-bot col-12 text-muted text-center mt-5 mb-4">
          <hr />
          &copy; Clean House Bros 2024 &#8212; All Rights Reserved
        </div>
      </div>
    </footer>

    <!--end of footer section-->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/assets/js/mapinput.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=APIKEY&libraries=places&callback=initialize" async defer></script>

    @stack('scripts')
  </body>
</html>
