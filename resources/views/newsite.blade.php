@extends('layouts.master')

@section('title') @lang('translation.Create_New') @endsection

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
                                                    <input id="projectname" name="sitename" type="text" class="form-control @error('sitename') is-invalid @enderror"
                                                        placeholder="Enter Site Name...">
                                                        @error('sitename')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="sitemanager" class="col-form-label col-lg-4">Site Manager</label>
                                                <div class="col-lg-8">
                                                    <select name="user_id" id="" class="form-control @error('user_id') is-invalid @enderror" required>
                                                        <option value="" selected disabled>choose Name</option>
                                                        @foreach ($alluserselect as $user )
                                                            <option value="{!! $user->id !!}">{!! $user->name !!}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }} Uyumuntu afite indi site ayobora</strong>
                                                    </span>
                                                @enderror

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
                            <h4 class="card-title">All users In the system wil there previllages</h4>
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Site Name</th>
                                        <th>Site Manager</th>
                                        <th>Tool</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alluser as $user)
                                    <tr>
                                        <td>{{ $user->sitename }}</td>

                                                <td>
                                                    @foreach ($user->Sitecreatedbya as $privilage)
                                                     {{ $privilage->name }}
                                                    @endforeach
                                                </td>

                                                {{-- @foreach ($user->sitesmanager as $privilage)

                                                @endforeach --}}

                                            <td>
                                                @foreach (Auth::user()->privilages as $privilage)
                                                @if ($privilage->Full =="1")
                                                <a href="dashboard-adituser/{{  $user->id  }}"><i class="bx bx-edit-alt" style="font-size: 40px !important ;color:rgba(29, 61, 165, 0.842) !important"></i> </a>
                                                <a href="dashboard-viewuser/{{  $user->id  }}"><i class="bx bx-happy-heart-eyes" style="font-size: 40px !important;color:rgba(75, 245, 75, 0.568) !important"></i></a>
                                                <a href="dashboard-deleteuser/{{  $user->id  }}"><i class="bx bx-x-circle" style="font-size: 40px !important;color:rgb(226, 43, 43) !important"></i></a>
                                                 @elseif(count(Auth::user()->privilages) ==null){

                                                @else

                                                @if ($privilage->Update =="1")
                                                <a href="dashboard-adituser/{{  $user->id  }}"><i class="bx bx-edit-alt" style="font-size: 40px !important ;color:rgba(29, 61, 165, 0.842) !important"></i> </a>
                                                @endif
                                                @if ($privilage->View =="1")
                                                <a href="dashboard-viewuser/{{  $user->id  }}"><i class="bx bx-happy-heart-eyes" style="font-size: 40px !important;color:rgba(75, 245, 75, 0.568) !important"></i></a>
                                                @endif
                                                @if ($privilage->Delete =="1")
                                                <a href="dashboard-deleteuser/{{  $user->id  }}"><i class="bx bx-x-circle" style="font-size: 40px !important;color:rgb(226, 43, 43) !important"></i></a>
                                                @endif
                                                @endif


                                                @endforeach



                                            </td>
                                        {{-- </td> --}}
                                         @endforeach


                                    </tr>
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

