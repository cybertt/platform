<?php
session_start();
if ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) {
$exname = $_GET["exname"];
$servername = "localhost";
$username = "root";
$password = "#Karma2014!";
$dbname = "test";
include "interpreter.php";

$conn = new mysqli($servername, $username, $password, $dbname);
$dom = new DOMDocument;
$dom->load("$exname");
$xp = new DOMXPath($dom);
$xml = simplexml_load_file("$exname");

// Variables

$uname = $_SESSION["username"];
$exname = (string)$xml->exercise->name;
$description = (string)$xml->exercise->description;
$exercise_title = (string)$xml->exercise->title;
$tutorial = $xml->exercise->tutorial;
$questions = $xml->exercise->question;
$video = (string)$xml->exercise->video;
$vc = strlen($video);
$sql = "SELECT score FROM $uname WHERE exercise = '$exname'";
$result = $conn->query($sql);

// Current Question Variables

$questionNumber = 0;
$str_answer = "answers";
$num = 1;
$offset = 0;

if ($result->num_rows > 0) {
	$score = $result->fetch_assoc() ['score'];
}
else {

	// echo "0 results, adding exercise";

	$sqlex = "INSERT INTO $uname (exercise, score) VALUES ('$exname', '0')";
	$conn->query($sqlex);
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$score = $result->fetch_assoc() ['score'];
	}
	else {

		// echo "failed, fix this now bro";

	}
}

// Answer variables

$answers = str_split($score);
$answers_len = count($answers);
$questions_len = $xp->evaluate('count(//exercise/OfferName)');

while ($answers_len < $questions_len) {
	array_push($answers, "0");
}

// Next Exercise logic

$files = glob("xml/*.xml");
$sorted_files = array();
$next_exercise = 0;
$next_name = "";
$_num = 1;

foreach($files as & $value) {
	$xml = simplexml_load_file("$value");
	$difficulty = (string)$xml->exercise->difficulty;
	$array[$value] = $difficulty;
}

asort($array, SORT_ASC);

foreach($array as $key => $value) {
	$sorted_files[] = $key;
}

foreach($sorted_files as & $value) {
	$xml = simplexml_load_file("$value");
	$_exname = $xml->exercise->name;
	if ($exname == $_exname) {
		$next_exercise = $_num;
	}
	else {
		if ($next_exercise != 0) {
			$x = $next_exercise + 1;
			if ($x == $_num) {
				$next_name = $value;
			}
		}
	}

	$_num++;
}

$checkedout = 1;

// offense

$offVMID = ['610ec419-586f-47a1-8972-8cf6a61e1c35', '617e28fa-891f-452c-9fe0-2b95d3d0456b', '6844b991-ffb9-4063-b478-4e436f577739', '3d553a83-502d-4533-a91b-ce224502aa19', '455bb410-4438-4fde-bb51-6925ee7f37d8', 'c88c717d-4c01-4ea1-ac4b-08671c7e5646', 'acca66fe-fe2d-40f3-b70f-4da5aeb1ff28', 'c3055808-bd96-4070-b691-be011cd527fa', '572e1631-5eeb-4122-92df-c7346808abe0', '1dbeb8f1-0e74-4d10-aeb8-44e63d507569', 'ee3bcb80-1153-4d10-91db-642740c3cff7', '1b73b681-3dc7-465d-b311-f66b6b216d13'];

$array1 = ['T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo','T0ZGV1MtMDAxAGMAbm9hdXRo'];


// defense

$defVMID = ['4a0b773b-e4e0-431f-b3b8-5ef93c5aa099', '5d800299-1611-4d49-85cf-a8a0c9595343', 'fabf717e-d856-415e-8a4d-b8a6a1f7a454', 'a133de9c-1983-43a0-a881-239ea3b82b13', '1f7177a0-5807-4093-be3a-310fec8a5270', 'b4ac3ebc-c076-412d-bd6e-70fb436afef2', '3c1cda90-2739-409d-8e32-eff7576c563a', '1cedbd47-ed49-4f83-8817-95f94aee5c47', '590ddd64-3d9a-4869-9de7-9c8e6e6afefd', '63d809d4-40ba-4069-9619-ea92b189f42e', '6850798e-e00f-4918-a9fa-14fe79d6919a', '70279b0b-3427-4ff9-997c-66097871900d'];

$array2 = ['REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo','REVGV1MtMDAxAGMAbm9hdXRo'];


