@extends('layouts.adminnav')

@section('navbar')

        <!--bookings dashbord-->
        <section class="container nav-margin mb-5">
            <div class="row">
                <div class="col-lg-3 col-12 mx-auto mb-4">
                    <div
                        class="col-lg-12 col-md-11 pe-lg-5 pe-0 mt-3 mx-auto text-center"
                    >
                        <div class="text-center h2 pb-4">ADMIN DASHBOARD</div>
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
                            <a class="nav-link" href="{{route('admin.adminMessages')}}">Messages</a>
                            <a class="nav-link" href="{{route('admin.adminContactus')}}">Contact Us</a>
                            <a class="nav-link" href="{{route('admin.adminUsers')}}">Users</a>
                            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();" class="nav-link">Logout</a>
                            <form action="{{route('logout')}}" method="POST" id="formLogout">@csrf</form>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div
                        class="section-header text-center display-4 fw-bold mb-5 pb-md-3 pb-sm-0 pb-0"
                    >
                        BOOKINGS
                    </div>
                    <div class="row">
                        <table>
                            <tr class="tableheader p-3">
                                <th class="col-2 p-2">Date</th>
                                <th class="col-4 p-2">Project Details</th>
                                <th class="col-2 p-2">Quote</th>
                                <th class="col-2 p-2">Status</th>
                                <th class="col-2 text-center">Action</th>
                            </tr>
                            <tr class="quoteEntry">
                                <td class="ps-2">Jan 1, 2024</td>
                                <td class="ps-2 py-3">
                                    <div class="fw-bold">Service</div>
                                    <div class="pb-2">Solar Panel Cleaning</div>
                                    <div class="fw-bold">Quantity</div>
                                    <div class="pb-2">12</div>
                                    <div class="fw-bold">Address</div>
                                    <div class="">123 Bacoor, Cavite</div>
                                </td>
                                <td class="ps-2">$120</td>
                                <td class="ps-2">Completed<br />Paid</td>
                                <td>
                                    <div
                                        class="w-100 btn btn-sm my-1 btn-success"
                                    >
                                        Completed
                                    </div>
                                    <div
                                        class="w-100 btn btn-sm my-1 btn-warning"
                                    >
                                        Paid
                                    </div>
                                    <div
                                        class="w-100 btn btn-sm my-1 btn-secondary"
                                    >
                                        Edit
                                    </div>
                                    <div
                                        class="w-100 btn btn-sm my-1 btn-danger"
                                    >
                                        Cancel
                                    </div>
                                </td>
                            </tr>
                            <tr class="quoteEntry">
                                <td class="ps-2">Feb 19, 2024</td>
                                <td class="ps-2 py-3">
                                    <div class="fw-bold">Service</div>
                                    <div class="pb-2">Solar Panel Cleaning</div>
                                    <div class="fw-bold">Quantity</div>
                                    <div class="pb-2">12</div>
                                    <div class="fw-bold">Address</div>
                                    <div class="">123 Bacoor, Cavite</div>
                                </td>
                                <td class="ps-2">$120</td>
                                <td class="ps-2">Pending<br />Unpaid</td>
                                <td>
                                    <div
                                        class="w-100 btn btn-sm my-1 btn-success"
                                    >
                                        Completed
                                    </div>
                                    <div
                                        class="w-100 btn btn-sm my-1 btn-warning"
                                    >
                                        Paid
                                    </div>
                                    <div
                                        class="w-100 btn btn-sm my-1 btn-secondary"
                                    >
                                        Edit
                                    </div>
                                    <div
                                        class="w-100 btn btn-sm my-1 btn-danger"
                                    >
                                        Cancel
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!--end of bookings dashbord-->

        @endsection