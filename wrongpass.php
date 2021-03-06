<?php 
    error_reporting(0);
    session_start();
    $_SESSION['logged_in'] = 0;
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
    <link rel="stylesheet" type="text/css" href="_includes/style-wrongpass.css">
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
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container-fluid" id="cont">
        <hr>
        <div class="container-fluid" id="logincont">
            <div class="container-fluid" id="loginftext">
                <span>Log into Pastillo's Boarding House</span>
            </div>
            <div class="container-fluid" id="loginfields">
            <hr>
                <div  id="textfields">
                    <form action="admin/login.php" method="post" > 
                        <div id="username">
                            <span>Username</span>   
                            <input  type="text" name="uname" required >
                        </div>
                        <div id="passwrd">
                            <span>Password</span>   
                            <input  type="password" name="pass" required autocomplete="new-password">
                        </div> 
                    </div>
                        <div id="subbtn">
                            <input id="submit" type="submit" value="Submit" required>
                        </div>  
                    </form>
                  
            </div>
            <div class="container-fluid" id="message">
                <span>There was an error with your Username and Password combination. Please try again.</span>
            </div>
        </div> 
    
    <!-- /.container -->
     <!-- Footer -->
        <footer>
            <hr>
            <div class="row" id="foot">
                <div class="col-lg-12">
                    <p>Copyright &copy; Esperanza Inc. 2016</p>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
