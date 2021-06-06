@extends('layouts.master')

@section('title') @lang('translation.Data_Tables') @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Users @endslot
        @slot('title') All User @endslot
    @endcomponent



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All users In the system wil there previllages</h4>


                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date of birth</th>
                                <th>Privillage</th>
                                <th>Tool</th>
                            </tr>
                        </thead>


            <tbody>
                @foreach ($alluser as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->dob }}</td>
                    <td class="badge bg-info rounded-pill ms-2"> {{ $user->User_type }}</td>
                    <td><a href="dashboard-adituser/{{  $user->id  }}"><i class="bx bx-edit-alt" style="font-size: 40px !important ;color:rgba(29, 61, 165, 0.842) !important"></i> </a>
                        <a href="dashboard-viewuser/{{  $user->id  }}"><i class="bx bx-happy-heart-eyes" style="font-size: 40px !important;color:rgba(75, 245, 75, 0.568) !important"></i></a>
                        <a href="dashboard-deleteuser/{{  $user->id  }}"><i class="bx bx-x-circle" style="font-size: 40px !important;color:rgb(226, 43, 43) !important"></i></a>


                    </td>

                @endforeach

            </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
