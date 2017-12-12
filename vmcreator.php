<?php
	session_start();
if ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) {	
	$admincheck = $_SESSION["access"];
	if ($admincheck==2){
	
?>
<!DOCTYPE html>
<head>
<link rel='icon' type='image/ico' href='resources/favicon.ico' />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>N57 Training Environment Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

<body>

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
                <a class="navbar-brand" href="index.php">N57 Training Environment Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a onclick="loadDoc();" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Click Here to Chat <b class="caret"></b></a>
                    <ul style="width:386px; height:400px; text-align:center; margin:auto; max-height:600px; overflow:hidden;" class="dropdown-menu message-dropdown">
                        <li> </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_COOKIE['fullname'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="index.php?out=true"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="userhistory.php"><i class="fa fa-fw fa-bar-chart-o"></i> User History</a>
                    </li>
					<li>
                        <a href="submissions.php"><i class="fa fa-fw fa-users"></i> User Submissions</a>
                    </li>
                    <li>
                        <a href="excreate.php"><i class="fa fa-fw fa-edit"></i> Exercise Editor</a>
                    </li>
					<li>
                        <a href="sitereports.php"><i class="fa fa-fw fa-file"></i> Site Reports</a>
                    <li>
                        <a href="sitesettings.php"><i class="fa fa-fw fa-cog"></i> Site Settings</a>
                    </li>
					<li class="active">
                        <a href="deploy.php"><i class="fa fa-fw fa-blind"></i> VM Creator</a>
                    </li>
					<li>
                        <a href="vmlist.php"><i class="fa fa-fw fa-bar-chart-o"></i> Suite Management</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-wrench"></i> Bug Reports <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul class="collapse">
                           <li>
                                <a href="bugreport.php">Report Bug</a>
                            </li>
                            <li>
                                <a href="mailcheck.php">List Bug Reports</a>
                            </li>
							<li>
                                <a onclick="return myFun();" href="?delete=1">Delete Bug Reports</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

							</script>
<body style="background-color: white">
	<div id="page-wrapper">
	<div class="container-fluid">

				
				<div class= "panel panel-default text-center" style="border-style: ridge; border-color: darkgreen; border-width: thick; width: 80%;  margin: auto; text-align:center; overflow:hidden;">

						
						<?php
						$vm = $_POST['select'];
						$name = $_POST['name'];
						$network = $_POST['network'];
						if (strlen($vm) < 1 && strlen($network) < 1) {
						?>
						
						<br />
						<form style="width: 300px; margin:auto;text-align:left;" method="post">OS SELECTION
						
						<select name="select">
						<option value="ubuntu" selected>ubuntu</option>
						<option value="centos">centos</option>
						<option value="win7">win7</option>
						<option value="server_2016">server_2016</option>
						<option value="solaris">solaris</option>
						<option value="workstations">workstations</option>
						</select><br />
						<br />NAME OF VM 
						<input name="name" type="text" ></input> 
						<input type="submit" value="SUBMIT">
						</br></br>
						</form>
						<?php
						}else {
							$vmid=$_SESSION['myvm'];
							if (strlen($vmid) < 1) {
								$vmid = "ae1dc237-8b67-4412-a7b1-af961c2aba2a";
							}
						?>
						<br />

						<?php
						
						}
						?>
						
						
						
						
						<div id="demo" style="width:100%; margin:auto; height:1024px; text-align:center; overflow:hidden;"  ></div>
						
						
				</div>
				<?php
				if (strlen($vm) > 1) {
							echo "<script type=\"text/javascript\">
							document.getElementById(\"demo\").innerHTML = '<h1>Your VM is deploying. This can take up to 10 minutes. When it is finished, you will see a console here. Be patient.</h1>';
						  var xhttp = new XMLHttpRequest();
						  xhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
							 document.getElementById(\"demo\").innerHTML = this.responseText;
							}
						  };
						  xhttp.open(\"GET\", \"vmdeploy.php?name=$name&vm=$vm\", true);
						  xhttp.send();

						</script>";
							
						}

				?>
				
				
				
				</div>
			</div>
		</div>
	</div>
</div>
			
</div>
</div>
    <!-- jQuery -->
    <script src="resources/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="resources/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="resources/js/plugins/morris/raphael.min.js"></script>
    <script src="resources/js/plugins/morris/morris.min.js"></script>
    <script src="resources/js/plugins/morris/morris-data.js"></script>
</body>



<?php
	}
	else{
		echo "YOU DO NOT HAVE SUFFICIENT PRIVILEGES TO VIEW THIS PAGE";
	}
} else {
	header("Location: index.php");
}	
?>


