<?php 

include 'php/conn.php';



if(isset($_POST['test_name'])){
    print_r($_POST);
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
        <input type="text" name="test_name" placeholder="test_name">
        <input type="text" name="question_no" placeholder="ques-no">
        <input type="text" name="question" placeholder="ques">
        <input type="text" name="option1" placeholder="option1">
        <input type="text" name="option2" placeholder="option2">
        <input type="text" name="option3" placeholder="option3">
        <input type="text" name="option4" placeholder="option4">
        <input type="text" name="positive_mark" placeholder="positive_mark">
        <input type="text" name="negative_mark" placeholder="negative_mark">
        <input type="text" name="hint" placeholder="hint">
        <input type="text" name="answer" placeholder="answer">
        <input type="submit">
    </form>
</body>
</html>