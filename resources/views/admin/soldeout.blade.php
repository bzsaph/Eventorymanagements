@extends('layouts/admin')

@section('title')
 Home !Sell
@endsection

@section('contain')
@if (Session::has('message'))
<div class="btn btn-success btn-lg btn-block">{{ Session::get('message') }}</div>
@endif


<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
       <div class="content-heading">
          <div>Welcome to place for sell form please be carefull the way you are filling form
             <small>Please sell the cement </small>
          </div>
       </div>
       <div class="container-fluid">
          <!-- DATATABLE DEMO 1-->

          <!-- DATATABLE DEMO 2-->
          <div class="card">
             <div class="card-header">
                <div class="card-title" style="text-align: center !important">This is ciment remaining:
                    @if ($remainingstocker->Totalnumberofsuck <="60")
                    <span class="btn btn-danger"> {{$remainingstocker->Totalnumberofsuck}} -- (mwajya kurangura)</span>
                    @else
                    <span class="btn btn-primary"> {{$remainingstocker->Totalnumberofsuck}}</span>
                    @endif
                    </div>
                  </div>

                <form action="/sellcimenttocustomer" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="row">

                        <div class="col-lg-2">
                        </div>

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group" style="margin: 12px !important">
                                            <label for="name">Name of buy /Company name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group" style="margin: 12px !important">
                                            <label for="Phone">Phone of buy</label>
                                            <input id="Phone" type="text" class="form-control @error('Phone') is-invalid @enderror" name="Phone" value="{{ old('Phone') }}" required autocomplete="Phone" autofocus>

                                            @error('Phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group" style="margin: 12px !important">
                                            <label for="numberofzucker">number of sack</label>
                                            <input id="numberofzucker" type="number" class="form-control @error('numberofzucker') is-invalid @enderror" name="numberofzucker" value="{{ old('numberofzucker') }}" required autocomplete="numberofzucker" autofocus>

                                            @error('numberofzucker')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                    </div>


                                </div>



                            <div class="form-group" style="margin: 22px !important">
                            <button type="submit" class=" form-control btn btn-primary" >Submit</button>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-3">
                        </div>
                    </div>
                  </form>

            </div>
          </div>
          <!-- DATATABLE DEMO 3-->

       </div>
    </div>
 </section>

@endsection

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}


