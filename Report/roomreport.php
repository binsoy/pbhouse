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
    <link rel="stylesheet" type="text/css" href="../_includes/style-reports.css">
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
    <div class="container" id="body">
    	<div class="container-fluid" id="my">
    		<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">Report</h1>
				
                <ol id="pointer"  class="breadcrumb">
                    <li><a href="Roommngmt.php">Home</a>
                    </li>
                    <li class="active">Room report</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        
        <div class="container-fluid" id="bodyy">
            <div class="container-fluid" id="content">
                <div class="container-fluid" id="text1">
                    <h2>Report issue for Room form</h2>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="container-fluid" id="subject">
                        <label>Subject</label>
                        <input class="form-control" type="text" id="subtext"></textarea>
                    </div>
                    <div class="container-fluid" id="details">
                        <label>content</label>
                        <textarea class="form-control" rows="5" id="cont"></textarea>
                    </div>
                    <div id="buttns">
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
	    <div class="container-fluid" id="body2">
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

    <!-- MMMMMMMMMMOODAAAAAAAAAAAAL-->
  <div class="modal fade" id="myModal" role="dialog">
    <?php include_once("editroom.php"); ?>
  </div>

    
    


    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>

</body>

<script type="text/javascript">
window.location.hash = 'pointer'


$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});


</script>

</html>


