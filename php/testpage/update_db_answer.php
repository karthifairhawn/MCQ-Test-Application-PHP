<?php
session_start();

if($_SESSION['test']=="inactive"){
    header("Location: ../../mocktest.php");
}
include '../conn.php';
$user_id = mysqli_real_escape_string($conn, $_SESSION['u_name']);
$attempt = mysqli_real_escape_string($conn, $_SESSION['attempt']);
$test_name = mysqli_real_escape_string($conn, $_SESSION['test_name']);


$quesno = mysqli_real_escape_string($conn, $_GET['quesno']);
if($quesno == 1){
    $quesno = 0;
}
$quesno = "answer".$quesno;

$ans = mysqli_real_escape_string($conn, $_GET['answer']);
$update_db_answer_query = "update attempts set $quesno=$ans where (user_id='$user_id' and attempt=$attempt and test_name='$test_name')";
$update_db_answer = mysqli_query($conn, $update_db_answer_query);
?>