<?php
session_start();
$user_id = $_SESSION['u_name'];
$attempt = $_SESSION['attempt'];
include '../conn.php';
$quesno = $_GET['quesno'];
if($quesno == 1){
    $quesno = 0;
}
$quesno = "answer".$quesno;

$ans = $_GET['answer'];
$update_db_answer_query = "update attempts set $quesno=$ans where (user_id='$user_id' and attempt=$attempt)";
$update_db_answer = mysqli_query($conn, $update_db_answer_query);
?>