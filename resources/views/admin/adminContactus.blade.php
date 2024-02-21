@extends('layouts.adminnav')

@section('navbar')

<!--contact us dashboard-->
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
                <nav id="adminOptions" class="userlink nav nav-pills flex-column">
                    <a
                        id="adminHome"
                        class="nav-link"
                        aria-current="page"
                        href="{{route('admin.index')}}"
                    >Home</a
                    >
                    <a class="nav-link" href="{{route('admin.adminQuotes')}}">Quotes</a>
                    <a class="nav-link" href="{{route('admin.adminBookings')}}">Bookings</a>
                    <a
                        class="nav-link active ActiveOption text-white"
                        href="adminContactus.html"
                    >Inquiries</a
                    >
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
          INQUIRIES
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
                        <th class="col-2 p-2">Email</th>
                        <th class="col-2 p-2">Name</th>
                        <th class="col-2 p-2">Status</th>
                        <th class="col-1 text-center">Action</th>
                    </tr>
                  </thead>
                  @foreach($contactMessages as $item)
                                <tbody>
                                <tr class="">
                                    <td class="px-2 py-1">{{ $item->created_at->format('M d, Y') }}</td>
                                    <td class="px-2 py-1">{{ $item->email }}</td>
                                    <td class="px-2 py-1">{{ $item->firstname }} {{ $item->lastname }}</td>
                                    @if ($item->status == 'Pending')
                                      <td class="px-2 py-1"><i class="bi bi-circle-fill" style="font-size: 8px; color:navy"></i> {{ $item->status }}</td>
                                    @else
                                      <td class="px-2 py-1">{{ $item->status }}</td>
                                    @endif
                                    <td class="py-1">
                                      <button type="button" class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" data-bs-target="#viewEnquiriesModal-{{ $item->id }}">
                                        View
                                      </button>
                                    </td>
                                </tr>
                            </tbody>
                  @endforeach
                </table>
              </div>
            
        </div>
    </div>
</section>
<!--end of contact us dashboard-->

@foreach($contactMessages as $item)
<!-- Modal for view Quote -->
<div class="modal fade" id="viewEnquiriesModal-{{ $item->id }}" tabindex="-1" aria-labelledby="viewEnquiriesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewEnquiriesModalLabel">Inquiry from {{ $item->firstname }} </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="px-2"><strong>Date Submitted : </strong>{{$item->created_at->format('M d, Y')}}</div>
                <div class="py-1 px-2"><strong>First Name : </strong>{{$item->firstname}}</div>
                <div class="py-1 px-2"><strong>Last Name : </strong>{{$item->lastname}}</div>
                <div class="py-1 px-2"><strong>Email :  </strong>{{$item->email}}</div>
                <div class="py-1 px-2"><strong>Phone : </strong>{{$item->phone}}</div>
                <div class="py-1 px-2"><strong>Status : </strong>{{$item->status}}</div>
                <div class="py-1 px-2"><strong>Message : </strong>{{$item->message}}</div>
                    
            </div>
            <div class="modal-footer">
              <div class="d-flex w-100 m-0" >
                <a href="mailto:{{ $item->email }}?subject=CHB%20Enquiry&body=Your%20enquiry:%20{{ $item->message }}" class="w-50 btn btn-sm my-1 btn-success mx-1">Reply</a>
                <a class="w-50 btn btn-sm my-1 btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#ChangeStatusModal-{{ $item->id }}">Change Status</a>
              </div>
              <div class="d-flex w-100 m-0">
                <a class="w-100 btn btn-sm my-1 btn-danger mx-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteEnquiryModal-{{ $item->id }}">Delete</a>
              </div>
              
              
          </div>
          
        </div>
    </div>
  </div>

   <!-- Modal for Edit Status -->
   <div class="modal fade" id="ChangeStausModal-{{ $item->id }}" tabindex="-1"
    aria-labelledby="ChangeStausModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ChangeStausModalLabel">Change Status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ url('/admin/contactus/'.$item->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="pending" value="Pending">
                    <label class="form-check-label" for="pending">Pending</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="replied" value="Replied" checked>
                    <label class="form-check-label" for="replied">Replied</label>
                </div>
            
                <div class="modal-footer">
                    <button type="submit" class="btn my-1 btn-sm w-100 btn-success">Save</button>
                    <button type="button" class="btn btn-secondary btn-sm w-100" data-bs-dismiss="modal">Discard</button>
                </div>
            </form>
            
            </div>
        </div>
    </div>
  </div>

  <!-- Modal for edit Give quote-->
  <div class="modal fade" id="ChangeStatusModal-{{ $item->id }}" tabindex="-1" aria-labelledby="ChangeStatusModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content pt-4 px-4">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ChangeStatusModalLabel">Change Status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="row" action="{{ url('/admin/contactus/'.$item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="visually-hidden">
                  <input type="text" name="firstname" value="{{ $item->firstname }}">
                  <input type="text" name="lastname" value="{{ $item->lastname }}">
                  <input type="text" name="email" value="{{ $item->email }}">
                  <input type="text" name="phone" value="{{ $item->phone }}">
                  <input type="text" name="message" value="{{ $item->message }}">
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="pending" value="Pending">
                  <label class="form-check-label" for="pending">Pending</label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="replied" value="Replied" checked>
                  <label class="form-check-label" for="replied">Replied</label>
              </div>
        
            </div>
        <div class="text-center my-4">
          <button type="submit" class="btn btn-success btn-sm w-100">Confirm</button><br>
          <a href="{{url('/admin/contactus')}}" ><button type="button" class="btn btn-secondary btn-sm w-100 mt-2">Discard</button></a>
        </div>
        </form>
            </div>
        </div>
    </div>

  <!-- Modal for Delete Quote -->
  <div class="modal fade" id="deleteEnquiryModal-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteEnquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteEnquiryModalLabel">Delete Inquiry From {{ $item->firstname }}?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this inquiry?
            </div>
            <div class="modal-footer">
              <a href="{{ url('/admin/contactus/'.$item->id) }}" class="btn btn-danger btn-sm w-100">Delete</a>
                <button type="button" class="btn btn-secondary btn-sm w-100" data-bs-dismiss="modal">Discard</button>    
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
