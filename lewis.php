<?php
function Insert($a, $b)
{
	
}

function InsertLeft($a, $b)
{
	$l = 2 * $index + 1;
	
}

function InsertRight($a, $b)
{
	$r = 2 * $index + 2;
	
}

function GetLeft($parent, $array3)
{
	//echo "GetLeft";
	$l = 2 * $parent + 1;
	if ($l < count($array3))
		return $l;
	else
		return 400;
}

function GetRight($parent, $array2)
{
	//echo "GetRight";
	$r = 2 * $parent + 2;
	if ($r < count($array2))
		return $r;
	else
		return 500;
}

function FindLeaf($index, $array1)
{
	//echo "FindLeaf";
	if ((GetRight($index, $array1) >= count($array1) || !isset($array1[GetRight($index, $array1)])) && (GetLeft($index, $array1) >= count($array1) || !isset($array1[GetLeft($index, $array1)]))){
		//echo GetRight($index);
		return true;
	} else {
		return false;
	}
}

$exname = $_GET["exname"];
$servername = "localhost";
$username = "root";
$password = "#Karma2014!";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT score FROM cbrown WHERE exercise = 'mytest'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$score = $result->fetch_assoc() ['score'];
}
else {

	// echo "0 results, adding exercise";

	$sqlex = "INSERT INTO cbrown (exercise, score) VALUES ('mytest', '0')";
	$conn->query($sqlex);
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$score = $result->fetch_assoc() ['score'];
	}
	else {

		// echo "failed, fix this now bro";

	}
}

$answers = str_split($score);
$answers_len = count($answers);
$testvar = $_GET['input'];
$mystring = "abc,123,def,456";
$myarray = explode( ",",$score);
print_r($myarray);
?>

<html>
	<body>
		<div>
			<form method = "get" action = "lewis.php">
				<input type="text" name = "input" > </input>
				<input type="submit" value = "submit" > </input>
			</form>
		</div>
	</body>
</html>
			
<?php echo $testvar ?>	
			
<?php
$mycount = count($myarray);
for($i = 0; $i < $mycount; $i++){
	$myindex = FindLeaf($i,$myarray);
	if($myindex){
		echo "Is a leaf.\n";
	}
	else{
		echo "Not a leaf.\n";
	}
	}
$finalscore = implode($myarray);
$dtnsrt = "UPDATE cbrown SET `score` = 'ca,abc,123' where `exercise` = 'mytest'";
$conn->query($dtnsrt);
$conn->close();
echo $myarray [GetRight(0, $myarray)];
?>


