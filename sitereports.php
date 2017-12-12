<?php
	session_start();
if ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) {	
	$admincheck = $_SESSION["access"];
	if ($admincheck==2){
	
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

    <title>N57 Training Environment Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php">N57 Training Environment Dashboard - Site Reports</a>
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
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
					<li class="active">
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
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
	<button style="margin-left: 75px; "onclick="reportFunction()">Generate Report</button>
<table style="border-style: solid; margin-left: 75px; background-color: darkgrey">
	<col width="300">
	<col width="300">
	<col width="300">
	<tr style="background-color: lightgrey">
		<th>User Name</th>
		<th>Exercise Progress</th>
		<th>Question Progress</th>
	</tr>
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
	$mainarray = array();
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
	
	$array_header = ["User Name", "Exercise Progress", "Question Progress"];
	array_push($mainarray, $array_header);
	
	for ($i = 0; $i < $x; $i++) {
		$testarray1 = array();
		$score1 = $result1->fetch_assoc();
		$score2 = (string)$score1['Tables_in_test'];
		if($i%2==0){
			$color="darkgrey";
		
		}else{
			$color="lightgrey";
		}
		echo "<tr style=\"background-color: ".$color."\"> <td style=\"border-style: solid\"> <h4 style=\" display:inline-block;\">&nbsp$score2</h4> </td>";
		array_push($testarray1,$score2);
		$uname = $score2;
		if ($uname != NULL) {
			$array_complete = array();
			$counter = 0;
			$correct_quest = 0;
			$total_quest = 0;
			$array_notattempt = array();
			$array_failed = array();
			$array_inprog = array();
			$files = glob("xml/*.xml");
		foreach($files as & $value) {
			$score3 = '';
			$xml = simplexml_load_file("$value");
			$questions = $xml->exercise->question;
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
			$score5len = substr_count($score, '4');
			$scorelen = strlen($score);
			$percent = round(($score2len * 100) / $scorelen);
			$total_quest += count($questions);
			$correct_quest += $score2len;
			$correct_quest += $score3len;
			$correct_quest += $score4len;
			$correct_quest += $score5len;
			
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
		
	}
	$progress = $counter / $sorted_files * 100;
	$progress1 = $correct_quest / $total_quest * 100;
	
	echo "<td style=\"border-style: solid\"> <h4 style=\"padding-left: 5px; display:inline-block;\">" . round($progress) . "%</h4> </td>";
	
	array_push($testarray1,round($progress)."%");
	
	echo "<td style=\"border-style: solid\"> <h4 style=\"padding-left: 5px; display:inline-block;\">" . round($progress1) . "%</h4> </td> </tr>";
	
	array_push($testarray1,round($progress1)."%");
	
	array_push($mainarray,$testarray1);
	}
	
	$fp = fopen('test.csv', 'w');
	
	foreach ($mainarray as $fields){
		fputcsv($fp, $fields);
	}
	
	fclose($fp);
	
  header("Content-type: text/csv");
  header("Location: https://training.n57.net/test.csv");
  
echo "<script>
function reportFunction(){
		window.location.href = \"https://training.n57.net/test.csv\";
}
</script>"

?>
</table>
	
					
					<!--<div class="progress" style="height:40px;">
					  <div class="progress-bar" role="progressbar" aria-valuenow="<?php
	echo round($progress) ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php
	echo round($progress) ?>%;"> -->
	
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