<?php
    session_start();
    error_reporting(0);
    include '../_includes/connection.php';

    $tenantid = $_GET['id'];

    $query = mysql_query("SELECT * FROM tenant where tenantID = '$tenantid'") or die(mysql_error());
    $row2 = mysql_fetch_assoc($query);

    $roomid = $row2['roomID'];

    $roomq = "SELECT * FROM room where roomID = '$roomid'";
    $res = mysql_query($roomq) or die(mysql_error());
    $result = mysql_query($roomq) or die(mysql_error());
    $row3 = mysql_fetch_assoc($result);

    $query2 = "SELECT * FROM invoice where roomID = '$roomid' ORDER BY invoiceID DESC ";
    $result3 = mysql_query($query2) or die(mysql_error());


?>

<!DOCTYPE html>
    <?php include '../_includes/navbar.php';?>
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
    <link rel="stylesheet" type="text/css" href="../_css/default.css">
    <!-- Custom Fonts -->
    <link href="../_font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../_includes/style-roommanagement.css">

</head>

<body>
   <?php include_once("../_includes/navbar.php"); ?>
    <!-- Page Content -->
    <div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <h1 class="page-header">Billing</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Invoice</li>
            </ol>
        </div>
        <!-- /.row -->
        <div class="row" style="margin-top: 20px">
            <div class="col-lg-8">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group" style="padding: 10px">
                        <button class="btn btn-info" data-toggle="modal" data-target="#meModal3">Over Payment</button>
                    </div>
                    <div class="btn-group" style="padding: 10px">
                        <button class="btn btn-info" data-toggle="modal" data-target="#meModal2">Balance</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-lg-12" style="border: solid 1px; border-color: #e5e6e9 #dfe0e4 #d0d1d5; padding: 10px 10px 0 10px; margin-top: 10px">
                <h4>List of Invoice</h4>
                <div class="panel-group" style="height: 420px; overflow: scroll; border: solid 1px; border-color: #e5e6e9 #dfe0e4 #d0d1d5; padding: 5px">
                    <?php  while ($roww = mysql_fetch_assoc($result3)) {    ?> 
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Invoice #:<?php echo $roww['invoiceID']; ?>
                                <button class="btn btn-success" style="float: right; width: 80px" onclick="opennewtab('view_invoice.php?invoice=<?php echo $roww['invoiceID']; ?>')">View</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
    
    <div class="container">
        <footer>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                   <p>Copyright &copy; Esperanza Inc. 2016</p>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <!-- /.container -->
<!-- Modal -->

<div id="meModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Balance</h4>
      </div>
      <div class="modal-body">
        <label>Current Balance:<input type="text" disabled="" value="<?php echo $row3['balance']; ?>" style="text-align: center;"></label>
      </div>
    </div>

  </div>
</div>

<div id="meModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Over Payment</h4>
      </div>
      <div class="modal-body">
        <label>Over Payment:<input type="text" disabled="" value="<?php echo $row3['overPayment']; ?>" style="text-align: center;" ></label>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
        function opennewtab(url )
            {
              var win=window.open(url, '_blank');
            }
    </script>


    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>
</body>
    
</html>


