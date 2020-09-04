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
          <div>Welcome To Mess Attendences Please fill The form of the Church
             <small>Church Information </small>
          </div>
       </div>
       <div class="container-fluid">
          <!-- DATATABLE DEMO 1-->

          <!-- DATATABLE DEMO 2-->
          <div class="card">
             <div class="card-header">
                <div class="card-title" style="text-align: center !important">Creating Service</div>
                <div class="text-sm" style="text-align: center !important">To fill This from You will First Create Church And Then Fill The Room It has and service According to the Hall and time </div>
             </div>

                <form action="/CreateService" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="row">

                        <div class="col-lg-3">
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                            <div class="form-group" style="margin: 12px !important">
                                <label for="name">Parish:</label>
                                <select name="Parish" id="parish" class="form-control">
                                    @foreach ($church as $item)
                                <option value="{{$item->id}}">{{$item->Parish_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin: 12px !important">
                                <label for="phone">Language: Example (fra) </label>
                                <input type="text" class="form-control" name="language" required placeholder="input Service language">
                            </div>
                            <div class="form-group" style="margin: 12px !important">
                                    <label for="phone">Hall:example main hall</label>
                                    <input type="text" class="form-control" name="hall" required placeholder="Name Of the Hall">
                            </div>
                            <div class="form-group" style="margin: 12px !important">
                                <label for="phone">Hall capacity:example 4000</label>
                                <input type="text" class="form-control" name="capacity" required placeholder="Number Of set">
                        </div>
                            <div class="form-group" style="margin: 12px !important">
                                    <label for="phone">Mass</label>
                                            <input type="text" class="form-control" name="mess" required placeholder="Number of mess" >
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('script')

@endsection
<script>

    $(document).ready(function() {

            // ende of first query
            $('#province').change(function () {
                        var provinces = document.getElementById("province").value;
                        var opt="";
                                $.ajax({
                                    url:"{{ route('districts') }}",
                                    method:"POST",
                                    data:{"_token": "{{ csrf_token() }}",provinces:provinces,},
                                    success:function(result){
                                        if (result =="") {
                                            opt='  <option value="" class="default-opt">Choose Province</option>'
                                            alert("empty");
                                            $('#District').append(opt);
                                        }else{
                                            for (var bazimya = 0; bazimya < result.length; bazimya++) {
                                                opt+='<option value="'+result[bazimya].id+'" >'+result[bazimya].name+'</option>'

                                            }
                                            $('#District').append(opt);
                                        }
                                        },error: function(xhr, status, error) {
                                            var err = eval("(" + xhr.responseText + ")");
                                        }
                                })
                                $('#District').find('option').remove();
            });
            // ende of first query province
            $('#District').change(function () {
                var value = document.getElementById("District").value;
                var opt="";
                $.ajax({
                    url:"{{ route('Sector') }}",
                    method:"POST",
                    data:{"_token": "{{ csrf_token() }}",value:value},
                    success:function(result){
                        if (result =="") {
                            opt='<option value="" class="default-opt">Choose Province</option>'
                            alert("empty");
                            $('#Sector').append(opt);
                        }else{
                            for (var bazimya = 0; bazimya < result.length; bazimya++) {
                                opt+='<option value="'+result[bazimya].id+'" requide >'+result[bazimya].name+'</option>'

                            }
                            $('#Sector').append(opt);
                        }

                    },error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }
                })
                $('#Sector').find('option').remove();
            });

              // ende of first query
              $('#Sector').change(function () {
                        var provinces = document.getElementById("Sector").value;
                        var opt="";
                                $.ajax({
                                    url:"{{ route('Cell') }}",
                                    method:"POST",
                                    data:{"_token": "{{ csrf_token() }}",provinces:provinces,},
                                    success:function(result){

                                        if (result =="") {
                                            opt='<option value="" class="default-opt">Choose Province</option>'

                                            $('#').append(opt);
                                        }else{
                                            for (var values = 0; values < result.length; values++) {
                                                opt+='<option value="'+result[values].id+'" >'+result[values].name+'</option>'
                                            }
                                            $('#Cell').append(opt);
                                        }
                                        },error: function(xhr, status, error) {
                                            var err = eval("(" + xhr.responseText + ")");
                                        }
                                })
                                $('#Cell').find('option').remove();
            });
            // ende of first query province
            $('#Cell').change(function () {
                var value = document.getElementById("Cell").value;
                var opt="";
                $.ajax({
                    url:"{{ route('village') }}",
                    method:"POST",
                    data:{"_token": "{{ csrf_token() }}",value:value},
                    success:function(result){

                        if (result =="") {
                            opt= document.getElementById("Cell").value;
                            $('#Village').append(opt);
                        }else{
                            for (var bazimya = 0; bazimya < result.length; bazimya++) {
                                opt+='<option value="'+result[bazimya].id+'" requide >'+result[bazimya].name+'</option>'

                            }

                            $('#Village').append(opt);
                        }

                    },error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }
                })
                $('#Village').find('option').remove();
            });
        });
</script>

