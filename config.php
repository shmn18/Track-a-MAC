
<?php
class data_base extends SQLite3 {
      function __construct() {
         $this->open('mydatabase.db');
      }
}
$db = new data_base();


$res = $db->exec('CREATE TABLE IF NOT EXISTS List(IP varchar not null, VLANs varchar not null, PORT varchar, MACS varchar)');
if(!$res){
   echo $db->lastErrorMsg(); #Error for SQL fail 
}

$res = $db->exec('CREATE TABLE IF NOT EXISTS info(IP varchar not null,PORT varchar not null,COMMUNITY string not null ,VERSION varchar not null, FIRST_PROBE varchar, LATEST_PROBE varchar null, FAILED_ATTEMPTS int default 0 not null)');
   if(!$res){
      echo $db->lastErrorMsg();
   }

?>
