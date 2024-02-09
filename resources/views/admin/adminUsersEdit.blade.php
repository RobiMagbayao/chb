@extends('layouts.adminnav')

@section('navbar')

    <!--user dashbord-->
    <section class="container nav-margin">
      <div class="row">
        <div class="col-lg-3 col-12 mx-auto mb-4">
          <div
            class="col-lg-12 col-md-11 pe-lg-5 pe-0 mx-auto text-center"
          >
          <a class="navbar-brand" href="{{route('app.index')}}">
            <img
              src="/assets/images/logo2.png"
              class="d-inline-block align-top img-fluid"
              alt="logo"
          /></a>
            <nav id="adminOptions" class="userlink nav nav-pills flex-column pt-3">
              <a
                id="adminHome"
                class="nav-link"
                aria-current="page"
                href="{{route('admin.index')}}"
                >Home</a
              >
              <a class="nav-link" href="{{route('admin.adminQuotes')}}">Quotes</a>
              <a class="nav-link" href="{{route('admin.adminBookings')}}">Bookings</a>
              <a class="nav-link" href="{{route('admin.adminMessages')}}">Messages</a>
              <a class="nav-link" href="{{route('admin.adminContactus')}}">Contact Us</a>
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
        <div class="col-lg-9 col-12">
          <div
            class="section-header text-center display-4 fw-bold mb-5 pb-sm-0 pb-0"
          >
            EDIT USER
          </div>
          @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
          <div class="row card">
            <div class="card-header col-12 mb-3">
              <a href="{{url('admin/users')}}" class="btn btn-secondary float-end">Back</a>
            </div>
            <form class="row" action="{{url('admin/users/'.$User->id.'/edit')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-6 col-12 px-4 pb-3">
                    <div class="mb-3">
                        <label for="firstname" class="userDetail form-label">First Name</label>
                        <input class="form-control" type="text" id="firstname" name="firstname" value="{{ $User->firstname}}" pattern=".{2,}" title="Please enter at least 2 characters">
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
                      value="{{ $User->lastname}}"
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
                      value="{{ $User->email}}"
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
                      value="{{ $User->phone}}"
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
                      value="{{ $User->name}}"
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
                      value="{{ $User->password}}"
                    />
                    @error('password') <span class="text-danger">{{$message}}</span>  @enderror
                  </div>
                </div>
    
                <div class="col-12 px-4 pb-3">
                    <div class="mb-3">
                        <label for="address" class="userDetail form-label">Address</label>
                        <input class="form-control" type="text" id="address" name="address" value="{{ $User->address}}" pattern=".{10,}" title="Please enter at least 10 characters">
                        @error('address') <span class="text-danger">{{$message}}</span>  @enderror
                    </div>
                </div>
        </div>
        <div class="text-center my-4">
            <a href="{{url('admin/users')}}" ><button type="button" class="btn btn-secondary">Discard</button></a>
            
            <button type="submit" class="btn btn-success ms-2">Update</button>
        </div>
        </form>
          </div>

        </div>
      </div>
    </section>
    <!--end of user dashbord-->


@endsection