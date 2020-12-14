<?php
include('config.php');
$ip = $_GET['ip'];
$port = $_GET['port'];
$community = $_GET['community'];
$version = $_GET['version'];
if(empty($ip) || empty($port)||empty($community) || empty($version)) {
echo "FALSE";
}
else{		
$db->exec("DELETE FROM LISTDEVS WHERE ip='$ip' AND port='$port' AND community='$community' AND version='$version'");
echo "OK";	
}
$db=null;
?>
