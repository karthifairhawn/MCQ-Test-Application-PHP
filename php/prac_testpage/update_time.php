<?php

session_start();
if($_SESSION['test']=="inactive"){
    header("Location: ../../mocktest.php");
}
include '../conn.php';
if(isset($_GET['name'])){
    $name= mysqli_real_escape_string($conn, $_GET['name']);
    $userid = $_SESSION['u_name'];
    $attempt = $_SESSION['attempt'];
    $query="Select countdown from prac_attempts where test_name='$name' and user_id='$userid' and attempt=$attempt";
    $data = mysqli_query($conn,$query);
    $data_result = mysqli_fetch_assoc($data);
    
    
    echo $data_result['countdown'];
    

}
?>
