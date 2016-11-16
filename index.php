<?php
	session_start();
    $_SESSION['uname'] = NULL;
	$_SESSION['notification'] = NULL;
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
    <link href="_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="_css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="_font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="_includes/style-index.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Pastillo's Boarding House</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form action="admin/login.php" method="post">
                        <div id="logintextfields" >
                            <span>Username</span>   
                            <input  type="text" name="uname" required>
                            <span>Password</span>   
                            <input  type="password" name="pass" required>
                            <input type="submit" value="Submit" required>
                        </div>  
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
   

    <!-- Page Content -->
    <div class="container">
       
            <div id="fcontainer" class="container-fluid">

            <div class="container-fluid">
                <div id="img1div" class="col-sm-8">
                    <img id="logo" class="img-responsive" src="_images/logo2.png">
                </div>
                <div id="img2div" class="col-sm-4">
                    <img id="logotel" class="img-responsive" src="_images/logo3.jpg">
                </div>
            </div>

        </div>

        <div id="carouselcontainer" class="container-fluid">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img id="carpic" src="_images/carousel/a.jpg" alt="Chania">
                    </div>

                    <div class="item">
                      <img id="carpic" src="_images/carousel/b.jpg" alt="Chania">
                    </div>

                    <div class="item">
                      <img id="carpic" src="_images/carousel/c.jpg" alt="Flower">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
        </div>

        <hr>
        <div id="seccontainer" class="container">
            <div  id="pbh" class="container-fluid">
                <span>Pastillo's Boarding House</span>
            </div>
            <div  id="pbhinfo" class="container-fluid">
                <span>Pastillo's Boarding House is conveniently located in Pusok, Lapu-Lapu a small community that offers
                spacious bedroom, stop by today and see. for sure you will love all the quality and features inside this 
                boarding house with a very affordable price. Pastillo's Boarding House is conveniently located in Pusok, Lapu-Lapu a small community that offers spacious bedroom, stop by today and see. for sure you will love all the quality and features inside this boarding house with a very affordable price.</span>
            </div>
        </div>
        <hr>
        <div id="tcontainer" class="container">
            <div class="row">
                <div id="img3div" class="col-sm-4">
                    <img id="p3" class="img-responsive" src="_images/carousel/c.jpg">
                </div>
                <div id="img3div" class="col-sm-4">
                    <img id="p3" class="img-responsive" src="_images/carousel/map.gif">
                </div>
                <div id="img3div" class="col-sm-4">
                    <img id="p3" class="img-responsive" src="_images/carousel/b.jpg">
                </div>
            </div>
            
        </div>
        <hr>
        <div id="amentext">
            <span>Ameneties</span>
        </div>
        <hr>
        <div id="graycontainer" class="container">
                <div class="col-sm-4">
                    <ul>
                      <li>Bathrobe</li>
                      <li>Make-up shaving mirror</li>
                      <li>Marble Bathrooms</li>
                      <li>Non-Smoking Rooms</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                      <li>Safe rooms</li>
                      <li>Hard floor coverings</li>
                      <li>sitting Area</li>
                      <li>Desk with chair</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                      <li>upto 2 boarders</li>
                      <li>Secured</li>
                      <li>Non-smoking Rooms</li>
                      <li>Durable Room Tools</li>
                    </ul>
                </div>
        </div>
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
    <script src="_js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="_js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
