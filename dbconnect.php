<?php

//Connection to the MYSQL Database:
ini_set("error_reporting", E_ALL & ~E_DEPRECATED);
$conn=mysqli_connect("localhost","root","","brainyco") or die(mysql_error());

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



?>