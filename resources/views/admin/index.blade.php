@extends('layouts.adminnav')

@section('navbar')

<!--admin dashbord-->
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
              class="nav-link active ActiveOption text-white"
              aria-current="page"
              href="{{route('admin.index')}}"
              >Home</a
            >
            <a class="nav-link" href="{{route('admin.adminQuotes')}}">Quotes</a>
            <a class="nav-link" href="{{route('admin.adminBookings')}}">Bookings</a>
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
          CLEAN HOUSE BROS
        </div>
        <div class="row">
          <div class="col-md-4 col-12 mb-md-5 mb-3">
            <div class="card admincard">
              <div class="card-body text-center">
                <p class="card-title h5 pb-md-3">Pending Quote Request</p>
                <p class="card-text display-5">{{$pendingQuotesCount}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12 mb-md-5 mb-3">
            <div class="card admincard">
              <div class="card-body text-center">
                <p class="card-title h5 pb-md-3">Pending Enquiries</p>
                <p class="card-text display-5">{{$pendingEnquiriesCount}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12 mb-md-5 mb-3">
            <div class="card admincard">
              <div class="card-body text-center">
                <p class="card-title h5 pb-md-3">Pending Unpaid Projects</p>
                <p class="card-text display-5">{{$completedUnpaidCount}}</p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-12  mb-md-5 mb-3">
            <div class="card admincard">
              <div class="card-body text-center">
                <p class="card-title">Completed Jobs</p>
                <p class="card-text lead">{{$completedProjectsCount}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-12  mb-md-5 mb-3">
            <div class="card admincard">
              <div class="card-body text-center">
                <p class="card-title">Quote Requests</p>
                <p class="card-text lead">{{$totalQuotesCount}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-12  mb-md-5 mb-3">
            <div class="card admincard">
              <div class="card-body text-center">
                <p class="card-title">Bookings</p>
                <p class="card-text lead">{{$totalBookingsCount}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-12  mb-md-5 mb-3">
            <div class="card admincard">
              <div class="card-body text-center">
                <p class="card-title">Users</p>
                <p class="card-text lead">{{$totalUsersCount}}</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--end of admin dashbord-->
  @endsection