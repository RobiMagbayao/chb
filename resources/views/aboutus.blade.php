@extends('layouts.navfooter')
@section('content')

 <!--about us-->
 <section
 class="container nav-margin mb-5 pb-5 px-lg-0 px-md-4 px-sm-4 px-4"
>
 <div class="row">
   <div class="col-lg-6 col-12 pe-md-5 pe-0">
     <div class="about-sub-header pb-0 fw-bold lead">How it started</div>
     <div
       class="section-head about-header display-5 fw-bold text-start mb-5"
     >
       Our Commitment to Exceptional Cleaning Services
     </div>
     <div class="about-text lead">
       At the heart of our mission lies an unwavering commitment to
       delivering exceptional cleaning services. We don't just clean; we
       elevate spaces to a new level of pristine brilliance. With attention
       to detail and a passion for cleanliness, we transform homes and
       businesses into havens of freshness. Our dedicated team strives to
       exceed expectations, ensuring every nook and cranny reflects our
       commitment to excellence. From sparkling surfaces to immaculate
       interiors, our goal is to redefine clean and provide an unparalleled
       cleaning experience.
     </div>
   </div>
   <div class="col-lg-6 col-12 px-0 my-auto">
     <div>
       <img
         class="img-fluid rounded-5 mt-lg-0 mt-5 px-lg-0 px-md-5 px-3"
         src="https://images.pexels.com/photos/280221/pexels-photo-280221.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
         alt="houses"
       />
     </div>
     <div class="about-card card text-center mt-4" style="width: 100%">
       <div class="card-body d-flex justify-content-around">
         <div class="about-info">
           <div class="h3">5+</div>
           <div>Years Experience</div>
         </div>
         <div class="about-info">
           <div class="h3">1,000+</div>
           <div>Serviced Properties</div>
         </div>
         <div class="about-info">
           <div class="h3">98%</div>
           <div>Positive Review</div>
         </div>
       </div>
     </div>
   </div>
 </div>
</section>
<!--end of about us-->

<!--meet the team-->
<section class="container pb-5 mb-5">
 <div class="row team-row px-lg-5 px-md-4 px-4">
   <div class="col-lg-2 d-lg-block d-none"></div>
   <div
     class="col-lg-8 col-12 mt-5 pt-0 d-lg-block d-none mx-auto text-center"
   >
     <div class="about-sub-header2 pb-0 fw-bold lead">Meet the Team</div>
     <div
       class="section-head about-header team-header display-5 fw-bold mb-5"
     >
       Get to Know Our Expert Team of Cleaning Professionals
     </div>
   </div>
   <div class="col-lg-2 d-lg-block d-none"></div>
   <div class="col-12 mt-5 pt-0 d-lg-none d-block">
     <div class="about-sub-header2 pb-0 fw-bold lead text-start">
       Meet the Team
     </div>
     <div
       class="section-head about-header display-5 fw-bold text-start mb-5"
     >
       Get to Know Our Expert Team of Cleaning Professionals
     </div>
   </div>
   <!--large medium screen-->
   <div
     class="col-md-6 col-sm-6 col-12 px-lg-4 px-md-3 d-md-block d-sm-none d-none"
   >
     <div class="card card-package h-100 p-0" style="width: 100%">
       <div class="card-details">
         <img
           class="img-fluid rounded-5"
           src="https://images.pexels.com/photos/1073097/pexels-photo-1073097.jpeg?auto=compress&cs=tinysrgb&w=600"
           alt="our team"
         />
       </div>
       <p class="card-button">Roy White<br />Cleaner & Tech</p>
     </div>
   </div>

   <div
     class="col-md-6 col-sm-6 col-12 px-lg-4 px-md-3 d-md-block d-sm-none d-none"
   >
     <div
       class="card card-package h-100 p-0 rounded-5"
       style="width: 100%"
     >
       <div class="card-details">
         <img
           class="img-fluid rounded-5"
           src="https://images.pexels.com/photos/14424833/pexels-photo-14424833.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load"
           alt="our team"
         />
       </div>
       <p class="card-button">Bruce Phillips<br />Cleaner & Tech</p>
     </div>
   </div>
   <!--small screen-->
   <div
     class="col-sm-6 col-12 text-center pb-sm-0 pb-3 d-md-none d-sm-block d-block"
   >
     <div class="card card-package-sm h-100 rounded-5" style="width: 100%">
       <div class="card-body p-0">
         <img
           class="img-fluid rounded-5"
           src="https://images.pexels.com/photos/1073097/pexels-photo-1073097.jpeg?auto=compress&cs=tinysrgb&w=600"
           alt="cleaner"
         />
         <p class="team-name h5 mt-3 mb-1">Roy White</p>
         <p class="team-role lead mt-0">Cleaner & Tech</p>
       </div>
     </div>
   </div>
   <div class="col-sm-6 col-12 text-center d-md-none d-sm-block d-block">
     <div class="card card-package-sm h-100 rounded-5" style="width: 100%">
       <div class="card-body p-0">
         <img
           class="img-fluid rounded-5"
           src="https://images.pexels.com/photos/14424833/pexels-photo-14424833.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load"
           alt="cleaner"
         />
         <p class="team-name h5 mt-3 mb-1">Bruce Phillips</p>
         <p class="team-role lead mt-0">Cleaner & Tech</p>
       </div>
     </div>
   </div>
 </div>
