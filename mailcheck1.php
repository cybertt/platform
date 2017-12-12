<html>
<head>

<style>
	body {
		background-color: orange;
		color: red;
	}
</style>
</head>


<!-- show bug reports BUTTON
 clear bug reports BUTTON -->
BUG REPORTS:
<body>

<div style="white-space: pre;">
<?php
$output = shell_exec('/mailcheck');
echo "<h3>$output</h3>";

// if show = 1 ^
// if clear = 1 cat /dev/null > /var/mail/root

?>
<p id="dimelo"></p>

<script>

function myDimelo() {
	var w = document.referrer;
	location.href = w;
}
</script>

 
 <div class="popup" style="position: fixed; bottom: 3%; width: 100%; text-align: center;">
		<a onclick="myDimelo()" href="#">Go Back</a>
</div>

</body>
</html
