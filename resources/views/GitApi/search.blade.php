
<html>
    <head>
        <title>Laravel</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--Form Validation  -->
        <script>
            $(document).ready(function(){
                
                $("#subbtn").click(function(){
//Validation to check empty value                
                    if ($("#search").val() == "")
                    {
                        alert("Please enter some search value");
                        return false;
                    }  
                    
                    
// regular expression to match only alphanumeric characters and spaces
                    var re = /^[\w ]+$/;
                    if(!re.test($("#search").val())) {
                      alert("Error: Input contains invalid characters!");
                      return false;
                    }
                });
                
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="title"><h1>GitHub Search Api </h1></div>
                <div class="form-group">
                    <form method ="get" id ="form" action="http://localhost/GitHub_Api/public/results">
                        <label class="page-header" for="search">Enter the Search Value</label>
                        <input type="text" id="search" class="form-control" name = "search" required>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> <br>
                        <input type="submit" id ="subbtn" class="btn btn-success" value="Search">   
                    </form>
                </div>
                <div>

                </div>
            </div>
        </div>
    </body>
</html>




