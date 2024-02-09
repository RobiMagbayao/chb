@extends('layouts.navfooter')
@section('content')

 <!--private policy-->
 <section class="container nav-margin">
    <div class="row">
      <div class="col-md-8 col-12 mx-auto pb-5">
        <nav class="nav nav-pills nav-fill">
          <a
            class="nav-link active legal-active"
            aria-current="page"
            href="{{route('privatepolicy.index')}}"
            >Privacy Policy</a
          >
          <a class="legal-inactive nav-link fw-bold" href="{{route('termsandcondition.index')}}"
            >Terms & Conditions</a
          >
        </nav>
      </div>
      <div class="section-header col-12 display-4 fw-bold text-center mb-5">
        Private Policy
      </div>
      <div class="col-lg-10 col-md-11 col-12 mx-auto">
        <div class="legal-text">
          <span class="brand">Clean House Bros</span> ("we," "us," or "our")
          is committed to protecting the privacy and security of the
          information you provide to us. This Privacy Policy outlines how we
          collect, use, and safeguard your personal information.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Information We Collect</div>
        <div class="legal-text">
          When you use our website, we may collect personal information, such
          as your name, email address, phone number, address, and other
          contact details.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">How We Use Your Information</div>
        <div class="legal-text">
          We use your personal information to provide and improve our
          services, communicate with you, and fulfill your requests.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Sharing Your Information</div>
        <div class="legal-text">
          We will not sell, rent, or share your personal information with
          third parties without your consent, except as required by law.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Your Choices</div>
        <div class="legal-text">
          You have the right to access, correct, or delete your personal
          information. If you have any questions or concerns about this
          Privacy Policy, please contact us at
          <a href="mailto:cleanhousebros@gmail.com"
            >cleanhousebros@gmail.com</a
          >
          or <a href="tel:+1234567890">(123) 456-7890</a>.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Security</div>
        <div class="legal-text">
          We implement reasonable security measures to protect your
          information. However, no method of transmission over the internet or
          electronic storage is entirely secure.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Changes to This Policy</div>
        <div class="legal-text">
          We reserve the right to update this Privacy Policy at any time.
          Changes will be effective upon posting on our website.
        </div>

        <div class="mt-4 legal-text">
          By using our website, you agree to the terms outlined in this
          Privacy Policy.
        </div>

        <div class="mt-5 legal-text">
          <span class="bold">Effective Date: January 27, 2024</span>
        </div>
      </div>
    </div>
  </section>
  <!--end of private policy-->

@endsection