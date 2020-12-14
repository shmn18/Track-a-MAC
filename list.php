<?php
  include('config.php');
 
   $sql =<<<EOF
      SELECT * from List;
EOF;

   $result = $db->query($sql);
   while($row = $result->fetchArray(SQLITE3_ASSOC) ) {
      echo $row['ip'] . '|' . $row['VLANS'] . '|' . $row['port'] . '|' . $row['MACS'] . "\n";
   }
   
   $db->close();
?>

