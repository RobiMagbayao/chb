@extends('layouts.navfooter')
@section('content')

 <!--faqs-->
 <section class="container nav-margin">
    <div class="row">
      <div
        class="section-header col-12 display-4 fw-bold text-center mb-5 pb-md-3 pb-sm-0 pb-0"
      >
        Frequently Asked Questions
      </div>
      <div class="col-12">
        <div class="accordion accordion-flush" id="faqAccordion">
          <!-- FAQ #1 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#faq1"
                aria-expanded="false"
                aria-controls="faq1"
              >
                Where does Clean House Bros provide its services?
              </button>
            </h2>
            <div
              id="faq1"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion"
            >
              <div class="accordion-body">
                Clean House Bros exclusively services the Bay Area. We bring
                our professional cleaning expertise to various locations in
                the region to ensure homes and businesses receive the highest
                standard of cleanliness.
              </div>
            </div>
          </div>

          <!-- FAQ #2 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#faq2"
                aria-expanded="false"
                aria-controls="faq2"
              >
                What types of properties do you clean?
              </button>
            </h2>
            <div
              id="faq2"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion"
            >
              <div class="accordion-body">
                Clean House Bros provides cleaning services for both
                residential and commercial spaces. Our dedicated team is
                equipped to handle the unique cleaning needs of various
                property types, ensuring a thorough and professional cleaning
                experience.
              </div>
            </div>
          </div>

          <!-- FAQ #3 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#faq3"
                aria-expanded="false"
                aria-controls="faq3"
              >
                What types of properties do you service?
              </button>
            </h2>
            <div
              id="faq3"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion"
            >
              <div class="accordion-body">
                Clean House Bros services 1 and 2-story properties. Whether
                you're a homeowner or a business owner, we have the expertise
                and equipment to meet your cleaning needs efficiently.
              </div>
            </div>
          </div>

          <!-- FAQ #4 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#faq4"
                aria-expanded="false"
                aria-controls="faq4"
              >
                How is the pricing determined for cleaning services?
              </button>
            </h2>
            <div
              id="faq4"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion"
            >
              <div class="accordion-body">
                Pricing varies based on the materials of the property and its
                size. Some materials may require special cleaning equipment
                and techniques. We provide personalized quotes to ensure a
                fair and accurate assessment of your cleaning needs.
              </div>
            </div>
          </div>

          <!-- FAQ #5 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#faq5"
                aria-expanded="false"
                aria-controls="faq5"
              >
                How do I get a quote for cleaning services?
              </button>
            </h2>
            <div
              id="faq5"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion"
            >
              <div class="accordion-body">
                To receive a quote, simply visit our Services page, select the
                cleaning tasks you require, and provide the necessary
                information. Our system will generate a quote based on your
                selections, ensuring a quick and convenient process for our
                clients.
              </div>
            </div>
          </div>

          <!-- FAQ #6 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#faq6"
                aria-expanded="false"
                aria-controls="faq6"
              >
                What happens after I request a service quote?
              </button>
            </h2>
            <div
              id="faq6"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion"
            >
              <div class="accordion-body">
                Upon submitting your service request and receiving a quote,
                our admin team will review the information. You can expect a
                confirmation within 1 day on weekdays and 2 days on weekends
                and holidays. We strive to promptly communicate and confirm
                your booking.
              </div>
            </div>
          </div>

          <!-- FAQ #7 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#faq7"
                aria-expanded="false"
                aria-controls="faq7"
              >
                How do I make a payment for the cleaning services?
              </button>
            </h2>
            <div
              id="faq7"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion"
            >
              <div class="accordion-body">
                Payments are made in person to our personnel upon the
                completion of the job. We prioritize a hassle-free and secure
                payment process for our clients, ensuring satisfaction with
                our services before finalizing the transaction.
              </div>
            </div>
          </div>

          <!-- FAQ #8 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#faq8"
                aria-expanded="false"
                aria-controls="faq8"
              >
                How can I contact Clean House Bros for inquiries or
                assistance?
              </button>
            </h2>
            <div
              id="faq8"
              class="accordion-collapse collapse"
              data-bs-parent="#faqAccordion"
            >
              <div class="accordion-body">
                For any questions, concerns, or personalized inquiries, you
                can email us at
                <a href="mailto:cleanhousebros@gmail.com"
                  >cleanhousebros@gmail.com</a
                >
                or call us at <a href="tel:+1234567890">(123) 456-7890</a>.
                Our team is ready to assist you with any information or
                assistance you may need.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end of faqs-->

@endsection