@extends('layouts.navfooter')
@section('content')

<!--user dashbord-->
<section class="container nav-margin">
    <div class="row">
      <div class="col-12">
        <div
          class="section-header text-center display-4 fw-bold mb-5 pb-md-3 pb-sm-0 pb-0"
        >
          EDIT USER PROFILE
        </div>
          @if (session('status'))
            <div class="alert alert-success text-center fw-bold">
                {{session('status')}}
            </div>
          @endif
          <form class="row" action="{{url('/my-account/edit')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6 col-12 px-4 pb-3">
                <div class="mb-3">
                    <label for="firstname" class="userDetail form-label">First Name</label>
                    <input class="form-control" type="text" id="firstname" name="firstname" value="@auth{{Auth::user()->firstname}}@endauth" pattern=".{2,}" title="Please enter at least 2 characters" placeholder="Enter your first name">
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
                  value="@auth{{Auth::user()->lastname}}@endauth"
                  name="lastname"
                  pattern=".{2,}"
                  title="Please enter at least 2 characters"
                  placeholder="Enter your last name"
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
                  value="@auth{{Auth::user()->email}}@endauth"
                  name="email"
                  placeholder="Enter your email"
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
                  value="@auth{{Auth::user()->phone}}@endauth"
                  name="phone"
                  pattern="[0-9]{10}"
                  title="Please enter a valid 10-digit phone number"
                  placeholder="Enter your 10-digit phone number"
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
                  value="@auth{{Auth::user()->name}}@endauth"
                  name="name"
                  pattern=".{2,}"
                  title="Please enter at least 2 characters"
                  placeholder="Enter your username"
                />
                @error('name') <span class="text-danger">{{$message}}</span>  @enderror
              </div>
            </div>
            <div class="col-md-6 col-12 px-4 pb-3">
              <div class="mb-3">
                <label for="password" class="userDetail form-label"
                  >New Password</label
                >
                <input
                  class="form-control"
                  type="password"
                  id="password"
                  name="password"
                  pattern=".{8,}"
                  title="Please enter at least 8 characters"
                  placeholder="Enter your new password"
                />
                @error('password') <span class="text-danger">{{$message}}</span>  @enderror
              </div>
            </div>
        <!--GOOGLE MAP API-->
            <div class="col-12 px-4 pb-3">
                <div class="mb-3">
                    <label for="property_address" class="userDetail form-label">Address</label>
                    <input class="form-control" type="text" id="property_address" name="address" value="@auth{{Auth::user()->address}}@endauth" pattern=".{10,}" title="Please enter at least 10 characters" placeholder="Enter your address">
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
          <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto  visually-hidden">
            <div id="address-map-container" style="width: 100%;height:250px;">
              <div style="width:100%;height:100%" id="address-map"></div>
            </div>
          </div>
          <!--GOOGLE MAP API-->
    </div>
    <div class="text-center my-4">
      <button type="submit" class="btn btn-success col-lg-3 col-md-4 col-sm-4 col-8 mt-3">Update</button><br>
      <a href="{{url('/my-account')}}" ><button type="button" class="btn btn-secondary col-lg-3 col-md-4 col-sm-4 col-8 mt-3">Discard</button></a>
    </div>
    </form>
      </div>
    </div>
  </section>
  <!--end of user dashbord-->
@endsection