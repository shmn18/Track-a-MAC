<?php
include('config.php');

if (empty($_GET)){
	echo "No Data";
    }
else{

	$ip = $_GET["ip"];
	$port = $_GET['port'];
	$community = $_GET['community'];
	$version = $_GET['version'];

	
	$check = $db->query("SELECT * FROM info WHERE IP='$ip'");
	while($i = $check->fetchArray(SQLITE3_ASSOC)){
		
			
		if ($i['IP'] != $ip) {
			echo 'IP not gupnp_root_device_get_available(root_device)';
		}
		else{
			$sql1 =<<<EOF
			DELETE FROM info WHERE IP = '$ip';
EOF;
			$run1 = $db->exec($sql1);
			
			if(!$run1){
				echo "Oops! cannot remove the ip";
			}
			else{
				echo "Device is removed successfully";
			}		}
	}

}

$db->close();

?>
