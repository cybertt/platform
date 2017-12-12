<?php
class Interpreter

{
	private $_code;
	private $_lang;
	private $_user;
	private $_con;
	private $_sftp;
	private $_filepath;
	private $_remotepath;
	private $_ipAddress;
	private $_rawcode;
	function __construct($exercise, $question, $code, $lang)
	{
		if (strlen($code) > 0 && strlen($lang) > 0) {
			$this->_code = $code;
			$this->_lang = $lang;
			$this->_user = $_SESSION['username'];
			$this->_exer = $exercise;
			$this->_ques = $question;
			$this->_filepath = "/output/$this->_user/$this->_exer/$this->_ques";
			if ($this->_lang == "PowerShell") {
				$this->_ipAddress = '10.4.20.74';
				$this->_remotepath = "C:\\output\\$this->_user\\$this->_exer\\$this->_ques";
				$this->_rawcode = $this->_code;
				$this->_code = "function myFunction 
				{
					$this->_code
				
				}
				start-transcript -path $this->_remotepath\\output.txt
				myFunction
				stop-transcript
				";
			}
			else {
				$this->_ipAddress = '10.4.20.73';
			}

			$this->_con = ssh2_connect($this->_ipAddress, 22);
			ssh2_auth_password($this->_con, "compiler", "#Karma2014!");
			$this->_sftp = ssh2_sftp($this->_con);
		}
		else
		if (strlen($lang) > 0) {
			$this->_lang = $lang;
			$this->_user = $_SESSION['username'];
			$this->_exer = $exercise;
			$this->_ques = $question;
			$this->_filepath = "/output/$this->_user/$this->_exer/$this->_ques";
		}
	}

	function preserveData()
	{
		switch ($this->_lang) {
		case "Python":
			$ext = "py";
			break;

		case "C++":
			$ext = "cpp";
			break;

		case "Bash":
			$ext = "sh";
			break;

		case "PowerShell":
			$ext = "ps1";
			break;

		default:
			break;
		}

		$returnValue = array();
		if ($this->_lang == "PowerShell") {
			$oldCode = fopen("$this->_filepath/rawcode.$ext", "r");
			$returnValue[0] = fread($oldCode, filesize("$this->_filepath/rawcode.$ext"));
		}
		else {
			$oldCode = fopen("$this->_filepath/file.$ext", "r");
			$returnValue[0] = fread($oldCode, filesize("$this->_filepath/file.$ext"));
		}

		fclose($oldcode);
		$oldOutput = fopen("$this->_filepath/output.txt", "r");
		$returnValue[1] = fread($oldOutput, filesize("$this->_filepath/output.txt"));
		fclose($oldOutput);
		return $returnValue;
	}

