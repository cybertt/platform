<?php
class Progress

{
	private $_database;
	private $_table;
	private $_rv;
	private $_progress = array();
	public $counter;

	function __construct($connection, $counter, $uname)
	{
		if ($connection === null) {
			echo "Must pass (connection) parameter!";
		}
		else {
			$this->_database = $connection;
			$this->_table = $uname;
			if ($this->_table === NULL) {
				$this->_table = $_POST['uname'];
			}

			if ($this->_table === NULL) {
				$this->_table = $_COOKIE['username'];
			}

			$this->counter = $counter;
		}
	}

	// Run by exercise.php when user successfully completes an exercise

	public

	function logExercise()
	{

		// @TODO

		if ($this->hasProgress()) {
			echo "increment score by one.";

			// $this->_rv edit to increment score +1
			// overwrite exercise progress in score column
			// return true if successfully updated
			// return false if failed, echo error

		}
		else {
			echo "create progress entry, and incrememnt by one";
		}
	}

	public

	function checkProgress()
	{

		// query for score, store in _rv

		$this->_rv = $this->_database->query("SELECT score FROM $this->_table WHERE exercise = 'progress'");

		// If progress entry does not exist, create one.

		if ($this->_rv->num_rows == 0) {
			echo "No progress entry found for $this->_table.<br />";

			// Attempt to create a new entry

			if ($this->createEntry()) {
				echo "Progress entry successfully created for $this->_table. Please refresh the page.<br />";
			}
			else {
				echo "Progress entry failed to generate.<br />";
			}

			// If the progress entry exists, do this

		}
		else {

			// Create HTML display for userhistory.php

			$this->_rv = $this->_rv->fetch_assoc() ['score'];
			$this->_rv = explode(",", $this->_rv);

			// var_dump($this->_rv);

			$files = glob("xml/*.xml");
			$sorted_files = array();
			foreach($files as & $value) {
				$array[$value] = $difficulty;
			}

			foreach($array as $key => $value) {
				$sorted_files[] = $key;
			}

			$sorted_files = sizeof($sorted_files);
			$test_friday = date("d", strtotime("this friday" . now));
			$test_fmonth = date("m", strtotime("this friday" . now));
			$test_monday = date("d", strtotime("this monday" . now));
			$test_mmonth = date("m", strtotime("this monday" . now));
			if ($test_monday > $test_friday && $test_mmonth == $test_fmonth) {
				$current_week = date("dM", strtotime("last monday" . now));
				$end_week = date("dM", strtotime("this friday" . now));
			}
			else {
				$current_week = date("dM", strtotime("this monday" . now));
				$end_week = date("dM", strtotime("this friday" . now));
			}

			$test = $current_week . " - " . $end_week;
			echo "<div class=\"well\">";
			echo "<table class=\"table\">";
			echo "<th>Week Range</th>";
			echo "<th>Progress</th>";
			$count = count($this->_rv) + 2;
			$loop = true;
			for ($i = 0; $i < $count; $i++) {
				if (sizeof($this->_rv) == 1 && $this->_rv[0] == 0 && $this->counter != 0) {
					$this->_rv = array(
						"$this->counter",
						"$test"
					);
				}

				if (sizeof($this->_rv) == 1 && $this->_rv[0] == 0 && $loop) {
					echo "<tr style=\"color:red\"><td colspan=\"2\" class=\"text-center\">No exercises completed yet!<td></tr>";
					$loop = false;
				}
				else
				if ($i % 2 == 0) {
					echo "<tr style=\"color:FFF\">";
					if ($this->_rv[$i + 1] != $test && $i < count($this->_rv)) {
						echo "<td>" . $this->_rv[$i + 1] . "</td>";
						$percentage = round(($this->_rv[$i] / $sorted_files) * 100);
						echo "<td>" . $this->_rv[$i] . " out of " . $sorted_files . "  <strong style=\"color:#1E90FF; margin-left:15px;\">($percentage%)</strong></td>";
					}
				}

				echo "</tr>";
			}

			if ($this->_rv[count($this->_rv) - 1] != $test && sizeof($this->_rv) != 1 && $this->_rv[0] != 0) {
				array_push($this->_rv, $this->counter);
				array_push($this->_rv, $test);
			}

			if ($this->_rv[count($this->_rv) - 1] == $test && sizeof($this->_rv) != 1 && $this->_rv[0] != 0) {
				array_pop($this->_rv);
				array_pop($this->_rv);
				array_push($this->_rv, $this->counter);
				array_push($this->_rv, $test);
			}

			if (sizeof($this->_rv) != 1 && $this->_rv[0] != 0) {
				echo "<tr style=\"color:FFF\"><td>" . $test . "</td>";
				$percentage = round(($this->counter / $sorted_files) * 100);
				echo "<td>" . $this->counter . " out of " . $sorted_files . "  <strong style=\"color:#1E90FF; margin-left:15px;\">($percentage%)</strong></td></tr>";
			}

			echo "</table>";
			echo "</div>";
			$finalValue = implode(",", $this->_rv);

			// updateEntry($this->_table, $finalValue);

			if ($this->_database->query("UPDATE $this->_table SET `score` = '$finalValue' where `exercise` = 'progress'")) {
				return true;
			}
		}
	}

	public

	function createEntry()
	{
		if ($this->_rv = $this->_database->query("INSERT INTO $this->_table (exercise, score) VALUES (\"progress\", \"0\")")) {
			return true;
		}
	}

	function updateEntry($table, $score)
	{
	}
}

?>
 
 

