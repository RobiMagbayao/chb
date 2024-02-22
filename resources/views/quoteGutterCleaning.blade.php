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
        <form id="quoteForm" action="{{ url('gutter_cleaning') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="visually-hidden">
                <input type="text" name="service_type" value="Gutter Cleaning">
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
          
            <div class="col-md-10 col-sm-11 col-12 mx-auto">
              <label class="form-label fw-bold" for="type_of_roof"
                >Select roof type</label
              >
              <select
                class="form-select service-border"
                aria-label="Select roof type"
                name="type_of_roof"
                id="type_of_roof"
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
                >Does it have a gutter guard installed?</label
              >
              <select
                class="form-select service-border"
                aria-label="with_gutter_guard"
                name="with_gutter_guard"
                id="with_gutter_guard"
              >
                <option value="No">No, it doesn't have a gutter guard</option>
                <option value="Yes">Yes, it has a gutter guard</option>
              </select>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-4 mx-auto">
              <label class="form-label fw-bold" for="gutter_length"
                >Select gutter length</label
              >
              <select
                class="form-select service-border"
                aria-label="gutter_length"
                name="gutter_length"
                id="gutter_length"
              >
                <option value="Not sure">I'm not sure</option>
                <option value="Less than 100 LFT">
                  Less than 100 LFT
                </option>
                <option value="101-150 LFT">101-150 LFT</option>
                <option value="151-200 LFT">151-200 LFT</option>
                <option value="201-251 LFT">201-250 LFT</option>
                <option value="251-300 LFT">251-300 LFT</option>
                <option value="301-350 LFT">301-350 LFT</option>
                <option value="351-400 LFT">351-400 LFT</option>
                <option value="401-450 LFT">401-450 LFT</option>
                <option value="451-500 LFT">451-500 LFT</option>
                <option value="More than 600 LFT">
                  More than 500 LFT
                </option>
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
                value="@auth{{Auth::user()->address}}@endauth"
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