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
                    <input class="form-control" type="text" id="firstname" name="firstname" value="@auth{{Auth::user()->firstname}}@endauth" pattern=".{2,}" title="Please enter at least 2 characters">
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
                  pattern=".{8,}"
                  title="Please enter at least 8 characters"
                  value="@auth{{Auth::user()->password}}@endauth"
                />
                @error('password') <span class="text-danger">{{$message}}</span>  @enderror
              </div>
            </div>

            <div class="col-12 px-4 pb-3">
                <div class="mb-3">
                    <label for="address" class="userDetail form-label">Address</label>
                    <input class="form-control" type="text" id="address" name="address" value="@auth{{Auth::user()->address}}@endauth" pattern=".{10,}" title="Please enter at least 10 characters">
                    @error('address') <span class="text-danger">{{$message}}</span>  @enderror
                </div>
            </div>
    </div>
    <div class="text-center my-4">
        <a href="{{url('/my-account')}}" ><button type="button" class="btn btn-secondary">Discard</button></a>
        
        <button type="submit" class="btn btn-success ms-2">Update</button>
    </div>
    </form>
      </div>
    </div>
  </section>
  <!--end of user dashbord-->
@endsection