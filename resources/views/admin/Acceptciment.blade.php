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
          <div>All users in the system
             <small>Abantu bose bari muri system </small>
          </div>
       </div>


       </div>


       <div class="container-fluid">
        <!-- DATATABLE DEMO 1-->

        <!-- DATATABLE DEMO 2-->
        <div class="card">
           <div class="card-header">

           </div>
           <div class="card-body" >
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <p id="messa"></p>
                 <thead>
                    <tr>
                      <th>sack</th>
                      <th>Price/sack</th>
                      <th>Total</th>
                      <th>Accept sack</th>
                    </tr>
                 </thead>
                 <tbody >
                    @foreach($orderofcimnet as $key => $Userin)
            @if ($Userin->accepted =="0")
            @if ($Userin->Depo_id ==Auth::user()->stocker)
            <tr>
                <td>{{$Userin->sacker}}</td>
                <td>{{$Userin->pricepersack}}</td>
                <td>{{$Userin->totalprice}}</td>
                <td><a href="acceptciment/{{$Userin->id}}"><i class="fas fa-check-circle fa-2x" ></i></a></td>
            </tr>
            @endif
            @endif

                     @endforeach



                 </tbody>
              </table>

           </div>
        </div>
        <!-- DATATABLE DEMO 3-->

     </div>


    </div>

 </section>



@endsection

