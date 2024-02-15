@extends('layouts.navfooter')
@section('content')

 <!-- services section -->
 <section id="contact" class="nav-margin">
    <div class="container">
      <div class="row my-auto">
        <div
          class="section-header col-12 display-4 fw-bold text-center mb-5 pb-md-3 pb-sm-0 pb-0"
        >
          Roof Cleaning
        </div>
        <div
          class="col-lg-6 col-md-6 col-12 mx-auto ps-lg-5 ps-md-4 ps-sm-0 px-sm-0 px-sm-0 px-4"
        >
          <div class="h5 mb-2 fw-bold">Roof Cleaning Inclusions</div>
          <div>
            <ul>
              <li>Thorough cleaning of roof</li>
              <li>House Wash for your property</li>
              <li>House wash for your affected neighbors</li>
            </ul>
          </div>
          <div class="h5 mt-4 mb-2 fw-bold">Pricing</div>
          <div>
            Our pricing for roof cleaning services is personalized based on
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
        <form action="{{ url('roof_cleaning/'.$quote->id.'/edit') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="visually-hidden">
              <input type="text" name="service_type" value="Roof Cleaning">
              @error('service_type')
                  <span class="text-danger">{{$message}}</span>
              @enderror
              <input type="text" name="user_id" value="{{$quote->user_id}}">
              @error('user_id')
                  <span class="text-danger">{{$message}}</span>
              @enderror
          </div>   
            <div class="col-md-10 col-sm-11 col-12 mx-auto">
              <label class="form-label fw-bold" for="type_of_roof"
                >Select roof type</label
              >
              <select class="form-select service-border" aria-label="Select roof type" name="type_of_roof" id="type_of_roof">
                <option value="Ceramic Tiles" {{ $quote->type_of_roof == 'Ceramic Tiles' ? 'selected' : '' }}>Ceramic Tiles</option>
                <option value="Clay Tiles" {{ $quote->type_of_roof == 'Clay Tiles' ? 'selected' : '' }}>Clay Tiles</option>
                <option value="Concrete Tiles" {{ $quote->type_of_roof == 'Concrete Tiles' ? 'selected' : '' }}>Concrete Tiles</option>
                <option value="Terra-Cotta Tiles" {{ $quote->type_of_roof == 'Terra-Cotta Tiles' ? 'selected' : '' }}>Terra-Cotta Tiles</option>
                <option value="Metal Roof" {{ $quote->type_of_roof == 'Metal Roof' ? 'selected' : '' }}>Metal Roof</option>
              </select>
            </div>

            <div class="col-md-10 col-sm-11 col-12 my-3 mx-auto">
                <label class="form-label fw-bold" for="area_size"
                  >Select area size</label
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
              </select>   
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-3 mx-auto">
                <label class="form-label fw-bold" for="with_algae"
                  >Does it have any bioorganisms like algae, moss, or mildew?</label
                >
                <select class="form-select service-border" aria-label="does it have algae?" name="with_algae" id="with_algae">
                  <option value="No" {{ $quote->with_algae == 'No' ? 'selected' : '' }}>No</option>
                  <option value="Yes" {{ $quote->with_algae == 'Yes' ? 'selected' : '' }}>Yes</option>
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