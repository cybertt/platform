<?php

session_start();

include_once ("authenticate.php");

// check to see if user is logging out

if (isset($_GET['out'])) {

	// destroy session

	session_unset();
	$_SESSION = array();
	unset($_SESSION['user'], $_SESSION['access'], $_SESSION['fullname']);
	session_destroy();
}

// check to see if login form has been submitted

if (isset($_POST['username'])) {

	// run information through authenticator

	if (authenticate($_POST['username'], $_POST['userPassword'])) {

		// authentication passed

		header("Location: dashboard.php");
		die();
	}
	else {

		// authentication failed

		$error = 1;
	}
}


$failed = $_GET['failed'];

if ( !isset($_GET['out']) and ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) ) {
	header("Location: dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	
<link rel='icon' type='image/ico' href='resources/favicon.ico' />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Training Environment Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
	

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

 
    <!-- Custom Fonts -->
    <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="color:003333; font-family:Century Gothic, sans-serif; background-color:#e8e8e8;">
    <!-- jQuery -->
    <script src="resources/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="resources/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Training Environment Dashboard - Home</a>
            </div>
            <!-- Top Menu Items -->
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    <!-- Rendered HTML Content & Media -->
	


			<div style="margin:200px auto; width:80%; max-width:900px;"class="row">
			   <div class="col-md-6 center-align">
					<div class="panel panel-default">
						
						<div class="panel-body text-center">
							
							<p class="text-center" style="color:dimgrey; margin-bottom:20px; font-size:16px;">LOG IN AND CONTINUE TRAINING</p>
							<form  name="userform" method="post" action="index.php">
								<div class="form-group" style="text-align:center;"t>
									<input style="margin:auto; border-radius:0; height: 44px; width:90%;" class="form-control" type="text" name="username"  id="username" placeholder=" username" />
									<input style="margin:auto;border-radius:0; height: 44px;width:90%;" class="form-control" type="password" name="userPassword" placeholder="Password"/> <br />
								</div>
								<input style="border-radius:0; width:90%;" type="submit" style="vertical-align:bottom;" value="LOG IN" class="btn btn-success" />
								

							</form>
							<div style="width:95%; margin-top:15px; text-align:right; " >
							<a href="#" data-toggle="tooltip" data-placement="bottom" title="Please login using your account. This is usually formatted as 'firstname.lastname'. This portal will take you to the exercise list where you can view and complete current exercises and activities.">Need Help?</a>
							</div>
						</div>
					</div>
					<?php
						if (isset($error)) echo "<p style=\"margin:auto; width: 400px; text-align:center\" >Login failed: Incorrect user name, password, or rights</p><br /-->";
						if (isset($_GET['out'])) echo "<p style=\"margin:auto; width: 400px; text-align:center\" >Logout Successful</p><br /-->";
					?>
			   </div>
			   
			</div>
			

    </div>
    <!-- /.container -->

    <!-- Include scripts at bottom of page for faster loading times -->

</body>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<script type="text/javascript">
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "chat.php", true);
  xhttp.send();
} 
</script>
</html>

