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
              <li>Thorough cleaning of your property</li>
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
          <form>
            <div class="col-md-10 col-sm-11 col-12 mb-3 mx-auto">
              <label class="form-label fw-bold" for="powerwashType"
                >Select the area to power wash</label
              >
              <select
                class="form-select"
                aria-label="select the area to power wash"
                name="powerwashType"
                id="powerwashType"
              >
                <option value="driveway">Drive Way</option>
                <option value="fences">Fences</option>
                <option value="house exterior">House Exterior</option>
                <option value="walkway">Walkway</option>
              </select>
            </div>

            <div class="col-md-10 col-sm-11 col-12 my-3 mx-auto">
              <label class="form-label fw-bold" for="areaSize"
                >What is the area size?</label
              >
              <select
                class="form-select"
                aria-label="area size"
                name="areaSize"
                id="areaSize"
              >
                <option value="less than 100 sq ft">
                  Less than 1,000 sq ft
                </option>
                <option value="1,001-2,000 sq ft">1,001-2,000 sq ft</option>
                <option value="2,001-3,001 sq ft">2,001-3,000 sq ft</option>
                <option value="3,001-4,001 sq ft">3,001-4,000 sq ft</option>
                <option value="4,001-5,001 sq ft">4,001-5,000 sq ft</option>
                <option value="5,001-6,000 sq ft">5,001-6,000 sq ft</option>
                <option value="more than 6,000 sq ft">
                  More than 600 sq ft
                </option>
              </select>
            </div>
            <div class="col-md-10 col-sm-11 col-12 my-3 mx-auto">
              <label class="form-label fw-bold" for="algae"
                >Does it have algae?</label
              >
              <select
                class="form-select"
                aria-label="does it have algae?"
                name="algae"
                id="algae"
              >
                <option value="with algae">Yes, it has algae</option>
                <option value="without algae">
                  No, my it doesn't have algae
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
                name="propertyAddress"
                required
                pattern=".{10,}"
                title="Please enter at least 10 characters"
                placeholder="Enter property address"
              />
            </div>
            <div class="col-md-10 col-sm-11 col-12 mx-auto my-4">
              <label for="message" class="form-label fw-bold"
                >Message (Optional)</label
              >
              <textarea
                class="form-control"
                id="message"
                name="message"
                rows="3"
                minlength="10"
                placeholder="Write Your Message"
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