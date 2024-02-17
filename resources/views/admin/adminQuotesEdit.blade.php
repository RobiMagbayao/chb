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
            <a
              class="nav-link active ActiveOption text-white"
              href="{{route('admin.adminQuotes')}}"
              >Quotes</a
            >
            <a class="nav-link" href="{{route('admin.adminBookings')}}">Bookings</a>
            <a class="nav-link" href="{{route('admin.adminMessages')}}">Messages</a>
            <a class="nav-link" href="{{route('admin.adminContactus')}}">Enquiries</a>
            <a class="nav-link" href="{{route('admin.adminUsers')}}">Users</a>
            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();" class="nav-link">Logout</a>
            <form action="{{route('logout')}}" method="POST" id="formLogout">@csrf</form>
          </nav>
          </div>
        </div>
        <div class="col-lg-10 col-12  ps-lg-3">
          <div
            class="section-header text-center display-6 fw-bold mb-5 pb-sm-0 pb-0 text-uppercase"
          >
            Quote for {{$quote->user->firstname}}
          </div>
          @if (session('status'))
                <div class="alert alert-success text-center fw-bold">
                    {{session('status')}}
                </div>
            @endif
          <div class="row">
            <form class="row" action="{{url('/admin/quotes/'.$quote->id.'/edit')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="visually-hidden">
                  <input type="text" name="service_type" value="{{$quote->service_type}}">
                  @error('service_type')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                  <input type="text" name="user_id" value="{{$quote->user_id}}">
                  @error('user_id')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>  

                <!--service-->
                <div class="col-md-6 col-12 my-3 mx-auto">
                    <label class="form-label fw-bold" for="service_type"
                      >Service</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="service_type"
                      name="service_type"
                      value="{{$quote->service_type}}"
                      readonly
                      disabled
                    />
                </div>
                  <!--address-->
                  <div class="col-md-6 col-12 my-3 mx-auto">
                    <label class="form-label fw-bold" for="property_address"
                      >Property address</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      id="property_address"
                      name="property_address"
                      required
                      pattern=".{10,}"
                      title="Please enter at least 10 characters"
                      placeholder="Enter property address"
                      value="{{$quote->property_address}}"
                    />
                </div>

                <!--Roof Type-->
                <div class="col-md-6 col-12 my-3 mx-auto">
                    <label class="form-label fw-bold" for="type_of_roof">Roof type</label>
                    <select class="form-select service-border" aria-label="Select roof type" name="type_of_roof" id="type_of_roof">
                      <option value="Ceramic Tiles" {{ $quote->type_of_roof == 'Ceramic Tiles' ? 'selected' : '' }}>Ceramic Tiles</option>
                      <option value="Clay Tiles" {{ $quote->type_of_roof == 'Clay Tiles' ? 'selected' : '' }}>Clay Tiles</option>
                      <option value="Concrete Tiles" {{ $quote->type_of_roof == 'Concrete Tiles' ? 'selected' : '' }}>Concrete Tiles</option>
                      <option value="Terra-Cotta Tiles" {{ $quote->type_of_roof == 'Terra-Cotta Tiles' ? 'selected' : '' }}>Terra-Cotta Tiles</option>
                      <option value="Metal Roof" {{ $quote->type_of_roof == 'Metal Roof' ? 'selected' : '' }}>Metal Roof</option>
                      <option value="" {{ $quote->type_of_roof === null ? 'selected' : '' }}></option>
                    </select>
                </div>  

                <!--With gutter guard-->
                <div class="col-md-6 col-12 my-3 mx-auto">
                  <label class="form-label fw-bold" for="with_gutter_guard"
                    >Does it have a gutter guard installed?</label
                  >
                  <select class="form-select service-border" aria-label="with_gutter_guard" name="with_gutter_guard" id="with_gutter_guard">
                    <option value="">Select an option</option>
                    <option value="No" {{ $quote->with_gutter_guard === 'No' ? 'selected' : '' }}>No</option>
                    <option value="Yes" {{ $quote->with_gutter_guard === 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="" {{ $quote->with_gutter_guard === null ? 'selected' : '' }}></option>
                  </select>                
                </div>

                <!--Gutter length-->
                <div class="col-md-6 col-12 my-3 mx-auto">
                  <label class="form-label fw-bold" for="gutter_length"
                    >Gutter length</label
                  >
                  <select class="form-select service-border" aria-label="gutter_length" name="gutter_length" id="gutter_length">
                    <option value="not sure" {{ $quote->gutter_length == 'not sure' ? 'selected' : '' }}>I'm not sure</option>
                    <option value="Less than 100 LFT" {{ $quote->gutter_length == 'Less than 100 LFT' ? 'selected' : '' }}>Less than 100 LFT</option>
                    <option value="101-150 LFT" {{ $quote->gutter_length == '101-150 LFT' ? 'selected' : '' }}>101-150 LFT</option>
                    <option value="151-200 LFT" {{ $quote->gutter_length == '151-200 LFT' ? 'selected' : '' }}>151-200 LFT</option>
                    <option value="201-251 LFT" {{ $quote->gutter_length == '201-251 LFT' ? 'selected' : '' }}>201-251 LFT</option>
                    <option value="251-300 LFT" {{ $quote->gutter_length == '251-300 LFT' ? 'selected' : '' }}>251-300 LFT</option>
                    <option value="301-350 LFT" {{ $quote->gutter_length == '301-350 LFT' ? 'selected' : '' }}>301-350 LFT</option>
                    <option value="351-400 LFT" {{ $quote->gutter_length == '351-400 LFT' ? 'selected' : '' }}>351-400 LFT</option>
                    <option value="401-450 LFT" {{ $quote->gutter_length == '401-450 LFT' ? 'selected' : '' }}>401-450 LFT</option>
                    <option value="451-500 LFT" {{ $quote->gutter_length == '451-500 LFT' ? 'selected' : '' }}>451-500 LFT</option>
                    <option value="More than 600 LFT" {{ $quote->gutter_length == 'More than 600 LFT' ? 'selected' : '' }}>More than 500 LFT</option>
                    <option value="" {{ $quote->gutter_length === null ? 'selected' : '' }}></option>
                </select>       
              </div>
              <!--Gutter size-->
              <div class="col-md-6 col-12 my-3 mx-auto">
                <label class="form-label fw-bold" for="gutter_size"
                  >Gutter size</label
                >
                <select class="form-select service-border" aria-label="gutter_size" name="gutter_size" id="gutter_size">
                  <option value="5-inches" {{ $quote->gutter_size == '5-inches' ? 'selected' : '' }}>5-inches</option>
                  <option value="6-inches" {{ $quote->gutter_size == '6-inches' ? 'selected' : '' }}>6-inches</option>
                  <option value="" {{ $quote->gutter_size === null ? 'selected' : '' }}></option>
                </select>
              </div>

              <!--Area to power wash-->
              <div class="col-md-6 col-12 my-3 mx-auto">
                <label class="form-label fw-bold" for="type_of_area"
                  >Area to power wash</label
                >
                <select class="form-select service-border" aria-label="select the area to power wash" name="type_of_area" id="type_of_area">
                  <option value="Driveway" {{ $quote->type_of_area == 'Driveway' ? 'selected' : '' }}>Drive Way</option>
                  <option value="Fences" {{ $quote->type_of_area == 'Fences' ? 'selected' : '' }}>Fences</option>
                  <option value="House exterior" {{ $quote->type_of_area == 'House exterior' ? 'selected' : '' }}>House Exterior</option>
                  <option value="Walkway" {{ $quote->type_of_area == 'Walkway' ? 'selected' : '' }}>Walkway</option>
                  <option value="" {{ $quote->type_of_area === null ? 'selected' : '' }}></option>
              </select>            
              </div>
  
              <!--Area size-->
              <div class="col-md-6 col-12 my-3 mx-auto">
                <label class="form-label fw-bold" for="area_size"
                  >Area size</label
                >
                <select class="form-select service-border" aria-label="area_size" name="area_size" id="area_size">
                  <option value="Less than 500 sq ft" {{ $quote->area_size == 'Less than 500 sq ft' ? 'selected' : '' }}>Less than 500 sq ft</option>
                  <option value="501-1,000 sq ft" {{ $quote->area_size == '501-1,000 sq ft' ? 'selected' : '' }}>501-1,000 sq ft</option>
                  <option value="1,001-1,500 sq ft" {{ $quote->area_size == '1,001-1,500 sq ft' ? 'selected' : '' }}>1,001-1,500 sq ft</option>
                  <option value="1,501-2,000 sq ft" {{ $quote->area_size == '1,501-2,000 sq ft' ? 'selected' : '' }}>1,501-2,000 sq ft</option>
                  <option value="2,001-2,500 sq ft" {{ $quote->area_size == '2,001-2,500 sq ft' ? 'selected' : '' }}>2,001-2,500 sq ft</option>
                  <option value="2,501-3,000 sq ft" {{ $quote->area_size == '2,501-3,000 sq ft' ? 'selected' : '' }}>2,501-3,000 sq ft</option>
                  <option value="3,001-3,500 sq ft" {{ $quote->area_size == '3,001-3,500 sq ft' ? 'selected' : '' }}>3,001-3,500 sq ft</option>
                  <option value="3,501-4,000 sq ft" {{ $quote->area_size == '3,501-4,000 sq ft' ? 'selected' : '' }}>3,501-4,000 sq ft</option>
                  <option value="4,001-4,500 sq ft" {{ $quote->area_size == '4,001-4,500 sq ft' ? 'selected' : '' }}>4,001-4,500 sq ft</option>
                  <option value="4,501-5,000 sq ft" {{ $quote->area_size == '4,501-5,000 sq ft' ? 'selected' : '' }}>4,501-5,000 sq ft</option>
                  <option value="More than 5,000 sq ft" {{ $quote->area_size == 'More than 5,000 sq ft' ? 'selected' : '' }}>More than 5,000 sq ft</option>
                  <option value="" {{ $quote->area_size === null ? 'selected' : '' }}></option>
              </select>   
            </div>
            <!--With Algae-->
            <div class="col-md-6 col-12 my-3 mx-auto">
                <label class="form-label fw-bold" for="with_algae"
                  >Does it have stains or bioorganisms?</label
                >
                <select class="form-select service-border" aria-label="does it have algae?" name="with_algae" id="with_algae">
                  <option value="No" {{ $quote->with_algae == 'No' ? 'selected' : '' }}>No</option>
                  <option value="Yes" {{ $quote->with_algae == 'Yes' ? 'selected' : '' }}>Yes</option>
                  <option value="" {{ $quote->with_algae === null ? 'selected' : '' }}></option>
                </select>  
            </div>


            <!--solar panel-->
            <div class="col-md-6 col-12 my-3">
              <label class="form-label fw-bold" for="solar_qty"
                >Solar panel quantity</label
              >
              <input
                class="form-control"
                type="number"
                id="solar_qty"
                name="solar_qty"
                min="1"
                value="{{$quote->solar_qty}}"
              />
            </div>

            <!--window-->
            <div class="col-md-6 col-12 my-3">
              <label class="form-label fw-bold" for="window_qty"
                >Window quantity</label
              >
              <input
                class="form-control"
                type="number"
                id="window_qty"
                name="window_qty"
                min="1"
                value="{{$quote->window_qty}}"
              />
            </div>

            <!-- Status -->
            <div class="col-md-6 col-12 my-3 mx-auto">
              <label class="form-label fw-bold" for="status">Status</label>
              <select class="form-select service-border" aria-label="Select status" name="status" id="status">
                  <option value="Pending" {{ $quote->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                  <option value="With quote" {{ $quote->status == 'With quote' ? 'selected' : '' }}>With quote</option>
                  <option value="Booked" {{ $quote->status == 'Booked' ? 'selected' : '' }}>Booked</option>
                  <option value="Completed (paid)" {{ $quote->status == 'Completed (paid)' ? 'selected' : '' }}>Completed (paid)</option>
                  <option value="Completed (unpaid)" {{ $quote->status == 'Completed (unpaid)' ? 'selected' : '' }}>Completed (unpaid)</option>
                  <option value="Cancelled" {{ $quote->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>  
              </select>
            </div>

            <!-- Quote -->
            <div class="col-md-6 col-12 my-3">
              <label class="form-label fw-bold" for="quote">Quote</label>
              <textarea class="form-control" maxlength="255" name="quote" id="quote" rows="2">{{ $quote->quote }}</textarea>
            </div>

            
              
        <div class="text-center my-4">
            <button type="submit" class="btn btn-success col-lg-3 col-md-4 col-sm-4 col-8 mt-3">Update</button><br>
            <a href="{{url('admin/quotes')}}" ><button type="button" class="btn btn-secondary col-lg-3 col-md-4 col-sm-4 col-8 mt-3">Discard</button></a>
        </div>
        </form>
          </div>

        </div>
      </div>
    </section>
    <!--end of user dashbord-->


@endsection