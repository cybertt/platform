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
                    </li class="active">
                    <li class="active">
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

// mode: 'specific_textareas',

selector: 'textarea.editable',

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
}
else {
	echo "";
}

?>
		<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin <small>Site Settings</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-cog"></i> Site Settings
                            </li>
                        </ol>
                    </div>
			
				<hr />
			
			<div class="row">
				<div class="col-md-12">
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
$delete = $_POST['delete'];
$load = $_POST['load'];
$filetoload = "resources/categories1.xml";
echo "<div style =\"background:white; width:100%; padding:40px; margin:auto; text-align:center\"><form name=\"loadfile\" method=\"post\" class=\"form-inline text-center\" >";
echo "
<button type=\"submit\" class=\"btn btn-primary\" name=\"load\" value=\"1\">LOAD CATEGORIES</button>


";
echo "
</form>";

if ($load === '1') {

	//	$filetoload = "xml/" . $filetoload . ".xml";

	$xml = simplexml_load_file("resources/categories1.xml");
	$numq = $xml->category->count();
	echo "<h2 style =\"margin-top:25px;\" >  Loaded Categories " . "</h2>";
}
else {
	$save = '0';
	$numq = $_POST['numq'];
	if ($numq == null) {
		$numq = 0;
	}

	$save = $_POST['save'];
	$doc = new DOMDocument('1.0');
	$doc->formatOutput = true;
	$root = $doc->createElement('categories');
	$root = $doc->appendChild($root);
}

echo "</div>";
echo "<div style =\"width:100%;  padding:40px; margin:auto; \">";
$numq1 = $numq + 1;
$numq2 = $numq - 1;
echo "<form name=\"form\" method=\"post\" />
	<fieldset class=\"form-group\">";
echo "</select>";

if ($delete == '1') {
	$numq = $numq2;
	$save = '1';
}

if ($load === '1') {
	$i = 1;
	echo "<div style =\"text-align:center;\">

	
	<input style=\"display:none;\" type=\"text\" value=\"$numq\" name=\"numq\" />
	<button class=\"btn btn-primary\" type=\"submit\" value=\"$numq1\" style=\"margin-right:50px; width:15em;\" name=\"numq\" >Add a category </ button>
	<br />
	
	
	<button class=\"btn btn-primary\" type=\"submit\" value=\"1\" style=\"margin-left:50px; width:15em;\" name=\"delete\" onClick=\"return checkdelete()\" >Delete last category </ button>
	<br />
	</div>";
	foreach($xml->category AS $item) {
		$nam = "name" . $i;
		$name = $item->name;
		$titl = "title" . $i;
		$title = $item->title;
		$longtitl = "longtitle" . $i;
		$longtitle = $item->longtitle;
		$descript = "description" . $i;
		$description = $item->description;
		echo "
		<br /><br /><div style =\"background: white; width:100%; border:2px solid black; padding:40px; margin:auto;\"><h2 style=\"margin:0px 0px 20px 0px;\">Category $i: </h2>
	
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Category</label>
			<textarea class=\"form-control\" id=\"$nam\" name=\"$nam\" >$name</textarea>
		</fieldset>
		
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Correct Answer</label>
			<textarea class=\"form-control\" id=\"$titl\" name=\"$titl\" >$title</textarea>
		</fieldset>
		
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Question Type</label>
			<textarea class=\"form-control\" id=\"$longtitl\" name=\"$longtitl\" >$longtitle</textarea>
			</select>
		</fieldset>		
		
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Question Type</label>
			<textarea class=\"form-control\" id=\"$descript\" name=\"$descript\" >$description</textarea>
			</select>
		</fieldset>		
		
		
		
	
		";
		echo "</div>";
		$i = $i + 1;
	}

	echo "<div style =\"text-align:center;\">
	<br /><br /><button name=\"save\" type=\"submit\" value=\"1\"  class=\"btn btn-primary\">SAVE CATEGORIES</button></p>
	</div>";
}
else {
	if ($numq > 0) {
		echo "<div style =\"text-align:center;\">

	
	<input style=\"display:none;\" type=\"text\" value=\"$numq\" name=\"numq\" />
	<button class=\"btn btn-primary\" type=\"submit\" value=\"$numq1\" style=\"margin-right:50px; width:15em;\" name=\"numq\" >Add a category </ button>
	<br />
	
	
	<button class=\"btn btn-primary\" type=\"submit\" value=\"1\" style=\"margin-left:50px; width:15em;\" name=\"delete\" onClick=\"return checkdelete()\" >Delete last category </ button>
	<br />
	
	
	</div>";
	}

	for ($i = 1; $i <= $numq; $i++) {
		$nam = "name" . $i;
		$name = $_POST[$nam];
		$titl = "title" . $i;
		$title = $_POST[$titl];
		$longtitl = "longtitle" . $i;
		$longtitle = $_POST[$longtitl];
		$descript = "description" . $i;
		$description = $_POST[$descript];
		echo "
		<br /><br /><div style =\"background:white; width:100%; border:2px solid black; padding:40px; margin:auto;\"><h2 style=\"margin:0px 0px 20px 0px;\">Category $i: </h2>
	
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Name</label>
			<textarea class=\"form-control\" id=\"$nam\" name=\"$nam\" >$name</textarea>
		</fieldset>
		
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Title</label>
			<textarea class=\"form-control\" id=\"$titl\" name=\"$titl\" >$title</textarea>
		</fieldset>
		
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Long title</label>
			<textarea class=\"form-control\" id=\"$longtitl\" name=\"$longtitl\" >$longtitle</textarea>
			</select>
		</fieldset>		
		
		<fieldset class=\"form-group\">
			<label for=\"exampleTextarea\">Description</label>
			<textarea class=\"form-control\" id=\"$descript\" name=\"$descript\" >$description</textarea>
			</select>
		</fieldset>		
		
	
		";
		echo "</div>";
		$xmltag_cat = $doc->createElement('category');
		$xmltag_cat = $root->appendChild($xmltag_cat);
		$xmltag_name = $doc->createElement('name');
		$xmltag_name = $xmltag_cat->appendChild($xmltag_name);
		$text = $doc->createTextNode($name);
		$text = $xmltag_name->appendChild($text);
		$xmltag_title = $doc->createElement('title');
		$xmltag_title = $xmltag_cat->appendChild($xmltag_title);
		$text = $doc->createTextNode($title);
		$text = $xmltag_title->appendChild($text);
		$xmltag_longtitle = $doc->createElement('longtitle');
		$xmltag_longtitle = $xmltag_cat->appendChild($xmltag_longtitle);
		$text = $doc->createTextNode($longtitle);
		$text = $xmltag_longtitle->appendChild($text);
		$xmltag_desc = $doc->createElement('description');
		$xmltag_desc = $xmltag_cat->appendChild($xmltag_desc);
		$text = $doc->createTextNode($description);
		$text = $xmltag_desc->appendChild($text);
		echo "<div>";
	}

	if ($numq > 0) {
		echo "<div style =\"text-align:center;\">
	<br /><br /><button name=\"save\" type=\"submit\" value=\"1\"  class=\"btn btn-primary\">SAVE CATEGORIES</button></p>
	</div>";
	}
}

if ($save === '1') {
	echo "something";
	$save_file = "resources/categories.xml";
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
	var v = window.confirm("This will delete the last category that was created. Are you sure you want to perform this action?");
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
    <!-- jQuery -->
    <script src="resources/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="resources/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="resources/js/plugins/morris/raphael.min.js"></script>
    <script src="resources/js/plugins/morris/morris.min.js"></script>
    <script src="resources/js/plugins/morris/morris-data.js"></script>
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


