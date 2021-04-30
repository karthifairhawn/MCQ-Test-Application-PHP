<?php

include '../conn.php';

$unanswered_questions = 0;
$answered_questions = 0;
$total_marks = 0;

$testname = $_GET['testname'];
$attempt  = $_GET['attempt'];
$u_name   = $_GET['username'];

$select_test_data_query = "SELECT * from attempts where user_id='".$u_name."' and attempt=".$attempt." and test_name='".$testname."'";
$test_data = mysqli_query($conn,$select_test_data_query);
$row = mysqli_fetch_assoc($test_data)){

foreach($myarray as $key=>$value)
{
    if(is_null($value) || $value == '')
        unset($myarray[$key]);
}














?>
