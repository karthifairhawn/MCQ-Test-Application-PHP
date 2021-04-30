<?php

include '../conn.php';
if(isset($_GET['name'])){
    $result="";
    $name=$_GET['name'];
    $data = mysqli_query($conn,"Select * from test where name='$name'");
    $data_result = mysqli_fetch_array($data);
    echo $data_result['timeout'];
}

?>