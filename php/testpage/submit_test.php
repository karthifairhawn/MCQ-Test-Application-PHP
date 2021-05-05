<?php

include '../conn.php';

$total_questions = 0;
$unanswered_questions = 0;
$answered_questions = 0;
$correct_answers = 0;
$wrong_answers = 0;
$total_marks = 0;

$testname = $_GET['testname'];
$attempt  = $_GET['attempt'];
$u_name   = $_GET['username'];

$select_test_data_query = "SELECT * from attempts where user_id='$u_name' and attempt=$attempt and test_name='$testname'";
$select_org_answer_query = "SELECT answer,positive,negative from questions where name='$testname'";
$test_data = mysqli_query($conn,$select_test_data_query);
$org_answer = mysqli_query($conn,$select_org_answer_query);
$row = mysqli_fetch_assoc($test_data);
$org_answer_array=[];

while ($i = mysqli_fetch_assoc($org_answer)){
    $i = array_values($i);
    array_push($org_answer_array,$i);
}
$i=0;
foreach($row as $key=>$value)
{
    unset($row[$key]);
    $i++;
    if($i==11){
        break;
    }
}
foreach($row as $key=>$value)
{
    if(is_null($value) || $value == '')
        unset($row[$key]);
}
$row = array_values($row);
$total_questions = sizeof($row);

foreach($row as $value){
    if($value == 0){
        $unanswered_questions++;
    }else{
        $answered_questions++;
    }

}

$i=0;



while($i < $total_questions){
    if($row[$i] == $org_answer_array[$i][0]){

        $total_marks+=$org_answer_array[$i][1];
        $correct_answers++;
    }elseif($row[$i] == 0){
        $total_marks=$total_marks;
    }else{
        $total_marks+=$org_answer_array[$i][2];
        $wrong_answers++;
    }
    $i++;
}

echo $total_marks;

$submit_result_query = "update attempts set total_questions=$total_questions, unanswered_questions=$unanswered_questions, answered_questions=$answered_questions,
                total_marks=$total_marks, wrong_answers=$wrong_answers,correct_answers=$correct_answers where user_id='$u_name' and attempt=$attempt and test_name='$testname'";
$submit_result = mysqli_query($conn,$submit_result_query);































?>
