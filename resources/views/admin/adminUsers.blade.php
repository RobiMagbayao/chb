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
              <a class="nav-link" href="{{route('admin.adminContactus')}}">Enquiries</a>
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
            class="section-header text-center display-4 fw-bold mb-3 pb-sm-0 pb-0"
          >
            USER MANAGEMENT
          </div>
          @if (session('status'))
                <div class="alert alert-success text-center fw-bold">
                    {{session('status')}}
                </div>
            @endif
            
            <div class="row">
              <div class="card-header mb-3">
                <a href="{{url('admin/users/create')}}" class="btn btn-success btn-sm float-end">Add User</a>
              </div>
              <table>
                <thead>
                  <tr class="tableheader p-3">
                    <th class="col-1 text-center">User ID</th>
                    <th class="col-2 p-2">First Name</th>
                    <th class="col-2 p-2">Last Name</th>
                    <th class="col-3 p-2">Email</th>
                    <th class="col-1 text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($User as $item )
                  <tr>
                    <td class="text-center">{{$item->id}}</td>
                    <td class="p-2">{{$item->firstname}}</td>
                    <td class="p-2">{{$item->lastname}}</td>
                    <td class="p-2">{{$item->email}}</td>
                    <td><button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                      data-bs-target="#ViewUserModal-{{ $item->id }}">
                      View
                      </button>
                    </td>
                  </tr>
                    <!-- Modal for View User -->
                    <div class="modal fade" id="ViewUserModal-{{ $item->id }}" tabindex="-1"
                      aria-labelledby="ViewUserModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="ViewUserModalLabel">View User Info</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <strong>First Name: </strong>{{$item->firstname}}<br>
                                <strong>Last Name: </strong>{{$item->lastname}}<br>
                                <strong>Email: </strong>{{$item->email}}<br>
                                <strong>Phone: </strong>{{$item->phone}}<br>
                                <strong>Address: </strong>{{$item->address}}<br>
                                <strong>Username: </strong>{{$item->name}}<br>
                                <strong>Password: </strong>{{$item->password}}<br>
                              </div>
                              <div class="modal-footer">
                                <div class="d-flex w-100 m-0">
                                  <a href="{{url('admin/users/'.$item->id.'/edit')}}" class="btn-success w-50 btn btn-sm my-1  mx-1 ">Update</a><br>
                                  <button type="button" class="btn-danger w-50 btn btn-sm my-1  mx-1 " data-bs-toggle="modal"
                                          data-bs-target="#deleteUserModal-{{ $item->id }}">
                                          Delete
                                  </button>
                                </div>
                                
                              </div>
                          </div>
                      </div>
                  </div>
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
                              <a href="{{url('admin/users/'.$item->id.'/delete')}}" class="btn btn-sm w-100 btn-danger">Delete</a>
                                <button type="button" class="btn  btn-sm w-100 btn-secondary" data-bs-dismiss="modal">Discard
                                </button>
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