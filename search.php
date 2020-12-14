<?php
include_once('config.php');

if (empty($_GET)) {
    echo "FALSE";
    }
else {
    $mac_addr = htmlspecialchars($_GET["mac"]);
    $sql = <<<EOF
              SELECT * FROM list WHERE MACS LIKE "%$mac_addr%";
EOF;
    $result1 = $db->query($sql);
    $data = array(); 
    while($row = $result1->fetchArray(SQLITE3_ASSOC) ){
         $data[] = $row['ip'] . '|' . $row['VLANS'] . '|' . $row['port'] . '|' . $row['MACS'] . "\n";
     
    }

$count = count($data);
if ($count ==0){
    $result2 = $db->query('SELECT count(*) FROM listDevs');
    while($row1 = $result2->fetchArray(SQLITE3_ASSOC)) {
        $noDevices = $row1['count(*)'];
        echo "Not Found in $noDevices devices"."\n";
     }
}

$result = array_unique($data);
$total = count($result);
$i=0;
while($i<$total){
    echo $result[$i]. "\n";
    $i++;
    }
}
$db->close();

?>
