<?php
class Upload

{
	private $_file;
	private $_name;
	private $_folder;
	private $_user;
	private $_submission;
	function __construct($filetoupload, $filename, $foldertocreate, $username)
	{
		if (isset($filetoupload) && isset($username) && isset($foldertocreate) && isset($filename)) {
			$this->_user = $username;
			$this->_folder = "./submissions/" . $username . "/" . $foldertocreate;
			$this->_name = $filename;
			$this->_file = $filetoupload;
			$this->_submission = $this->_folder . "/" . $this->_name;
		}
		else {
			echo "Must select a file to upload!";
		}
	}

	public

	function TakeSubmission()
	{
		if (!is_dir('$this->_folder')) {
			mkdir("$this->_folder", 0777, true);
		}

		move_uploaded_file($this->_file["tmp_name"], "$this->_submission");
		return true;
	}
}

?>
