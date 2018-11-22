<?php

$con=mysqli_connect("127.0.0.1:3310","root","","ecommerce");
if (mysqli_connect_errno())		//default function
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>