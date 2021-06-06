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
                                <td ><span class="badge bg-primary rounded-pill ms-2">{{ $user->User_type }}</span>
                                    @foreach ($user->privilages as $privilage)
                                        @if ($privilage->Delete =="1")
                                        <p class="badge bg-success  ms-2"> Delete</p>
                                        @endif
                                        @if ($privilage->Create =="1")
                                        <p class="badge bg-success  ms-2"> Create </p>
                                        @endif
                                        @if ($privilage->Update =="1")
                                        <p class="badge bg-success  ms-2"> Update </p>
                                        @endif
                                        @if ($privilage->View =="1")
                                        <p class="badge bg-success  ms-2">  View </p>
                                        @endif
                                        @if ($privilage->Full =="1")
                                        <p class="badge bg-success  ms-2"> Full privilage </p>
                                        @endif

                                    @endforeach
                                </td>
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
