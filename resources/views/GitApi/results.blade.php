<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script> 
            function searchpage(){
                window.location.href = "http://localhost/GitHub_Api/public/";
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1 class="title" >Search Results</h1>
                <table class="table table-hover">
                 <thead>
                  <tr class="bg-danger">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Stars</th>
                    <th>Click for Details</th>
                  </tr>
                 </thead>
                 <tbody>
                    @foreach($values as $value)
                  <tr class="bg-success">
                    <td>{{$value->id }}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->stargazers_count}} </td>
                    <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">More Info</button></td>
                  </tr>
                    @endforeach
                 </tbody>
                </table>
                
                      <!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title bg-danger">Details of the {{$value->name}}</h4>
                            </div>
                            <div class="modal-body bg-success">
                                <p>ID : {{$value->id }}</p>
                                <p>Name : {{$value->name}}</p>
                                <p>Stars : {{$value->stargazers_count}} </p>
                                <p>Url : {{$value->html_url}} </p>
                                <p>Created At : {{$value->made_at}}</p>
                                <p>Pushed At : {{$value->pushed_at}}</p>
                                <p>Description : {{$value->description}}</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    

                <div class="col-sm-8">{{ $values->links()}}  </div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-success" onclick="return searchpage()">Back to Search</button>
                </div>
            </div>
        </div>
    </body>
</html>




