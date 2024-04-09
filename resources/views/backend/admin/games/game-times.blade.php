@extends('backend.layouts.master')

@section('title', 'Game Times')

@section('style')

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/plugins/table/datatable/custom_dt_custom.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endsection

<style>
    td {
        white-space: normal !important;
    }
</style>

@section('content')

    <div class="row layout-spacing mt-3 mx-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

            {{-- display error message --}}
            @if (Session::has('sms'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"
                    style="
                margin: 10px 5px 10px 5px;">
                    <strong>{{ Session::get('sms') }}</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (Session::has('warning'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                    style="
                margin: 10px 5px 10px 5px;">
                    <strong>{{ Session::get('warning') }}</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- //display error message --}}
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="mb-4 d-flex align-items-center justify-content-between flex-wrap">
                    </div>


                    <table id="style-3" class="style-3 table-hover table">
                        <thead>
                            <tr>
                                <th class="checkbox-column text-center">#</th>
                                <th>Times</th>
                                <th class="dt-no-sorting text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- backend/admin/manage-access/index.blade.php -->

                            @foreach ($times as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td class="text-center">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" role="switch"
                                                class="form-check-input game-time-checkbox" id="item_{{ $item->id }}"
                                                data-item-id="{{ $item->id }}" {{ $item->is_enable ? 'checked' : '' }}>
                                            <label class="form-check-label" for="item_{{ $item->id }}"></label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script src="{{ asset('/admin_assets') }}/assets/js/games/game-times.js"></script>

@endsection
