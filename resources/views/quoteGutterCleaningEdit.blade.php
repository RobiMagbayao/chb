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
        <form action="{{ url('gutter_cleaning/'.$quote->id.'/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="visually-hidden">
                <input type="text" name="service_type" value="Gutter Cleaning">
                @error('service_type')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" name="user_id" value="{{$quote->user_id}}">
                @error('user_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" name="status" value="{{$quote->status}}">
                @error('status')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" name="quote" value="Pending">
            </div>   
            
            <div class="col-md-10 col-sm-11 col-12 mx-auto">
              <label class="form-label fw-bold" for="type_of_roof">Select roof type</label>
              <select class="form-select service-border" aria-label="Select roof type" name="type_of_roof" id="type_of_roof">
                <option value="Ceramic Tiles" {{ $quote->type_of_roof == 'Ceramic Tiles' ? 'selected' : '' }}>Ceramic Tiles</option>
                <option value="Clay Tiles" {{ $quote->type_of_roof == 'Clay Tiles' ? 'selected' : '' }}>Clay Tiles</option>
                <option value="Concrete Tiles" {{ $quote->type_of_roof == 'Concrete Tiles' ? 'selected' : '' }}>Concrete Tiles</option>
                <option value="Terra-Cotta Tiles" {{ $quote->type_of_roof == 'Terra-Cotta Tiles' ? 'selected' : '' }}>Terra-Cotta Tiles</option>
                <option value="Metal Roof" {{ $quote->type_of_roof == 'Metal Roof' ? 'selected' : '' }}>Metal Roof</option>
              </select>
          </div>          
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label class="form-label fw-bold" for="with_gutter_guard"
                >Does it have a gutter guard installed?</label
              >
              <select class="form-select service-border" aria-label="with_gutter_guard" name="with_gutter_guard" id="with_gutter_guard">
                <option value="No" {{ $quote->with_gutter_guard == 'No' ? 'selected' : '' }}>No, it doesn't have a gutter guard</option>
                <option value="Yes" {{ $quote->with_gutter_guard == 'Yes' ? 'selected' : '' }}>Yes, it has a gutter guard</option>
            </select>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label class="form-label fw-bold" for="gutter_length"
                >Select gutter length</label
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
            </select>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label class="form-label fw-bold" for="property_address"
                >Enter property address</label
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
            <div class="col-md-10 col-sm-11 col-12 mx-auto my-4">
              <label for="comment" class="form-label fw-bold"
                >Message (Optional)</label
              >
              <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Write Your Message">{{$quote->comment}}</textarea>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label for="photo" class="form-label fw-bold">Upload Photo (Optional)</label>
              <input class="form-control" type="file" id="photo" name="photo" value="{{$quote->photo}}">
            </div>
            <div class="btns col-10 mx-auto text-center">
              <button
                type="submit"
                class="button btn-contact text-white btn rounded-0 py-2 px-4 mt-4"
                id="requestQuote"
              >
              Update
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--end of services section-->

@endsection