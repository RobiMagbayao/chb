@extends('layouts.navfooter')
@section('content')

<!-- services section -->
<section id="contact" class="nav-margin">
    <div class="container">
      <div class="row my-auto">
        <div
          class="section-header col-12 display-4 fw-bold text-center mb-5 pb-md-3 pb-sm-0 pb-0"
        >
          Power Wash
        </div>
        <div
          class="col-lg-6 col-md-6 col-12 mx-auto ps-lg-5 ps-md-4 ps-sm-0 px-sm-0 px-sm-0 px-4"
        >
          <div class="h5 mb-2 fw-bold">Power Wash Inclusions</div>
          <div>
            <ul>
              <li>Thorough cleaning of your property through power wash</li>
            </ul>
          </div>
          <div class="h5 mt-4 mb-2 fw-bold">Pricing</div>
          <div>
            Our pricing for power wash services is personalized based on the
            specific details of your property. We prioritize delivering
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
          <form action="{{ url('power_wash') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="visually-hidden">
              <input type="text" name="service_type" value="Power Wash">
              @error('service_type')
                  <span class="text-danger">{{$message}}</span>
              @enderror
              <input type="text" name="user_id" value="@auth {{ Auth::user()->id }} @endauth">
              @error('user_id')
                  <span class="text-danger">{{$message}}</span>
              @enderror
              <input type="hidden" name="with_personal_info" id="with_personal_info" value="">
              <input type="text" name="status" value="Pending">
                @error('status')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="text" name="quote" value="Pending">
          </div>   
            <div class="col-md-10 col-sm-11 col-12 mb-3 mx-auto">
              <label class="form-label fw-bold" for="type_of_area"
                >Select the area to power wash</label
              >
              <select
                class="form-select  service-border"
                aria-label="select the area to power wash"
                name="type_of_area"
                id="type_of_area"
              >
                <option value="Driveway">Drive Way</option>
                <option value="Fences">Fences</option>
                <option value="House exterior">House Exterior</option>
                <option value="Walkway">Walkway</option>
              </select>
            </div>

            <div class="col-md-10 col-sm-11 col-12 my-3 mx-auto">
              <label class="form-label fw-bold" for="area_size"
                >Select area size</label
              >
              <select
                class="form-select service-border"
                aria-label="area_size"
                name="area_size"
                id="area_size"
              >
                <option value="Less than 500 sq ft">
                  Less than 500 sq ft
                </option>
                <option value="501-1,000 sq ft">501-1,000 sq ft</option>
                <option value="1,001-1,500 sq ft">1,001-1,500 sq ft</option>
                <option value="1,501-2,000 sq ft">1,501-2,000 sq ft</option>
                <option value="2,001-2,500 sq ft">2,001-2,500 sq ft</option>
                <option value="2,501-3,000 sq ft">2,501-3,000 sq ft</option>
                <option value="3,001-3,500 sq ft">3,001-3,500 sq ft</option>
                <option value="3,501-4,000 sq ft">3,501-4,000 sq ft</option>
                <option value="4,001-4,500 sq ft">4,001-4,500 sq ft</option>
                <option value="4,501-5,000 sq ft">4,501-5,000 sq ft</option>
                <option value="More than 5,000 sq ft">
                  More than 5,000 sq ft
                </option>
              </select>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-3 mx-auto">
              <label class="form-label fw-bold" for="with_algae"
                >Does it have any signs of rust, oil spills, paint, gum, calcium buildup, or any bioorganisms like algae?</label
              >
              <select
                class="form-select service-border"
                aria-label="does it have algae?"
                name="with_algae"
                id="with_algae"
              >
                <option value="No">
                  No
                </option>
                <option value="Yes">Yes</option>
              </select>
            </div>
            <!--GOOGLE MAP API-->
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label class="form-label fw-bold" for="property_address"
                >Enter property address</label
              >
              <input
                class="form-control map-input"
                type="text"
                id="property_address"
                name="property_address"
                required
                pattern=".{10,}"
                title="Please enter at least 10 characters"
                placeholder="Enter property address"
                value="@auth {{ Auth::user()->address }} @endauth"
              />
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto  visually-hidden">
              <label class="form-label fw-bold" for="address-latitude"
                >Latitude</label
              >
              <input
                class="form-control"
                type="text"
                id="address-latitude"
              />
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto visually-hidden">
              <label class="form-label fw-bold" for="address-longitude"
                >Longitude</label
              >
              <input
                class="form-control"
                type="text"
                id="address-longitude"
              />
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <div id="address-map-container" style="width: 100%;height:250px;">
                <div style="width:100%;height:100%" id="address-map"></div>
              </div>
            </div>
            <!--GOOGLE MAP API-->
            <div class="col-md-10 col-sm-11 col-12 mx-auto my-4">
              <label for="comment" class="form-label fw-bold"
                >Message (Optional)</label
              >
              <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Write Your Message">{{old('comment')}}</textarea>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label for="photo" class="form-label fw-bold">Upload Photo (Optional)</label>
              <input class="form-control" type="file" id="photo" name="photo">
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
  <script>
    document.getElementById('requestQuote').addEventListener('click', function(event) {
        var firstName = "{{ Auth::user()->firstname }}";
        if (firstName === '') {
            alert('Please complete your personal details first.');
            event.preventDefault();
        } else {
            document.getElementById('with_personal_info').value = 'yes';
            document.getElementById('quoteForm').submit();
        }
    });
</script>
@endsection