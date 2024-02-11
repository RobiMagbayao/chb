@extends('layouts.navfooter')
@section('content')

<!-- services section -->
<section id="contact" class="nav-margin">
    <div class="container">
      <div class="row my-auto">
        <div
          class="section-header col-12 display-4 fw-bold text-center mb-5 pb-md-3 pb-sm-0 pb-0"
        >
          Gutter Cleaning
        </div>
        <div
          class="col-lg-6 col-md-6 col-12 mx-auto ps-lg-5 ps-md-4 ps-sm-0 px-sm-0 px-sm-0 px-4"
        >
          <div class="h5 mb-2 fw-bold">Gutter Cleaning Inclusions</div>
          <div>
            <ul>
              <li>Thorough cleaning of gutters</li>
              <li>Unclogging of downspouts</li>
              <li>Meticulous leak checks</li>
            </ul>
          </div>
          <div class="h5 mt-4 mb-2 fw-bold">Pricing</div>
          <div>
            Our pricing for gutter cleaning services is personalized based on
            the specific details of your property. We prioritize delivering
            exceptional service with clear and competitive rates.
          </div>
          <div class="h5 mt-4 mb-2 fw-bold">How to Request for a Quote</div>
          <div>
            Please provide the necessary details for your project to request a quote. Kindly note that during weekdays, you can expect a quote within 24 hours, and on weekends or holidays, the response time may be up to 48 hours. We appreciate your patience and look forward to the opportunity to assist you with your project.
          </div>
        </div>
        <div
          class="col-lg-6 col-md-6 col-12 mx-auto pt-md-0 pt-4 px-md-0 px-sm-5 px-4"
        >
        <form action="{{url('/guttercleaning')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="visually-hidden">
              <input type="hidden" name="service_type" value="Gutter Cleaning">
              <input type="hidden" name="user_id" @auth value="{{Auth::user()->id}}" @endauth>
              <input type="hidden" name="quote_date" value="{{ now()->toDateTimeString() }}">
              <input type="hidden" name="gutter_size" value="{{ old('gutter_size')}}">
              <input type="hidden" name="window_qty" value="{{ old('window_qty')}}">
              <input type="hidden" name="solar_qty" value="{{ old('solar_qty')}}">
              <input type="hidden" name="with_algae" value="{{ old('with_algae')}}">
              <input type="hidden" name="type_of_area" value="{{ old('type_of_area')}}">
              <input type="hidden" name="area_size" value="{{ old('area_size')}}">
              <input type="hidden" name="price" value="{{ old('price')}}">
              <input type="hidden" name="status" value="{{ old('status')}}">
            </div>

            <div class="col-md-10 col-sm-11 col-12 mx-auto">
              <label class="form-label fw-bold" for="rooftype"
                >Select roof type</label
              >
              <select
                class="form-select"
                aria-label="Select roof type"
                name="type_of_roof"
                id="roofType"
              >
                <option value="Ceramic Tiles">Ceramic Tiles</option>
                <option value="Clay Tiles">Clay Tiles</option>
                <option value="Concrete Tiles">Concrete Tiles</option>
                <option value="Terra-Cotta Tiles">Terra-Cotta Tiles</option>
                <option value="Metal Roof">Metal Roof</option>
              </select>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label class="form-label fw-bold" for="with_gutter_guard"
                >Does it have a gutter guard?</label
              >
              <select
                class="form-select"
                aria-label="gutter size"
                name="with_gutter_guard"
                id="gutter_guard"
              >
                <option value="without gutter guard">No, it doesn't have a gutter guard</option>
                <option value="with gutter guard">Yes, it has a gutter guard</option>
              </select>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label class="form-label fw-bold" for="gutterLength"
                >Select gutter length</label
              >
              <select
                class="form-select"
                aria-label="gutter length"
                name="gutter_length"
                id="gutterLength"
              >
                <option value="not sure">I'm not sure</option>
                <option value="less than 100 sq ft">
                  Less than 100 sq ft
                </option>
                <option value="101-150 sq ft">101-200 sq ft</option>
                <option value="151-200 sq ft">201-300 sq ft</option>
                <option value="201-250 sq ft">301-400 sq ft</option>
                <option value="251-300 sq ft">401-500 sq ft</option>
                <option value="301-350 sq ft">501-600 sq ft</option>
                <option value="351-400 sq ft">401-500 sq ft</option>
                <option value="401-450 sq ft">501-600 sq ft</option>
                <option value="451-500 sq ft">401-500 sq ft</option>
                <option value="more than 500 sq ft">
                  More than 500 sq ft
                </option>
              </select>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label class="form-label fw-bold" for="propertyAddress"
                >Enter property address</label
              >
              <input
                class="form-control"
                type="text"
                id="propertyAddress"
                name="address"
                required
                pattern=".{10,}"
                title="Please enter at least 10 characters"
                placeholder="Enter property address"
                value="{{ old('address')}}"
              />
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label class="form-label fw-bold" for="formFileMultiple"
                >Upload Photos (Optional)</label
              >
              <input class="form-control" type="file" id="formFile1" value="null">
            </div>
            <div class="col-md-10 col-sm-11 col-12 mx-auto my-4">
              <label for="message" class="form-label fw-bold"
                >Message (Optional)</label
              >
              <textarea
                class="form-control"
                id="message"
                name="comments"
                rows="3"
                minlength="10"
                placeholder="Write Your Message"
                value="{{ old('comments')}}"
              ></textarea>
            </div>
            <div class="btns col-10 mx-auto text-center">
              <button
                type="submit"
                class="button btn-contact text-white btn rounded-0 py-2 px-4 mt-4"
                id="requestQuote"
              >
              Request for a Qoute
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--end of services section-->

@endsection