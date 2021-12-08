<?php

session_start();
// if($_SESSION['test']=="inactive")   header("Location: ../../mocktest.php");

include '../conn.php';

$total_questions = 0;
$unanswered_questions = 0;
$answered_questions = 0;
$correct_answers = 0;
$wrong_answers = 0;
$total_marks = 0;

$testname = mysqli_real_escape_string($conn, $_GET['testname']);
$attempt  = mysqli_real_escape_string($conn, $_GET['attempt']);
$u_name   = mysqli_real_escape_string($conn, $_GET['username']);

// if(isset($_GET['timeout'])){
//     $timeout= $_GET['timeout'];
// }else{
//     $timeout = mysqli_query($conn,"Select timeout from test where name='$testname'");
//     $timeout = mysqli_fetch_assoc($timeout);
//     $timeout = $timeout['timeout'];
// }

$total_questions = "Select * from questions where name='$testname' order by ques_no asc";
$total_questions = mysqli_query($conn,$total_questions);
$total_questions = mysqli_num_rows($total_questions);




$test_data = "SELECT * from attempts where user_id='$u_name' and attempt=$attempt and test_name='$testname'";
$org_answer = "SELECT answer,positive,negative from questions where name='$testname'";

$test_data = mysqli_query($conn,$test_data);
$org_answer = mysqli_query($conn,$org_answer);



$test_data = mysqli_fetch_assoc($test_data);






$i=0;
while($org_answer_row = mysqli_fetch_assoc($org_answer)){    
    if($i=1) $i++;
    $to_get = "answer".$i;      

    if($test_data[$to_get]<=0){ 
        $unanswered_questions++; 
    }else if($test_data[$to_get]==$org_answer_row["answer"]){
        $correct_answers++;
        $total_marks+=$org_answer_row["positive"];
    }else{
        $wrong_answers++;
        $total_marks+=$org_answer_row["negative"];
    }
    $i++;    
}

$answered_questions = $total_questions - $unanswered_questions;






$submit_result_query = "update attempts set total_questions=$total_questions, unanswered_questions=$unanswered_questions, answered_questions=$answered_questions,
                total_marks=$total_marks, wrong_answers=$wrong_answers,correct_answers=$correct_answers where user_id='$u_name' and attempt=$attempt and test_name='$testname'";

echo $submit_result_query;                
$submit_result = mysqli_query($conn,$submit_result_query);





?>
