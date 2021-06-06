<?php 

include '../php/conn.php';


$class="";
$subject="";
$name="";
$timeout="";
$ans_pdf="";
$chapter="";
$type="";

if(isset($_POST["class"])){
    $class=$_POST["class"];
    $subject=$_POST["subject"];
    $name=$_POST["name"];
    $timeout=$_POST["timeout"];
    $ans_pdf=$_POST["ans_pdf"];
    $chapter=$_POST["chapter"];
    $type=$_POST["type"];

    $query="INSERT INTO `test`(`class`, `subject`, `name`, `timeout`, `ans_pdf`, `chapter`,`type`) VALUES ('$class', '$subject', '$name', '$timeout', '$ans_pdf', '$chapter','$type')";
    echo $query;
    mysqli_query($conn,$query);
    
    
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
    <form method="post" action=insert_test.php>
        <input type="text" name="class" placeholder="class"><br>
        <input type="text" name="subject" placeholder="subject"><br>
        <input type="text" name="name" placeholder="name"><br>
        <input type="text" name="timeout" placeholder="timeout"><br>
        <input type="text" name="ans_pdf" placeholder="ans_pdf"><br>
        <input type="text" name="chapter" placeholder="chapter"><br>
        <input type="text" name="type" placeholder="type"><br>
        <input type="submit"><br>
    </form>
</body>
</html>