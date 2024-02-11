@extends('layouts.navfooter')
@section('content')

<!--contact section-->
<section id="contact" class="nav-margin">
    <div class="container">
      <div class="row my-auto">
        <div
          class="section-header col-12 display-4 fw-bold text-center mb-5 pb-md-3 pb-sm-0 pb-0"
        >
          Let's Discuss Your Cleaning Needs
        </div>
        <div
          class="col-lg-6 col-md-6 col-12 mx-auto ps-lg-5 ps-md-0 px-sm-0 px-4"
        >
          <div class="">
            Have questions or need more information about our services? We're
            here to assist you.
          </div>
          <br />
          <div class="">
            Check out these <a href="{{route('faq.index')}}">FAQs</a>: Find quick answers
            to common queries about our cleaning solutions.
          </div>
          <br />
          <div class="">
            For personalized inquiries or further assistance, feel free to:
          </div>
          <br />
          <ul>
            <li><div class="">Email us at cleanhousebros@gmail.com</div></li>
            <li><div class="">Call us at 123-456-7890</div></li>
          </ul>
          <div class="pt-3">
            You can also provide your details, and our team will get in touch
            with you shortly.
          </div>
        </div>
        <div
          class="col-lg-6 col-md-6 col-12 my-auto mx-auto pt-md-0 pt-4 px-md-0 px-sm-5 px-4"
        >
        <form method="POST" action="{{ route('contactus.store') }}">
          @csrf
            <div class="col-md-10 col-sm-11 col-12 mx-auto">
              <label class="form-label contact-label" for="firstname"
                >Your First Name</label
              >
              <input class="form-control" type="text" id="firstname" name="firstname" required pattern=".{2,}" title="Please enter at least 2 characters" placeholder="Your First Name" @auth value="{{ Auth::user()->firstname }}" @endauth />
            </div>

            <div class="col-md-10 col-sm-11 col-12 my-3 mx-auto">
              <label class="form-label contact-label" for="lastname"
                  >Your Last Name</label
                >
                <input class="form-control" type="text" id="lastname" name="lastname" required pattern=".{2,}" title="Please enter at least 2 characters" placeholder="Your Last Name" @auth value="{{ Auth::user()->lastname }}" @endauth />
            </div>

            <div class="col-md-10 col-sm-11 col-12 my-3 mx-auto">
              <label class="form-label contact-label" for="email"
                >Email</label
              >
              <input
                class="form-control"
                type="email"
                id="email"
                name="email"
                required
                placeholder="Email"
                @auth value="{{ Auth::user()->email }}" @endauth
              />
            </div>

            <div class="col-md-10 col-sm-11 col-12 mb-3 mx-auto">
              <label class="form-label contact-label" for="phone"
                >Phone number</label
              >
              <input
                class="form-control"
                type="tel"
                id="phone"
                name="phone"
                required
                pattern="[0-9]{10}"
                title="Please enter a valid 10-digit phone number"
                placeholder="Phone Number"
                @auth value="{{ Auth::user()->phone }}" @endauth
              />
            </div>

            <div class="col-md-10 col-sm-11 col-12 mx-auto">
              <label for="message" class="form-label  contact-label"
                >Message</label
              >
              <textarea
                class="form-control"
                id="message"
                rows="3"
                required
                name="message"
                minlength="10"
                placeholder="Write Your Message"
              ></textarea>
            </div>
            <div class="btns col-10 mx-auto text-center mt-3">
              <button
                  type="submit"
                  class="button btn-contact text-white btn rounded-0 py-2 px-4 mt-4"
                  id="submitButton"
              >
                  SUBMIT
              </button>
          </div>
          </form>
        </div>
        <!-- Modal for Success Message -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="successModalLabel">Message Received</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div><img class="img-fluid" src="https://images.pexels.com/photos/2072165/pexels-photo-2072165.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="thank you"></div>
                    <div class="pt-3">Thank you for your message. We have received it and will get back to you as soon as possible.</div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- JavaScript to show modal on success and redirect to the home page -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
      $('form').on('submit', function (e) {
          e.preventDefault(); 

          var form = this;

          $.ajax({
              url: $(this).attr('action'),
              type: 'POST',
              data: $(this).serialize(),
              success: function (response) {
                  if (response.success) {
                      $('#successModal').modal('show');
                    
                      // Redirect to the home page 
                      setTimeout(function () {
                          window.location.href = '{{ route("app.index") }}';
                      }, 4000); 
                  }
              },
          });
      });
  });
</script>

  <!--end of contact section-->

@endsection