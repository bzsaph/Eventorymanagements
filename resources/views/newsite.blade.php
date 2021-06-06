@extends('layouts.master')

@section('title') @lang('translation.Create_New') @endsection

@section('css')
    <!-- bootstrap datepicker -->
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- dropzone css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
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
                    <h4 class="card-title mb-4">Create New Site</h4>
                    <form>
                        <div class="row mb-4">
                            <label for="projectname" class="col-form-label col-lg-2">Site Name</label>
                            <div class="col-lg-10">
                                <input id="projectname" name="projectname" type="text" class="form-control"
                                    placeholder="Enter Site Name...">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="projectname" class="col-form-label col-lg-2">Site Manager</label>
                            <div class="col-lg-10">
                                <select name="Assignedto" id="" class="form-control" required>
                                    <option value="" selected disabled>choose Name</option>
                                    @foreach ($alluser as $user )
                                        <option value="{!! $user->id !!}">{!! $user->name !!}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                    </form>

                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Create Project</button>
                        </div>
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
@endsection
