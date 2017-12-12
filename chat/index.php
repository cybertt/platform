<?php

    session_start();

    if (isset($_SESSION['username'])): 
    
      require_once("dbcon.php");
	  
	  
	$username = $_SESSION['username'];
	
	if (checkVar($username)) {
	
		$getUsers = "SELECT *
					 FROM chat_users
					 WHERE username = '$username'";
		
		if (!hasData($getUsers)) {
		
			$now = time();
		
			$postUsers = "INSERT INTO `chat_users` (
					`id` ,
					`username` ,
					`status` ,
					`time_mod`
					)
					VALUES (
					NULL , '$username', '1', '$now'
					)";
					
			mysql_query($postUsers);

	
		} 

	}
  
      $name = "N57";

      $getRooms = "SELECT *
  			           FROM chat_rooms
  		             WHERE name = '$name'";
  		         
      $roomResults = mysql_query($getRooms);
		
        	
      while ($rooms = mysql_fetch_array($roomResults)) {
          $file =  $rooms['file'];
      }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Welcome to: <?php echo $name; ?></title>
    
    <link rel="stylesheet" type="text/css" href="main.css"/>
    
    <script src="jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
    	var chat = new Chat('<?php echo $file; ?>');
    	chat.init();
    	chat.getUsers(<?php echo "'" . $name ."','" .$_SESSION['username'] . "'"; ?>);
    	var name = '<?php echo $_SESSION['username'];?>';
    </script>
    <script type="text/javascript" src="settings.js"></script>

</head>

<body>

    <div id="page-wrap"> 
			<div id="chat-wrap">
                <div id="chat-area"></div>
			</div>
                
                <form id="send-message-area" action="">
                    <textarea style="overflow:hidden; " id="sendie" maxlength='100'></textarea>
                </form>

    </div>
        
</body>

</html>

<?php
    else:
    endif; 
?>
