<?php
session_start();
include '../conn.php';

$rem=$_GET['time'];
$rem++;


$user_id = $_SESSION['u_name'];
$test_name = $_SESSION['test_name'];
$attempt = $_SESSION['attempt'];
$query = "update prac_attempts set countdown='$rem' where user_id='$user_id' and attempt=$attempt and test_name='$test_name'";
mysqli_query($conn,$query);

?>