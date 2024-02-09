@extends('layouts.adminnav')

@section('navbar')

<!--admin dashbord-->
<section id="admin" class=" container nav-margin pb-5">
    <div class="row">
      <div class="col-lg-3 col-12 mx-auto mb-4">
        <div
          class="col-lg-12 col-md-11 pe-lg-5 pe-0 mt-3 mx-auto text-center"
        >
          <div class="text-center h2 pb-4">ADMIN DASHBOARD</div>
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
            <a class="nav-link" href="{{route('admin.adminMessages')}}">Messages</a>
            <a class="nav-link" href="{{route('admin.adminContactus')}}">Contact Us</a>
            <a class="nav-link" href="{{route('admin.adminUsers')}}">Users</a>
            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();" class="nav-link">Logout</a>
            <form action="{{route('logout')}}" method="POST" id="formLogout">@csrf</form>
          </nav>
        </div>
      </div>
      <div class="col-lg-9 col-12">
        <div
          class="section-header text-center display-4 fw-bold mb-5 pb-md-3 pb-sm-0 pb-0"
        >
          CLEAN HOUSE BROS
        </div>
      </div>
    </div>
  </section>
  <!--end of admin dashbord-->
  @endsection