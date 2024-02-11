@extends('layouts.navfooter')
@section('content')

    <!--user dashbord-->
    <section class="container nav-margin">
      <div class="row">
        <div class="col-lg-3 col-12 mx-auto mb-4">
          <div class="mx-auto">
            <center>
              <img
                class="userImage" style="width:150px; height: 150px; object-fit: cover;"
                src="assets/images/userImage.png"
                alt="user image"
              />
            </center>
          </div>
          <div class="username text-center h5 mt-3">User name</div>
          <div
            class="col-lg-12 col-md-11 pe-lg-5 pe-0 mt-5 mx-auto text-center"
          >
            <nav id="userOption" class="userlink nav nav-pills flex-column">
              <a class="nav-link" aria-current="page" href="{{route('user.index')}}"
                >User Profile</a
              >
              <a
                id="userQuotes"
                class="nav-link active ActiveOption text-white"
                href="{{route('user.userQuotes')}}"
                >Quotes</a
              >
              <a class="nav-link" href="{{route('user.userBookings')}}">Bookings</a>
              <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();" class="nav-link">Logout</a>
              <form action="{{route('logout')}}" method="POST" id="formLogout">@csrf</form>
            </nav>
          </div>
        </div>
        <div class="col-lg-9 col-12">
          <div
            class="section-header text-center display-4 fw-bold mb-5 pb-md-3 pb-sm-0 pb-0"
          >
            QUOTES
          </div>
          @if (session('status'))
              <h6 class="alert alert-success">{{ session('status') }}</h6>
          @endif
          <div class="row">
            <table>
              <tr class="tableheader p-3">
                <th class="col-2 p-2">Date</th>
                <th class="col-4 p-2">Project Details</th>
                <th class="col-2 p-2">Quote</th>
                <th class="col-2 p-2">Status</th>
                <th class="col-2 text-center">Action</th>
              </tr>
              <tr class="quoteEntry">
                <td class="ps-2">Jan 1, 2024</td>
                <td class="ps-2 py-3">
                  <div class="fw-bold">Service</div>
                  <div class="pb-2">Solar Panel Cleaning</div>
                  <div class="fw-bold">Quantity</div>
                  <div class="pb-2">12</div>
                  <div class="fw-bold">Address</div>
                  <div class="">123 Bacoor, Cavite</div>
                </td>
                <td class="ps-2">$120</td>
                <td class="ps-2">Booked</td>
                <td>
                  <div class="w-100 btn btn-sm my-1 btn-success">Book</div>
                  <div class="w-100 btn btn-sm my-1 btn-secondary">Edit</div>
                  <div class="w-100 btn btn-sm my-1 btn-danger">Cancel</div>
                </td>
              </tr>
              <tr class="quoteEntry">
                <td class="ps-2">Jan 1, 2024</td>
                <td class="ps-2 py-3">
                  <div class="fw-bold">Service</div>
                  <div class="pb-2">Solar Panel Cleaning</div>
                  <div class="fw-bold">Quantity</div>
                  <div class="pb-2">12</div>
                  <div class="fw-bold">Address</div>
                  <div class="">123 Bacoor, Cavite</div>
                </td>
                <td class="ps-2">$120</td>
                <td class="ps-2">Booked</td>
                <td>
                  <div class="w-100 btn btn-sm my-1 btn-success">Book</div>
                  <div class="w-100 btn btn-sm my-1 btn-secondary">Edit</div>
                  <div class="w-100 btn btn-sm my-1 btn-danger">Cancel</div>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--end of user dashbord-->

    @endsection
