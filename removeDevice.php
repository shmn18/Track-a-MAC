<?php
include_once('config.php');
$ip = $_GET['ip'];
$port = $_GET['port'];
$community = $_GET['community'];
$version = $_GET['version'];
if(empty($ip) || empty($port)||empty($community) || empty($version)) {
	echo "FALSE";
}
else {		
	$remove = $db->exec("DELETE FROM LISTDEVS WHERE ip='$ip' AND port='$port' AND community='$community' AND version='$version'");
	if(!$remove) {
		echo "false";
	}
	else {
		echo "ok";
	}	
}
$db->close();

?>
