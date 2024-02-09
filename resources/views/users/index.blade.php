@extends('layouts.navfooter')
@section('content')


    <!--user dashbord-->
    <section class="container nav-margin">
      <div class="row">
        <div class="col-12">
          <div
            class="section-header text-center display-4 fw-bold mb-5 pb-md-3 pb-sm-0 pb-0"
          >
            USER PROFILE
          </div>
          <form class="row">
            <div class="col-md-6 col-12 px-4 pb-3">
              <div class="mb-3">
                <label for="firstname" class="userDetail form-label"
                  >First Name</label
                >
                <input class="form-control" type="text" value="@auth{{Auth::user()->firstname}}@endauth" aria-label="firstname"  disabled  readonly>
              </div>
            </div>
            <div class="col-md-6 col-12 px-4 pb-3">
              <div class="mb-3">
                <label for="lastname" class="userDetail form-label"
                  >Last Name</label
                >
                <input class="form-control" type="text" value="@auth{{Auth::user()->lastname}}@endauth" aria-label="lastname" disabled readonly>
              </div>
            </div>
            <div class="col-md-6 col-12 px-4 pb-3">
              <div class="mb-3">
                <label for="email" class="userDetail form-label">Email</label>
                <input class="form-control" type="email" value="@auth{{Auth::user()->email}}@endauth" aria-label="email" disabled readonly>
              </div>
            </div>
            <div class="col-md-6 col-12 px-4 pb-3">
              <div class="mb-3">
                <label for="phone" class="userDetail form-label">Phone</label>
                <input class="form-control" type="number" value="@auth{{Auth::user()->phone}}@endauth" aria-label="phone" disabled readonly>
              </div>
            </div>
            <div class="col-md-6 col-12 px-4 pb-3">
              <div class="mb-3">
                <label for="name" class="userDetail form-label"
                  >Username</label
                >
                <input class="form-control" type="text" value="@auth{{Auth::user()->name}}@endauth" aria-label="username" disabled  readonly>
              </div>
            </div>
            <div class="col-md-6 col-12 px-4 pb-3">
              <div class="mb-3">
                <label for="password" class="userDetail form-label"
                  >Password</label
                >
                <input class="form-control profileDetails fw-bold" type="password" value="@auth{{Auth::user()->password}}@endauth" aria-label="password"  disabled readonly>
              </div>
            </div>
            <div class="col-12 px-4 pb-3">
              <div class="mb-3">
                <label for="address" class="userDetail form-label"
                  >Address</label
                >
                <input class="form-control" type="text" value="@auth{{Auth::user()->address}}@endauth" aria-label="address"  disabled readonly>
              </div>
            </div>
            <center>
              <a href="{{ url('/my-account/edit') }}" class="btn btn-secondary col-lg-3 col-md-4 col-sm-4 col-8 mt-3">
                  Edit Profile
              </a>
          </center>
          
          <center>
            <button type="button" class="btn btn-danger col-lg-3 col-md-4 col-sm-4 col-8 mt-3" data-bs-toggle="modal"
            data-bs-target="#deleteUserModal">
            Delete
        </button>
          </center>
          </form>
        </div>
      </div>
    </section>
    <!--end of user dashbord-->

    <!-- Modal for Delete User -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1"
      aria-labelledby="deleteUserModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete Profile</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  Are you sure you want to delete your profile?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard
                  </button>
                  <a href="{{url('/my-account/delete')}}" class="btn btn-danger">Delete</a>
              </div>
          </div>
      </div>
  </div>

    @endsection