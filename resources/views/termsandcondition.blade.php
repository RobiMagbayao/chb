@extends('layouts.navfooter')
@section('content')

 <!--terms and condition-->
 <section class="container nav-margin">
    <div class="row">
      <div class="col-md-8 col-12 mx-auto pb-5">
        <nav class="nav nav-pills nav-fill">
          <a
            class="nav-link fw-bold legal-inactive"
            aria-current="page"
            href="{{route('privatepolicy.index')}}"
            >Privacy Policy</a
          >
          <a class="nav-link active legal-active" 
            >Terms & Conditions</a
          >
        </nav>
      </div>
      <div class="section-header col-12 display-4 fw-bold text-center mb-5">
        Terms & Conditions
      </div>
      <div class="col-lg-10 col-md-11 col-12 mx-auto">
        <div class="legal-text">
          <span class="brand">Clean House Bros</span> ("we," "us," or "our")
          is dedicated to ensuring a transparent and secure experience for our
          users. By using our services, you entrust us with your information,
          and we take this responsibility seriously. This set of Terms and
          Conditions is designed to establish a clear understanding of the
          rules and expectations when engaging with Clean House Bros. Please
          read through these terms carefully to familiarize yourself with the
          guidelines that govern your use of our services.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Acceptance of Terms</div>
        <div class="legal-text">
          By accessing or using website, you agree to be bound by these Terms
          and Conditions. If you do not agree to all the terms and conditions,
          please do not use our services.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Use of Services</div>
        <div class="legal-text">
          You must provide accurate and complete information when using our
          services. You are solely responsible for maintaining the
          confidentiality of your account and password.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">User Conduct</div>
        <div class="legal-text">
          You agree not to use our services for any unlawful or prohibited
          purpose. You may not interfere with the proper functioning of the
          services or attempt to gain unauthorized access to any part of it.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Privacy</div>
        <div class="legal-text">
          Your use of our services is also governed by our Privacy Policy.
          Please review our Privacy Policy to understand our practices.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Limitation of Liability</div>
        <div class="legal-text">
          We shall not be liable for any indirect, incidental, special,
          consequential, or punitive damages, or any loss of profits or
          revenues.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">
          Changes to Terms and Conditions
        </div>
        <div class="legal-text">
          We reserve the right to update or change these Terms and Conditions
          at any time. Changes will be effective upon posting on our website.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Termination</div>
        <div class="legal-text">
          We reserve the right to terminate or suspend your account and access
          to our services at our sole discretion, without notice.
        </div>
        <div class="h5 mt-5 mb-3 legal-head">Contact Information</div>
        <div class="legal-text">
          If you have any questions or concerns about these Terms and
          Conditions, please contact us at
          <a href="mailto:cleanhousebros@gmail.com"
            >cleanhousebros@gmail.com</a
          >
          or <a href="tel:+1234567890">(123) 456-7890</a>.
        </div>

        <div class="mt-4 legal-text">
          By using our website, you agree to the terms outlined in these Terms
          and Conditions.
        </div>

        <div class="mt-5 legal-text">
          <span class="bold">Effective Date: January 27, 2024</span>
        </div>
      </div>
    </div>
  </section>
  <!--end of terms and condition-->


@endsection