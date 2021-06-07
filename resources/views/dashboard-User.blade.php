@extends('layouts.master')

@section('title') Create a user @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Create  @endslot
        @slot('title') New Users  @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Register New User</h4>

                    <form method="POST" class="form-horizontal" action="/registernewuser" enctype="multipart/form-data">

                    @csrf
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                        value="{{ old('email') }}" name="email" placeholder="Enter email" autofocus required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" id="username" name="name" autofocus required
                            placeholder="Enter username">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="userpassword" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password"
                            placeholder="Enter password" autofocus required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword" name="password_confirmation"
                        name="password_confirmation" placeholder="Enter Confirm password" autofocus required>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="userdob">Date of Birth</label>
                        <div class="input-group" id="datepicker1">
                            <input type="date" class="form-control @error('dob') is-invalid @enderror" placeholder="dd-mm-yyyy"
                                data-date-format="dd-mm-yyyy" data-date-container='#datepicker1' data-date-end-date="0d" value="{{ old('dob') }}"
                                data-provide="datepicker" name="dob" autofocus required>
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if (Auth::user()->User_type == "Superadmin" ||Auth::user()->User_type == "admin" )
                    <div class="mb-3">
                        <label for="userpassword" class="form-label">Superadmin</label>
                        <select name="user_type" id="" class="form-control">
                                <option value=""  selected disabled> Choose user type</option>
                                <option value="admin" > CEO</option>
                                <option value="admin" > Accountant</option>
                                <option value="admin" > Aparation Manager</option>
                                <option value="admin" > Finance</option>
                                <option value="Internaluser">Project Manager</option>
                                <option value="Internaluser">Store Keeper</option>
                                <option value="Internaluser">Store manager</option>
                                <option value="User"  selected disabled> Supply</option>
                        </select>

                    </div>
                    @endif


                    {{-- <div class="mb-3">
                        <label for="avatar">Profile Picture</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="inputGroupFile02" name="avatar" autofocus required>
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                    <div class="mt-4 d-grid">
                        <button class="btn btn-primary waves-effect waves-light"
                            type="submit">Register</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
