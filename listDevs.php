<?php
  include_once('config.php');
   $sql =<<<EOF
      SELECT * from Listdevs;
EOF;

   $result = $db->query($sql);
   while($row = $result->fetchArray(SQLITE3_ASSOC) ) {
     echo $row['ip'] . '|' . $row['port'] . '|' . $row['community'] . '|' . $row['version'] . '|' . $row['First_probetime'] . '|' . $row['Latest_probetime'] . '|' . $row['Failed_attempts'] .  "\n";
   }

$db->close();

?>

