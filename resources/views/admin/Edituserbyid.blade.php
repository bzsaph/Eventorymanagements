@extends('layouts/admin')

@section('title')
 Edit User
@endsection

@section('contain')
@if (Session::has('message'))
<div class="btn btn-success btn-lg btn-block">{{ Session::get('message') }}</div>
@endif


<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
       <div class="content-heading">
          <div>Welcome To Mess Attendences Please fill The form of the Church
             <small>Approving Member </small>
          </div>
       </div>
       <div class="container-fluid">
          <!-- DATATABLE DEMO 1-->

          <!-- DATATABLE DEMO 2-->
          <div class="card">
             <div class="card-header">
                <div class="card-title" style="text-align: center !important">Pleaese be carefull </div>
                <div class="text-sm" style="text-align: center !important">Aperson your going to approve will be using System</div>
             </div>

            <form action="/ChangeStutas" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="row">

                        <div class="col-lg-3">
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="form-group" style="margin: 12px !important">
                                    <label for="name">Edit user Stutas and asign To the company</label>
                                    @foreach ($users as $key=>$item)
                                    <div class="form-group" style="margin: 12px !important">
                                        <label for="phone">Name Of the user </label>
                                        <input type="text" class="form-control" readonly  placeholder="{{$item->name}}">
                                        <input type="hidden" class="form-control" name="id" value="{{$item->id}}">
                                    </div>
                                    <div class="form-group" style="margin: 12px !important">
                                        <label for="phone"> Phone number of the user</label>
                                        <input type="text" class="form-control" readonly  placeholder="{{$item->phone}}">

                                    </div>
                                    <div class="form-group" style="margin: 12px !important">
                                        <label for="phone">Select User Type :<span style="color:rgb(30, 190, 164)" >{{$item->user_type}}</span> </label>
                                        <select class="form-control province-input" name="privilage"  >
                                            <option value="" disabled class="default-opt">Please choose previllage</option>
                                            @if (Auth::user()->user_type == "Superadmin")
                                            <option value="admin">admin</option>
                                            @endif
                                            <option value="customer">Customer</option>
                                            <option value="retailer">Seller</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin: 12px !important">
                                        <label for="phone">Stocker name;<span style="color:rgb(30, 190, 164)" >{{$stockerf[$key]->name}}</span></label>
                                        <select class="form-control province-input" name="stocker"  >
                                            <option value="" disabled class="default-opt">Please choose previllage</option>

                                            @foreach ($stocker as $depo)
                                                <option value="{{$depo->id}}">{{$depo->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @endforeach
                                </div>

                                    <div class="col-lg-12">
                                        <div class="form-group" style="margin: 12px !important">
                                            <button type="submit" class=" form-control btn btn-primary" >Edit user Status</button>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('script')

@endsection


