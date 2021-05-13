<?php 

include '../php/conn.php';



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

    $query = "Insert into questions (ques_no, positive, negative, question, option1, option2, option3, option4, hint, answer, name) 
    values ($question_no,$positive_mark,$negative_mark,'$question', '$option1', '$option2', '$option3', '$option4', '$hint', '$answer', '$test_name')";

    mysqli_query($conn, $query);
    $question_no++;
    
}












?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Questions</title>
</head>
<body>
    <form method="post" action=insert.php>
        <input type="text" name="test_name" placeholder="test_name" value="<?php echo $test_name ?>"><br>
        <input type="text" name="question_no" placeholder="ques-no" value="<?php echo $question_no ?>"><br>
        <input type="text" name="question" placeholder="ques" value="<?php echo $question; ?>" ><br>
        <input type="text" name="option1" placeholder="option1" value="<?php echo $option1; ?>" ><br>
        <input type="text" name="option2" placeholder="option2" value="<?php echo $option2; ?>" ><br>
        <input type="text" name="option3" placeholder="option3" value="<?php echo $option3; ?>" ><br>
        <input type="text" name="option4" placeholder="option4" value="<?php echo $option4; ?>" ><br>
        <input type="text" name="positive_mark" placeholder="positive_mark" value="<?php echo $positive_mark ?>"><br>
        <input type="text" name="negative_mark" placeholder="negative_mark" value="<?php echo $negative_mark ?>"><br>
        <input type="text" name="hint" placeholder="hint" value="<?php echo $hint ?>"><br>
        <input type="text" name="answer" placeholder="answer"><br>
        <input type="submit"><br>
    </form>
</body>
</html>