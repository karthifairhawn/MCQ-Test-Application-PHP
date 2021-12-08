<?php

session_start();
$user_id = $_SESSION['user-id'];
include "php/conn.php";

$_SESSION['u_name']='karthifairhawn';
$_SESSION['name']='Karthi Fair Hawn';
$_SESSION['course']='PCB';
$_SESSION['paid']=1;

$_SESSION['year']=2021;
$_SESSION['test']='inactive';


header ("Location: testlist.php");


?>