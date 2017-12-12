<?php

// Initialize session

session_start();

function authenticate($user, $password)
{
	if (empty($user) || empty($password)) return false;

	//	$uname = $_POST['username'];
	// Active Directory server

	$ldap_host = "dc.nioc.local";

	// Active Directory DN

	$ldap_dn = "CN=Users,DC=nioc,DC=local";

	// Active Directory user group

	$ldap_user_group = "Domain Users";

	// Active Directory manager group

	$ldap_manager_group = "Content Creators";

	// Domain, for purposes of constructing $user

	$ldap_usr_dom = '@nioc.local';

	// connect to active directory

	$ldap = ldap_connect($ldap_host);

	// verify user and password

	if ($bind = @ldap_bind($ldap, $user . $ldap_usr_dom, $password)) {

		// valid
		// check presence in groups

		$filter = "(sAMAccountName=" . $user . ")";
		$attr = array(
			"memberof", "displayname"
		);
		$result = ldap_search($ldap, $ldap_dn, $filter, $attr) or exit("Unable to search LDAP server");
		$entries = ldap_get_entries($ldap, $result);
		ldap_close($ldap);
		ldap_unbind($ldap);

		// check groups
		// this will not work because domain users cannot query the memberof attribute

		foreach($entries[0]['memberof'] as $grps) {

			// Check for match inside string

			$pos = strpos($grps, "Content Creators");

			// For debugging purposes
			// var_dump($pos); echo "<br />";
			// If match not found, assign basic rights

			if ($pos > 0) {
				echo "INFO: user has Admin<br />";
				$access = 2;
				ldap_close($ldap);
				ldap_unbind($ldap);
				break;

				// Otherwise, match must have been made, assign admin rights

			}
			else {
				echo "INFO: user has nothing<br />";
				$access = 1;
				ldap_close($ldap);
				ldap_unbind($ldap);

				// break;

			}
		}

		$uname1 = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $user));
		$servername = "localhost";
		$username1 = "root";
		$password1 = "#Karma2014!";
		$dbname = "test";
		$conn = new mysqli($servername, $username1, $password1, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// create table if not exist

		if ($entries[0]['dn'] != NULL) {
			$sql = "CREATE TABLE IF NOT EXISTS $uname1 ( exercise varchar(255), score varchar(255) )";
			setcookie("username", $uname1);
			$_SESSION['username'] = $uname1;
			$_SESSION['fullname'] = $entries[0]['displayname'][0];
			setcookie("fullname", $entries[0]['displayname'][0]);
			if ($conn->query($sql) === TRUE) {
				echo "Table $uname1 created successfully";
			}
			else {
				echo "Error creating table: " . $conn->error;
			}

			$conn->close();
		}

		// set access based on group membership (broken)

		if ($access == NULL) {
			$access = 1;
		}

		if ($access != 0) {

			// establish session variables

			$_SESSION['user'] = $user;
			$_SESSION['access'] = $access;
			setcookie("access", $access);
			return true;
		}
		else {

			// user has no rights

			return false;
		}
	}
	else {

		// invalid name or password

		return false;
	}
}

?>
