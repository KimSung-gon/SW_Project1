<?php
  $config = array(
    "host" => "localhost",
    "duser" => "root",
    "dpw" => "root1234",
    "dname" => "boardForUniv"
  );
  $conn = mysqli_connect($config['host'], $config['duser'], $config['dpw']);
  mysqli_select_db($conn, $config['dname']);
 ?>
