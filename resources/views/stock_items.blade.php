@extends('layouts.master')

@section('title') Stock Items @endsection

@section('css')
    <!-- bootstrap datepicker -->
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- dropzone css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- data table --}}
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />

    @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Stock @endslot
        @slot('title') Items @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="" class="btn btn-primary waves-effect waves-light btn-sm card-title mb-4" data-bs-toggle="modal"
                             data-bs-target=".update-profile">Create Item</a>

                     <!--  Update Profile example -->
                            <div class="modal fade update-profile" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Create a new stock item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="POST" action="/stock_items/new"  enctype="multipart/form-data" id="update-profile">
                                            @csrf
                                            <div class="row mb-4">
                                                <label for="projectname" class="col-form-label col-lg-4">Item Name</label>
                                                <div class="col-lg-8">
                                                    <input id="projectname" name="name" type="text" class="form-control"
                                                        placeholder="eg cemet, nails, cast">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="sitemanager" class="col-form-label col-lg-4">Measurement Unit</label>
                                                <div class="col-lg-8">
                                                    <select name="unit" id="" class="form-control" required>
                                                        <option value="" selected disabled>choose</option>
                                                        <option value="kg">Kilograms</option>
                                                        <option value="m">Meters</option>
                                                        <option value="sacks">Sacks</option>
                                                        <option value="pieces">Pieces</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="{{ Auth::user()->id }}"
                                                    type="submit">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <div class="card-body">
                            <h4 class="card-title">All items</h4>
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Measurement</th>
                                        <th>Created Date</th>
                                        <th>Tool</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stock_items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->measurement_unit }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <span class="badge bg-primary rounded-pill ms-2">{{ $item->User_type }}</span>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- bootstrap datepicker -->
    {{-- <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> --}}
    <!-- dropzone plugin -->
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection

