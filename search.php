<?php
include_once('config.php');

if (empty($_GET)) {
    echo "It is False";
    }
else {
    $search = htmlspecialchars($_GET["mac"]);
    $sql = <<<EOF
              SELECT * FROM List WHERE MACS LIKE "%$search%" ORDER BY MACS;
EOF;
    $output = $db->query($sql);
    $data = array(); 
    while($row = $output->fetchArray(SQLITE3_ASSOC) ){
         #echo $row[1]. "|" . $row[2] . "|" . $row[3] . "|" . $row[4] . "\n";
         $data[] = $row['IP']. " | " . $row['VLANs'] . " | " . $row['PORT'] . " | " . "$search";
     
    }

$flag = count($data);
if($flag ==0){
    $count = $db->query('SELECT count(*) FROM info');
    while($check = $count->fetchArray(SQLITE3_ASSOC)) {
        $no_of_devices = $check['count(*)'];
        echo "We found no match in $no_of_devices devices"."\n";
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
