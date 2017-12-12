<?php
	session_start();
if ($_SESSION['access'] == 1 or $_SESSION['access'] == 2) {	
	$admincheck = $_SESSION["access"];
	if ($admincheck==2){
	
?>
<!DOCTYPE html>
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

<body>
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
                <a class="navbar-brand" href="index.php">N57 Training Environment Dashboard - Exercise Editor</a>
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
                    <li class="active">
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
</head>

<script>
	function myFunction() {
		var popup = document.getElementById('myPopup');
		popup.classList.toggle('show');
	}
</script>
						<p id="demo"></p>
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
								document.getElementById("demo").innerHTML = x;
							}
							</script>

<script type="text/javascript">
$('.dropdown-toggle').dropdown();
tinymce.init({
//mode: 'specific_textareas',
selector: 'textarea.editable',
themes: 'inlite',
theme_advanced_fonts: "Times New Roman=times new roman,times;"+
		"Verdana=verdana,geneva;"+
		"Courier New=courier new,courier;"+
		"Arial=arial,helvetica,sans-serif;"+
		"Tahoma=tahoma,arial,helvetica,sans-serif;"+
		"Impact=impact,chicago;",
theme_advanced_font_sizes : "10px,12px,14px,16px,24px",
font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Times New Roman=times new roman,times;Tahoma=tahoma,arial,helvetica,sans-serif',
toolbar: 'undo redo | paste | fontselect fontsizeselect | bold italic underline | quicklink h2 h3 blockquote | alignleft aligncenter alignright | indent outdent | numlist bullist'  ,
plugins: 'paste',
paste_as_text: true,
});

</script>
<body style="background-color: white">
		<div id="page-wrapper">
	<div class="container-fluid">
		<?php

	$delete = $_GET['delete'];
	if ($delete == "1") {
		echo "All Reports Deleted";
		shell_exec('cat /dev/null > /var/mail/root');
	} else {
		echo "";
	}


?>
		<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin <small>Exercise Editor</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li style="color:#777">
                                <i class="fa fa-edit"></i> Exercise Editor
                            </li>
                        </ol>
                    </div>
			
				<hr />
			</div>
		<script type="text/javascript">
		// define functions
var setScroll,
    myScroll;
 
 
// if query string in URL contains scroll=nnn, then scroll position will be restored 
setScroll = function () {
    // get query string parameter with "?"
    var search = window.location.search,
        matches;
    // if query string exists
    if (search) {
        // find scroll parameter in query string
        matches = /scroll=(\d+)/.exec(search);
        // jump to the scroll position if scroll parameter exists
        if (matches) {
            window.scrollTo(0, matches[1]);
        }
    }
};
 
 
// function appends scroll parameter to the URL or returns scroll value
myScroll = function (url) {
    var scroll, q;
    // Netscape compliant
    if (typeof(window.pageYOffset) === 'number') {
        scroll = window.pageYOffset;
    }
    // DOM compliant
    else if (document.body && document.body.scrollTop) {
        scroll = document.body.scrollTop;
    }
    // IE6 standards compliant mode
    else if (document.documentElement && document.documentElement.scrollTop) {
        scroll = document.documentElement.scrollTop;
    }
    // needed for IE6 (when vertical scroll bar is on the top)
    else {
        scroll = 0;
    }
    // if input parameter does not exist then return scroll value
    if (url === undefined) {
        return scroll;
    }
    // else append scroll parameter to the URL
    else {
        // set "?" or "&" before scroll parameter
        q = url.indexOf('?') === -1 ? '?' : '&';
        // refresh page with scroll position parameter
        window.location.href = url + q + 'scroll=' + scroll;
    }
};
 
 
// add onload event listener
if (window.addEventListener) {
    window.addEventListener('load', setScroll, false);
}
else if (window.attachEvent) {
    window.attachEvent('onload', setScroll);
}
</script>

<?php
$load = $_POST['load'];
$filetoload = $_POST['filetoload'];
$delete = $_POST['delete'];

if (isset($filetoload) && $filetoload != "Clear" && $delete === '1') {
	$movedfile = "xml/deletedfiles/" . $filetoload;
	rename($filetoload, $movedfile);
	echo "<h2>Deleted Exercise: " . $filetoload . "</h2>";

}

echo "<div style =\"background:f0f0f0; width:100%;  padding:40px; margin:auto;\"><form name=\"loadfile\" method=\"post\" class=\"form-inline text-center\" >";

echo "<select style=\"width:200px;\" class=\"form-control\" name=\"filetoload\">";
echo "<option>Clear</option>";
$files = glob("xml/*.xml");
foreach ($files as &$value) {
	$value2 = (string)$value;
	//echo $score2;
	echo "<option class=\"form-control\" name=\"filetoload\">$value2</option>";
}
echo "</select>";

echo "
<button type=\"submit\" class=\"btn btn-primary\" name=\"load\" value=\"1\">LOAD FILE</button>
<button onclick=\"return checkdelete();\" name=\"delete\" value=\"1\" type=\"submit\" class=\"btn btn-danger\">DELETE FILE</button>
</form>
";

if ($load === '1' && $filetoload != "Clear" && $delete != '1') {
//	$filetoload = "xml/" . $filetoload . ".xml";
	$xml = simplexml_load_file("$filetoload");
	$title = (string)$xml->exercise->title;
	$diff = (string)$xml->exercise->difficulty;
	$cat = (string)$xml->exercise->category;
	$name = (string)$xml->exercise->name;
	$dependencies = (string)$xml->exercise->dependencies;
	$description = (string)$xml->exercise->description;
	$shortdescription = (string)$xml->exercise->shortdescription;
	$tutorial = (string)$xml->exercise->tutorial;
	$video = (string)$xml->exercise->video;
	$numq = $xml->exercise->question->count();
	$numanswers = $xml->exercise->question->wrong->count();
	echo "<h2>Loaded Exercise: " . $title . "</h2>";
} else {
$save = '0';
$title = $_POST['title'];
$diff = $_POST['diff'];
$cat = $_POST['cat'];
$name = $_POST['name'];
$dependencies = $_POST['dependencies'];
$description = $_POST['description'];
$shortdescription = $_POST['shortdescription'];
$tutorial = $_POST['tutorial'];
$video = $_POST['video'];
$save = $_POST['save'];
$numq = $_POST['numq'];




$doc = new DOMDocument('1.0');
$doc->formatOutput = true;

$root = $doc->createElement('exercises');
$root = $doc->appendChild($root);

$xmltag_ex = $doc->createElement('exercise');
$xmltag_ex = $root->appendChild($xmltag_ex);

$xmltag_title = $doc->createElement('title');
$xmltag_title = $xmltag_ex->appendChild($xmltag_title);
$text = $doc->createTextNode($title);
$text = $xmltag_title->appendChild($text);

$xmltag_diff = $doc->createElement('difficulty');
$xmltag_diff = $xmltag_ex->appendChild($xmltag_diff);
$text = $doc->createTextNode($diff);
$text = $xmltag_diff->appendChild($text);

$xmltag_cat = $doc->createElement('category');
$xmltag_cat = $xmltag_ex->appendChild($xmltag_cat);
$text = $doc->createTextNode($cat);
$text = $xmltag_cat->appendChild($text);

$xmltag_name = $doc->createElement('name');
$xmltag_name = $xmltag_ex->appendChild($xmltag_name);
$text = $doc->createTextNode($name);
$text = $xmltag_name->appendChild($text);

$xmltag_dependencies = $doc->createElement('dependencies');
$xmltag_dependencies = $xmltag_ex->appendChild($xmltag_dependencies);
$text = $doc->createTextNode($dependencies);
$text = $xmltag_dependencies->appendChild($text);

$xmltag_shdesc = $doc->createElement('shortdescription');
$xmltag_shdesc = $xmltag_ex->appendChild($xmltag_shdesc);
$text = $doc->createTextNode($shortdescription);
$text = $xmltag_shdesc->appendChild($text);

$xmltag_description = $doc->createElement('description');
$xmltag_description = $xmltag_ex->appendChild($xmltag_description);
$text = $doc->createTextNode($description);
$text = $xmltag_description->appendChild($text);

$xmltag_tutorial = $doc->createElement('tutorial');
$xmltag_tutorial = $xmltag_ex->appendChild($xmltag_tutorial);
$text = $doc->createTextNode($tutorial);
$text = $xmltag_tutorial->appendChild($text);

if ($video != NULL) {
$xmltag_video = $doc->createElement('video');
$xmltag_video = $xmltag_ex->appendChild($xmltag_video);
$text = $doc->createTextNode($video);
$text = $xmltag_video->appendChild($text);
}
}



echo "<form name=\"form\" method=\"post\" />
	<fieldset class=\"form-group\">
		<label for=\"title\">Title</label>
		<input type=\"text\" class=\"form-control\" id=\"title\" name=\"title\" value=\"$title\" placeholder=\"Enter Title of Exercise\">
	</fieldset>
	<div class=\"form-group\">
	  <label for=\"sel1\">Select Difficulty:</label><br>
	  <select class=\"form-control\" id=\"diff\" name=\"diff\" value=\"$diff\">
		<option ".(($diff == 0)? 'selected="selected"':"")." value=\"0\">Introductory</option> 
		<option ".(($diff == 1)? 'selected="selected"':"")." value=\"1\">Beginner</option>
		<option ".(($diff == 2)? 'selected="selected"':"")." value=\"2\">Intermediate</option>
		<option ".(($diff == 3)? 'selected="selected"':"")." value=\"3\">Advanced</option>
		<option ".(($diff == 4)? 'selected="selected"':"")." value=\"3\">Expert</option>
	  </select>
	</div>
	<div class=\"form-group\">
	  <label for=\"sel1\">Select category:</label><br>
	  <select class=\"form-control\" id=\"cat\" name=\"cat\" value=\"$cat\"> ";
		$cat_xml = simplexml_load_file("resources/categories.xml");
		
	foreach ($cat_xml->category AS $item) {
		$cat_name =  (string)$item->name;
	
		echo "<option ".(($cat == "$cat_name")? 'selected="selected"':"")." value=\"$cat_name\">$cat_name</option> ";

	}
echo "</select>
	</div>

	<fieldset class=\"form-group\">
		<label for=\"title\">Name of File</label>
		<input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\"  value=\"$name\" placeholder=\"Enter Name of File\">
	</fieldset>
	
	<fieldset class=\"form-group\">
		<label for=\"title\">Dependencies - What exercise(s) is this exercise dependent on to be unlocked? Leave blank if none</label>
		<input type=\"text\" class=\"form-control\" id=\"dependencies\" name=\"dependencies\"  value=\"$dependencies\" placeholder=\"Insert names of exercise files comma separated. Ex: ex1,ex2,ex3,etc.\">
	</fieldset>
	
    <fieldset class=\"form-group\">
		<label for=\"exampleTextarea\">Exercise Description</label>
		<textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"3\" placeholder=\"Enter full description of exercise\">$description</textarea>
    </fieldset>
  
	<fieldset class=\"form-group\">
		<label for=\"title\">Displayed Description on Exercise List page</label>
		<input type=\"text\" class=\"form-control\" id=\"title\" name=\"shortdescription\" value=\"$shortdescription\" placeholder=\"Enter summary of exercise\">
	</fieldset>

    <fieldset class=\"form-group\">
		<label for=\"exampleTextarea\">Exercise Tutorial</label>
		<textarea class=\"form-control editable\" id=\"tutorial\" name=\"tutorial\" rows=\"8\">$tutorial</textarea>
    </fieldset>
	
	    <fieldset class=\"form-group\">
		<label for=\"exampleTextarea\">Helper Video(optional) - Insert embedded url here. Ex:\"https://www.youtube.com/embed/KK9bwTlAvgo\" </label>
		<textarea class=\"form-control\" id=\"video\" name=\"video\" >$video</textarea>
    </fieldset>
  
	<fieldset class=\"form-group\">
		<label for=\"title\">Number of Questions</label>
		<input type=\"text\" class=\"form-control\" id=\"numq\" name=\"numq\" value=\"$numq\">
	</fieldset>
	
	<input class=\"btn btn-primary\"type=\"submit\" value=\"Add Questions\"> 
	<br />
	</div>
";
if ($load === '1') {
	$i = 1;
	foreach ($xml->exercise->question AS $item) {
		$typ = "type" . $i;
		$type = $item->type;
		$lang = "language";
		$language = $item->language;
		$ans= "answer" . $i;	
		$answer = $item->answer;
		$que = "question" . $i;
		$question = $item->text;
		$numa = "answers" . $i;
		$numanswers = $item->wrong->count();		

		echo "
		<br /><br /><div style =\"background:f0f0f0; width:100%; border:2px solid black; padding:40px; margin:auto;\"><h2 style=\"margin:0px 0px 20px 0px;\">Question $i: </h2>
	
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Question</label>
			<textarea class=\"form-control\" id=\"que\" name=\"$que\" >$question</textarea>
		</fieldset>";
		if ($type == "language") {
				echo  "
				<fieldset class=\"form-group\">
					<label for=\"exampleTextarea\">Expected Code Output</label>
					<textarea class=\"form-control\" id=\"ans\" name=\"$ans\" >$answer</textarea>
				</fieldset>";
			} else {
			echo "<fieldset class=\"form-group\">
					<label for=\"exampleTextarea\">Correct Answer</label>
					<textarea class=\"form-control\" id=\"ans\" name=\"$ans\" >$answer</textarea>
				</fieldset>";
			}
		echo "		
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Question Type</label>
			<select class=\"form-control\" id=\"$typ\" name=\"$typ\" onchange=\"this.form.submit()\">
			<option value=\"multiple\">multiple</option>
			<option value=\"shortanswer\">shortanswer</option>
			<option value=\"upload\">upload</option>
			<option value=\"language\">language</option>
			</select>
		</fieldset>
		
		<script type=\"text/javascript\">
			var element = document.getElementById(\"$typ\");
			element.value = \"$type\";
		</script>	
	
		";
		if ($type == "multiple")
		{
			echo "
			<fieldset class=\"form-group\">
				<label for=\"title\">Number of Wrong Answers</label>
				<input type=\"text\" class=\"form-control\" id=\"numa\" name=\"$numa\" value=\"$numanswers\">
			</fieldset>
		
			<input class=\"btn btn-primary\"type=\"submit\" value=\"Add Answers\"> 
			";
			$b = 1;
			
			foreach ($item->wrong AS $wrongitem) {
				$wrng= "wrong" . $i . $b;	
				$wrong = $wrongitem;
				echo "
				<fieldset class=\"form-group\">
					<label for=\"exampleTextarea\">Wrong Answer $b</label>
					<textarea class=\"form-control\" id=\"wrng\" name=\"$wrng\" >$wrong</textarea>
				</fieldset>
				";
				$b += 1;
			}
			echo "</div>";
			
		} else if ($type == "language") {
			$cod = "code" . $i;
			$code = $item->code;
			echo "
			<fieldset class=\"form-group\">	
				<label for=\"title\">Select Coding Language</label>
				<select class=\"form-control\" name=\"$cod\" id=\"$cod\" value=\"$code\">
				<option value=\"PowerShell\">PowerShell</option>
				<option value=\"Python\">Python</option>
				<option value=\"C++\">C++</option>
				<option value=\"Bash\">Bash</option>
				</select>
			</fieldset>
	
			<input class=\"btn btn-primary\" type=\"submit\" value=\"Add Answers\">
			</div>
			
			<script type=\"text/javascript\">
				var element = document.getElementById(\"$cod\");
				element.value = \"$code\";
			</script>	
			
			";
		} else {
				echo "</div>";
			}
		$i += 1;
	}
} else {
	for ( $i = 1 ; $i <= $numq ; $i++) {

		$typ = "type" . $i;
		$type = $_POST[$typ];
		if ($type === NULL) {
			$type = "multiple";
		}
		$ans= "answer" . $i;
		$answer = $_POST[$ans];	
		$que = "question" . $i;
		$question = $_POST[$que];
		
		$numa = "answers" . $i;
		$numanswers = $_POST[$numa];
		if ($type != "multiple") {
			$numanswers = 0;
		} else if ($numanswers === NULL) {
			$numanswers = 3;
		} 		
		
		
		echo "
		<br /><br /><div style =\"background:f0f0f0; width:100%; border:2px solid black; padding:40px; margin:auto auto 30px auto;\"><h2 style=\"margin:0px 0px 20px 0px;\">Question $i: </h2>
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Question</label>
			<textarea class=\"form-control\" id=\"que\" name=\"$que\" >$question</textarea>
		</fieldset>";
		if ($type == "language") {
			echo  "
			<fieldset class=\"form-group\">
				<lable for =\"exampleTextarea\">Expected Code Output</lable>
				<textarea class=\"form-control\" id=\"ans\" name=\"$ans\" >$answer</textarea>
			</fieldset>";
		} else {
		echo "<fieldset class=\"form-group\">
					<label for=\"exampleTextarea\">Correct Answer</label>
					<textarea class=\"form-control\" id=\"ans\" name=\"$ans\" >$answer</textarea>
				</fieldset>";
		}
		echo "
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Question Type</label>
			<select class=\"form-control\" id=\"$typ\" name=\"$typ\" onchange=\"this.form.submit()\">
			<option value=\"multiple\">multiple</option>
			<option value=\"shortanswer\">shortanswer</option>
			<option value=\"upload\">upload</option>
			<option value=\"language\">language</option>
			</select>
		</fieldset>
		
		<script type=\"text/javascript\">
			var element = document.getElementById(\"$typ\");
			element.value = \"$type\";
		</script>
		
		
	";		
		
		$xmltag_question = $doc->createElement('question');
		$xmltag_question = $xmltag_ex->appendChild($xmltag_question);
		
		$xmltag_text = $doc->createElement('text');
		$xmltag_text = $xmltag_question->appendChild($xmltag_text);
		$text = $doc->createTextNode($question);
		$text = $xmltag_text->appendChild($text);
		
		$xmltag_type = $doc->createElement('type');
		$xmltag_type = $xmltag_question->appendChild($xmltag_type);
		$text = $doc->createTextNode($type);
		$text = $xmltag_type->appendChild($text);
		
		
		
		$xmltag_answer = $doc->createElement('answer');
		$xmltag_answer = $xmltag_question->appendChild($xmltag_answer);
		
		$text = $doc->createTextNode($answer);
		$text = $xmltag_answer->appendChild($text);
		if ($type == "multiple")
		{
			echo "
			<fieldset class=\"form-group\">
				<label for=\"title\">Number of Wrong Answers</label>
				<input type=\"text\" class=\"form-control\" id=\"numa\" name=\"$numa\" value=\"$numanswers\">
			</fieldset>
		
			<input class=\"btn btn-primary\"type=\"submit\" value=\"Add Answers\">
			";
			for ( $b = 1 ; $b <= $numanswers ; $b++) {	
				$wrng= "wrong" . $i . $b;
				$wrong = $_POST[$wrng];
				echo "
				<fieldset class=\"form-group\">
					<label for=\"exampleTextarea\">Wrong Answer $b</label>
					<textarea class=\"form-control\" id=\"wrng\" name=\"$wrng\" >$wrong</textarea>
				</fieldset>
				";
				$xmltag_wrong = $doc->createElement('wrong');
				$xmltag_wrong = $xmltag_question->appendChild($xmltag_wrong);
				
				$text = $doc->createTextNode($wrong);
				$text = $xmltag_wrong->appendChild($text);
			}
			echo "</div>";
		} else if ($type == "language")		
			{
				$cod = "code" . $i;
				$code = $_POST[$cod];
				echo "
				<fieldset class=\"form-group\">	
					<label for=\"title\">Select Coding Language</label>
					<select class=\"form-control\" name=\"$cod\" id=\"$cod\" value=\"$code\">
					<option value=\"PowerShell\">PowerShell</option>
					<option value=\"Python\">Python</option>
					<option value=\"C++\">C++</option>
					<option value=\"Bash\">Bash</option>
					</select>
				</fieldset>
		
				<input class=\"btn btn-primary\" type=\"submit\" value=\"Add Answers\">
				</div>
				
				<script type=\"text/javascript\">
					var element = document.getElementById(\"$cod\");
					element.value = \"$code\";
				</script>	
				
				";
										//language is assigned from selection into the xml file 638-645 working
				
				$xmltag_code = $doc->createElement('code');
				$xmltag_code = $xmltag_question->appendChild($xmltag_code);
				
				$text = $doc->createTextNode($code);
				$text = $xmltag_code->appendChild($text);
			} else {
				echo "</div>";
			}
	}


} 
echo "<p style=\"margin-top:15px;\" class=\"text-center\">
<button name=\"save\" type=\"submit\" value=\"1\"  class=\"btn btn-primary btn-lg\">SAVE FILE</button></p>
";

if ($save === '1'){
$save_file = "xml/" . $name . ".xml";
echo "
<div id=\"success-alert\" class=\"alert alert-success alert-fixed\">
	Successfully saved file to: $save_file. <br /><br /> Wrote: " . $doc->save($save_file) . " bytes
</div>
"; 
?>

<script type="text/javascript">
$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
		$("#success-alert").alert('close');
	});
</script>
<?php
}
?>
</form>

<br />
<br />
<script type="text/javascript">
function checkdelete() {
	var v = window.confirm("Are you sure?");
	if (v == true) {
		y = window.prompt("Type *DELETE* to confirm this action.");
		if (y == "DELETE") {
			console.log("File deleted.");
		} else {
			return false;
		}
	} else {
		return false;	
	}
	myScroll();
}
					</script>
				</div>
			</div>
		</div>
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

