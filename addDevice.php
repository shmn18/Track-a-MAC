<?php

include_once('config.php');

$ip = $_GET['ip'];
$port = $_GET['port'];
$community = $_GET['community'];
$version = $_GET['version'];

if(empty($ip) || empty($port)||empty($community) || empty($version)) {
	echo "FALSE";
}


else{		
	$db->exec("INSERT INTO listDevs (ip,port,community,version) VALUES ('$ip','$port','$community','$version')");
		echo "OK";
	}
$db->close();

