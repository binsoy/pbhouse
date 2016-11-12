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
    <link rel="stylesheet" type="text/css" href="../_css/accordion.css">
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
        
           <div style="margin-right: 200px; ">
                <label>Room #<input type="text" disabled="" style="width: 100px"></label>
               <form action="javascript:void(0)" method="post" style="float: right;">
                    <div><label>Date:<input id="datepicker-example2" type="text" style="width: 100px"></label></div>
                </form>
            </div>
       <div class="container">
          <div style="height: 300px; width: 50%; margin-top: 50px; margin-left: 50px; float: left;">
                <label style="margin-left: 285px;">Payment Status:<input type="text" disabled="" style="width: 100px"></label>
                 <div id="ss_menu">
                    <div class="ss_button">Add</div>
                    <div class="ss_content">
                        <div style="height: 80px">
                            <br>
                            <label>Water:<input type="number" style="width: 80px"></input></label>
                            <label>Electricity:<input type="number" style="width: 80px"></input></label>
                            <label>Roomrate:<input type="number" style="width: 80px"></input></label>
                            <div style="text-align: center;">
                                <button style="width: 150px; ">ADD</button>
                            </div>
                        </div>
                    </div>
                    <div class="ss_button">Update</div>
                    <div class="ss_content">Content<br /><br /><br />More Content<br /></div>
                    <div class="ss_button">Delete</div>
                    <div class="ss_content">Content<br /><br /><br />More Content<br /></div>
                    <div class="ss_button">Payment History</div>
                    <div class="ss_content">Content<br /><br /><br />More Content<br /></div>
                    <div class="ss_button">Balance</div>
                    <div class="ss_content" style="text-align: center;">
                        <div style="height: 80px">
                            <label style="margin-top: 30px">Remaining BAlance:</label><input type="text" disabled="" style="width: 80px; margin-left: 5px" value="2300">
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top: 100px; ">
                <label>Tenant(s):</label>
                <ul style="list-style: none; margin-left: 50px">
                    <li>Kendal Jenner</li>
                    <li>Cara Delevugne</li>
                    <li>Lily C0llins</li>
                </ul>
                <br>
                <br>
                <br>
                <label>Total Bill: <input type="text" disabled="" style="width: 100px"></label>
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
    <script type="text/javascript" src="../_js/accordion.js"></script>
    <script type="text/javascript">
           


            $(document).ready(function() {

            // assuming the controls you want to attach the plugin to 
            // have the "datepicker" class set
            $('#datepicker-example2').Zebra_DatePicker();
                direction: 1  
             });

           var $zdp = $('#element').data('Zebra_DatePicker');

            jQuery(function() {
            jQuery(‘.ss_button’).on(‘click’,function() {
            if(jQuery(this).next(‘.ss_content’).is(“:visible”)) {
            jQuery(‘.ss_content’).slideUp(‘fast’);
            } else {
            jQuery(‘.ss_content’).slideUp(‘fast’);
            jQuery(this).next(‘.ss_content’).slideDown(‘fast’);
            }
            });
            });
            
 </script>
</body>
    
</html>


