<!DOCTYPE html>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php include_once("../_includes/navbar.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">Profile</h1>
				
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="boarder.php">Boarder Management</a></li>
                    <li>User Profile</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project One -->
        <div class="row">
        <div class="col-sm-3"></div>
            <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <img style="width: 250px; height: 300px; float: left;" class="img-responsive img-hover" src="../_images/lily.jpg" alt="lily">
                            <p style="text-align: center;">Username: <span style="font-weight: bold;">Lily123</span></p>
                            <p style="text-align: center;">Password: ********</p>
                        </div>
                        <div class="col-md-4">
                            <h2>Lily Collins</h2>
            				<p><span style="margin-left: 10px;">Cebu,Consolacion</span></p>
                            <p><span style="margin-left: 5px;">Sex: Female</span></p>
                            <p><span style="margin-left: 5px;">Age: 24</span></p>
                            <p><span style="margin-left: 5px;">Birthdate: Jan 1 1992</span></p>
                            <img src="../_images/phone.png" class="img-responsive img-hover" style="width: 25px; height: 25px; float: left; margin-left: 10px">
                            <p style="margin-top: 13px; margin-left: 30px;"><strong>(0942) 123 5678</strong></p>
                            <p><span style="margin-left: 10px;">email: <span style="color: red; font-weight: bold;">lily@gmail.com</span></span></p>
                            <p><span style="margin-left: 5px;">Emergency contact person:</span></p>
                            <p><span style="margin-left: 30px;"><span style="color: red; font-weight: bold;">(0918) 123 4321</span></span></p>
                            </br>
                            <a href="#">Change Password</a>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div style="margin-left: 10%">
                        <p>Currently Occupying <span style="font-weight: bold; color: red">Room No. 1</span> since <span style="font-weight: bold; color: red">July 10</span></p>
                        <a href="#">Edit Profile Details</a><br>
                        <a href="#">View Transaction Logs</a><br>
                        <a href="#">Report Issue</a><br>
                        <a href="#">Write feedback about our service</a><br>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>

        <!-- /.row -->

        <hr>

       

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Esperanza Inc. 2016</p>
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
