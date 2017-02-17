<!DOCTYPE html>
    <?php 
        error_reporting(0);
        include '../_includes/connection.php';
        include '../_includes/navbar.php';

        $warning = $_SESSION['note'];
        $_SESSION['note'] = NULL;
          /*$query = "SELECT * FROM room WHERE roomID='$room'";
          $result = mysql_query($query) or die(mysql_error());
          $row = mysql_fetch_array($result);*/
        $tID = $_SESSION['clog'];
        $query = "SELECT roomID FROM tenant WHERE tenantID = '$tID'";
        $result = mysql_query($query) or die(mysql_error());
        $result2 = mysql_fetch_assoc($result);
         
    ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pastillo's Boarding House</title>

    <!-- Bootstrap Core CSS -->
    <link href="../_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../_css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../_font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-roommanagement.css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-roommanagement-media.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="myFunction()" style="margin:0;">

    <div id="loader"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom container-fluid">

       <?php include("../_includes/navbar.php"); ?>
        <!-- Page Content -->
        <div class="container-fluid" id="body">
            <div class="container-fluid" id="my">
                <!-- Page Heading/Breadcrumbs -->
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">Room Report</h1>
                        
                        <ol id="pointer" class="breadcrumb">
                            <li><a href="../home.php">Home</a>
                            </li>                            
                            <li class="active">Write Room Report</li>
                        </ol>
                        <div class="row"> 
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8" style="border: solid 1px; border-color: #e5e6e9 #dfe0e4 #d0d1d5;  padding: 5px; box-shadow: 10px 10px 5px #888888;">
                                <h3>Create Report</h3>
                                <form action="addreport.php" method="post">
                                  <div class="form-group">
                                    <label for="subject">Subject:</label>
                                    <input type="text" name="subject" class="form-control" id="subject">
                                  </div>
                                  <div class="form-group">
                                    <label for="contnt">Content:</label>
                                    <textarea name="contnt" class="form-control" style="height: 200px; resize: none;"></textarea>
                                  </div>
                                  <input type="hidden" name="tenantID" value="<?php echo $_SESSION['clog']; ?>">
                                  <input type="hidden" name="category" value="0">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
                <footer id="foot">
                    <div class="container-fluid" id="low">
                       <span>Copyright &copy; Esperanza Inc. 2016</span>
                    </div>
            </footer>
        
        </div>
    </div>
    <!-- /.container -->

    
    
    <script>

        function myFunction() {
            myVar = setTimeout(showPage, 1360);
        }

        function showPage() {
          document.getElementById("loader").style.display = "none";
          document.getElementById("myDiv").style.display = "block";
        }
    </script>

    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>

    <?php 
          if ($warning != NULL) {
            echo '<script type="text/javascript">alert("' . $warning . '");</script>';
          }
     ?>

</body>

</html>


