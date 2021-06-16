<?php
$user='root';
$pass='';
$db='bankdbs';

  $conn = mysqli_connect('localhost',$user,$pass,$db);

  if(!$conn){
    die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
  }

?>