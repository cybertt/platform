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
	<link href="resources/lightbox2-master/src/css/lightbox.css" rel="stylesheet">

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

<body style="background-color:white; margin:60px 25px;">
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
                <a class="navbar-brand" href="index.php">N57 Training Environment Dashboard - User Submissions</a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_COOKIE['fullname'] ?><b class="caret"></b></a>
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
					<li class="active">
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
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


		
		<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin <small>User Submissions</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li style="color:#777">
                                <i class="fa fa-edit"></i> User Submissions
                            </li>
                        </ol>
                    </div>
			
				<hr />
			</div>		
				
				<?php
$servername = "localhost";
$username = "root";
$password = "#Karma2014!";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
$num = 0;
?>
			
			<table style ="width:100%; height:100%;">
					<tr>
						<td style ="hight:800px;">
				<div class="mCustomScrollbar" data-mcs-theme="dark"  style="overflow: -ms-autohiding-scrollbar; width: 100%; height: 800px; background-color: white; padding-top: 8px; margin:0px; border-right:2px solid darkgrey;">
				
				<h1 class="heading" style="color: black; margin-left:30px;">Users:</h1> <hr style=\"width: 100%; height:2px; color:black\" ></hr>
				<?php

// Find a list of users in the submissions folder
// $users will contain ["submissions/username1", "submissions/username2"]

$users = glob("submissions/*");
$pxCount = 3; //pxCount

// iterate through the users in the submissions folder

foreach($users as $value) {
	$testvar = 0;
	$counter1 = 0;
	$exlist1 = array();

	// separate each value in the $users array by "/" to get username by itself

	$array = explode("/", $value);
	${$array[1]} = array();

	// add the value of the username to an array named after the username
	// e.g. array $cbrown now contains ["cbrown"]

	array_push(${$array[1]}, $array[1]);

	// look for exercises in each user's folder

	$exlist = glob("$value/*");
	$pxCount = $pxCount + 45;
	foreach($exlist as $value1) {
		$array1 = explode("/", $value1);
		array_push(${$array[1]}, $array1[2]);
		$questionlist = glob("$value1/*");
		foreach($questionlist as $value2) {
			$array2 = explode("/", $value2);
			array_push(${$array[1]}, $array2[3]);
		}

		$my_count = count($questionlist);
		$testvar = $testvar + $my_count;
	}

?>
							<div style="height:40px; width:100%; border-bottom : 1px dashed darkgrey;" id="<?php
	echo 'heading_' . $num ?>" >
							<a class="pointer" href="#" onclick="myTest<?php
	echo $num ?>()" >
							<div style="margin-bottom: 0px; color: black" role="tab"  style="" >
								<h4 class="panel-title" style=" padding: 9px">
									
										<?php
	echo ${$array[1]}[0];
?> 
									
									<div class="btn-group pull-right">
									<!-- if answer is correct display 1/1 else display 0/1 -->
										<span id="<?php
	echo "$value" ?>" class="score"><?php
	echo $testvar ?></span>
									</div>
									
								</h4>
							</div></a>
							 <div class="scrollBar" id="<?php
	echo 'question_' . $num ?>" style="visibility: hidden; text-align: center; overflow: auto; width: 100%; height:800px; background-color: white; " role="tabpanel" aria-labelledby="<?php
	echo 'heading_' . $num ?>">
							 <form method="post" class="form-inline text-left" >
							
							<?php
	$uname = $ {$array[1]}[0];

	// Iterate through array containing a list of exercises followed by their filesubmissions that are named after the question number (e.g. "Question1.png")

	for ($i = 1; $i < count($ {$array[1]}); $i++) {
		if (!strstr(${$array[1]}[$i], "Quest")) {${${$array[1]}[$i]} = array();
		}
		else {

			// If the string contains "Quest", move backwards in the array to the last exercisename and add it to the array named after the exercisename
			// e.g. if string "Question1.png" contains "Quest", array_push "Question1.png" into array $netcat

			for ($a = $i; $a > 0; $a-= 1) {
				if (!strstr($ {$array[1]}[$a], "Quest")) {
					array_push($ {
						${$array[1]}[$a]}, ${$array[1]}[$i]);
					break;
				}
			}
		}
	}

	// We now have arrays named after the exercises that contain their corresponding file submission names
	// e.g. an array called $netcat that contains ["Question1.png", "Question2.png"]
	// Now we will get a list of exercises again, then run through them as variable names

	foreach($exlist as $value2) {
		$array3 = explode("/", $value2);
		array_push($exlist1, $array3[2]);
	}

	$tmpvar5 = ${$array[1]}[0];

	// foreach ($exlist1 as $value3) {

	echo "<h1 class=\"heading\" style=\"color: black; margin-left:30px; padding-top: 8px;\">$tmpvar5 Submissions: </h1> <hr style=\"width: 100%; height:2px; color:black\" ></hr>";
	for ($b = 0; $b < count($exlist); $b++) {
		echo "<h3 style=\"color: black; text-align: center; \">Exercise: " . $exlist1[$b] . "</h3><br />";
		$exname = $exlist1[$b];
		$sql = "SELECT score FROM $uname WHERE exercise = '$exname'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$score = $result->fetch_assoc() ['score'];
			$score = str_split($score);
		}

		// print_r($score);

		foreach(${$exlist1[$b]} as $value4) {
			$question = explode(",", $value4);
			$questionpostname = $uname . $exname . $question[0] . $question[1];
			$tmp_scorearray = $_POST[$questionpostname];
			$tmp_scorearray = explode(",", $tmp_scorearray);
			$newscore = $tmp_scorearray[0];
			if (!isset($displayuser)) {
				$displayuser = $tmp_scorearray[1];
			}

			$scoreoffset = intval($question[1]) - 1;
			if (strlen($newscore) > 0) {
				$score[$scoreoffset] = $newscore;
				$finalscore = implode($score);

				// print_r($finalscore);

				$dtnsrt = "UPDATE $uname SET `score` = '$finalscore' where `exercise` = '$exname'";
				$conn->query($dtnsrt);
			}

			if ($newscore == "1" || $score[$scoreoffset] == "1") {
				$myclass = "alert-success";
				$counter1++;
			}
			elseif ($newscore == "2" || $score[$scoreoffset] == "2") {
				$myclass = "alert-danger";
				$counter1++;
			}
			else {
				$myclass = "alert-warning";
			}

			echo "<div id=\"$questionpostname\" class=\"$myclass\" style=\"padding-top:20px; text-align:center; vertical-align:middle;\"> <div style=\"display:inline-block; \"><a href=\"$exlist[$b]/$value4\" data-lightbox=\"$value4\" data-title=\"$exname\"><strong >View Submission for:<br />Question $question[1]</strong></a></div>";
			echo "<div style=\"display:inline-block; vertical-align:top; padding-top:5px;\"><button type=\"submit\" name=\"$questionpostname\" value=\"1,$num\" style=\"color: black; margin-left:150px;\" >ACCEPT</button>
									<button style=\"color: black; \" type=\"submit\" name=\"$questionpostname\" value=\"2,$num\" >REJECT</button></div>";
			echo "<br/ ><br/ ></div>";
		}
	}

	$num++;
	echo "</form></div></div>";
	echo "<script>
							var test = document.getElementById(\"$value\").innerHTML = \"$counter1/$testvar\";
							</script>";
}

