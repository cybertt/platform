<?php
session_start();
if ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
	
<link rel='icon' type='image/ico' href='resources/favicon.ico' />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	<meta http-equiv="refresh" content="600000" >
    <meta name="author" content="">

    <title>N57 Training Environment Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/custom.css" rel="stylesheet">

    <!-- Bootstrap Alterations -->
    <link href="css/bootstrap1.css" rel="stylesheet">
	
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	


</head>
<body style="color:003333; font-family:Century Gothic, sans-serif; background-color:white;">

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
                <a class="navbar-brand" href="index.php">N57 Training Environment Dashboard - Home</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a onclick="loadDoc();" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Click Here to Chat <b class="caret"></b></a>
                    <ul style="width:386px; height:400px; text-align:center; margin:auto; max-height:600px; overflow:hidden;" class="dropdown-menu message-dropdown">
                        <li id="demo" > </li>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['fullname']; ?> <b class="caret"></b></a>
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
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                    <li >

                    <li>
                        <a href="exlist.php"><i class="fa fa-fw fa-edit"></i> Exercises</a>
                    </li>
					<?php
$admincheck = $_SESSION["access"];

if ($admincheck == 2) {
	echo "<li><a href=\"userhistory.php\"><i class=\"fa fa-fw fa-cog\"></i> Admin Page</a></li>";
}

?>
                    <li>
                        <a href="bugreport.php"><i class="fa fa-fw fa-wrench"></i> Report A Bug</a>
                    </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<!-- begin content -->
		

<?php
		
$servername = "localhost";
$username = "root";
$password = "#Karma2014!";
$dbname = "test";



$conn = new mysqli($servername, $username, $password, $dbname);
$uname = $_SESSION["username"];
$sql = "SELECT score FROM $uname WHERE exercise = 'current_exercise'";
$result = $conn->query($sql);
if ($result->num_rows <= 0) {
	$sqlex = "INSERT INTO $uname (exercise, score) VALUES ('current_exercise', '!getting_started')";
	$conn->query($sqlex);
	$exname = "!getting_started";
} else {
	$exname = $result->fetch_assoc() ['score'];
}

$xml = simplexml_load_file("xml/$exname.xml");
$exercise_title = (string)$xml->exercise->title;

	$array_complete = array();
	$complete_counter = 0;
	$complete_names = array();
	
	$array_notattempt = array();
	$notattempt_counter = 0;
	$notattempt_names = array();
	
	$array_failed = array();
	$failed_counter  = 0;
	$failed_names = array();
	
	$array_inprog = array();
	$inprog_counter = 0;
	$inprog_names = array();
	
	if ($uname != NULL) {
		$files = glob("xml/*.xml");
		foreach($files as & $value) {
			$score3 = '';
			$xml = simplexml_load_file("$value");
			$name = $xml->exercise->title;
			$exname = $xml->exercise->name;
			$num = '1';
			$offset = '0';
			$exname = (string)$xml->exercise->name;
			$sql = "SELECT score FROM $uname WHERE exercise = '$exname'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$score = $result->fetch_assoc() ['score'];
				$scorelen = strlen($score);
				$score1 = strstr($score, '0');
				$score2 = strstr($score, '1');
				$score3 = strstr($score, '3');
				$score4 = strstr($score, '2');
			}
			else {
				$scorelen = '';
				$score = '';
				$score1 = '';
				$score2 = '';
				$score3 = '';
				$score4 = '';
			}

			$score1len = substr_count($score, '0');
			$score2len = substr_count($score, '1');
			$score3len = substr_count($score, '3');
			$score4len = substr_count($score, '2');
			$scorelen = strlen($score);
			$percent = round(($score2len * 100) / $scorelen);
			if ((strlen($score3) > 0 && $percent < 60) && ($score4 == NULL || $score4 == 0)) {
				array_push($array_failed, $name, $percent);
				array_push($failed_names, $value);
				$failed_counter++;
			}
			else
			if (strlen($score1) > 0 || strlen($score4) > 0) {
				array_push($array_inprog, $name, $percent);
				array_push($inprog_names, $value);
				$inprog_counter++;
			}
			else
			if ($score == NULL) {
				array_push($array_notattempt, $name, $percent);
				array_push($notattempt_names, $value);
				$notattempt_counter++;
			}
			else {
				array_push($array_complete, $name, $percent);
				array_push($complete_names, $value);
				$complete_counter++;
			}
		}
	}
	

