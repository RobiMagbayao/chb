@extends('layouts.navfooter')
@section('content')

    <!--user dashbord-->
    <section class="container nav-margin">
      <div class="row">
        <div class="col-12">
          <div
            class="section-header text-center display-4 fw-bold mb-5 pb-md-3 pb-sm-0 pb-0"
          >
            QUOTES
          </div>
          @if (session('status'))
            <h6 class="alert alert-success text-center">{{ session('status') }}</h6>
          @endif
          <div class="row">
            <table>
              <thead>
                <tr class="tableheader p-3">
                  <th class="col-2 p-2">Date</th>
                  <th class="col-2 p-2">Service</th>
                  <th class="col-2 p-2">Status</th>
                  <th class="col-1 text-center">Action</th>
                </tr>
              </thead>
              @foreach ($quote as $item)
              <div class="visually-hidden">
                <input type="text" name="user_id" value="@auth {{ Auth::user()->id }} @endauth">
              </div>
              <tbody>
                <tr>
                  <td class="p-2">{{$item->created_at->format('M d, Y')}}</td>
                  <td class="p-2">{{$item->service_type}}</td>
                  <td class="p-2">{{$item->status}}</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" data-bs-target="#viewQuoteModal-{{ $item->id }}">
                      View
                    </button>
                    
                  </td>
                </tr>
              </tbody>
              <!-- Modal for view Quote -->
              <div class="modal fade" id="viewQuoteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="viewQuoteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="viewQuoteModalLabel">{{ $item->service_type }} Quote Request</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="px-2"><strong>Date Submitted : </strong>{{$item->created_at->format('M d, Y')}}</div>
                            <div class="px-2 py-1"><strong>Date Modified : </strong>{{$item->updated_at->format('M d, Y')}}</div>
                            <div class="py-1 px-2"><strong>Service : </strong>{{$item->service_type}}</div>

                            <div class="px-2"><strong>Property Address : </strong>{{$item->property_address}}</div>
                            
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

                          <div class="px-2"><strong>Quote : </strong>{{$item->quote}}</div>
                          <div class="px-2"><strong>Status : </strong>{{$item->status}}</div>
                        
                        </div>
                        <div class="modal-footer">
                          @if ($item->quote == 'Pending' && $item->status !== 'Booked')
                          <button type="button" class="w-100 btn btn-sm my-1 btn-success" data-bs-toggle="modal" data-bs-target="#noQuoteModal">
                            Book
                          </button>
                          @elseif($item->status == 'Booked' || $item->status == 'Completed (unpaid)' || $item->status == 'Completed (paid)' || $item->status == 'Cancelled')
                          <button type="button" class="w-100 btn btn-sm my-1 btn-success" data-bs-toggle="modal" data-bs-target="#alreadyBookedModal">
                            Book
                          </button>
                          @else
                            <a href="{{ url('/my-bookings') }}" class="w-100 btn btn-sm my-1 btn-success" data-bs-toggle="modal" data-bs-target="#BookModal-{{ $item->id }}" >Book</a>
                          @endif
                              
                              <div class="w-100 btn btn-sm my-1  btn-secondary" data-bs-toggle="modal" data-bs-target="#editQuoteModal-{{ $item->id }}">Edit Details</div>
                          <button type="button" class="btn btn-sm btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteQuoteModal-{{ $item->id }}">
                            Delete
                          </button>
                        </div>
                    </div>
                </div>
              </div>

               <!-- Modal for Delete Quote -->
                <div class="modal fade" id="deleteQuoteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteQuoteModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h1 class="modal-title fs-5" id="deleteQuoteModalLabel">Delete {{ $item->service_type }} Quote Request</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete this quote request? Deleting it will also remove all associated booking details.
                          </div>
                          <div class="modal-footer">
                            <a href="{{ url('/my-quotes/'.$item->id.'/delete') }}" class="w-100 btn btn-sm my-1  btn-danger">Delete</a>
                              <button type="button" class="w-100 btn btn-sm my-1  btn-secondary" data-bs-dismiss="modal">Discard</button>                 
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
                          <form class="row" action="{{url('/my-bookings/create')}}" method="POST">
                            @csrf
                            <div class="visually-hidden">
                              <input type="text" name="user_id" value="@auth {{ Auth::user()->id }} @endauth">
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
                      <a href="{{url('/my-bookings')}}" ><button type="button" class="btn btn-secondary btn-sm w-100 mt-2">Discard</button></a>
                    </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Edit Quote -->
            <div class="modal fade" id="editQuoteModal-{{ $item->id }}" tabindex="-1" aria-labelledby="editQuoteModalLabel-{{ $item->id }}" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editQuoteModalLabel-{{ $item->id }}">{{ $item->service_type }} Quote Request</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        @if ($item->status == 'Pending' && $item->quote == 'Pending')
                        Are you sure you want to edit service details?
                        @elseif ($item->status == 'With quote' && $item->quote !== 'Pending')
                            Editing service details will void your previous quote. Are you sure you want to edit service details?
                        @elseif ($item->status == 'Booked' && $item->quote == 'Pending')
                            You already booked this service. Are you sure you want to edit service details?
                        @elseif ($item->status == 'Booked' && $item->quote !== 'Pending')
                            <strong>Important:</strong> You already booked this service. Editing service details will void your previous quote. If you want to view the new quote before proceeding with the booking schedule, please delete the booking request on the Bookings page. Otherwise, we will generate a new quote and proceed with the booking. 
                        @elseif ($item->status == 'Pending' && $item->quote !== 'Pending')
                            Editing service details will void your previous quote. Are you sure you want to edit service details?
                        @elseif ($item->status == 'Completed (paid)' || $item->quote !== 'Completed (unpaid)' || $item->quote !== 'Cancelled')
                          You cannot edit the service details at this time.
                        @else
                            You cannot edit the service details at this time.
                        @endif
                    
                      </div>
                      <div class="modal-footer">
                        @if ($item->status == 'Pending' || $item->status == 'With quote' || $item->status == 'Booked')
                        <a href="
                        @if($item->service_type == 'Gutter Cleaning')
                            {{ url('gutter_cleaning/'.$item->id.'/edit') }}
                        @elseif($item->service_type == 'Gutter Guard Installation')
                            {{ url('gutter_guard_installation/'.$item->id.'/edit') }}
                        @elseif($item->service_type == 'Power Wash')
                            {{ url('power_wash/'.$item->id.'/edit') }}
                        @elseif($item->service_type == 'Roof Cleaning')
                            {{ url('roof_cleaning/'.$item->id.'/edit') }}
                        @elseif($item->service_type == 'Solar Panel Cleaning')
                            {{ url('solar_cleaning/'.$item->id.'/edit') }}
                        @elseif($item->service_type == 'Window Cleaning')
                            {{ url('window_cleaning/'.$item->id.'/edit') }}
                        @endif
                    " class="w-100 btn btn-sm my-1 btn-success">Edit Details</a>
                        @endif
                    @if ($item->status == 'Booked')
                        <a href="{{url('/my-bookings')}}" class="w-100 btn btn-sm my-1 btn-danger">Delete Booking</a>
                    @endif
                          <button type="button" class="w-100 btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal">Discard</button>
                      </div>
                  </div>
              </div>
          </div>

          

      <!-- Book without qoute Modal -->
      <div class="modal fade" id="noQuoteModal" tabindex="-1" aria-labelledby="noQuoteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="noQuoteModalLabel">Book {{$item->service_type}}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              We have not yet provided a quote for this request. Are you still interested in booking this service? By proceeding with the schedule, you will be agreeing to our quote once it is generated.
            </div>
            <div class="modal-footer">
              <a href="{{ url('/my-bookings') }}" class="w-100 btn btn-sm my-1 btn-success" data-bs-toggle="modal" data-bs-target="#BookModal-{{ $item->id }}" >Proceed to book</a>
              <button type="button" class="w-100 btn btn-sm my-1 btn-secondary" data-bs-dismiss="modal">Discard</button>
            </div>
          </div>
        </div>
      </div>

      <!-- already booked Modal -->
      <div class="modal fade" id="alreadyBookedModal" tabindex="-1" aria-labelledby="alreadyBookedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="alreadyBookedModalLabel">Book {{$item->service_type}}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You already booked this service.
            </div>
            <div class="modal-footer">
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
    <!--end of user dashbord-->


    <script>
      document.addEventListener('DOMContentLoaded', function () {
          @if($errors->any())
              alert('{{ $errors->first() }}');
          @endif
      });
  </script>

  


    @endsection
