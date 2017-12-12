<?php
set_time_limit(0);
$name=$_GET['name'];
$vm=$_GET['vm'];



if (strlen($name)>1 && strlen($vm)>1){	
switch ($vm) {
	case "ubuntu":
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@scvmm-manager.n57.net \"c:\\\\deploy-ubuntu.bat $name\"");
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/scp cbrown@scvmm-manager.n57.net:C:\\\\users\\\\public\\\\$name.txt /tmp/$name.txt");
		$vmid = shell_exec("/bin/sed -n '4'p /tmp/$name.txt");
		$vmid = preg_replace("/[^a-zA-Z0-9,\-]/", "", $vmid);
		$_SESSION['myvm'] = $vmid;
		break;
	case "centos":
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@scvmm-manager.n57.net \"c:\\\\deploy-centos.bat $name\"");
		break;	
	case "server-2016":
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@scvmm-manager.n57.net \"c:\\\\deploy-server-2012.bat $name\"");
		break;
	case "solaris":
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@scvmm-manager.n57.net \"c:\\\\deploy-solaris.bat $name\"");
		break;
	case "win7":
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@scvmm-manager.n57.net \"c:\\\\deploy-win7.bat $name\"");
		break;
	case "workstation":
		shell_exec("sudo sshpass -p \"#Karma2014!\" /usr/bin/ssh cbrown@scvmm-manager.n57.net \"c:\\\\deploy-workstation.bat $name\"");
		break;
	}
}


if (strlen($vmid) < 1) {
$vmid=$_SESSION['myvm'];
	if (strlen($vmid) < 1) {
		$vmid = "ae1dc237-8b67-4412-a7b1-af961c2aba2a";
	}
}

?>
<button onclick="document.all.resetframe.src='https://training.n57.net/changenetwork.php?network=internet&vmid=<?php echo $vmid; ?>'" type="button" class="btn btn-danger" style="float:right; margin:0px 60px 0px 0px; ">Internet</button>

<button onclick="document.all.resetframe.src='https://training.n57.net/changenetwork.php?network=offense&vmid=<?php echo $vmid; ?>'" type="button" class="btn btn-danger" style="float:right; margin:0px 60px 0px 0px; ">Offense</button>

<button onclick="document.all.resetframe.src='https://training.n57.net/changenetwork.php?network=defense&vmid=<?php echo $vmid; ?>'" type="button" class="btn btn-danger" style="float:right; margin:0px 60px 0px 0px; ">Defense</button>



<button onclick="document.all.resetframe.src='https://training.n57.net/vmreset.php?VMID=<?php echo $vmid; ?>'" type="button" class="btn btn-danger" style="float:right; margin:0px 60px 0px 0px; ">Reset Workstation</button>

<iframe src="http://gateway.n57.net:8000/deploy.html#<?php echo $vmid; ?>;abc123+dsfsd+sdfs" scrolling=no style="padding:0px; margin:auto; border:none; width:100%; height:1024px; text-align:center; "> </iframe>

<iframe width="1px" height="1px" style="visibility:hidden" id="resetframe" ></iframe>
