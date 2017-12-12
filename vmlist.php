<?php
	session_start();
if ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) {	
	$admincheck = $_SESSION["access"];
	if ($admincheck==2){
		$current_user = $_SESSION['username'];
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript" src="resources/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="resources/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="resources/tinymce/js/tinymce/tinymce.min.js"></script>
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

<body style="background-color:white; margin-top:65px;">
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
                <a class="navbar-brand" href="index.php">N57 Training Environment Dashboard - Suite Manager</a>
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
                    </li>
                    <li>
                        <a href="sitesettings.php"><i class="fa fa-fw fa-cog"></i> Site Settings</a>
                    </li>
					<li class="active">
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
    <!-- Rendered HTML Content & Media -->

    <!-- Rendered HTML Content & Media -->
    <div class="container" style="margin-top:3%; width:90%; max-width:1300px;">
	<form name="form" method="post" >
	<h4 style="margin:50px auto; text-align:center;">Welcome to the suite management page. Here you can manually check in suites</h4>
		<?php

// $abc = $_SESSION['access'];
// var_dump($abc);

// offense

$array1 = ['610ec419-586f-47a1-8972-8cf6a61e1c35', '617e28fa-891f-452c-9fe0-2b95d3d0456b', '6844b991-ffb9-4063-b478-4e436f577739', '3d553a83-502d-4533-a91b-ce224502aa19', '455bb410-4438-4fde-bb51-6925ee7f37d8', 'c88c717d-4c01-4ea1-ac4b-08671c7e5646', 'acca66fe-fe2d-40f3-b70f-4da5aeb1ff28', 'c3055808-bd96-4070-b691-be011cd527fa', '572e1631-5eeb-4122-92df-c7346808abe0', '1dbeb8f1-0e74-4d10-aeb8-44e63d507569', 'ee3bcb80-1153-4d10-91db-642740c3cff7', '1b73b681-3dc7-465d-b311-f66b6b216d13'];

// defense

$array2 = ['4a0b773b-e4e0-431f-b3b8-5ef93c5aa099', '5d800299-1611-4d49-85cf-a8a0c9595343', 'fabf717e-d856-415e-8a4d-b8a6a1f7a454', 'a133de9c-1983-43a0-a881-239ea3b82b13', '1f7177a0-5807-4093-be3a-310fec8a5270', 'b4ac3ebc-c076-412d-bd6e-70fb436afef2', '3c1cda90-2739-409d-8e32-eff7576c563a', '1cedbd47-ed49-4f83-8817-95f94aee5c47', '590ddd64-3d9a-4869-9de7-9c8e6e6afefd', '63d809d4-40ba-4069-9619-ea92b189f42e', '6850798e-e00f-4918-a9fa-14fe79d6919a', '70279b0b-3427-4ff9-997c-66097871900d'];


$servername = "localhost";
$username = "root";
$password = "#Karma2014!";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$offset = 0;
$i = 1;

// TO ADD WORKSTATIONS 
/*
$sqlex = "CREATE TABLE vmlist (name VARCHAR(255), checkedout VARCHAR(255), user VARCHAR(255))";
$conn->query($sqlex);

for ($u =1; $u<21 ; $u++) {
$sqlex = "INSERT INTO vmlist (name, checkedout) VALUES ('ows$u', '0')";
$conn->query($sqlex);
}
*/
echo "<div class=\"row\">";

foreach($array1 as & $value) {
	echo "<div class=\"col-md-4\">";
	$name = "ows" . $i;
	$final1 = $first . $array1[$offset] . $second;
	$final2 = $first . $array2[$offset] . $second;
	$checkedout = (string)$_POST[$name];
	if ($checkedout != NULL) {
		if ($checkedout == '1') {

			$username_sql = "update vmlist set user='$current_user' where name ='$name'";
			$conn->query($username_sql);
		}
		else
		if ($checkedout == '0') {
			$username_sql = "update vmlist set user='' where name ='$name'";
			$conn->query($username_sql);
		}

		$dtnsrt = "UPDATE vmlist SET `checkedout` = '$checkedout' where `name` = '$name'";
		$conn->query($dtnsrt);
		$sql = "SELECT checkedout FROM vmlist WHERE name = '$name'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$checkedout = $result->fetch_assoc() ['checkedout'];
		}
	}
	else {
		$sql = "SELECT checkedout FROM vmlist WHERE name = '$name'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$checkedout = $result->fetch_assoc() ['checkedout'];
		}
	}

	if ($checkedout === '1') {
		$active_checkedout = "SELECT user FROM vmlist WHERE name ='$name'";
		$active = $conn->query($active_checkedout);
		$myvar1 = (string)$active->fetch_assoc() ['user'];
		$admincheck = $_SESSION{"access"};
		if ($myvar1 === $current_user || $admincheck == 2) {
			echo "
					<div class=\"panel panel-default text-center\">
						<div class=\"panel-heading\">
							<h3>Suite #$i</h3>
						</div>
						<div class=\"panel-body\" style=\"height: 101px;\" >
							<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
								<button type=\"button\" class=\"btn btn-primary\" onclick=\"window.open('http://gateway.n57.net:8000/ws1.html#$value;$array2[$offset]+Offensive+$i'); setTimeout(function() {window.open('exlist.php');}, 300); \">Launch</button>
								<button type=\"submit\" class=\"btn btn-danger\" name=\"$name\" value=\"0\" >Check In</button><br /><br /><br />
								<p>Checked out by $myvar1</p>
							</div>
						</div>
				</div>";
		}
		else {
			echo "
					<div class=\"panel panel-default text-center\">
						<div class=\"panel-heading\">
							<h3>Suite #$i</h3>
						</div>
						<div class=\"panel-body\" style=\"height: 101px;\" >
							<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
								<button type=\"button\" class=\"btn\" disabled>Launch</button>
								<button type=\"button\" class=\"btn\" disabled>Checked Out</button><br /><br /><br />
								<p>Checked out by $myvar1</p>
							</div>
						</div>
					</div>";
		}
	}
	else {
		echo "
						<div class=\"panel panel-default text-center\">
							<div class=\"panel-heading\">
								<h3>Suite #$i</h3>
							</div>
							<div class=\"panel-body\" style=\"height: 101px;\">
								<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
									<button type=\"button\" class=\"btn btn-primary\" disabled>Launch</button>
									<button type=\"submit\" class=\"btn btn-success\" name=\"$name\" value=\"1\" >Check Out</button>
								</div>
							</div>
				</div>";
	}

	$i++;
	$offset++;
	echo "</div>";
}



$conn->close();
?>

		</form>

        
    </div>
    <!-- /.container -->

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

