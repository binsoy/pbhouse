<?php
    session_start();
    error_reporting(0);
    include '../_includes/connection.php';

    $roomid = $_GET['room'];
    $notif = $_SESSION['billnotif'];

    $roomq = "SELECT * FROM room where roomID = '$roomid'";
    $res = mysql_query($roomq) or die(mysql_error());
    $result = mysql_query($roomq) or die(mysql_error());
    $row3 = mysql_fetch_assoc($result);

    $que = mysql_query("SELECT * FROM room") or die(mysql_error());

    $query = "SELECT * from tenant where roomID = '$roomid'";
    $res2 = mysql_query($query) or die(mysql_error());

    $query2 = "SELECT * FROM bill where roomID = '$roomid' ORDER BY billID DESC ";
    $result3 = mysql_query($query2) or die(mysql_error());


    $q = "SELECT * FROM bill where roomID = '$roomid' ORDER BY billID DESC LIMIT 1";
    $result12 = mysql_query($q) or die(mysql_error());
    $r = mysql_fetch_array($result12);
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
                <li><a href="../home.php">Home</a></li>
                <li>Rooms</li>
            </ol>
        </div>
        <!-- /.row -->
        <div class="row" style="margin-top: 20px">
            <div class="col-lg-4">
                <label style="margin-top: 15px">Room:
                    <select style="width: 50px; text-align-last:center;" id="selectbox">
                                
                        <?php 
                            while ($row1 = mysql_fetch_assoc($que)) { ?>
                                <option value="<?php echo $row1['roomID']; ?>" <?php if ($roomid == $row1['roomID']) {
                                    echo 'selected="selected"';
                                } ?>><?php echo $row1['roomID']; ?></option>
                        <?php   }
                        ?>
                    </select>
                </label><br>
            </div>
            <div class="col-lg-8">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group" style="padding: 10px">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#myModal1">Pay Here!</button>
                    </div>
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
            <div class="btn-group" style="margin-top: 20px">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#meModal">Add Bill</button>
            </div>
            <div class="col-lg-12" style="border: solid 1px; border-color: #e5e6e9 #dfe0e4 #d0d1d5; padding: 10px 10px 0 10px; margin-top: 10px">
                <h4>List of Bills</h4>
                <div class="panel-group" style="height: 420px; overflow: scroll; border: solid 1px; border-color: #e5e6e9 #dfe0e4 #d0d1d5; padding: 5px">
                    <?php $ctr = 0;  while ($roww = mysql_fetch_assoc($result3)) {    ?> 
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Bill #:<?php echo $roww['billID']; ?>
                                <button class="btn btn-danger" style="float: right; width: 80px; margin-left: 5px" data-toggle="modal" data-target="#Modal<?php echo $ctr; ?>">Delete</button>
                                <button class="btn btn-success" style="float: right; width: 80px" onclick="opennewtab('view_bill.php?bill=<?php echo $roww['billID']; ?>')">View</button>
                            </div>
                        </div>

                        <div id="Modal<?php echo $ctr; ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content" style="text-align: center;">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <h4>Are you sure you want to delete this Bill?</h4>
                                <a href="delete_bill.php?bill=<?php echo $roww['billID'];  ?>&room=<?php echo $roomid; ?>" class="btn btn-danger">Delete</a>
                                <button class="btn btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>
                              </div>
                            </div>

                          </div>
                        </div>
                    <?php $ctr++;  } ?>
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
<div id="meModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Bill</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="addbill.php">
            <div class="form-group">
                <label for="rent">Rent:</label>
                <input type="text" disabled="" class="form-control" id="rent" name="rent" value="<?php echo $row3['rent']; ?>">
            </div>
            <div class="form-group">
                <label for="water">Water:</label>
                <input type="number" class="form-control" id="water" name="water" required="" min="1" max="99999">
            </div>
            <div class="form-group">
                <label for="elec">Electricity:</label>
                <input type="number" class="form-control" id="elec" name="elec" min="1" max="99999" required="">
                <input type="hidden" name="roomid" value="<?php echo $roomid; ?>">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>

  </div>
</div>

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

 <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payment</h4>
        <br>
        <h4>Total bill:<?php echo $row3['balance']; ?></h4>
      </div>
      <div class="modal-body">
        <form method="post" action="payment.php">
            <div class="form-group">
                <label for="payment">Enter payment:</label>
                <input type="number" class="form-control" id="payment" name="payment" required="" min="1" max="99999">
                <input type="hidden" name="roomid" value="<?php echo $roomid; ?>">
                <input type="hidden" name="billid" value="<?php echo $r['billID']; ?>">
            </div>
            <div class="form-group">
                <label for=payee>Payee:</label>
                <select style="text-align-last:center;" name="payee" id="payee" class="form-control" required="">
                    <option value="">---Choose Payee---</option>
                    <?php 
                        while ($row2 = mysql_fetch_assoc($res2)) {  ?>
                        <option value="<?php echo $row2['tenantID']; ?>"><?php echo $row2['fname']." ".$row2['lname']; ?></option>
                     <?php   }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" >

function opennewtab(url )
{
  var win=window.open(url, '_blank');
}

 window.onload = function () {
    var eSelect = document.getElementById('selectbox');

    eSelect.onchange = function () {
        var strUser = eSelect.options[eSelect.selectedIndex].value;
        window.location.replace("billing.php?room=" + strUser);
    }
}
</script>

    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>
    <?php 
    if ($notif != NULL) {
        echo '<script type=text/javascript>alert("'.$notif.'");</script>';
        $_SESSION['billnotif'] = null;
    }

    if ($_SESSION['addbillnote']!=NULL) {
        echo '<script type=text/javascript>alert("'.$_SESSION['addbillnote'].'");</script>';
        $_SESSION['addbillnote'] = NUll;
    }
?>    
</body>
    
</html>