for ($h = 0; $h < count($array1); $h ++) {
	$name = 'ows' . $g;
	$g = $h +1;
	$sql = "SELECT checkedout FROM vmlist WHERE name = '$name'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$checkedout = $result->fetch_assoc() ['checkedout'];	
	}	
	$sql = "SELECT user FROM vmlist WHERE name = '$name'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$user_checked = $result->fetch_assoc() ['user'];	
	}	
	
	if ($user_checked == $uname) {
		break;
	}
	if ($checkedout == 0) {
		$username_sql = "update vmlist set user='$uname' where name ='$name'";
		$conn->query($username_sql);
		$dtnsrt = "update vmlist SET `checkedout` = '1' where `name` = '$name'";
		$conn->query($dtnsrt);
		break;
	}
}
$sql = "SELECT score FROM $uname WHERE exercise = 'current_exercise'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$dtnsrt = "update $uname SET `score` = '$exname' where `exercise` = 'current_exercise'";
	$conn->query($dtnsrt);
} else {
	$sqlex = "INSERT INTO $uname (exercise, score) VALUES ('current_exercise', '$exname')";
	$conn->query($sqlex);
		
}




$c = $h - 1;
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.numberedtextarea.css">

<script type="text/javascript" src="resources/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="resources/bootstrap/js/bootstrap.min.js"></script>
<link rel='icon' type='image/ico' href='resources/favicon.ico' />

<head>
<link rel='icon' type='image/ico' href='resources/favicon.ico' />
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

 
    <!-- Custom Fonts -->
    <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/jordans_.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<title>Exercise</title>
</head>

<body style="color:003333; font-family:Century Gothic, sans-serif; background-color:white;">
    <!-- jQuery -->


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
                <a class="navbar-brand" href="index.html">N57 Training Environment Dashboard</a>
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

                    <li>
                        <a href="exlist.php"><i class="fa fa-fw fa-edit"></i> Exercises</a>
                    </li>

					<li>
                        <a href="bugreport.php" ><i class="fa fa-fw fa-wrench"></i> Report a Bug</a>
                    </li>
					<li class="divider"><br /><br /><br /><br /><br /></li>
					<li class="active">
                        <a href="#"><i class="fa fa-fw fa-edit"></i> Current Exercise</a>
                    </li>
					<li>
                        <a href="https://cyber.moboard.com/nioc-gateway/guacamole/#/client/<?php echo "$array1[$c]#$array1[$c];$array2[$c]+Offense+$exname+$offVMID[$c]+$defVMID[$c]"; ?>"><i class="fa fa-fw fa-bolt"></i> Offense Workstation</a>
                    </li>
					<li>
                        <a href="https://cyber.moboard.com/nioc-gateway/guacamole/#/client/<?php echo "$array2[$c]#$array1[$c];$array2[$c]+Defense+$exname+$offVMID[$c]+$defVMID[$c]"; ?>"><i class="fa fa-fw fa-shield"></i> Defense Workstation</a>
                    </li>
					<li class="divider"><br /><br /><br /><br /></li>
					<!--<li>
                        <a href="exercise.php?exname=<?php echo $next_name ?>"><i class="fa fa-fw fa-mail-forward"></i> Next Exercise</a>
                    </li> -->
					<li class="divider"><br /><br /><br /></li>
										<?php
						$admincheck = $_SESSION["access"];

						if ($admincheck == 2) {
							echo "<li><a href=\"userhistory.php\"><i class=\"fa fa-fw fa-cog\"></i> Admin Page</a></li>";
						}

						?>
					

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    <!-- Rendered HTML Content & Media -->






	<div style="margin-left:250px; margin-top:-50px ;width:70%; max-width:800px;" >
		<h1><?php
echo $exercise_title; ?> 
		</h1>
		<hr class="nav-hr width-50" align="left">
		<p class="lead"><?php
echo $description; ?></p>
		<h2>Instructions</h2>
		<hr class="nav-hr width-15" align="left">
		<p class="lead"><?php
echo nl2br($tutorial); ?></p>
		<?php

if ($vc > 0) { ?>
			<h3>Helper Video</h3>
			<hr class="nav-hr width-15" align="left">
			<div class="embed-responsive embed-responsive-16by9" align="center">
				<iframe class="embed-responsive-item" src=<?php
	echo $video ?> allowfullscreen></iframe>
			</div>
		<?php
} ?>
		<h3>Questions</h3>
		<hr class="nav-hr width-15" align="left">
		<p class="lead">Questions below will highlight red if wrong and green if right, after attempting. <br /><strong>You have TWO attempts per question before you fail the question.</strong></p>

		<div id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<form method="post" enctype="multipart/form-data">
					<?php

