<?php
$VMID = $_GET['VMID'];
shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@hv-3.n57.net \"c:\\\\resetvm.bat $VMID\"")	
?>