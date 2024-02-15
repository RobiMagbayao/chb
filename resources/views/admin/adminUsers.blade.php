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
        <div class="col-lg-10 col-12  ps-lg-3">
          <div
            class="section-header text-center display-4 fw-bold mb-5 pb-sm-0 pb-0"
          >
            USER MANAGEMENT
          </div>
          <div class="row card">
            <div class="card-header mb-3">
              <a href="{{url('admin/users/create')}}" class="btn btn-primary float-end">Add User</a>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="ps-3">User Details</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($User as $item )
                  <tr>
                    <td class="text-center">{{$item->id}}</td>
                    <td class="ps-3">
                      <strong>First Name: </strong>{{$item->firstname}}<br>
                      <strong>Last Name: </strong>{{$item->lastname}}<br>
                      <strong>Email: </strong>{{$item->email}}<br>
                      <strong>Phone: </strong>{{$item->phone}}<br>
                      <strong>Address: </strong>{{$item->address}}<br>
                      <strong>Username: </strong>{{$item->name}}<br>
                      <strong>Password: </strong>{{$item->password}}<br>
                    </td>
                    <td>
                      <a href="{{url('admin/users/'.$item->id.'/edit')}}" class="btn btn-success w-100 my-2">Update</a><br>
                      <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                              data-bs-target="#deleteUserModal-{{ $item->id }}">
                              Delete
                      </button>
                    </td>
                  </tr>
                  <!-- Modal for Delete User -->
                  <div class="modal fade" id="deleteUserModal-{{ $item->id }}" tabindex="-1"
                    aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteUserModalLabel">Delete User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete user {{$item->email}}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard
                                </button>
                                <a href="{{url('admin/users/'.$item->id.'/delete')}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--end of user dashbord-->


    

  

@endsection