<!DOCTYPE html>
<html>
<head>
    <title>invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <p style="text-align: left">{{$title}}</p><br>
                    <p style="text-align:left">Created by:{{$nameofuser}}</p><br>
                    <p style="text-align:left">Created by:{{$date}}</p><br>
                </div>
                <div class="col-lg-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/17/Coat_of_arms_of_Rwanda.svg" alt="" width="35px" height="35px">
                </div>
            </div>

          <p style="text-align: right">Going to the The stocker of:{{$stockername}}</p><br>
        </div>
      </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Unity-price</th>
            <th scope="col">Sack</th>
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th >{{$nameofuser}}</th>
                <td>{{$date}}</td>
                <td>{{$Untprice}}Rwf</td>
                <td>{{$sacker}}</td>
                <td>{{$total}}</td>
              </tr>
        </tbody>
      </table>
      <footer style="margin-top: 20% !important">
        <div class="card">
            <div class="card-body">
              <p style="text-align: center">by company name: yanjye.com</p><br>

            </div>
          </div>
      </footer>

</body>
</html>
