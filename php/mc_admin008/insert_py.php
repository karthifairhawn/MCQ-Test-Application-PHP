<?php 

include '../conn.php';


$test_name ="";
$question_no ="";
$question = "";
$option1 ="";
$option2 = "";
$option3 = "";
$option4 = "";
$positive_mark ="";
$negative_mark ="";
$hint ="";
$answer = "";


if(isset($_POST['test_name'])){
    $test_name = $_POST['test_name'];
    $question_no = $_POST['question_no'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $positive_mark = $_POST['positive_mark'];
    $negative_mark = $_POST['negative_mark'];
    $hint = $_POST['hint'];
    $answer = $_POST['answer'];
    $cat = $_POST['cat'];
    $sol = $_POST['sol'];

    $query = "Insert into questions (ques_no, positive, negative, question, option1, option2, option3, option4, hint, answer, name, category, solution) values ($question_no,$positive_mark,$negative_mark,'$question', '$option1', '$option2', '$option3', '$option4', '$hint', '$answer', '$test_name','$cat','$sol')";
    echo $query;
    
    if(!mysqli_query($conn, $query)){
        echo "not working".mysqli_error($query);
    }
    
    $question_no++;
    
}












?>


