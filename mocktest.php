<?php

session_start();
$user_id = $_SESSION['user-id'];
include "php/conn.php";

$user_data = mysqli_query($conn, "SELECT * from student where id=$user_id");
$user_data = mysqli_fetch_assoc($user_data);



$_SESSION['u_name']=$user_data['username'];
$_SESSION['name']=$user_data['name'];
$_SESSION['course']=$user_data['course'];
$_SESSION['paid']=$user_data['paid'];
$_SESSION['year']=$user_data['year'];



header ("Location: testlist.php");


?>