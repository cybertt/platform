<?php		
	
set_time_limit(0);
$name = "kali";

shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@scvmm-manager.n57.net \"c:\\\\getid.bat $name\"");
shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/scp cbrown@scvmm-manager.n57.net:C:\\\\Users\\\\Public\\\\$name.txt /tmp/$name.txt");
$myvar = shell_exec("cat /tmp/$name.txt");
//var_dump($myvar);
$myvar = preg_replace("/[^a-zA-Z0-9,\-]/", "", $myvar);
preg_match_all('/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/m', $myvar, $matches);
//echo "<br>";
//var_dump($myvar);
echo $matches[0][0];

//Id             : 959ababe-3227-4f2a-b5c3-a5d9a2b85596

?>
