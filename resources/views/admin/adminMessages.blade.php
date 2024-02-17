@extends('layouts.adminnav')

@section('navbar')

        <!--messages dashbord-->
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
                        <nav
                            id="adminOptions"
                            class="userlink nav nav-pills flex-column"
                        >
                            <a
                                id="adminHome"
                                class="nav-link"
                                aria-current="page"
                                href="{{route('admin.index')}}"
                                >Home</a
                            >
                            <a class="nav-link" href="{{route('admin.adminQuotes')}}"
                                >Quotes</a
                            >
                            <a
                                class="nav-link"
                                href="{{route('admin.adminBookings')}}"
                                >Bookings</a
                            >
                            <a class="nav-link  active ActiveOption text-white" href="{{route('admin.adminMessages')}}">Messages</a>
                            <a class="nav-link" href="{{route('admin.adminContactus')}}">Enquiries</a>
                            <a class="nav-link" href="{{route('admin.adminUsers')}}">Users</a>
                            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();" class="nav-link">Logout</a>
                            <form action="{{route('logout')}}" method="POST" id="formLogout">@csrf</form>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-10 col-12 ps-lg-3">
                    <div
                        class="section-header text-center display-4 fw-bold mb-5 pb-md-3 pb-sm-0 pb-0"
                    >
                        MESSAGES
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success text-center fw-bold">
                        {{session('status')}}
                    </div>
                    @endif
                    
                </div>
            </div>
    </section>
<!--end of bookings dashbord-->

@endsection