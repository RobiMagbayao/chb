@extends('layouts.navfooter')
@section('content')

<!-- services section -->
<section id="contact" class="nav-margin">
    <div class="container">
      <div class="row my-auto">
        <div
          class="section-header col-12 display-4 fw-bold text-center mb-5 pb-md-3 pb-sm-0 pb-0"
        >
          Window Cleaning
        </div>
        <div
          class="col-lg-6 col-md-6 col-12 mx-auto ps-lg-5 ps-md-4 ps-sm-0 px-sm-0 px-sm-0 px-4"
        >
          <div class="h5 mb-2 fw-bold">Window Cleaning Inclusions</div>
          <div>
            <ul>
              <li>Thorough cleaning of windows</li>
            </ul>
          </div>
          <div class="h5 mt-4 mb-2 fw-bold">Pricing</div>
          <div>
            Our pricing for window cleaning services is personalized based on
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
          <form>
            <div class="col-md-10 col-sm-11 col-12 mx-auto">
              <label class="form-label fw-bold" for="windowQuantity"
                >How many windows?</label
              >
              <input
                class="form-control"
                type="number"
                id="windowQuantity"
                name="windowQuantity"
                required
                min="1"
                placeholder="How many windows"
              />
              <div class="valid-feedback">Looks good!</div>
              <div class="invalid-feedback">
                Please enter a valid number, minimum is 1.
              </div>
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