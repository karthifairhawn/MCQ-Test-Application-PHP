<?php

session_start();

if(isset($_POST['name'])){
$_SESSION['u_name']=$_POST['u_name'];
$_SESSION['name']=$_POST['name'];
header('Location:testlist.php');
}elseif(isset($_SESSION['name'])){
    header('Location:testlist.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="index.php">
        <label>Name :</label> <input type="text" name="name" placeholder="name"><br>
        <label>Username :</label> <input type="text" name="u_name" placeholder="username"></br>
        <input type="submit">
    </form>

</body>
</html>