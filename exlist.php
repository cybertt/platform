<?php
session_start();
if ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) {
$exname = $_GET["exname"];
$servername = "localhost";
$username = "root";
$password = "#Karma2014!";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
$dom = new DOMDocument;
$dom->load("xml/$exname");
$xp = new DOMXPath($dom);
$xml = simplexml_load_file("xml/$exname");
$uname = $_SESSION["username"];
?>



<html>
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
<link rel="stylesheet" type="text/css" href="css/exlist.css">


</head>
<body style="color:003333; font-family:Century Gothic, sans-serif; background-color:e8e8e8;">
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
                <a class="navbar-brand" href="index.php">N57 Training Environment Dashboard - Exercise List</a>
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

                    <li class="active">
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
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    <!-- Rendered HTML Content & Media -->
	
    <!-- Rendered HTML Content & Media -->


<div style="width:100%; margin:auto; text-align:center; max-width:1000px;">

<?php
$category = $_POST['category'];

if ($category == NULL) {
	$category = "Informational";
}

$cat_xml = simplexml_load_file("resources/categories.xml");
echo "<form method=\"post\" >";

foreach($cat_xml->category AS $item) {
	$cat_name = (string)$item->name;
	$cat_title = (string)$item->title;
	echo "<button type=\"submit\" name=\"category\" value=\"$cat_name\" class=\"hvr-rectangle-out container2\"><p>$cat_title</p></button>";
}

foreach($cat_xml->category AS $item) {
	if ($item->name == $category) {
		echo "<p style=\"font-size:30px; margin:50px auto 10px auto; \">$item->longtitle</p> 
		<p style=\"font-size:16px; \">$item->description</p>";
	}
}

echo "</form><br />";
include "progress.php";

$counter = 0;

// TODO : SORT by Difficulty

$files = glob("xml/*.xml");
$sorted_files = array();
$locked = array();
$needed1 = array();

foreach($files as & $value) {
	$xml = simplexml_load_file("$value");
	$difficulty = (string)$xml->exercise->difficulty;
	$array[$value] = $difficulty;
}

asort($array, SORT_ASC);

foreach($array as $key => $value) $sorted_files[] = $key;

foreach($sorted_files as & $value) {
	$xml = simplexml_load_file("$value");
	$name = $xml->exercise->title;
	$exname = $xml->exercise->name;
	$filecategory = $xml->exercise->category;
	if ($filecategory == $category) {
		$dependencies = (string)$xml->exercise->dependencies;
		$dependents = explode(",", $dependencies);
		if (strlen($dependencies) > 0) {
			foreach($dependents as $needed) {

				// echo $needed1;

				$ {
					'requirements' . $value
				} = array();
				array_push($ {
					'requirements' . $value
				}

				, $needed);
				$sql5 = "SELECT score FROM $uname WHERE exercise = '$needed'";
				$result = $conn->query($sql5);
				if ($result->num_rows > 0) {
					$score = $result->fetch_assoc() ['score'];
					$scorelen = strlen($score);
					$score1 = strstr($score, '0');
					$score2 = strstr($score, '1');
					$score3 = strstr($score, '3');
					$score4 = strstr($score, '2');
					if (strlen($score1) > 0 || strlen($score4) > 0) {
						$display = 0;
						array_push($needed1, $needed);
						break;
					}
					else {
						$display = 1;
					}
				}
				else {
					$display = 0;
					array_push($needed1, $needed);
					break;
				}
			}
		}
		else {
			$display = 1;
		}

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

		$shortdescription = (string)$xml->exercise->shortdescription;
		$difficulty = (string)$xml->exercise->difficulty;
		switch ($difficulty) {
		case 0:
			$difficulty = "Introductory";
			break;

		case 1:
			$difficulty = "Beginner";
			break;

		case 2:
			$difficulty = "Intermediate";
			break;

		case 3:
			$difficulty = "Advanced";
			break;

		case 4:
			$difficulty = "Expert";
			break;

		default:
			break;
		}

		if ($display == 0) {

			// echo $needed1;

			array_push($locked, $value);
		}
		else {
			echo " <a style=\"vertical-align:middle; height:60px\" href=\"exercise.php?exname=$value\"> 
			<div class=\"hvr-rectangle-out container1\">";
			echo "<p style=\"margin:20px 15px; \"><img  style=\"\" src=\"resources/$category.png\" />
					<br />$name
					</p>
					<p style=\"font-size:13px; margin:10px;\" >Difficulty: $difficulty</p>
					<p style=\"font-size:15px; margin:10px;\" >$shortdescription</p>";
			$score1len = substr_count($score, '0');
			$score2len = substr_count($score, '1');
			$score3len = substr_count($score, '3');
			$score4len = substr_count($score, '2');
			$scorelen = strlen($score);
			$percent = round(($score2len * 100) / $scorelen);

			//			echo $score2;

			if ((strlen($score3) > 0 && $percent < 60 && ($score4 == NULL || $score4 == 0))) {
				echo "<p class=\"completed\" style=\"color:red; \" >Failed ($percent%)</p>";
			}
			else
			if (strlen($score1) > 0 || strlen($score4) > 0) {
				echo "<p class=\"completed\">In Progress ($percent%)</p>";
			}
			else
			if ($score == NULL) {
				echo "";
			}
			else {
				$counter++;
				echo "<p class=\"completed\" style=\"color:#2E8A57; \" >Completed ($percent%)</p>";
			}

			echo "
				</div>
			</a>";
		}
	}
}

$i = 0;

foreach($locked as & $value) {
	$a = (string)$i . "a";
	$xml = simplexml_load_file("$value");
	$difficulty = (string)$xml->exercise->difficulty;
	switch ($difficulty) {
	case 0:
		$difficulty = "Introductory";
		break;

	case 1:
		$difficulty = "Beginner";
		break;

	case 2:
		$difficulty = "Intermediate";
		break;

	case 3:
		$difficulty = "Advanced";
		break;

	case 4:
		$difficulty = "Expert";
		break;

	default:
		break;
	}

	$shortdescription = (string)$xml->exercise->shortdescription;
	$requirement = array();
	/*foreach ( ${'requirements' . $value} as $req ) {
	$xml_req = simplexml_load_file("xml/$req.xml");
	array_push ($requirement, $xml_req->exercise->title);
	}*/
	if (strlen($needed1[$i]) > 0) {
		$arb = "xml/" . $needed1[$i] . ".xml";
		$xml_req = simplexml_load_file("$arb");

		// var_dump($xml_req);

		$req = $xml_req->exercise->title;

		//	echo $needed1[$i];

	}

	$name = $xml->exercise->title;
	$exname = $xml->exercise->name;
	$filecategory = $xml->exercise->category;
	if ($filecategory == $category) {
		echo " <script>
			function myFunction$a () {
				var test = document.getElementById(\"$a\").style.display = \"none\";
				var test = document.getElementById(\"$a$a\").style.display = \"\";
			}
			function myFunction$a$a () {
				var test = document.getElementById(\"$a$a\").style.display = \"none\";
				var test = document.getElementById(\"$a\").style.display = \"\";
			}
			</script>";
		echo " <a style=\"vertical-align:middle; opacity:.5; height:60px; \" id=\"$a\" href=\"#\" onmouseover=\"myFunction$a()\" onmouseout=\"myFunction$a$a()\"> 
				<div class=\"hvr-rectangle-out1 container1\">";
		echo "<p style=\"margin:20px 15px; \"><img  style=\"\" src=\"resources/$category.png\" />
					<br />$name
					</p>
			<p style=\"font-size:13px; margin:10px;\" >Difficulty: $difficulty</p>
			<p style=\"font-size:15px; margin:10px;\" >$shortdescription</p>";
		echo "<img style = \"position:absolute; top:70%; right:32%; width:100px; opacity:0.4; \" src = \"resources/lock.png\" />";
		echo "
				</div>
			</a>";
		echo " <a style=\"vertical-align:middle; opacity:.5; height:60px; display:none; \" id=\"$a$a\"  href=\"#\" onmouseout=\"myFunction$a$a()\" onmouseover=\"myFunction$a()\"> 
				<div class=\"hvr-rectangle-out1 container1\">";
		echo "<p style=\"margin:20px 15px; \"><img  style=\"\" src=\"resources/$category.png\" />
					<br />
					</p>
					<p style=\"margin:20px 15px 5px 15px; \">Requires:</p>";

		// foreach ($requirement as $req) {

		echo "<p style=\"margin:5px 15px; font-size:18px;\">$req</p>";

		// }

		/*<p style=\"font-size:13px; margin:10px;\" >Difficulty: $difficulty</p>
		<p style=\"font-size:15px; margin:10px;\" >$shortdescription</p>";*/
		echo "<img style = \"position:absolute; top:70%; right:32%; width:100px; opacity:0.4; \" src = \"resources/lock.png\" />";
		echo "
				</div>
			</a>";
	}

	$i++;
}

echo "<div style=\"display:none;\">";
$progLog = new Progress($conn, $counter);
$progLog->checkProgress();
echo "</div><br /><br />";


?>


</div>
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
</body></html>

<?php
} else {
	header("Location: index.php");
}
?>