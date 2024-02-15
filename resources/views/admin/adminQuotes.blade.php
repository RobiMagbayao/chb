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
              <a class="nav-link" href="{{route('admin.adminMessages')}}">Messages</a>
              <a class="nav-link" href="{{route('admin.adminContactus')}}">Contact Us</a>
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
                  <th class="col-2 p-2">Date</th>
                  <th class="col-2 p-2">Name</th>
                  <th class="col-3 p-2">Service</th>
                  <th class="col-2 p-2">Status</th>
                  <th class="col-1 text-center">Action</th>
                </tr>
              </thead>
              @foreach ($quote as $item)
              <tbody>
                <tr>
                  <td class="p-2">{{$item->created_at->format('M d, Y')}}</td>
                  <td class="p-2">{{ $item->user->firstname }} {{ $item->user->lastname }}</td>
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

                            <div class="py-1 px-2"><strong>Property Address : </strong>{{$item->property_address}}</div>
                            
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
                                <div class="py-2 px-2"><strong>Uploaded Photo : <br></strong><img src="{{$item->photo}}" alt="uploaded photo" style="max-height: 300px"></div>
                            @endif

                          <div class="py-1 px-2"><strong>Quote : </strong>{{$item->quote}}</div>
                          <div class="py-1 px-2"><strong>Status : </strong>{{$item->status}}</div>

                          <div class="py-1 px-2"><strong>Name : </strong>{{ $item->user->firstname }} {{ $item->user->lastname }}</div>
                          <div class="py-1 px-2"><strong>Email : </strong>{{ $item->user->email }}</div>
                          <div class="py-1 px-2"><strong>Phone : </strong>{{ $item->user->phone }}</div>
                
                        
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                          <ul class="nav">
                              <li class="nav-item">
                                  <a class="nav-link bg-success text-white " href="#">Book</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link bg-secondary text-white" href="{{url('/admin/quotes/'.$item->id.'/edit')}}">Edit</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link bg-danger text-white" type="button" data-bs-toggle="modal" data-bs-target="#deleteQuoteModal-{{ $item->id }}">Delete</a>
                              </li>
                          </ul>
                      </div>
                      
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
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                              <a href="{{ url('/my-quotes/'.$item->id.'/delete') }}" class="btn btn-danger">Delete</a>
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
    <!--end of quotes dashbord-->

    @endsection