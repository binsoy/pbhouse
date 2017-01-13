<?php
	include '../_includes/connection.php';

    $roomID = $_GET['room'];

    $queryA = "SELECT * FROM tenant where roomID = '$roomID'";
    $resultA = mysql_query($queryA) or die(mysql_error());

    $ctr=0;
    $tID= [];

    while ($resA = mysql_fetch_assoc($resultA)) {
        $tID[$ctr] = $resA['tenantID'];
        $ctr++;
    }

    $j=0;
    $reports = [];

    for ($i=0; $i < count($tID); $i++) { 
      $queryA = "SELECT * from report where tenantID = '$tID[$i]' AND category = 0";
      $resultA = mysql_query($queryA) or die(mysql_error());

              while ( $res2 = mysql_fetch_assoc($resultA)) {
                  $reports[$j] = $res2['reportID'];
                  $j++;
              }
    }

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


</head>

<body>

    <!-- Navigation -->
   <?php include_once("../_includes/navbar.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Issues</h1>
                
                <ol id="pointer" class="breadcrumb">
                    <li><a href="Roommngmt.php">Home</a>
                    </li>
                    <li class="active">Report Management</li>
                    <li class="active">Room Issues</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h2>List of issues:</h2>
                  <hr>
                  <ul class="list-group" style="margin-top: 30px">
                  <?php 
                      for ($i=0; $i < count($reports); $i++) { 
                        $queryA = "SELECT * from report where reportID = '$reports[$i]'";
                        $resultA = mysql_query($queryA) or die(mysql_error());
                        while ($res = mysql_fetch_assoc($resultA)) {
                   ?>
                    <li class="list-group-item">
                      <h4><?php echo $res['subject']; ?>
                          <div style="float: right;">
                              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $i;?>">Edit</button>
                          </div>
                          <div style="float: right;">
                              <form method="post" action="delete_report.php"> 
                                <input type="hidden" name="reportID" value="<?php echo $res['reportID']; ?>">
                                <input type="hidden" name="roomID" value="<?php echo $roomID; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                          </div>
                      </h4>
                        <!-- Modal -->
                        <div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Subject: <?php echo $res['subject']; ?></h4>
                              </div>
                              <div class="modal-body"><br>
                              <label style="float: left;">Content:</label><textarea disabled="" class="form-control" style="resize: none; height: 150px; margin-bottom: 10px"><?php echo $res['content']; ?></textarea>
                              <h3>Status:</h3>
                                <form method="post" action="edit_report.php">
                                    <div class="form-group"">
                                      <label><input type="radio" name="optradio" value="0">Not yet started</label>
                                    </div>
                                    <div div class="form-group">
                                      <label><input type="radio" name="optradio" value="1">On-going</label>
                                    </div>
                                    <input type="hidden" name="reportID" value="<?php echo $res['reportID'] ?>">
                                    <input type="hidden" name="roomID" value="<?php echo $roomID; ?>">
                                <button type="submit" class="btn btn-default" style="margin-left: 39%; ">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </form>
                                
                            </div>

                          </div>
                        </div>
                    </li>
                    <?php }  } ?>
                  </ul> 
            </div>    
        </div>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Esperanza</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
  
    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>
</body>

</html>
