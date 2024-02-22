@extends('layouts.adminnav')

@section('navbar')

        <!--bookings dashbord-->
        <section class="container nav-admin-margin">
            <div class="row">
              <div class="col-lg-2 col-12 mx-auto mb-4">
                <div
                  class="col-lg-12 col-md-11 mx-auto text-center"
                >
                <a class="navbar-brand" href="{{route('app.index')}}">
                  <img
                    src="/assets/images/logo2.png"
                    class="d-inline-block align-top img-fluid"
                    alt="logo"
                /></a>
                        <nav
                            id="adminOptions"
                            class="userlink nav nav-pills flex-column"
                        >
                            <a
                                id="adminHome"
                                class="nav-link"
                                aria-current="page"
                                href="{{route('admin.index')}}"
                                >Home</a
                            >
                            <a class="nav-link" href="{{route('admin.adminQuotes')}}"
                                >Quotes</a
                            >
                            <a
                                class="nav-link active ActiveOption text-white"
                                href="{{route('admin.adminBookings')}}"
                                >Bookings</a
                            >
                            <a class="nav-link" href="{{route('admin.adminContactus')}}">Inquiries</a>
                            <a class="nav-link" href="{{route('admin.adminUsers')}}">Users</a>
                            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();" class="nav-link">Logout</a>
                            <form action="{{route('logout')}}" method="POST" id="formLogout">@csrf</form>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-10 col-12 ps-lg-3">
                    <div
                        class="section-header text-center display-4 fw-bold mb-5 pb-md-3 pb-sm-0 pb-0"
                    >
                        BOOKINGS
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success text-center fw-bold">
                        {{session('status')}}
                    </div>
                    @endif
                    <div class="row">
                        <table>
                          <thead>
                            <tr class="tableheader p-3">
                              <th class="col-sm-2 col-1 py-2 px-sm-2 px-1">Date</th>
                              <th class="col-1  py-2 px-sm-2 px-1">Time</th>
                              <th class="col-2  py-2 px-sm-2 px-1">Name</th>
                              <th class="col-2  py-2 px-sm-2 px-1">Service</th>
                              <th class="col-sm-2 col-1  py-2 px-sm-2 px-1">Status</th>
                              <th class="col-1 text-center">Action</th>
                            </tr>
                          </thead>
                          @foreach ($booking as $item)
                          <tbody>
                            <tr>
                              <td class="px-sm-2 px-1 py-1">{{$item->booking_date}}</td>
                              <td class="px-sm-2 px-1 py-1">{{$item->booking_time}}</td>
                              <td class="px-sm-2 px-1 py-1">{{ $item->user->firstname }} {{ $item->user->lastname }}</td>
                              <td class="px-sm-2 px-1 py-1">{{$item->quote->service_type}}</td>
                              @if ($item->quote->quote == 'Pending' || $item->quote->quote == '')
                                    <td class="px-sm-2 px-1 py-1"><i class="bi bi-circle-fill" style="font-size: 8px; color:navy"></i> {{$item->quote->status}}</td>
                                @else
                                    <td class="px-sm-2 px-1 py-1">{{$item->quote->status}}</td>
                                @endif
                              <td class="py-1">
                                <button type="button" class="btn btn-sm btn-primary w-100 " data-bs-toggle="modal" data-bs-target="#viewBookModal-{{ $item->id }}">
                                  View
                                </button>
                              </td>
                            </tr>
                          </tbody>
                          <!-- Modal for view Book -->
                          <div class="modal fade" id="viewBookModal-{{ $item->id }}" tabindex="-1" aria-labelledby="viewBookModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="viewBookModalLabel">{{ $item->quote->service_type }} Book Details</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body row">
                                      <div class="col-md-6 col-12">
                                          <div class="px-2"><strong>Schedule Date : </strong>{{$item->booking_date}}</div>
                                          <div class="px-2 py-1"><strong>Schedule Time : </strong>{{$item->booking_time}}</div>
                                          <div class="py-1 px-2"><strong>Service : </strong>{{$item->quote->service_type}}</div>
              
                                          <div class="py-1 px-2"><strong>Property Address : </strong><span class="address-{{$item->id}}">{{$item->quote->property_address}}</span></div>
                                          
                                          @if(isset($item->quote->quote->type_of_roof))
                                            <div class="py-1 px-2"><strong>Roof Type : </strong>{{$item->quote->type_of_roof}}</div>
                                          @endif
                  
                                          @if(isset($item->quote->gutter_size))
                                              <div class="py-1 px-2"><strong>Gutter Size : </strong>{{$item->quote->gutter_size}}</div>
                                          @endif
                  
                                          @if(isset($item->quote->gutter_length))
                                              <div class="py-1 px-2"><strong>Gutter Length : </strong>{{$item->quote->gutter_length}}</div>
                                          @endif
                  
                                          @if(isset($item->quote->with_gutter_guard))
                                              <div class="py-1 px-2"><strong>With gutter guard? :</strong> {{$item->quote->with_gutter_guard}}</div>
                                          @endif
                  
                                          @if(isset($item->quote->window_qty))
                                              <div class="py-1 px-2"><strong>Window Quantity : </strong>{{$item->quote->window_qty}}</div>
                                          @endif
              
                                          @if(isset($item->quote->solar_qty))
                                              <div class="py-1 px-2"><strong>Solar Quantity : </strong>{{$item->quote->solar_qty}}</div>
                                          @endif
              
                                          @if(isset($item->quote->with_algae))
                                              <div class="py-1 px-2"><strong>With stains or algae? : </strong> {{$item->quote->with_algae}}</div>
                                          @endif
              
                                          @if(isset($item->quote->type_of_area))
                                              <div class="py-1 px-2"><strong>Area to clean : </strong>{{$item->quote->type_of_area}}</div>
                                          @endif
              
                                          @if(isset($item->quote->area_size))
                                              <div class="py-1 px-2"><strong>Area Size : </strong>{{$item->quote->area_size}}</div>
                                          @endif
              
                                          @if(isset($item->quote->comment))
                                              <div class="py-1 px-2"><strong>Message : </strong>{{$item->quote->comment}}</div>
                                          @endif
              
                                          @if(!empty($item->quote->photo))
                                              <div class="py-2 px-2"><strong>Uploaded Photo : <br></strong><img src="/uploads/quotes/{{$item->quote->photo}}" alt="uploaded photo" style="max-height: 300px"></div>
                                          @endif
              
                                        <div class="px-2"><strong>Quote : </strong>{{$item->quote->quote}}</div>
                                        <div class="px-2"><strong>Status : </strong>{{$item->quote->status}}</div>
                                      </div>
                                      <!-- Map Container -->
                                      <div class="col-md-6 col-12 mt-md-0 mt-3" id="map-container-{{$item->id}}" style="height: 380px;"></div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                      <div class="d-flex w-100 m-0">
                                        <a href="{{ url('/admin/bookings') }}" class="w-50 mx-1 btn btn-sm my-1 btn-success" data-bs-toggle="modal" data-bs-target="#BookModal-{{ $item->id }}" >Change Schedule</a>
                                        <div class="w-50 btn mx-1 btn-sm my-1  btn-secondary" data-bs-toggle="modal" data-bs-target="#editQuoteModal-{{ $item->id }}">Edit Details</div> 
                                      </div>
                                      
                                      <button type="button" class="btn btn-sm btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteBookModal-{{ $item->id }}">
                                        Delete
                                      </button>
                                    </div>
                                </div>
                            </div>
                          </div>
            
                           <!-- Modal for Delete Book -->
                            <div class="modal fade" id="deleteBookModal-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="deleteBookModalLabel">Delete Booking Details</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          Are you sure you want to delete your booking details for {{ $item->quote->service_type }}?
                                      </div>
                                      <div class="modal-footer">
                                        <a href="{{ url('/admin/bookings/'.$item->id.'/delete') }}" class="w-100 btn btn-sm my-1  btn-danger">Delete</a>
                                        <button type="button" class="w-100 btn btn-sm my-1  btn-secondary" data-bs-dismiss="modal">Discard</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
            
                          <!-- Modal for edit BOOK schedule-->
                          <div class="modal fade" id="BookModal-{{ $item->id }}" tabindex="-1" aria-labelledby="BookModalLabel" aria-hidden="true" data-bs-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content pt-4 px-4">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="BookModalLabel">Change Booking Schedule</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form class="row" action="{{url('/admin/bookings/'.$item->id.'/edit')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="visually-hidden">
                                          <input type="text" name="user_id" value="@auth {{ Auth::user()->id }} @endauth">
                                          <input type="hidden" name="quote_id" value="{{ old('quote_id', $item->quote->id) }}">
                                        </div>
                                        <div>
                                          <div class="mb-3">
                                              <label for="booking_date" class="userDetail form-label">Choose schedule date</label>
                                              <input class="form-control" type="date" id="booking_date" name="booking_date" value="{{old('booking_date')}}" required>
                                              @error('booking_date') <span class="text-danger">{{$message}}</span>  @enderror
                                          </div>
                                      </div>
                                      <div>
                                        <label class="form-label userDetail" for="booking_time">Choose schedule time</label>
                                        <select class="form-select service-border" aria-label="Select time" name="booking_time" id="booking_time">
                                            <option value="9 AM">9 AM</option>
                                            <option value="12 PM">12 PM</option>
                                            <option value="3 PM">3 PM</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="text-center my-4">
                                  <button type="submit" class="btn btn-success btn-sm w-100">Confirm</button><br>
                                  <a href="{{url('/admin/bookings')}}" ><button type="button" class="btn btn-secondary btn-sm w-100 mt-2">Discard</button></a>
                                </div>
                                </form>
                                    </div>
                                </div>
                            </div>
            
                             <!-- Modal for Edit Quote -->
                        <div class="modal fade" id="editQuoteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="editQuoteModalLabel-{{ $item->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="editQuoteModalLabel-{{ $item->id }}">Edit {{ $item->quote->service_type }} Booking Details</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    
                                    @if ($item->quote->status == 'Completed (paid)' || $item->quote->status == 'Completed (unpaid)')
                                        Service is already completed. Are you sure you want to edit service details?
                                    @else ($item->quote->quote == 'Pending')
                                      Are you sure you want to edit service details?
                                    @endif
                                  </div>
                                  <div class="modal-footer">
                                        <a class="w-100 btn btn-sm my-1 btn-success mx-1" href="{{url('/admin/quotes/'.$item->quote->id.'/edit')}}">Edit</a>
                                      <button type="button" class="w-100 btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal">Discard</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                          @endforeach
                        </table>
                 
                      </div>
                </div>
            </div>
        </section>
        <!--end of bookings dashbord-->
      <!--for error if same date-->
      <script>
          document.addEventListener('DOMContentLoaded', function () {
              @if($errors->any())
                  alert('{{ $errors->first() }}');
              @endif
          });
      </script>

<!--for Google map-->
<script>
  document.addEventListener('DOMContentLoaded', function () {
   document.querySelectorAll('.modal').forEach(function(modal) {
       modal.addEventListener('shown.bs.modal', function () {
           const quoteId = this.id.split('-').pop(); 
           const address = this.querySelector(`#address-${quoteId}`).innerText; 
           initializeMapForQuote(quoteId, address);
       });
   });
});

function initializeMapForQuote(quoteId, address) {
   const geocoder = new google.maps.Geocoder();
   geocoder.geocode({ 'address': address }, function(results, status) {
       if (status == 'OK') {
           const location = results[0].geometry.location;
           const mapContainer = document.getElementById(`map-container-${quoteId}`);
           if (mapContainer) {
               const map = new google.maps.Map(mapContainer, {
                   zoom: 15,
                   center: location,
               });
   
               new google.maps.Marker({
                   map: map,
                   position: location,
                   visible: true,
               });
           }
       } else {
           console.error('Geocode was not successful for the following reason: ' + status);
       }
   });
}

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPCGIYPiPrtmT83wmyK8rtP_FbGo3hKoo&libraries=places"></script>
<script>
 document.addEventListener('DOMContentLoaded', function () {

   document.querySelectorAll('.modal').forEach(function(modal) {
       modal.addEventListener('shown.bs.modal', function () {
           const quoteId = this.id.split('-').pop(); 
           const addressElement = this.querySelector(`.address-${quoteId}`);
           if (addressElement) {
               const address = addressElement.innerText.trim();
               initializeMapForQuote(`map-container-${quoteId}`, address);
           }
       });
   });
});

function initializeMapForQuote(mapContainerId, address) {
   const mapContainer = document.getElementById(mapContainerId);
   const geocoder = new google.maps.Geocoder();
   
   geocoder.geocode({ 'address': address }, function(results, status) {
       if (status === 'OK') {
           const location = results[0].geometry.location;
           const map = new google.maps.Map(mapContainer, {
               zoom: 15,
               center: location,
           });
   
           new google.maps.Marker({
               map: map,
               position: location,
               visible: true,
           });
       } else {
           console.error('Geocode was not successful for the following reason: ' + status);
       }
   });
}

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPCGIYPiPrtmT83wmyK8rtP_FbGo3hKoo&libraries=places&callback=initialize" async defer></script>
@endsection