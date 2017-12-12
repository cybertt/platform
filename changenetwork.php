<?php
$network=$_GET['network'];
$vmid=$_GET['vmid'];

echo $vmid;
echo $network;

if (strlen($vmid)>1 && strlen($network)>1){	
switch ($network) {
	case "internet":
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@hv-3.n57.net \"c:\\\\internet.bat $vmid\"");
		break;
	case "offense":
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@hv-3.n57.net \"c:\\\\offense.bat $vmid\"");
		break;
	case "defense":
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@hv-3.n57.net \"c:\\\\defense.bat $vmid\"");
		break;
	}
}
?>