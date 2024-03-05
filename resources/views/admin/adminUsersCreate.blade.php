@extends('layouts.adminnav')

@section('navbar')

    <!--user dashbord-->
    <section class="container nav-admin-margin">
      <div class="row">
        <div class="col-lg-2 col-12 mx-auto mb-4">
          <div
            class="col-lg-12 col-md-11 mx-auto text-center"
          >
          <a class="navbar-brand" href="{{route('app.index')}}">
            <img
              src="/assets/images/logo2.png"
              class="d-inline-block align-top img-fluid"
              alt="logo"
          /></a>
            <nav id="adminOptions" class="userlink nav nav-pills flex-column">
              <a
                id="adminHome"
                class="nav-link"
                aria-current="page"
                href="{{route('admin.index')}}"
                >Home</a
              >
              <a class="nav-link" href="{{route('admin.adminQuotes')}}">Quotes</a>
              <a class="nav-link" href="{{route('admin.adminBookings')}}">Bookings</a>
              <a class="nav-link" href="{{route('admin.adminContactus')}}">Inquiries</a>
              <a
                class="nav-link active ActiveOption text-white"
                href="{{route('admin.adminUsers')}}"
                >Users</a
              >
              <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();" class="nav-link">Logout</a>
              <form action="{{route('logout')}}" method="POST" id="formLogout">@csrf</form>
            </nav>
          </div>
        </div>
        <div class="col-lg-10 col-12  ps-lg-3">
          <div
            class="section-header text-center display-4 fw-bold mb-5 pb-sm-0 pb-0"
          >
            ADD USER
          </div>
          @if (session('status'))
                <div class="alert alert-success fw-bold text-center">
                    {{session('status')}}
                </div>
            @endif
          <div class="row">
            <form class="row" action="{{url('admin/users/create')}}" method="POST">
                @csrf
    
                <div class="col-md-6 col-12 px-4 pb-3">
                    <div class="mb-3">
                        <label for="firstname" class="userDetail form-label">First Name</label>
                        <input class="form-control" type="text" id="firstname" name="firstname" value="{{ old('firstname')}}" pattern=".{2,}" title="Please enter at least 2 characters" placeholder="Enter user's first name">
                        @error('firstname') <span class="text-danger">{{$message}}</span>  @enderror
                    </div>
                </div>
                <div class="col-md-6 col-12 px-4 pb-3">
                  <div class="mb-3">
                    <label for="lastname" class="userDetail form-label"
                      >Last Name</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="lastname"
                      value="{{ old('lastname')}}"
                      name="lastname"
                      pattern=".{2,}"
                      title="Please enter at least 2 characters"
                      placeholder="Enter user's last name"
                    />
                    @error('lastname')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12 px-4 pb-3">
                  <div class="mb-3">
                    <label for="email" class="userDetail form-label">Email</label>
                    <input
                      class="form-control"
                      type="email"
                      id="email"
                      value="{{ old('email')}}"
                      name="email"
                      placeholder="Enter user's email"
                    />
                    @error('email') <span class="text-danger">{{$message}}</span>  @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12 px-4 pb-3">
                  <div class="mb-3">
                    <label for="phone" class="userDetail form-label">Phone</label>
                    <input
                      class="form-control"
                      type="tel"
                      id="phone"
                      value="{{ old('phone')}}"
                      name="phone"
                      pattern="[0-9]{10}"
                      title="Please enter a valid 10-digit phone number"
                      placeholder="Enter user's phone"
                    />
                    @error('phone') <span class="text-danger">{{$message}}</span>  @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12 px-4 pb-3">
                  <div class="mb-3">
                    <label for="name" class="userDetail form-label"
                      >Username</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="name"
                      value="{{ old('name')}}"
                      name="name"
                      pattern=".{2,}"
                      title="Please enter at least 2 characters"
                      placeholder="Enter user's username"
                    />
                    @error('name') <span class="text-danger">{{$message}}</span>  @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12 px-4 pb-3">
                  <div class="mb-3">
                    <label for="password" class="userDetail form-label"
                      >Password</label
                    >
                    <input
                      class="form-control"
                      type="password"
                      id="password"
                      name="password"
                      value="{{ old('password')}}"
                      placeholder="Enter user's password"
                    />
                    @error('password') <span class="text-danger">{{$message}}</span>  @enderror
                  </div>
                </div>
    
                <div class="col-12 px-4 pb-1">
                    <div class="mb-3">
                        <label for="property_address" class="userDetail form-label">Address</label>
                        <input class="form-control  map-input" type="text" id="property_address" name="address" value="{{ old('address')}}" pattern=".{10,}" title="Please enter at least 10 characters" placeholder="Enter user's address">
                        @error('address') <span class="text-danger">{{$message}}</span>  @enderror
                    </div>
                </div>
                <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto  visually-hidden">
                  <label class="form-label fw-bold" for="address-latitude"
                    >Latitude</label
                  >
                  <input
                    class="form-control"
                    type="text"
                    id="address-latitude"
                  />
                </div>
                <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto visually-hidden">
                  <label class="form-label fw-bold" for="address-longitude"
                    >Longitude</label
                  >
                  <input
                    class="form-control"
                    type="text"
                    id="address-longitude"
                  />
                </div>
                <div class="col-12 px-4 pb-3  visually-hidden">
                  <div id="address-map-container" style="width: 100%;height:200px;">
                    <div style="width:100%;height:100%" id="address-map"></div>
                  </div>
                </div>
          </div>
          <div class="text-center my-4">
            <button type="submit" class="btn btn-success col-lg-3 col-md-4 col-sm-4 col-8 mt-3">Save changes</button><br>
              <a href="{{url('admin/users')}}" ><button type="button" class="btn btn-secondary col-lg-3 col-md-4 col-sm-4 col-8 mt-3">Discard</button></a>

          </div>
          </form>
        </div>

        </div>
      </div>
    </section>
    <!--end of user dashbord-->

    <script type="text/javascript" src="/assets/js/mapinput.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=APIKEY&libraries=places&callback=initialize" async defer></script>
@endsection