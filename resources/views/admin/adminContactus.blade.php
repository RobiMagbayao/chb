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
                    <a class="nav-link" href="{{route('admin.adminMessages')}}">Messages</a>
                    <a
                        class="nav-link active ActiveOption text-white"
                        href="adminContactus.html"
                    >Enquiries</a
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
          ENQUIRIES
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
                        <th class="col-3 p-2">Details</th>
                        <th class="col-4 p-2">Message</th>
                        <th class="col-2 p-2">Status</th>
                        <th class="col-1 text-center">Action</th>
                    </tr>
                  </thead>
                  @foreach($contactMessages as $message)
                                <tbody>
                                <tr class="border-bottom border-primary">
                                    <td class="px-1 py-3">{{ $message->created_at->format('M d, Y') }}</td>
                                    <td class="px-1 py-3">
                                        <div><strong>Name:</strong> {{ $message->firstname }} {{ $message->lastname }}</div>
                                        <div><strong>Email:</strong> {{ $message->email }}</div>
                                        <div><strong>Phone:</strong> {{ $message->phone }}</div>
                                    </td>
                                    <td class="px-1 py-3">{{ $message->message }}</td>
                                    <td class="px-1 py-3">{{ $message->status }}</td>
                                    <td>
                                      <a href="mailto:{{ $message->email }}?subject=CHB%20Enquiry&body=Your%20enquiry:%20{{ $message->message }}" class="w-100 btn btn-sm mt-1 btn-success">Reply</a>
                                      <button type="button" class="btn btn-primary btn-sm w-100 my-1" data-bs-toggle="modal"
                                        data-bs-target="#ChangeStausModal-{{ $message->id }}">
                                        Status 
                                      </button>
                                      <button type="button" class="btn btn-danger btn-sm w-100 mb-1" data-bs-toggle="modal"
                                          data-bs-target="#deleteMessageModal-{{ $message->id }}">
                                          Delete
                                      </button>
                                    </td>
                                </tr>
                            </tbody>
                  <!-- Modal for Edit Status -->
                  <div class="modal fade" id="ChangeStausModal-{{ $message->id }}" tabindex="-1"
                    aria-labelledby="ChangeStausModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ChangeStausModalLabel">Change Status</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.contactus.updateStatus', $message->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="pending" value="Pending">
                                    <label class="form-check-label" for="pending">Pending</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="replied" value="Replied" checked>
                                    <label class="form-check-label" for="replied">Replied</label>
                                </div>
            
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                    <button type="submit" class="btn my-1 btn-success">Save</button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- Modal for Delete Message -->
                  <div class="modal fade" id="deleteMessageModal-{{ $message->id }}" tabindex="-1"
                    aria-labelledby="deleteMessageModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteMessageModalLabel">Delete Message</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the message from {{ $message->email }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard
                                </button>
                                <form action="{{ route('admin.contactus.destroy', $message->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn my-1 btn-danger">Delete</button>
                                </form>
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
<!--end of contact us dashboard-->



@endsection