?>		
		
		
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div style="width:100%">
                    <div class="panel panel-dark">
						<div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-desktop fa-5x"></i>
                            </div>
                            <div class="col-xs-6 text-center">
                                <div class="gigantic">User Dashboard</div>
                            </div>
                            <div class="col-xs-3">
                                <i class="fa fa-desktop fa-5x pull-right"></i>
                            </div>
                        </div>
						</div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-blind fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="medium">Current Exercise</div>
                                        <div><?php echo $exercise_title ?></div>
                                    </div>
                                </div>
                            </div>
                            <a href="redirect.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Resume Exercise</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-edit fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="medium">Exercises</div>
                                        <div>View all Exercises</div>
                                    </div>
                                </div>
                            </div>
                            <a href="exlist.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Exercise List</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bug fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="medium">Report a Bug</div>
                                        <div>Submit Issues Here</div>
                                    </div>
                                </div>
                            </div>
                            <a href="bugreport.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Report Bug</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-space-shuttle fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="medium">Logout</div>
                                        <div>Leaving So Soon?</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?out=true">
                                <div class="panel-footer">
                                    <span class="pull-left">Click Here to Logout</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                                <div id="morris-area-chart"></div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-rocket"></i> Performance</h3>
                            </div>
                            <div class="panel-body" style="height:400px;">
                                <div id="donut"></div>
                               <!-- <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>-->
                            </div>
                        </div>
                    </div>
					

					<div class="col-lg-4">
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-ticket fa-fw"></i> Exercise Progress</h3>
                            </div>
                            <div class="panel-body" style="height:400px;">
                                <div class="table-responsive" style="height: 350px;" class="nanocontent default-skin">
                                    <table class="table table-bordered table-hover table-striped" >
                                        <thead>
                                            <tr>
                                                <th>Exercise</th>
                                                <th>Percent Complete</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$c = 0;
										for ($i = 0; $i < count($array_complete); $i = $i + 2) {
											$b =$array_complete[$i + 1];
                                         echo "<tr onclick=\"window.location.assign('exercise.php?exname=$complete_names[$c]'); \">
                                                <td><a style=\"text-decoration:none; color:black\" href=\"#\">$array_complete[$i]</a></td>
                                                <td>$b%</td>
                                                <td style=\"color:#2E8A57; \">Complete</td>
                                            </tr> ";
											$c++;
										}
										$c = 0;
										for ($i = 0; $i < count($array_inprog); $i = $i + 2) {
											$b =$array_inprog[$i + 1];
                                         echo "<tr onclick=\"window.location.assign('exercise.php?exname=$inprog_names[$c]'); \">
                                                <td><a style=\"text-decoration:none; color:black\" href=\"#\">$array_inprog[$i]</a></td>
                                                <td>$b%</td>
                                                <td style=\"color:#1E90FF; \">In Progress</td>
                                            </tr> ";
											$c++;
										}
										$c = 0;
										for ($i = 0; $i < count($array_failed); $i = $i + 2) {
											$b =$array_failed[$i + 1];
                                         echo "<tr onclick=\"window.location.assign('exercise.php?exname=$failed_names[$c]'); \">
                                                <td><a style=\"text-decoration:none; color:black\" href=\"#\">$array_failed[$i]</a></td>
                                                <td>$b%</td>
                                                <td style=\"color:#FF6347; \">Failed</td>
                                            </tr>";
											$c++;
										}
										$c = 0;
										for ($i = 0; $i < count($array_notattempt); $i = $i + 2) {
											$b =$array_notattempt[$i + 1];
                                         echo "<tr>
                                                <td>$array_notattempt[$i]</td>
                                                <td>$b%</td>
                                                <td  style=\"color:orange; \">Not Attempted</td>
                                            </tr> ";
											$c++;
										}
                                          ?>
                                        </tbody>
                                    </table>
                                </div>
                               <!-- <div class="text-right">
                                    <a href="#">View All Tickets <i class="fa fa-arrow-circle-right"></i></a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" >
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Alert Panel</h3>
                            </div>
                            <div class="panel-body" style="height:400px;">
                                <div class="list-group" style="overflow:auto; height:350px;">
								<?php
									$xml = simplexml_load_file("resources/alerts.xml");	
									
									foreach ($xml->alert as $item)
									{
										switch ($item->severity) {
											case "high":
												$symbol = "exclamation";
												$bcolor = "red";
												break;
											case "medium":
												$symbol = "check";
												$bcolor = "orange";
												break;
											case "low":
												$symbol = "check";
												$bcolor = "green";
												break;
										}
										echo "<a href=\"#\" class=\"list-group-item\">
                                        <span style=\"background-color:$bcolor\" class=\"badge\">Severity: $item->severity</span>
                                        <i class=\"fa fa-fw fa-$symbol\"></i> $item->message</a>";
									}
								
								
                                ?>
                                   
                                </div>
                               <!-- <div class="text-right">
                                    <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
    <!-- jQuery -->
    <script src="resources/js/jquery.js"></script>
	
	
    <!-- Bootstrap Core JavaScript -->
    <script src="resources/js/bootstrap.min.js"></script>


    <!-- Morris Charts JavaScript -->
    <script src="resources/js/plugins/morris/raphael.min.js"></script>
    <script src="resources/js/plugins/morris/morris.min.js"></script>
    <script src="resources/js/plugins/morris/morris-data.js"></script>
		<script>
	Morris.Donut({
		element: 'donut',
		data: [
		{label: "Exercises Completed", value: <?php echo $complete_counter ?>},
		{label: "Exercises In Progress", value: <?php echo $inprog_counter ?>},
		{label: "Exercises Failed", value: <?php echo $failed_counter ?>},
		{label: "Exercises Not Attempted", value: <?php echo $notattempt_counter ?>}
		],
		backgroundColor: '#FFF',
		labelColor: '#000',
		colors: [
		'darkgreen',
		'#95D7BB',
		'firebrick',
		'orange'
		],
		resize: true
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
</body>

</html>
<?php
} else {
	header("Location: index.php");
}
?>