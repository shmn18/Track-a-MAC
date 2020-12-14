<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('Probed_Database.sqlite3');
      }
   }
 $db = new MyDB();
 if(!$db) {
    echo $db->lastErrorMsg();
 }else {
    echo "Created database successfully\n";
 }


$sq1 =<<<EOF

   CREATE TABLE IF NOT EXISTS List(ip varchar not null,VLANS varchar not null,port varchar,MACS  varchar);
EOF;
$ret = $db->exec($sq1);
if(!$ret){
  echo $db->lastErrorMsg();
}
$sql =<<<EOF

     CREATE TABLE IF NOT EXISTS Listdevs(ip varchar not null,port varchar not null,community string not null,version varchar not null,First_probetime varchar null,Latest_probetime varchar null,Failed_attempts int default 0 not null);

EOF;


   $ret1 = $db->exec($sql);

   if(!$ret1){

      echo $db->lastErrorMsg();

   }
