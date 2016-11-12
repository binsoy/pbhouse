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
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page-header">Billing</h1>
				
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Billing Management</a></li>
                    <li>Rooms</li>
                </ol>
            </div>
         
        </div>
        <!-- /.row -->
        <div class="container-fluid" id="statcontain">
            <div>
                <span>Available Rooms: <?php $available?></span>
            </div>
            <div>
                <span>Occupied Rooms: <?php $occupied?></span>
            </div>
            <div>
                <span>All Rooms: <?php $all?></span>
            </div>
            <div>
                <span>Fully Occupied Rooms: <?php $full?></span>
            </div>
            <div>
                <span>Under Maintenance Rooms: <?php $underm?></span>
            </div>
        </div>
           <div style="float: right; margin-right: 200px;">
               <form action="javascript:void(0)" method="post">
                    <div><label>Date:<input id="datepicker-example2" type="text"></label></div>
                </form>
            </div>
            <br>
            <br>
            <br>
        <div class="container" id="tablecont">
            <div class="container-fluid col-lg-3" id="t1">
                <div class="container-fluid" id="t1a">
                    <div class="container-fluid">
                        <span>Room No.1</span>
                    </div>
                    <div class="container-fluid">
                        <span>1st floor</span>
                        <span>Status: <?php  ?></span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
                <div class="container-fluid" id="t1b">
                    <div class="container-fluid">
                        <span>Room No.5</span>
                    </div>
                    <div class="container-fluid">
                        <span>2nd floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
                <div class="container-fluid" id="t1c">
                    <div class="container-fluid">
                        <span>Room No.9</span>
                    </div>
                    <div class="container-fluid">
                        <span>3rd floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
            </div>
            <div class="container-fluid col-lg-3" id="t2">
                <div class="container-fluid" id="t2a">
                    <div class="container-fluid">
                        <span>Room No.2</span>
                    </div>
                    <div class="container-fluid">
                        <span>1st floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
                <div class="container-fluid" id="t2b">
                    <div class="container-fluid">
                        <span>Room No.6</span>
                    </div>
                    <div class="container-fluid">
                        <span>2nd floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
                <div class="container-fluid" id="t2c">
                    <div class="container-fluid">
                        <span>Room No.10</span>
                    </div>
                    <div class="container-fluid">
                        <span>3rd floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
            </div>
            <div class="container-fluid col-lg-3" id="t3">
                <div class="container-fluid" id="t3a">
                    <div class="container-fluid">
                        <span>Room No.3</span>
                    </div>
                    <div class="container-fluid">
                        <span>1st floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
                <div class="container-fluid" id="t3b">
                    <div class="container-fluid">
                        <span>Room No.7</span>
                    </div>
                    <div class="container-fluid">
                        <span>2nd floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
                <div class="container-fluid" id="t3c">
                    <div class="container-fluid">
                        <span>Room No.11</span>
                    </div>
                    <div class="container-fluid">
                        <span>3rd floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
            </div>
            <div class="container-fluid col-lg-3" id="t4">
                <div class="container-fluid" id="t4a">
                    <div class="container-fluid">
                        <span>Room No.4 </span>
                    </div>
                    <div class="container-fluid">
                        <span>1st floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
                <div class="container-fluid" id="t4b">
                    <div class="container-fluid">
                        <span>Room No.8</span>
                    </div>
                    <div class="container-fluid">
                        <span>2nd floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>
                </div>
                <div class="container-fluid" id="t4c">
                    <div class="container-fluid">
                        <span>Room No.12</span>
                    </div>
                    <div class="container-fluid">
                        <span>3rd floor</span>
                    </div>
                    <div class="container-fluid">
                        <span>status: <?php $status?></span>
                    </div>  
                </div>
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
    <!-- /.container -->

    
    


    <!-- jQuery -->
    <script src="../_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../_js/bootstrap.min.js"></script>



     <script type="text/javascript" src="../_js/zebra_datepicker.js"></script>
     <script type="text/javascript" src="../_js/core.js"></script>
    
    <script type="text/javascript">
           


            $(document).ready(function() {

            // assuming the controls you want to attach the plugin to 
            // have the "datepicker" class set
            $('#datepicker-example2').Zebra_DatePicker();
                direction: 1  
             });

           var $zdp = $('#element').data('Zebra_DatePicker');
            
 </script>
</body>
    
</html>


