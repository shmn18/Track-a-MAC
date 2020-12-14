<?php
  include('config.php');

if (empty($_GET)) {
    echo "FALSE";
    }
else {
    $mac_addr = htmlspecialchars($_GET["mac"]);
    $sql = <<<EOF
              SELECT * FROM List WHERE MACS LIKE "%$mac_addr%";
EOF;
    $result1 = $db->query($sql);
    while($row = $result1->fetchArray(SQLITE3_ASSOC) ){
         $var = echo $row['ip'] . '|' . $row['VLANS'] . '|' . $row['port'] . '|' . $row['MACS'] . "\n";
     
    }

$count = count($var);
if ($count ==0){
    $result2 = $db->query('SELECT count(*) FROM Listdevs');
    while($row1 = $result2->fetchArray(SQLITE3_ASSOC)) {
        $noDevices = $row1['count(*)'];
        echo "Not Found in $noDevices devices"."\n";
     }
}

}
$db->close();

?>

