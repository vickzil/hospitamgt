<?php
session_start();

require 'dbconfig.php';

$userLogin = $_SESSION['acountdetails'];

$dateFormat = date('Y-m-d H:i:s');

$update = "UPDATE logintb SET lastlogoff='$dateFormat', active=0 WHERE acountdetails='$userLogin';";

$updateRun=mysqli_query($con,$update);

if ($updateRun) {

  header("Location: logout");
  
}
