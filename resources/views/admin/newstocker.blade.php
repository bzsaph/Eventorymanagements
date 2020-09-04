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
          <div>Create New Stocker
             <small>This is like depo of ciment </small>
          </div>
       </div>
       <div class="container-fluid">
          <!-- DATATABLE DEMO 1-->

          <!-- DATATABLE DEMO 2-->
          <div class="card" >
             <div class="card-header">
                <div class="card-title" style="text-align: center !important">Fill tha table under</div>

             </div>
             <div class="row">
                <div class="col-lg-6">

                <form action="/newStockercrete" method="POST" style="margin-left: 20px">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}

                            <div class="form-group">
                                <label for="name">Name</label>

                                <input type="text" class="form-control" placeholder="Remera "  required name="deponame" id="name"  >
                            </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
<div class="col-lg-6">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Date</th>

          </tr>
        </thead>
        <tbody>
            @if (!empty($depo))

            @else

            @endif

@foreach ($depo as $item)

@if ($item->deleted !="1")
<tr>
    <th scope="row"><a href="delete/{{$item->id}}">{{$item->name}}</a></th>
    <td>{{  $item->created_at}}</td>

</tr>
@endif

@endforeach


        </tbody>
      </table>
</div>

            </div>

            </div>
          </div>
          <!-- DATATABLE DEMO 3-->

       </div>
    </div>
 </section>

@endsection


