<?php
    session_start();
    error_reporting(0);
    $warning = $_SESSION['notification'];
    include '../_includes/connection.php';

    $page = $_GET['page'];



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
            <div class="col-lg-10">
                <h1 class="page-header">Boarders</h1>
                
                <ol class="breadcrumb">
                    <li><a href="../home.php">Home</a>
                    </li>
                    <li class="active">Boarder Management</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php
            if ($page == "" || $page == '1') {
                $page1 = 0;
            }else{
                $page1 = ($page * 5)-5;
            }


            $queryA = "SELECT * FROM tenant LIMIT  $page1,5";
            $resultA = mysql_query($queryA) or die(mysql_error());
            while($rowA = mysql_fetch_array($resultA)) {
                $tenantID = $rowA['tenantID'];
                $fname = $rowA['fname'];
                $lname = $rowA['lname'];
                $contactNum = $rowA['contactNum'];
                $roomID = $rowA['roomID'];
                $dateStart = $rowA['dateStart'];
                $displayPic = $rowA['displayPic'];
                $emailAddress = $rowA['emailAddress'];
                if(empty($emailAddress)) {
                    $emailAddress = "N/A";
                }
            ?>
                
                <div class="row">
                    <div class="col-md-3">
                        <a href="uploads/<?php echo $displayPic; ?>">
                            <center><img style="width: 145px; height: 145px" class="img-responsive img-hover" src="uploads/<?php echo $displayPic; ?>" alt=""></center>
                        </a>
                            <center><h4 style="color: red"><?php echo $fname . " " . $lname; ?></h4></center>
                        
                    </div>
                    <div class="col-md-8">
                        <center>
                        <h4><?php echo $contactNum; ?></h4>
                        <p>Email: <span style="color: red"><?php echo $emailAddress; ?></span></p>
                        <p>Currently occupying <span style="color: red">Room <?php echo $roomID; ?></span> since <span style="color: red"><?php echo $dateStart; ?></span></p>
                        <a class="btn btn-primary" href="userprof.php?id=<?php echo $tenantID; ?>">View Profile</i></a></center>
                    </div>
                </div>
                <hr>
                <!-- /.row -->
    
        <?php
            }
        ?>
        
        <!-- Pagination -->
        <?php 
            $result =  mysql_query("SELECT * FROM tenant") or die(mysql_error());
            $cou = mysql_num_rows($result);

            $a = $cou / 5;
            $a = ceil($a);
         ?>
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                   <?php  for ($i=1; $i<=$a  ; $i++) { ?>
                    <li  <?php if($page==$i){ echo "class='active'";} ?> ><a href="boarder.php?page=<?php echo $i; ?>" ><?php echo $i; ?></a></li>
                    <?php } ?>  
                </ul>
            </div>
        </div>
        <!-- /.row -->

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
    <?php
            if($warning != NULL) {
                echo '<script type="text/javascript"> alert("' . $warning . '"); </script>';
                $_SESSION['notification'] = NULL;
            }
    
    ?>
</body>

</html>
