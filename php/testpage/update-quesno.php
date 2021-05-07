<?php
session_start();
include '../conn.php';
if(isset($_GET['name'])){    
    $name= mysqli_real_escape_string($conn, $_GET['name']);
    $attempt =  mysqli_real_escape_string($conn, $_SESSION['attempt']);
    $data = mysqli_query($conn,"Select * from questions where name='$name'");
    $result='<a href="#" style="display:block;" >Total Questions :<span id="total-ques">'.mysqli_num_rows($data).'</span></a>
            <a href="#" style="display:block; padding:0px 15px;" >Attempt :<span id="curr-attempt">'.$attempt.'</span></a>';
    $ques_no = 1;
    $u_name = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    if($ques_no==1){
        $ques_no = 0;
    }
    while($row = mysqli_fetch_assoc($data)){
        $update_all_answ_to_zero_query = "update attempts set answer$ques_no=0 where ((test_name='$name' and user_id='$u_name') and attempt=$attempt)";
        if($ques_no==0){
            $ques_no=1;
        }
        $update_all_answ_to_zero = mysqli_query($conn,$update_all_answ_to_zero_query);
        $result.='<a href="#" onclick="load_question('.$ques_no.',true)" id="question-indicator'.$ques_no.'" class="ques">'.$ques_no.'</a>';
        $ques_no++;
    }
    echo $result;
}

?>