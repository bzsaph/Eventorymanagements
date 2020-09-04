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
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>User-Type</th>

                    </tr>
                 </thead>
                 <tbody >
                    @foreach($userinthesystem as $key => $Userin)
                        @if ($Userin->user_type !="admin")
                            @if ($Userin->user_type!="Superadmin")
                            <tr>
                                <td>{{$Userin->name}}</td>
                                <td>{{$Userin->phone}}</td>
                                <td>{{$Userin->email}}</td>
                                <td><a href="Edituser/{{$Userin->id}}">{{$Userin->user_type}}</a></td>


                            </tr>
                            @endif

                        @else

                        <tr>
                            <td>{{$Userin->name}}</td>
                            <td>{{$Userin->phone}}</td>
                            <td>{{$Userin->email}}</td>
                            <td><a href="Edituser/{{$Userin->id}}">{{$Userin->user_type}}</a></td>


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

