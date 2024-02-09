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
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}" />
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
  <body id="adminnav">
    <!--navigation section-->
    <header class="m-0 p-0 fixed-top">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <nav class="navbar nav-bar navbar-expand-lg pe-2">
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
                    <a class="nav-link" href="{{route('app.index')}}">Go to website</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="services.html"
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
                              >My Account</a
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

    @yield('navbar')


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    @stack('scripts')
  </body>
</html>
