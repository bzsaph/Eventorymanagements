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
            <table id="datatableb" class="table table-striped table-bordered" style="width:100%">
                <p id="messa"></p>
                 <thead>
                    <tr>
                    <th>Seller name</th>
                    <th>sell phone</th>
                    <th>Name of buy</th>
                    <th>User buy number</th>
                    <th>Remaining Sack</th>
                    <th>Sold sack</th>
                    <th>Stocker-name</th>
                    <th>Sold-date</th>

                    </tr>
                 </thead>
                 <tbody >
                    @foreach($remainingstocker as $key => $Userin)
                    @if ($Userin->solled_by == null)

                    @else
                    <tr>
                        <td>{{$username[$key]}}</td>
                        <td>{{$userphone[$key]}}</td>
                        <td>{{$Userin->Company}}</td>
                        <td>{{$Userin->Whobuyphone}}</td>
                        <td>{{$Userin->Totalnumberofsuck}}</td>
                        <td>{{$Userin->Numberofsuckbuy}}</td>
                        <td>{{$name[$key]}}</td>
                        <td>{{$Userin->created_at}}</td>
                    </tr>
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

