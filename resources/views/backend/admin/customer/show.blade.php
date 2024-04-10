@extends('BackEnd.master')

@section('title')
    Customer · {{ $customer->fname }} {{ $customer->lname }} · {{ SettingHelper::get('name') }}
@endsection

@section('content')
    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="col">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h5>{{ $customer->fname }} {{ $customer->lname }}</h5>
                </div>
            </div>
        </div>

        {{-- first section --}}
        <div class="row">
            <div class="col-sm-8">
                {{-- payment status --}}
                <div class="statbox widget box box-shadow m-2">
                    <div class="widget-header">
                        {{-- display success message --}}
                        @if (Session::has('sms'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('sms') }}</strong>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        {{-- display success message --}}
                        <div class="row mb-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h5>Orders: {{ count($customer->orders) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">

                        <div class="row">
                            <div class="col">

                            </div>
                        </div>

                    </div>
                </div>
                {{-- order status --}}
                <div class="statbox widget box box-shadow m-2">
                    <div class="widget-header">
                        <div class="row mb-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h5>Last order placed</h5>
                            </div>
                        </div>
                    </div>

                    <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">

                        <div class="row">
                            <div class="col">
                                @if (count($customer->orders) > 0)
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('order.show', $customer->orders[0]->id) }}">
                                                #{{ $customer->orders[0]->order_id }}
                                            </a>
                                        </div>
                                        <div class="">
                                            {{ $customer->orders[0]->currency }}{{ $customer->orders[0]->order_total }}
                                        </div>
                                    </div>
                                @endif
                                <table id="style-3" class="style-3 table-hover table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($customer->orders) > 0)
                                            @foreach ($customer->orders[0]->order_items as $item)
                                                <tr>
                                                    <td>
                                                        @if (count($item->variant->images) > 0)
                                                            <a href="{{ Storage::url('product/' . $item->variant->images[0]->image) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <img style="width:50px; min-width: 50px;"
                                                                    class="img-thumbnail"
                                                                    src="{{ Storage::url('product/' . $item->variant->images[0]->image) }}"
                                                                    alt="{{ $item->variant->images[0]->image }}"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Click to view large mode">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('variant.edit', $item->variant->id) }}">
                                                            {{ $item->variant->product->title }}
                                                        </a>

                                                        {{-- product attribute --}}
                                                        @if (count($item->attribute) > 0)
                                                            <ul>
                                                                @if ($item->variant->material)
                                                                    <li>Material: {{ $item->variant->material->title }}
                                                                    </li>
                                                                @endif
                                                                @foreach ($item->attribute as $attribute)
                                                                    <li>{{ $attribute->name }}: {{ $attribute->value }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                {{-- <div>
                                    <a href="/order?customer_id={{ $customer->id }}">View all orders</a>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{--  second section --}}
            <div class="col-sm-4">
                {{-- customer information --}}
                <div class="statbox widget box box-shadow m-2">
                    <div class="widget-header">
                        <div class="row mb-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h5>Customer</h5>
                            </div>
                        </div>
                    </div>

                    <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">

                        <div class="row">
                            <div class="col">
                                <div>
                                    <a href="{{ route('customer.edit', $customer->id) }}">Edit User</a>
                                </div>
                                <div>
                                    Email: <a
                                        href="{{ route('sendmail.create') }}?to_email={{ $customer->email }}">{{ $customer->email }}</a>
                                </div>
                                <div>
                                    Phone: @if ($customer->phone_number)
                                        <a href="tel:{{ $customer->phone_number }}">{{ $customer->phone_number }}</a>
                                    @else
                                        N\A
                                    @endif
                                </div>
                                <div>
                                    Gender: {{ $customer->gender }}
                                </div>
                                <div>
                                    Birth: {{ $customer->birth }};
                                </div>
                                {{-- <div>
                                    Age: {{ Carbon\Carbon::parse($customer->birth)->age }} years
                                </div> --}}
                                <div>
                                    Email verified at: {{ $customer->email_verified_at }};
                                </div>

                                <div>
                                    Account created at: {{ $customer->created_at }};
                                </div>
                                <div>
                                    User type: {{ $customer->user_type }};
                                </div>
                                <div>
                                    User status: @if ($customer->status)
                                        Enabled
                                    @else
                                        Disabled
                                    @endif;
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection

@section('style')
    <link href="{{ asset('admin_assets') }}/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/select2/select2.min.css">

    <style>
        td {
            white-space: normal !important;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('admin_assets') }}/assets/js/scrollspyNav.js"></script>
    <script src="{{ asset('admin_assets') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ asset('admin_assets') }}/plugins/select2/custom-select2.js"></script>

    <script>
        $(document).ready(function() {
            $(".tags").select2({
                placeholder: "Find or create tags",
                allowClear: true,
                tags: true
            });
        });
    </script>
@endsection