?>
						</div>
						</td>
						<td style ="hight:800px;">
						<div style="overflow-style: -ms-scrollbars-none;  -ms-overflow-style: none; visibility: visible; text-align: center;  overflow: auto; width: 100%; height:800px; background-color: white; " role="tabpanel" id="myID"></div>
						</td>
						</tr>
						</table>
	
	
<?php

if ($displayuser == NULL) {
	$displayuser = 0;
}

echo " <script>
	var previous;
		 previous = $displayuser;

</script>";
$conn->close();

for ($a = 0; $a < $num; $a++) {
	echo "
<script type=\"text/javascript\">

	function myTest$a(){
		
		var v =  document.getElementById('question_$a').innerHTML;
		document.getElementById('myID').innerHTML = v;
	
		
	}
</script>";
}

?>
<?php

if (isset($displayuser)) {
	echo "
	<script>
	document.getElementById('heading_$displayuser').style.borderBottom = \"1px dashed darkgrey\";
	var v =  document.getElementById('question_$displayuser').innerHTML;
	document.getElementById('myID').innerHTML = v;
	</script>
	";
}

?>
							
<script src="resources/lightbox2-master/dist/js/lightbox-plus-jquery.js">
	lightbox.option({
		'maxHeight': 1920px,
		'maxWidth': 1080px
})

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

<?php
	}
	else{
		echo "YOU DO NOT HAVE SUFFICIENT PRIVILEGES TO VIEW THIS PAGE";
	}
} else {
	header("Location: index.php");
}	
?>
