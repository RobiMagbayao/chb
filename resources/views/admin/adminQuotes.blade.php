@extends('layouts.adminnav')

@section('navbar')


    <!--quotes dashbord-->
    <section class="container nav-admin-margin">
      <div class="row">
        <div class="col-lg-2 col-12 mx-auto mb-4">
          <div
            class="col-lg-12 col-md-11  mx-auto text-center"
          >
          <a class="navbar-brand" href="{{route('app.index')}}">
            <img
              src="/assets/images/logo2.png"
              class="d-inline-block align-top img-fluid"
              alt="logo"
          /></a>
            <nav id="adminOptions" class="userlink nav nav-pills flex-column">
              <a
                id="adminHome"
                class="nav-link"
                aria-current="page"
                href="{{route('admin.index')}}"
                >Home</a
              >
              <a
                class="nav-link active ActiveOption text-white"
                href="{{route('admin.adminQuotes')}}"
                >Quotes</a
              >
              <a class="nav-link" href="{{route('admin.adminBookings')}}">Bookings</a>
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
            QUOTE REQUESTS
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
                  <th class="col-2 py-2 px-sm-2 px-1">Date</th>
                  <th class="col-2 py-2 px-sm-2 px-1">Name</th>
                  <th class="col-3 py-2 px-sm-2 px-1">Service</th>
                  <th class="col-2 py-2 px-sm-2 px-1">Status</th>
                  <th class="col-1 text-center">Action</th>
                </tr>
              </thead>
              @foreach ($quote as $item) 
              <tbody>
                <tr>
                  <td class="px-sm-2 px-1 py-1">{{$item->created_at->format('M d, Y')}}</td>
                  <td class="px-sm-2 px-1 py-1">{{ $item->user->firstname }} {{ $item->user->lastname }}</td>
                  <td class="px-sm-2 px-1 py-1">{{$item->service_type}}</td>
                  @if ($item->quote == 'Pending' || $item->quote == '')
                      <td class="px-sm-2 px-1 py-1"><i class="bi bi-circle-fill" style="font-size: 8px; color:navy"></i> {{$item->status}}</td>
                  @else
                      <td class="px-sm-2 px-1 py-1">{{$item->status}}</td>
                  @endif
                  <td class="py-1">
                    <button type="button" class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" data-bs-target="#viewQuoteModal-{{ $item->id }}">
                      View
                    </button>
                    
                  </td>
                </tr>
              </tbody>
              <!-- Modal for view Quote -->
              <div class="modal fade" id="viewQuoteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="viewQuoteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header col-12">
                            <h1 class="modal-title fs-5" id="viewQuoteModalLabel">{{ $item->service_type }} Quote Request</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                          <div class="col-md-6 col-12">
                            <div class="px-2"><strong>Date Submitted : </strong>{{$item->created_at->format('M d, Y')}}</div>
                            <div class="px-2 py-1"><strong>Date Modified : </strong>{{$item->updated_at->format('M d, Y')}}</div>
                            <div class="py-1 px-2"><strong>Service : </strong>{{$item->service_type}}</div>
                            <div class="py-1 px-2"><strong>Property Address : </strong><span class="address-{{$item->id}}">{{$item->property_address}}</span></div>
                            @if(isset($item->type_of_roof))
                              <div class="py-1 px-2"><strong>Roof Type : </strong>{{$item->type_of_roof}}</div>
                            @endif
    
                            @if(isset($item->gutter_size))
                                <div class="py-1 px-2"><strong>Gutter Size : </strong>{{$item->gutter_size}}</div>
                            @endif
    
                            @if(isset($item->gutter_length))
                                <div class="py-1 px-2"><strong>Gutter Length : </strong>{{$item->gutter_length}}</div>
                            @endif
    
                            @if(isset($item->with_gutter_guard))
                                <div class="py-1 px-2"><strong>With gutter guard? :</strong> {{$item->with_gutter_guard}}</div>
                            @endif
    
                            @if(isset($item->window_qty))
                                <div class="py-1 px-2"><strong>Window Quantity : </strong>{{$item->window_qty}}</div>
                            @endif

                            @if(isset($item->solar_qty))
                                <div class="py-1 px-2"><strong>Solar Quantity : </strong>{{$item->solar_qty}}</div>
                            @endif

                            @if(isset($item->with_algae))
                                <div class="py-1 px-2"><strong>With stains or algae? : </strong> {{$item->with_algae}}</div>
                            @endif

                            @if(isset($item->type_of_area))
                                <div class="py-1 px-2"><strong>Area to clean : </strong>{{$item->type_of_area}}</div>
                            @endif

                            @if(isset($item->area_size))
                                <div class="py-1 px-2"><strong>Area Size : </strong>{{$item->area_size}}</div>
                            @endif

                            @if(isset($item->comment))
                                <div class="py-1 px-2"><strong>Message : </strong>{{$item->comment}}</div>
                            @endif

                            @if(!empty($item->photo))
                                <div class="py-2 px-2"><strong>Uploaded Photo : <br></strong><img src="/uploads/quotes/{{$item->photo}}" alt="uploaded photo" style="max-height: 300px"></div>
                            @endif

                          <div class="py-1 px-2"><strong>Quote : </strong>{{$item->quote}}</div>
                          <div class="py-1 px-2"><strong>Status : </strong>{{$item->status}}</div>

                          <div class="py-1 px-2"><strong>Name : </strong>{{ $item->user->firstname }} {{ $item->user->lastname }}</div>
                          <div class="py-1 px-2"><strong>Email : </strong>{{ $item->user->email }}</div>
                          <div class="py-1 px-2"><strong>Phone : </strong>{{ $item->user->phone }}</div>
                          </div>

                          <!-- Map Container -->
                          <div class="col-md-6 col-12  mt-md-0 mt-3" id="map-container-{{$item->id}}" style="height: 380px;"></div>
                        </div>
                          
                        
                        <div class="modal-footer">
                          <div class="d-flex w-100 m-0" >
                            <a class="w-50 btn btn-sm my-1 btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#givequoteModal-{{ $item->id }}">Provide Quote</a>
                            <a href="{{ url('/admin/bookings/') }}" class="w-50 btn btn-sm my-1 mx-1 btn-success" data-bs-toggle="modal" data-bs-target="#BookModal-{{ $item->id }}" >Book</a>
                          </div>
                          <div class="d-flex w-100 m-0">
                            <a class="w-50 btn btn-sm my-1 btn-secondary mx-1" href="{{url('/admin/quotes/'.$item->id.'/edit')}}">Edit</a>
                            <a class="w-50 btn btn-sm my-1 btn-danger mx-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteQuoteModal-{{ $item->id }}">Delete</a>
                          </div>
                          
                      </div>
                    </div>
                    </div>
                </div>
              </div>
              
              <!-- Modal for edit Give quote-->
          <div class="modal fade" id="givequoteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="givequoteModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content pt-4 px-4">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="givequoteModalLabel">Provide Quote</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row" action="{{url('/admin/quotes/'.$item->id.'/edit')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="visually-hidden">
                          <input type="text" name="user_id" value="{{ $item->user->id }}">
                          <input type="text" name="quote_id" value="{{ $item->id }}">
                          <input type="text" name="service_type" value="{{ $item->service_type }}">
                          <input type="text" name="property_address" value="{{ $item->property_address }}">
                        </div>
                        <!-- Quote -->
                    <div class="mb-3">
                      <label class="form-label fw-bold" for="quote">Quote</label>
                      <textarea class="form-control" maxlength="255" name="quote" id="quote" rows="2">{{ $item->quote }} </textarea>
                    </div>
                    <!-- Status -->
                    <div>
                      <label class="form-label fw-bold" for="status">Status</label>
                      <select class="form-select service-border" aria-label="Select status" name="status" id="status">
                          <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                          <option value="With quote" {{ $item->status == 'With quote' ? 'selected' : '' }}>With quote</option>
                          <option value="Booked" {{ $item->status == 'Booked' ? 'selected' : '' }}>Booked</option>
                          <option value="Completed (paid)" {{ $item->status == 'Completed (paid)' ? 'selected' : '' }}>Completed (paid)</option>
                          <option value="Completed (unpaid)" {{ $item->status == 'Completed (unpaid)' ? 'selected' : '' }}>Completed (unpaid)</option>
                          <option value="Cancelled" {{ $item->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>  
                      </select>
                    </div>
                    </div>
                <div class="text-center my-4">
                  <button type="submit" class="btn btn-success btn-sm w-100">Confirm</button><br>
                  <a href="{{url('/admin/quotes')}}" ><button type="button" class="btn btn-secondary btn-sm w-100 mt-2">Discard</button></a>
                </div>
                </form>
                    </div>
                </div>
            </div>

               <!-- Modal for Delete Quote -->
                <div class="modal fade" id="deleteQuoteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteQuoteModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h1 class="modal-title fs-5" id="deleteQuoteModalLabel">Delete {{ $item->service_type }} Quote Request</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              Are you sure you want to delete this quote request?
                          </div>
                          <div class="modal-footer">
                            <a href="{{ url('/my-quotes/'.$item->id.'/delete') }}" class="btn btn-danger btn-sm w-100">Delete</a>
                              <button type="button" class="btn btn-secondary btn-sm w-100" data-bs-dismiss="modal">Discard</button>    
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Modal for BOOK -->
              <div class="modal fade" id="BookModal-{{ $item->id }}" tabindex="-1" aria-labelledby="BookModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content pt-4 px-4">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="BookModalLabel">Book {{ $item->service_type }} Service</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form class="row" action="{{url('/admin/bookings')}}" method="POST">
                            @csrf
                            <div class="visually-hidden">
                              <input type="text" name="user_id" value="{{ $item->user_id }}">
                              <input type="text" name="quote_id" value="{{ $item->id }}">
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
                      <a href="{{url('/admin/quotes')}}" ><button type="button" class="btn btn-secondary btn-sm w-100 mt-2">Discard</button></a>
                    </div>
                    </form>
                        </div>
                    </div>
                </div>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--end of quotes dashbord-->

<script>
      document.addEventListener('DOMContentLoaded', function () {
          @if($errors->any())
              alert('{{ $errors->first() }}');
          @endif
      });
</script>

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

<script async defer src="https://maps.googleapis.com/maps/api/js?key=APIKEY&libraries=places"></script>
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

@endsection