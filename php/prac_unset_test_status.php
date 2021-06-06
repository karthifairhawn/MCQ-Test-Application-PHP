<?php 




session_start();

$_SESSION['test']= "inactive";
header("Location: ../practice.php");

?>