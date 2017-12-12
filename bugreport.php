<?php

session_start();
if ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) {

?>

<html>
<head>
	<link rel='icon' type='image/ico' href='resources/favicon.ico' />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>N57 Training Environment Bug Report</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/bugreport1.css" rel="stylesheet">
	

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
                <a class="navbar-brand" href="index.php">N57 Training Environment Dashboard - Bug Report</a>
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
					<?php
$admincheck = $_SESSION["access"];

if ($admincheck == 2) {
	echo "<li><a href=\"userhistory.php\"><i class=\"fa fa-fw fa-cog\"></i> Admin Page</a></li>";
}

?>
					
                    <li class="active">
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
	


<div class="center">
	<h4 align="center" style="margin-top:200px; color:black">Let us know the issue you are having.</h4>
	<h4 align="center" style="margin-bottom:100px; color:black">Please include which exercise the problem exists on.</h4>
	<form name="contactform" method="POST" > <!-- action="send_form_email.php"-->
		<div align="center" style="width:800px; margin:50px 50px; " class="form-group" >
			<label for="comment">Comment:</label>
			<textarea name="comments" placeholder="Enter Bug Here" class="form-control" rows="10" id="comment"></textarea>
			<input type="submit" value="Submit" style="width:150px; height=50px;">
		</div>
	</form>
</div>

<?php
session_start();
$comments = $_POST['comments']; // required
	$doc = new DOMDocument('1.0');
	$xml = simplexml_load_file("buglist.xml");
	$doc->formatOutput = true;
	//$numq = $xml->bugreport->count();

	$root = $doc->createElement('bugreports');
	$root = $doc->appendChild($root);

foreach ($xml->bugreport as $item) {
	$xmltag_ex = $doc->createElement('bugreport');
	$xmltag_ex = $root->appendChild($xmltag_ex);

	$xmltag_title = $doc->createElement('username');
	$xmltag_title = $xmltag_ex->appendChild($xmltag_title);
	$text = $doc->createTextNode($item->username);
	$text = $xmltag_title->appendChild($text);

	$xmltag_submission = $doc->createElement('submission');
	$xmltag_submission = $xmltag_ex->appendChild($xmltag_submission);
	$text = $doc->createTextNode($item->submission);
	$text = $xmltag_submission->appendChild($text);

}

if (isset($comments)) {
	$xmltag_ex = $doc->createElement('bugreport');
	$xmltag_ex = $root->appendChild($xmltag_ex);

	$xmltag_title = $doc->createElement('username');
	$xmltag_title = $xmltag_ex->appendChild($xmltag_title);
	$text = $doc->createTextNode($_SESSION['username']);
	$text = $xmltag_title->appendChild($text);

	$xmltag_submission = $doc->createElement('submission');
	$xmltag_submission = $xmltag_ex->appendChild($xmltag_submission);
	$text = $doc->createTextNode($comments);
	$text = $xmltag_submission->appendChild($text);
	
}


$doc->save("buglist.xml");

?>

<p id="dimelo"></p>

<script>

function myDimelo() {
	var w = document.referrer;
	location.href = w;
}
</script>
	 <div class="popup" onclick="myFunction()" style="position: fixed; bottom: 3%; width: 90%; text-align: center;">
		<span class="popuptext" id="myPopup">
			<a onclick="myDimelo()" href="exlist.php">Go Back</a>
		</span>
	</div>
 
<!-- include your own success html here -->
	</body>
</html>

<?php

}

else {
	header("Location: index.php");
}

?>
 

