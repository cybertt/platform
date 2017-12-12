<?php
	session_start();
if ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) {	
	$admincheck = $_SESSION["access"];
	if ($admincheck==2){
	
?>
<!DOCTYPE html>
<head>
<link rel='icon' type='image/ico' href='resources/favicon.ico' />
	<?php
	include_once "progress.php";
	?>
	
	<style>
	.progress {
			height: auto;
		}
		.table-hover>tbody>tr:hover {
			background-color: rgba(0,0,0,.1);
		}
		.well {
			background-color: rgba(0,0,0,.1);
	</style>

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

<body style="background-color: white">
    <!-- jQuery -->
    <script src="resources/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="resources/js/bootstrap.min.js"></script>

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
                <a class="navbar-brand" href="index.php">N57 Training Environment Dashboard - User History</a>
				
				
				
				
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['fullname'] ?> <b class="caret"></b></a>
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
                    <li class="active">
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
                    </li>
                    <li>
                        <a href="sitesettings.php"><i class="fa fa-fw fa-cog"></i> Site Settings</a>
                    </li>
					<li>
                        <a href="vmlist.php"><i class="fa fa-fw fa-bar-chart-o"></i> Suite Management</a>
                    </li>
					<li>
                        <a href="mailcheck.php"><i class="fa fa-fw fa-envelope"></i> Bug Reports</a>
                    </li>
                    <li>
                        <a href="bugreport.php"><i class="fa fa-fw fa-wrench"></i> Report A Bug</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
</head>

<script>
	function myFunction() {
		var popup = document.getElementById('myPopup');
		popup.classList.toggle('show');
	}
</script>
						<p id="demo1"></p>
<script>
							
							function myFun() {
								var x;
								if (confirm("Delete All Bug Reports On File?") == true) {
									x = "Reports Deleted!";
									
									return true;
								} else {
									x = "You pressed Cancel!";
									return false;
								}
								document.getElementById("demo1").innerHTML = x;
							}
							</script>




	<div id="page-wrapper">
	<div class="container-fluid">
		
		<?php
	$delete = $_GET['delete'];
	if ($delete == "1") {
		echo "All Reports Deleted";
		shell_exec('cat /dev/null > /var/mail/root');
	}
	else {
		echo "";
	}

?>
		<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin <small>User History</small> 
                        </h1>
                        <ol class="breadcrumb">
                            <li style="color:#777">
                                <i class="fa fa-bar-chart-o"></i> User History
                            </li>
                        </ol>
                    </div>
			
				<hr />
			</div>
			
			<div class="row">
				<div class="col-md-12">
				<form name="form" method="post" class="form-inline text-right">
				<?php
	$servername = "localhost";
	$username = "root";
	$password = "#Karma2014!";
	$dbname = "test";
	$uname = $_POST['uname'];
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql1 = "SHOW TABLES";
	$counter = 0;
	$files = glob("xml/*.xml");
	$sorted_files = array();
	foreach($files as & $value) {
		$array[$value] = $difficulty;
	}

	foreach($array as $key => $value) $sorted_files[] = $key;
	$sorted_files = sizeof($sorted_files);
	if ($conn->connect_error) {
		die("<h4 class=\"text-success text-right\">Connection failed: " . $conn->connect_error) . "</h4>";
	}

	$result1 = $conn->query($sql1);
	$x = $result1->num_rows;
	echo "<label for=\"uname\" class=\"form-group\">Select:&nbsp;</label>";
	echo "<select class=\"form-control\" name=\"uname\">\n";
	for ($i = 0; $i < $x; $i++) {
		$score1 = $result1->fetch_assoc();
		$score2 = (string)$score1['Tables_in_test'];
		echo "\t\t\t\t\t<option value=\"$score2\";>$score2</option>\n";
	}

	echo "				</select>
				<input type=\"submit\" value=\"submit\" class=\"btn btn-info\" />
			</form>";
?>
				</div>
			</div>
				<hr />
			
			<div class="row">
				<div class="col-md-8">
				<?php
	$array_complete = array();
	$array_notattempt = array();
	$array_failed = array();
	$array_inprog = array();
	if ($uname != NULL) {
		echo "<blockquote><h1>Displaying Completion Data For: <strong>$uname</strong></h1></blockquote>\n";
		echo "<table class=\"table table-hover\">";
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
			}
			else
			if (strlen($score1) > 0 || strlen($score4) > 0) {
				array_push($array_inprog, $name, $percent);
			}
			else
			if ($score == NULL) {
				array_push($array_notattempt, $name, $percent);
			}
			else {
				array_push($array_complete, $name, $percent);
				$counter++;
			}
		}

		for ($i = 0; $i < count($array_complete); $i = $i + 2) {
			echo "<tr>\n\t<td>$array_complete[$i]</td>\n";
			$b = $array_complete[$i + 1];
			echo "\t<td style=\"color:#2E8A57; \"><img src=\"resources/check-mark-hi.png\" style=\"width:20px\" /> - Completed ($b%)</td></tr>\n";
		}

		for ($i = 0; $i < count($array_inprog); $i = $i + 2) {
			echo "<tr>\n\t<td>$array_inprog[$i]</td>\n";
			$b = $array_inprog[$i + 1];
			echo "\t<td style=\"color:#1E90FF; \"><img src=\"resources/blue_sphere.png\" style=\"width:20px\" /> - In Progress ($b%)</td>\n</tr>\n";
		}

		for ($i = 0; $i < count($array_failed); $i = $i + 2) {
			echo "<tr>\n\t<td>$array_failed[$i]</td>\n";
			$b = $array_failed[$i + 1];
			echo "\t<td style=\"color:#FF6347; \"><img src=\"resources/red_x.png\" style=\"width:15px; margin-left:3px;\" /> - Failed ($b%)</td>\n</tr>\n";
		}

		for ($i = 0; $i < count($array_notattempt); $i = $i + 2) {
			echo "<tr>\n\t<td>$array_notattempt[$i]</td>\n";
			$b = $array_notattempt[$i + 1];
			echo "\t<td style=\"color:orange; \"><img src=\"resources/cone.png\" style=\"width:15px; margin-left:3px;\" /> - Not Attempted</td>\n</tr>\n";
		}
	}
	else {
		echo "<p>Please select a user from the drop down menu in the top right-hand corner.</p>";
	}

	$progress = $counter / $sorted_files * 100;
?>
					
					<div class="progress" style="height:40px;">
					  <div class="progress-bar" role="progressbar" aria-valuenow="<?php
	echo round($progress) ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php
	echo round($progress) ?>%;">
					  <?php
	if ($progress > 0) {
		echo "<h4 style=\"padding-left: 5px;\">" . round($progress) . "%</h4>";
	}
	else
	if ($uname == NULL) {
		echo "";
	}
	else {
		echo "<h4 style=\"color: red; margin-left: 10px;\">" . round($progress) . "%</h4>";
	}

?>
					  </div>
					</div>
					
					</table>
					<?php
	if ($uname != NULL) {
		echo "<form action='delete.php?id=" . $uname . "' method='POST'>
							<button type=\"submit\" class=\"btn btn-danger btn-block\" onClick=\"javascript: return confirm('Are you sure you want to delete $uname?');\">Delete <strong>$uname</strong></button>
							</form>";
	}

?>
					<br /> <br /><br />
					<br />
				</div>
				<div class="col-md-4">
					<?php
	$prog = new Progress($conn, $counter);
	if ($_POST['uname']) {
		$prog->checkProgress();
	}

?>
				</div>
			</div>
			
		</div>
	</div>

</body>
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
<?php
	}
	else{
		echo "YOU DO NOT HAVE SUFFICIENT PRIVILEGES TO VIEW THIS PAGE";
	}
} else {
	header("Location: index.php");
}	
?>

