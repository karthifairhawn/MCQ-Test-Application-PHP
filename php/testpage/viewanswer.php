<?php


session_start();

if($_GET['testname']==""){
    header("Location: ../../mocktest.php");
}
include '../conn.php';

$answer_name=$_GET['answer_name'];
$u_name = $_SESSION['u_name'];
$testname = $_GET['testname'];


date_default_timezone_set('Asia/Kolkata');
$date= date('d-m-Y H:i');

$ques_rev = mysqli_query($conn, "select ques_rev from attempts where user_id='$u_name' and test_name='$testname' and attempt=1");
$ques_rev = mysqli_fetch_assoc($ques_rev);
$ques_rev = $ques_rev['ques_rev'];

if($ques_rev == 0){
    mysqli_query($conn, "update attempts set ques_rev=1,initial_rev_date='$date' where test_name='$testname' and user_id='$u_name'" );
}else{
    mysqli_query($conn, "update attempts set ques_rev=1,final_rev_date='$date' where test_name='$testname' and user_id='$u_name'" );
}






?>


<html>
  <head>
    <title>Answers</title>
  </head>
  <body>
    <embed src="../../assets/question-image/<?php echo $answer_name; ?>" width="100%" height="100%" type="application/pdf">
  
  </body>
</html>