</section>
<!--end of meet the team-->

<!--mission vision card large screen-->
<section class="container mission-card d-lg-block d-none">
 <div class="row mission-card">
   <div class="col-lg-6 col-12 pe-lg-4 pe-0">
     <div class="card-vision card h-100" style="width: 100%">
       <div class="card-body p-lg-5 p-4">
         <div class="about-sub-header pb-0 fw-bold lead">Our Mission</div>
         <div
           class="section-head about-header display-5 fw-bold text-start mb-5"
         >
           Quality, Reliability, Satisfaction
         </div>
         <p class="lead m-0">
           Our mission is to revolutionize the cleaning industry by
           consistently delivering exceptional services. We aim to create
           hygienic, inviting spaces that enhance the well-being and
           comfort of our clients. With a focus on quality, reliability,
           and customer satisfaction, we aspire to be the go-to cleaning
           service, setting new standards for cleanliness and
           professionalism.
         </p>
       </div>
     </div>
   </div>
   <div class="col-lg-6 col-12 ps-lg-4 ps-0">
     <div class="card-vision card h-100" style="width: 100%">
       <div class="card-body p-lg-5 p-4">
         <div class="about-sub-header pb-0 fw-bold lead">Our Vision</div>
         <div
           class="section-head about-header display-5 fw-bold text-start mb-5"
         >
           Leading the Way to Cleaner Living
         </div>
         <p class="lead m-0">
           We envision a world where every space – be it a home or a
           commercial space – radiates cleanliness and positivity. Our
           vision is to be a leading force in the cleaning industry, known
           for our unwavering commitment to excellence. We strive to make a
           lasting impact on the lives of our clients by providing cleaning
           services that contribute to healthier, happier, and more vibrant
           environment.
         </p>
       </div>
     </div>
   </div>
 </div>
</section>
<!--end of mission vision card-->

<!--mission vision card medium small screen-->
<section class="container mission-card-md d-lg-none d-block">
 <div class="row">
   <div class="col-lg-6 col-12 px-md-5 px-4 pb-5">
     <div class="card-vision card h-100" style="width: 100%">
       <div class="card-body p-lg-5 p-4">
         <div class="about-sub-header pb-0 fw-bold lead">Our Mission</div>
         <div
           class="section-head about-header display-5 fw-bold text-start mb-5"
         >
           Quality, Reliability, Satisfaction
         </div>
         <p class="lead m-0">
           Our mission is to revolutionize the cleaning industry by
           consistently delivering exceptional services. We aim to create
           hygienic, inviting spaces that enhance the well-being and
           comfort of our clients. With a focus on quality, reliability,
           and customer satisfaction, we aspire to be the go-to cleaning
           service, setting new standards for cleanliness and
           professionalism.
         </p>
       </div>
     </div>
   </div>
   <div class="col-lg-6 col-12 px-md-5 px-4 pb-5">
     <div class="card-vision card h-100" style="width: 100%">
       <div class="card-body p-lg-5 p-4">
         <div class="about-sub-header pb-0 fw-bold lead">Our Vision</div>
         <div
           class="section-head about-header display-5 fw-bold text-start mb-5"
         >
           Leading the Way to Cleaner Living
         </div>
         <p class="lead m-0">
           We envision a world where every space – be it a home or a
           commercial space – radiates cleanliness and positivity. Our
           vision is to be a leading force in the cleaning industry, known
           for our unwavering commitment to excellence. We strive to make a
           lasting impact on the lives of our clients by providing cleaning
           services that contribute to healthier, happier, and more vibrant
           environment.
         </p>
       </div>
     </div>
   </div>
 </div>
</section>
<!--end of mission vision card-->

@endsection