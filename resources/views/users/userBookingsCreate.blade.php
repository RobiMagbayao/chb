@extends('layouts.navfooter')
@section('content')

<!--user dashbord-->
<section class="container nav-margin">
    <div class="row">
      <div class="col-12">
        <div
          class="section-header text-center display-4 fw-bold mb-5 pb-md-3 pb-sm-0 pb-0"
        >
          BOOKING SCHEDULE
        </div>
          @if (session('status'))
            <div class="alert alert-success text-center fw-bold">
                {{session('status')}}
            </div>
          @endif
          <form class="row" action="{{url('/my-bookings/create')}}" method="POST">
            @csrf
            <div class="visually-hidden">
              <input type="text" name="user_id" value="@auth {{ Auth::user()->id }} @endauth">
              <input type="text" name="quote_id" value="{{'quote_id'}}">
            </div>
            <div class="col-md-6 col-12 px-4 pb-3">
              <div class="mb-3">
                  <label for="booking_date" class="userDetail form-label">Choose schedule date</label>
                  <input class="form-control" type="date" id="booking_date" name="booking_date" value="{{old('booking_date')}}" required>
                  @error('booking_date') <span class="text-danger">{{$message}}</span>  @enderror
              </div>
          </div>
          <div class="col-md-6 col-12 px-4 pb-3">
            <label class="form-label fw-bold" for="booking_time">Choose schedule time</label>
            <select class="form-select service-border" aria-label="Select time" name="booking_time" id="booking_time">
                <option value="9 AM">9 AM</option>
                <option value="12 PM">12 PM</option>
                <option value="3 PM">3 PM</option>
            </select>
          </div>
    </div>
    <div class="text-center my-4">
      <button type="submit" class="btn btn-success col-lg-3 col-md-4 col-sm-4 col-8 mt-3">Confirm</button><br>
      <a href="{{url('/my-bookings')}}" ><button type="button" class="btn btn-secondary col-lg-3 col-md-4 col-sm-4 col-8 mt-3">Discard</button></a>
    </div>
    </form>
      </div>
    </div>
  </section>
  <!--end of user dashbord-->
@endsection