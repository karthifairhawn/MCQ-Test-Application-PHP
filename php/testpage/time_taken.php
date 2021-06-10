<?php
session_start();
include '../conn.php';

$time_taken = "time_taken".$_GET['ques_no'];
$time_taken_val = $_GET['tt'].'-'.'0';
$attempt = $_SESSION['attempt'];
$test_name = $_SESSION['test_name'];
$u_name = $_SESSION['u_name'];
$query ="UPDATE attempts set $time_taken='$time_taken_val' where attempt=$attempt and test_name='$test_name' and user_id='$u_name'";
echo $query;
mysqli_query($conn,$query);

?>