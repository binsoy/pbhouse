<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title href="roommngmt.php">Pastillo's Boarding House</title>

    <!-- Bootstrap Core CSS -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../_css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../_font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-addroom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
   <?php include_once("../_includes/navbar.php"); ?>
    <!-- Page Content -->
    <div class="container-fluid" id="body">
      <div class="container-fluid" id="my">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-10">
                <h1 id="pointer" class="page-header">Add Room</h1>
        
                <ol id="pointer"  class="breadcrumb">
                    <li><a href="Roommngmt.php">Home</a>
                    </li>
                    <li class="active">Add Room</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        
        <div class = "container-fluid" id="content">
          <div class="container-fluid" id="bodyy">
            <form action="recordroom.php" method="post" enctype="multipart/form-data">
                <div class="container-fluid" id="file">
                      <label>Floor Plan and Amenities: </label>
                      <input class="form-control-file form-control" file type="file" name="filename" required>
                </div>
                <div class = "container-fluid" id="textfield">
                    <label>Room Status: </label>
                     <select class="form-control" id="room" name="status" required name="status">
                        <option value ='1'>Available</option>
                        <option value ='2'>Occupied</option>
                        <option value ='3'>Full</option>
                        <option value ='4'>Under Maintenance</option>
                    </select>                
                </div>
                <div class = "container-fluid" id="textfield2">
                    <label>Room Rate: </label>
                    <span>php</span>
                    <input class ="form-control" class ="form-control" type="number" name="rate">
                </div>
                <div class = "container-fluid" id="textfield3">
                    <label>Maximum Person(s) per room: </label>
                    <input class ="form-control" type="number" name="population">
                </div>
                <div class = "container-fluid" id="textfield4">
                    <label>Water fee: </label>
                    <span>php</span>
                    <input class ="form-control" type="number" name="water">
                </div>
                <div class = "container-fluid" id="textfield5">
                    <label>wattcost: </label>
                    <span>php</span>
                    <input class ="form-control" type="number" name="wattcost">
                </div>
                <div class = "container-fluid" id="textfield5">
                    <label>Wattage: </label>
                    <span>php</span>
                    <input class ="form-control" type="number" name="wattage">
                </div>
                <div id="buttons">
                    <center>
                      <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to continue?')">Submit</button>
                      <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
                    </center>
                </div>
            </form>
          </div>
        </div>
        

      
        <div class="container-fluid" id="foot">
            <hr>
        </div>
      <div class="container">
          <footer>
              <div class="row">
                  <div class="col-lg-12">
                     <p>Copyright &copy; Esperanza Inc. 2016</p>
                  </div>
              </div>
          </footer>
      </div>
      </div>
    </div>
    <!-- /.container -->

    
    


    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>

</body>

<script type="text/javascript">
window.location.hash = 'pointer'

  var uri = window.location.toString();
if (uri.indexOf("?") > 0 ) {
    var clean_uri = uri.substring(0, uri.indexOf("?"));

    var hash_pos = location.href.indexOf("#");
    if (hash_pos > 0) {
        var hash = location.href.substring(hash_pos, location.href.length);
        clean_uri += hash;
    }   
    window.history.replaceState({}, document.title, clean_uri);
}

</script>

</html>


