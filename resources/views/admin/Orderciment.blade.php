@extends('layouts/admin')

@section('title')
 Insert Church| Dashboard
@endsection

@section('contain')
@if (Session::has('message'))
<div class="btn btn-success btn-lg btn-block">{{ Session::get('message') }}</div>
@endif


<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
       <div class="content-heading">
          <div>Please file the form to order the ciment
             <small>Form of the admin </small>
          </div>
       </div>
       <div class="container-fluid">
          <!-- DATATABLE DEMO 1-->

          <!-- DATATABLE DEMO 2-->
          <div class="card" >
             <div class="card-header">
                <div class="card-title" style="text-align: center !important">Order cement</div>

             </div>

                <form action="/Ordercimentsubmit" method="POST" style="margin-left: 20px">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="hidden" value="{{Auth::user()->id}}" name="userid">
                                <input type="text" class="form-control" placeholder="{{Auth::user()->name}}" readonly name="nameofuser" id="name"  >
                            </div>
                            <div class="form-group">
                                  <label for="stocer">Stocker</label>
                                  <select class="form-control province-input" name="Depoid" required >
                                    <option value="" disabled class="default-opt">Please choose Stocker Your going to Order</option>

                                    @foreach ($stocker as $depo)
                                    @if ($depo->deleted !="1")
                                    <option value="{{$depo->id}}">{{$depo->name}}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Number Of sucker</label>
                                <input type="number" class="form-control" placeholder="enter number of sucker" required id="sacker" name="sacker">
                            </div>
                            <div class="form-group">
                                <label for="email">Unity price</label>
                                <input type="number" class="form-control" required placeholder="Untprice" id="Untprice" name="Untprice">
                            </div>
                        </div>


                    </div>

                    <button type="submit" id="hide"  class="btn btn-primary">Submit</button>

                    <button class="btn btn-primary" id="show" style="display: none" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                      </button>
                  </form>

            </div>
          </div>
          <!-- DATATABLE DEMO 3-->

       </div>
    </div>
 </section>

@endsection