	function compile()
	{
		switch ($this->_lang) {
		case "Python":
			$ext = "py";
			break;

		case "C++":
			$ext = "cpp";
			break;

		case "Bash":
			$ext = "sh";
			break;

		case "PowerShell":
			$ext = "ps1";
			break;

		default:
			break;
		}

		if (strlen($this->_code) != 0) {
			if (isset($this->_code)) {
				mkdir("$this->_filepath", 0777, true);
				$f = fopen("$this->_filepath/file.$ext", "w");
				fwrite($f, $this->_code);
				fclose($f);
				if ($this->_lang == "PowerShell") {
					$f = fopen("$this->_filepath/rawcode.$ext", "w");
					fwrite($f, $this->_rawcode);
					fclose($f);
				}

				chmod("$this->_filepath/file.$ext", 0777);
			}

			if ($this->_lang == "PowerShell") {
				ssh2_sftp_mkdir($this->_sftp, "$this->_remotepath", 0777, true);
				ssh2_scp_send($this->_con, "$this->_filepath/file.$ext", "$this->_remotepath\\file.$ext", 0777);
			}
			else {
				ssh2_sftp_mkdir($this->_sftp, "$this->_filepath", 0777, true);
				ssh2_scp_send($this->_con, "$this->_filepath/file.$ext", "$this->_filepath/file.$ext", 0777);
			}

			switch ($this->_lang) {
			case "Python":
				ssh2_exec($this->_con, "/usr/bin/timeout 10s /usr/bin/python $this->_filepath/file.py > $this->_filepath/output.txt");
				break;

			case "C++":
				ssh2_exec($this->_con, "/usr/bin/timeout 10s /usr/bin/g++ $this->_filepath/file.cpp -o $this->_filepath/cfile -B /usr/bin/");
				ssh2_exec($this->_con, "/usr/bin/timeout 10s $this->_filepath/cfile > $this->_filepath/output.txt");
				break;

			case "Bash":
				ssh2_exec($this->_con, "/usr/bin/timeout 10s /bin/bash $this->_filepath/file.sh &> $this->_filepath/output.txt");
				break;

			case "PowerShell":
				//shell_exec("sudo /usr/bin/sshpass -p \"#Karma2014!\" /usr/bin/ssh compiler@10.4.20.101 \"powershell -NonInteractive -NoProfile -File C:\\\\output\\\\$this->_user\\\\$this->_exer\\\\$this->_ques\\\\file.ps1\"");
				shell_exec("sudo /usr/bin/sshpass -p \"#Karma2014!\" /usr/bin/ssh compiler@10.4.20.74 \"powershell -NonInteractive -NoProfile -File C:\\\\runscript.ps1 C:\\\\output\\\\$this->_user\\\\$this->_exer\\\\$this->_ques\\\\file.ps1\"");
				break;

			default:
				return "You have an invalid file extention. File must end in one of the following: .py, .cpp, or .sh <br />";
			}

			if ($this->_lang == "PowerShell") {
				$stat = ssh2_sftp_stat($this->_sftp, "$this->_remotepath\\output.txt");
			}
			else {
				$stat = ssh2_sftp_stat($this->_sftp, "$this->_filepath/output.txt");
			}

			if ($stat['size'] < 10000) {
				$returnValue = array();
				if ($this->_lang == "PowerShell") {
					ssh2_scp_recv($this->_con, "$this->_remotepath\\output.txt", "$this->_filepath/output.txt");
					shell_exec("/bin/grep -v \"Username\\\|RunAs User\\\|Machine\\\|Host Application\\\|Process ID\\\|PSVersion\\\|PSEdition\\\|PSCompatibleVersions\\\|CLRVersion\\\|BuildVersion\\\|WSManStackVersion\\\|PSRemotingProtocolVersion\\\|SerializationVersion\\\|output file\" $this->_filepath/output.txt > $this->_filepath/output2.txt");
					shell_exec("/bin/grep -v \"\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\*\\\|Windows PowerShell transcript\\\|Start time\\\|End time\" $this->_filepath/output2.txt > $this->_filepath/output1.txt && mv $this->_filepath/output1.txt $this->_filepath/output.txt");
				}
				else {
					ssh2_scp_recv($this->_con, "$this->_filepath/output.txt", "$this->_filepath/output.txt");
				}

				$checkOutput = fopen("$this->_filepath/output.txt", "r") or die("Unable to open file! <br />");
				$returnValue[0] = fread($checkOutput, filesize("$this->_filepath/output.txt"));
				fclose($checkOutput);
				if ($this->_lang == "PowerShell") {
					$displayOutput = fopen("$this->_filepath/output2.txt", "r") or die("Unable to open file! <br />");
					$returnValue[1] = fread($displayOutput, filesize("$this->_filepath/output2.txt"));
					fclose($displayOutput);
				}

				return $returnValue;
			}
			else {
				ssh2_sftp_unlink($this->_sftp, "$this->_filepath/output.txt");
				return "Output is too large or invalid. Do not try to break this with infinite loops or large outputs.";
			}
		}
		else {
			return "Please enter code to be submitted.";
		}

		return true;
	}
}

?>

