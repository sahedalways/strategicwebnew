@extends('backend.layouts.master')

@section('title')
    {{ auth()->user()->name }}'s Dashboard
@endsection


@section('content')
    <div class="layout-px-spacing">

        @if (in_array(auth()->user()->user_type, ['admin', 'manager']))
            <div class="row layout-top-spacing">

                {{-- display error message --}}
                @if (Session::has('sms'))
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('sms') }}</strong>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                {{-- //display error message --}}

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">
                        <div class="widget-heading">
                            <h5 class="text-dark">
                                Todays Book
                                {{-- <strong style="font-size: 20px;color: #9100ff">৳$7</strong> --}}
                                <strong style="font-size: 20px;color: #9100ff">76</strong>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two" style="

            ">
                        <div class="widget-heading">
                            <h5 class="text-dark">
                                Monthly Book
                                <strong style="font-size: 20px;color: #9100ff">99</strong>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">
                        <div class="widget-heading">
                            <h5 class="text-dark">
                                Total Book

                                <strong style="font-size: 20px;color: #9100ff">77</strong>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">
                        <div class="widget-heading">
                            <h5 class="text-dark">
                                Cancelled Book
                                <strong style="font-size: 20px;color: #9100ff">43</strong>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">
                        <div class="widget-heading">
                            <h5 class="text-dark">
                                Pending Cancellation
                                <strong style="font-size: 20px;color: #9100ff">56</strong>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">
                        <div class="widget-heading">
                            <h5 class="text-dark">
                                Net Book
                                <strong style="font-size: 20px;color: #9100ff">67</strong>
                            </h5>
                        </div>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">

                        <div class="widget-heading">
                            <h5 class="text-dark">
                                Monthly Income
                                <strong style="font-size: 20px;color: #9100ff">$76</strong>

                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">

                        <div class="widget-heading">
                            <h5 class="text-dark">
                                Total Income

                                <strong style="font-size: 20px;color: #9100ff">$98
                                </strong>
                            </h5>
                        </div>
                    </div>
                </div>



                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-table-two">

                        <div class="widget-heading">
                            <h5>
                                Total Games
                                <strong style="font-size: 20px;color: #9100ff">34</strong>
                            </h5>
                        </div>
                    </div>
                </div>


                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">

                </div>

                {{-- customer --}}
                @if (hasAccessForManager('View Members'))
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="" style="color: #422b02">Total Members {{ $custo->count() }}</h5>
                                <h5 class="text-center">Registered Members</h5>
                            </div>

                            <div class="widget-section">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-section">Name</div>
                                                </th>

                                                <th>
                                                    <div class="th-section">E-mail</div>
                                                </th>
                                                <th>
                                                    <div class="th-section">Created at</div>
                                                </th>
                                                <th>
                                                    <div class="th-section">Action</div>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($customers as $customer)
                                                <tr>
                                                    <td>
                                                        <div class="td-section">{{ $customer->name }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="td-section"><span
                                                                class="">{{ $customer->email }}</span>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="td-section">
                                                            <span
                                                                class="badge badge-success">{{ $customer->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="td-section">

                                                            <a href="{{ route('customer.show', $customer->id) }}">
                                                                View
                                                            </a>
                                                            <a href="{{ route('customer.edit', $customer->id) }}"
                                                                class="bs-tooltip" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Edit">

                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>
                                                        <span class="text-center">No Data Found</span>
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                {{-- admin --}}
                @if (auth()->user()->user_type == 'admin')
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 style="color: #c69a31"> Admin {{ $admins->count() }}</h5>
                                <h5 class="text-center">Admin List</h5>
                            </div>
                            <div class="widget-section">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-section">Admin Name</div>
                                                </th>
                                                <th>
                                                    <div class="th-section">Create Date</div>
                                                </th>
                                                <th>
                                                    <div class="th-section">Status</div>
                                                </th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($adminsLatest as $ad)
                                                <tr>
                                                    <td>
                                                        <div class="td-section">{{ $ad->name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="td-section">{{ $ad->created_at->diffForHumans() }}
                                                        </div>
                                                    </td>


                                                    <td>
                                                        <div class="td-section">

                                                            <span class="badge badge-primary">
                                                                Active
                                                            </span>

                                                        </div>
                                                    </td>

                                                </tr>
                                            @empty
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
@endsection
