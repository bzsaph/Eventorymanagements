@extends('layouts.master')

@section('title') Sites @endsection

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
        @slot('li_1') Site @endslot
        @slot('title') Create New Site @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="" class="btn btn-primary waves-effect waves-light btn-sm card-title mb-4" data-bs-toggle="modal"
                             data-bs-target=".update-profile">Create New SIte</a>

                     <!--  Update Profile example -->
                            <div class="modal fade update-profile" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myLargeModalLabel">Crate New Site</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="POST" action="/dasboard-newsite"  enctype="multipart/form-data" id="update-profile">
                                            @csrf
                                            <div class="row mb-4">
                                                <label for="projectname" class="col-form-label col-lg-4">Site Name</label>
                                                <div class="col-lg-8">
                                                    <input id="projectname" name="sitename" type="text" class="form-control"
                                                        placeholder="Enter Site Name...">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="sitemanager" class="col-form-label col-lg-4">Site Manager</label>
                                                <div class="col-lg-8">
                                                    <select name="Assignedto" id="" class="form-control" required>
                                                        <option value="" selected disabled>choose Name</option>
                                                        @foreach ($alluserselect as $user )
                                                            <option value="{!! $user->id !!}">{!! $user->name !!}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="{{ Auth::user()->id }}"
                                                    type="submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <div class="card-body">
                            <h4 class="card-title">All sites</h4>
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Site Name</th>
                                        <th>Site Manager</th>
                                        <th>Site Created Date</th>
                                        <th>Tool</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alluser as $user)
                                    <tr>
                                        <td>{{ $user->sitename }}</td>
                                        <td>{{ $user->managerName }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td >
                                            <span class="badge bg-primary rounded-pill ms-2">{{ $user->User_type }}</span>
                                        </td>
                                        <td>
                                        </td>

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

