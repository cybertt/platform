<?php
include "progress.php";

$servername = "localhost";
$username = "root";
$password = "#Karma2014!";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
$show_tables = "SHOW TABLES";
$tables_results = $conn->query($show_tables);
$x = $tables_results->num_rows;

for ($i = 0; $i < $x; $i++) {
	$counter = 0;
	$uname1 = $tables_results->fetch_assoc();
	$uname = (string)$uname1['Tables_in_test'];
	if ($uname != NULL) {
		echo "<blockquote><h1>Displaying Completion Data For: <strong>$uname</strong></h1></blockquote>\n";
		echo "<table class=\"table table-hover\">";
		$files = glob("xml/*.xml");
		foreach($files as & $value) {
			$score3 = '';
			$xml = simplexml_load_file("$value");
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
			$scorelen = strlen($score);
			$percent = round(($score2len * 100) / $scorelen);
			echo "<tr>\n\t<td>$name<td>\n";
			if ((strlen($score3) > 0 && $percent < 60)) {
				echo "\t<td style=\"color:#FF6347; \"><img src=\"resources/red_x.png\" style=\"width:15px; margin-left:3px;\" /> - Failed ($percent%)</td>\n</tr>\n";
			}
			else
			if (strlen($score1) > 0 || strlen($score4) > 0) {
				echo "\t<td style=\"color:#1E90FF; \"><img src=\"resources/blue_sphere.png\" style=\"width:20px\" /> - In Progress ($percent%)</td>\n</tr>\n";
			}
			else
			if ($score == NULL) {
				echo "\t<td style=\"color:orange; \"><img src=\"resources/cone.png\" style=\"width:15px; margin-left:3px;\" /> - Not Attempted</td>\n</tr>\n";
			}
			else {
				echo "\t<td style=\"color:#2E8A57; \"><img src=\"resources/check-mark-hi.png\" style=\"width:20px\" /> - Completed ($percent%)</td></tr>\n";
				$counter++;
			}
		}
	}

	$prog = new Progress($conn, $counter, $uname);
	$prog->checkProgress();
}

$results = $conn->query($select_all);
var_export($results);
$conn->close();
?>

