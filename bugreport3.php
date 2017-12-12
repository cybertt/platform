<form name="contactform" method="post" > <!-- action="send_form_email.php"-->
 
<table width="450px">
 

 <head>
 
	<style>
	body {
		background: darkblue;
		color:white;
	}
	</style>
</head>
 
<tr>
 
 <td valign="top">
 
  <label for="comments">Report:</label>
 
 </td>
 
 <td valign="top">
 
  <textarea  name="comments" maxlength="1000" cols="25" rows="6" style="background:darkblue; color:white;"></textarea>
 
 </td>
 
</tr>
 
<tr>
 
 <tr>
 
 <td colspan="2" style="text-align:center;">
 
  <input type="submit" value="Submit">
  
  </tr>
 
</table>
 
</form>

<?php
session_start();
$comments = $_POST['comments']; // required
echo "Let us know the issue you are having. Please include which exercise/page the problem exists on.";

if ($comments != NULL) {
	$email_to = "root@localhost";
	$email_subject = "Bug-Report";

	// validation expected data exists

	if (!isset($_POST['comments'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');
	}

	$last_name = $_SESSION['username']; // required
	$email_from = "BugReport@n57.net"; // required
	$error_message = "";
	$string_exp = "/^[A-Za-z .'-]+$/";
	if (strlen($comments) < 2) {
		$error_message.= 'The Comments you entered do not appear to be valid.<br />';
	}

	if (strlen($error_message) > 0) {
		died($error_message);
	}

	$email_message = "Form details below.\n\n";
	function clean_string($string)
	{
		$bad = array(
			"content-type",
			"bcc:",
			"to:",
			"cc:",
			"href"
		);
		return str_replace($bad, "", $string);
	}

	$email_message.= "Username: " . clean_string($last_name) . "\n";
	$email_message.= "Bug Reports: " . clean_string($comments) . "\n";

	// create email headers

	$headers = 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers);
	echo "<br /> <br /> Thank you for contacting us. We will address the problem shortly. You will be redirected in 5 seconds";
	echo "<script>
 setTimeout(function(){ window.history.go(-2); }, 5000);
 </script>";
}
else {
?>

<p id="dimelo"></p>

<script>

function myDimelo() {
	var w = document.referrer;
	location.href = w;
}
</script>

 
 <div class="popup" onclick="myFunction()" style="position: fixed; bottom: 3%; width: 100%; text-align: center;">
	<span class="popuptext" id="myPopup">
		<a onclick="myDimelo()" href="#">Go Back</a>
	</span>
</div>
 
<!-- include your own success html here -->


<?php
}

?>
 