foreach($questions AS $question) {
	if ($question->type != "upload" && $question->type != "language") {
		$multiple_answers = array();
		$multiple_answers_count = count($multiple_answers);
		foreach($question->wrong AS $wrong) {
			array_push($multiple_answers, $wrong);
		}

		foreach($question->answer AS $is_correct) {
			array_push($multiple_answers, $is_correct);
		}

		// Apply Scoring to users if correct give them 1 point, if incorrect give them -1

		if (isset($_POST[$str_answer][$num]) and $answers[$offset] != 2 and $answers[$offset] != 3 and strlen($_POST[$str_answer][$num]) > 0) {
			$answer = strtolower((string)$_POST[$str_answer][$num]);
			$is_correct = (($answer === strtolower((string)$question->answer) and strlen($_POST[$str_answer][$num]) > 0) ? 1 : -1);
			$answers[$offset] = (($answers[$offset] != 1) ? (($is_correct == - 1) ? 2 : 1) : 1);
		}
		else
		if (isset($_POST[$str_answer][$num]) and $answers[$offset] == 2 and strlen($_POST[$str_answer][$num]) > 0) {
			$answer = strtolower((string)$_POST[$str_answer][$num]);
			$is_correct = (($answer === strtolower((string)$question->answer)) ? 1 : -1);
			$answers[$offset] = (($answers[$offset] != 1) ? (($is_correct == - 1) ? 3 : 1) : 1);
		}
		else
		if ($answers[$offset] == NULL) {
			$is_correct = 0;
			$answers[$offset] = 0;
		}
		else
		if ($answers[$offset] == 2) {
			$answers[$offset] = 2;
			$is_correct = - 1;
		}
		else
		if ($answers[$offset] == 3) {
			$answers[$offset] = 3;
			$is_correct = - 1;
		}
		else
		if ($answers[$offset] == 1) {
			$answers[$offset] = 1;
			$is_correct = 1;
		}
		else {
			$is_correct = 0;
			$answers[$offset] = 0;
		}

?>
							<?php
		if ($answers[$offset] == 3) {
			echo "<div class=\"panel-heading alert-danger\" role=\"tab\" id=\"heading_.$num\" > <h4 class=\"panel-title\"><a class=\"pointer\" >You have failed this question!</a></h4></div>";
		} ?>
							<div style="<?php
		if ($answers[$offset] == 3) {
			echo "display:none;";
		} ?>" class="panel-heading <?php
		echo $is_correct == 1 || $answers[$offset] == 1 ? 'alert-success' : (($is_correct == - 1 or $answers[$offset] == 2) ? 'alert-danger' : 'panel-bg'); ?>" role="tab" id="<?php
		echo 'heading_' . $num ?>" style=<?php
		if ($answers[$offset] == 3) {
			echo "\"display:none;\"";
		} ?> >
								<h4 class="panel-title">
									<a class="pointer" data-toggle="collapse" data-parent="#accordion" href="#<?php
		echo 'question_' . $num ?>" aria-expanded="false" aria-controls="<?php
		echo 'question_' . $num ?>">
										Question <?php
		echo $num; ?> <?php
		if ($answers[$offset] == 2) {
			echo "- Warning! One attempt left!";
		} ?>
									</a>
									<div class="btn-group pull-right">
									<!-- if answer is correct display 1/1 else display 0/1 -->
										<span class="score"><?php
		echo (($answers[$offset] == 1) ? 1 : 0); ?>/1</span>
									</div>
								</h4>
							</div>

							<div id="<?php
		echo 'question_' . $num ?>" class="panel-padding panel-collapse collapse out" role="tabpanel" aria-labelledby="<?php
		echo 'heading_' . $num ?>">
								<?php
		echo $question->text ?>
									<?php

		// if the answer is correct
		// echo $offset;
		// echo var_dump($answers);

		shuffle($multiple_answers);
		foreach($multiple_answers as $_answer) {
			if ($question->type == "multiple") {
				$input_type = "radio";
				$input_name = $str_answer . '[' . $num . ']';
				$input_value = $_answer;
			}
			else
			if ($question->type == "shortanswer") {
				$input_type = "text";
				$input_name = $str_answer . '[' . $num . ']';
				$input_value = "";
			}

?>
									   <div class="radio">
											   <label>
														<input 
															type="<?php
			echo $input_type ?>"
															name="<?php
			echo $input_name ?>"
															value="<?php
			echo $input_value ?>"
														>
															<?php
			echo $input_value ?>
														</input>
											   </label>
										 </div>

							<?php
		}

?>
							</div>
						<?php
	}
	else
	if ($question->type == "upload") {
		if ($answers[$offset] == NULL) {
			$is_correct = 0;
			$answers[$offset] = 0;
		}
		else
		if ($answers[$offset] == 2) {
			$answers[$offset] = 2;
			$is_correct = - 1;
		}
		else
		if ($answers[$offset] == 3) {
			$answers[$offset] = 3;
			$is_correct = - 1;
		}
		else
		if ($answers[$offset] == 1) {
			$answers[$offset] = 1;
			$is_correct = 1;
		}
		else
		if ($answers[$offset] == 4) {
			$is_correct = 0;
			$answers[$offset] = 4;
		}
		else
		if ($answers[$offset] == 0) {
			$is_correct = 0;
			$answers[$offset] = 0;
		}

		$tmp_var = $str_answer . $num;
		if (strlen($_FILES[$tmp_var]["name"]) > 1) {
			$answers[$offset] = 4;
			include_once "upload.php";

			$file = $_FILES[$tmp_var];
			$filename = "Question," . $num . ",." . pathinfo(basename($file["name"]) , PATHINFO_EXTENSION);
			$uload = new Upload($file, $filename, $exname, $uname);
			$uload->TakeSubmission();
		}

?>
							<?php
		if ($answers[$offset] == 3) {
			echo "<div class=\"panel-heading alert-danger\" role=\"tab\" id=\"heading_.$num\" > <h4 class=\"panel-title\"><a class=\"pointer\" >You have failed this question!</a></h4></div>";
		} ?>
							<?php
		if ($answers[$offset] == 1) {
			echo "<div class=\"panel-heading alert-success\" role=\"tab\" id=\"heading_.$num\" > <h4 class=\"panel-title\"><a class=\"pointer\" >Question $num - Instructor has accepted the submission</a></h4></div>";
		} ?>
							<?php
		if ($answers[$offset] == 4) {
			echo "<div class=\"panel-heading alert-warning\" role=\"tab\" id=\"heading_.$num\" > <h4 class=\"panel-title\"><a class=\"pointer\" >Question $num - File has been submitted for review</a></h4></div>";
		} ?>
							<div style="<?php
		if ($answers[$offset] == 3 or $answers[$offset] == 4 or $answers[$offset] == 1) {
			echo "display:none;";
		} ?>" class="panel-heading <?php
		echo $is_correct == 1 || $answers[$offset] == 1 ? 'alert-success' : (($is_correct == - 1 or $answers[$offset] == 2) ? 'alert-danger' : 'panel-bg'); ?>" role="tab" id="<?php
		echo 'heading_' . $num ?>" style=<?php
		if ($answers[$offset] == 3) {
			echo "\"display:none;\"";
		} ?> >
								<h4 class="panel-title">
									<a class="pointer" data-toggle="collapse" data-parent="#accordion" href="#<?php
		echo 'question_' . $num ?>" aria-expanded="false" aria-controls="<?php
		echo 'question_' . $num ?>">
										Question <?php
		echo $num; ?> <?php
		if ($answers[$offset] == 2) {
			echo " - Instructor has rejected the submission, try again";
		} ?>
									</a>
									<div class="btn-group pull-right">
									<!-- if answer is correct display 1/1 else display 0/1 -->
										<span class="score"><?php
		echo (($answers[$offset] == 1) ? 1 : 0); ?>/1</span>
									</div>
								</h4>
							</div>
						<div id="<?php
		echo 'question_' . $num ?>" class="panel-padding panel-collapse collapse out" role="tabpanel" aria-labelledby="<?php
		echo 'heading_' . $num ?>">
						<?php
		echo $question->text ?>
						<br /><br />
						<input type="file" name="<?php
		echo $tmp_var ?>" id="<?php
		echo $tmp_var ?>">
						

						
						</div>
						<?php
	}
	else
	if ($question->type == "language") {
		$tmp_var = $str_answer . $num;
		$answer1 = $_POST[$tmp_var];
		$lang = $question->code;
		if ($answers[$offset] == NULL) {
			$is_correct = 0;
			$answers[$offset] = 0;
		}
		else
		if ($answers[$offset] == 2) {
			$answers[$offset] = 2;
			$is_correct = - 1;
		}
		else
		if ($answers[$offset] == 3) {
			$answers[$offset] = 3;
			$is_correct = - 1;
		}
		else
		if ($answers[$offset] == 1) {
			$answers[$offset] = 1;
			$is_correct = 1;
		}
		else
		if ($answers[$offset] == 4) {
			$is_correct = 0;
			$answers[$offset] = 4;
		}
		else
		if ($answers[$offset] == 0) {
			$is_correct = 0;
			$answers[$offset] = 0;
		}

		$interp = new Interpreter($exname, $num, $answer1, $lang);
		if (strlen($answer1) > 0) {
			$ {
				coderesult . $num
			} = $interp->compile();
			if (trim($ {
				coderesult . $num
			}

			[0], " \t\n\r\0\x0B") == trim($question->answer, " \t\n\r\0\x0B")) {
				$is_correct = 1;
				$answers[$offset] = 1;
			}
			else {
				$is_correct = 0;
				$answers[$offset] = 4;
			}
		}
		else {
			$ {
				coderesult . $num
			} = $interp->preserveData();
			$ {
				coderesult . $num
			};
		}

?>
							<div class="panel-heading <?php
		if ($answers[$offset] == 1) {
			echo 'alert-success';
		}
		else
		if ($answers[$offset] == 4) {
			echo 'alert-info';
		}
		else
		if ($is_correct == - 1 or $answers[$offset] == 2) {
			echo 'alert-danger';
		}
		else {
			echo 'panel-bg';
		}

?>
							" role="tab" id="<?php
		echo 'heading_' . $num ?>" style=<?php
		if ($answers[$offset] == 3) {
			echo "\"display:none;\"";
		} ?> >
								<h4 class="panel-title">
									<a class="pointer" data-toggle="collapse" data-parent="#accordion" href="#<?php
		echo 'question_' . $num ?>" aria-expanded="false" aria-controls="<?php
		echo 'question_' . $num ?>">
										Question <?php
		echo $num; ?> <?php
		if ($answers[$offset] == 1) {
			echo " - Correct! The output matches.";
		}
		else
		if ($answers[$offset] == 4) {
			echo " - Your output did not match. Try again";
		} ?>
									</a>
									<div class="btn-group pull-right">
									<!-- if answer is correct display 1/1 else display 0/1 -->
										<span class="score"><?php
		echo (($answers[$offset] == 1) ? 1 : 0); ?>/1</span>
									</div>
								</h4>
							</div>
						<div id="<?php
		echo 'question_' . $num ?>" class="panel-padding panel-collapse collapse out" role="tabpanel" aria-labelledby="<?php
		echo 'heading_' . $num ?>">
						<?php
		echo $question->text ?>
						<br /><br /><br /><br />
						<strong>Enter your code below and click submit:</strong><br />
						<textarea style="background:#34495E; color:#fff; overflow-y:scroll; width:700px; height: 400px; margin-left 30px; padding:10px; border: 1px solid darkgrey;" class="codebox" name="<?php
		echo $tmp_var ?>" id="<?php
		echo $tmp_var ?>"><?php
		if (strlen($answer1) > 0) {
			echo $answer1;
		}
		else
		if ($ {
			coderesult . $num
		}

		[0] != false) {
			echo $ {
				coderesult . $num
			}

			[0];
		}

?></textarea>
						

					
						</div>
						<?php
		if (strlen($answer1) > 0) {
			if ($lang == "PowerShell") {
				$winCheck = 1;
			}
			else {
				$winCheck = 0;
			}

			echo "<div style=\"margin:10px 15px; color:blue; white-space:pre-wrap;\"><strong style=\"color:black; \" >Code Output:</strong><br /><hr />" . $ {
				coderesult . $num
			}

			[$winCheck] . "<hr /><br /></div>";
		}
		else
		if ($ {
			coderesult . $num
		}

		[1] != false) {
			echo "<div style=\"margin:10px 15px; color:blue; white-space:pre-wrap;\"><strong style=\"color:black; \" >Code Output:</strong><br /><hr />" . $ {
				coderesult . $num
			}

			[1] . "<hr /><br /></div>";
		}
	}

	$num+= 1;
	$offset+= 1;
}

?>
					 </div>
						<button type="submit" class="btn btn-primary btn-block btn-margin-top">Submit</button>
				</form>

			<?php
$finalscore = implode($answers);
$dtnsrt = "UPDATE $uname SET `score` = '$finalscore' where `exercise` = '$exname'";
$conn->query($dtnsrt);
$conn->close();
?>
			</div>
		</div>
	</div>
</div>
<br /><br /><br />
<script type="text/javascript" src="resources/scripts/jquery.numberedtextarea.js" ></script>


<script>
$('textarea').numberedtextarea({allowTabChar: true,});
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
