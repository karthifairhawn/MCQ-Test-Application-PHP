<?php
session_start();

if($_SESSION['test']=="inactive"){
    header("Location: ../../mocktest.php");
}
include '../conn.php';
if(isset($_GET['name'])){    
    $u_name   = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    $name= mysqli_real_escape_string($conn, $_GET['name']);
    $attempt =  mysqli_real_escape_string($conn, $_SESSION['attempt']);
    $data = mysqli_query($conn,"Select * from questions where name='$name' order by ques_no asc");
    

    
    $result='<a href="#" style="display:block;" >Total Questions :<span id="total-ques">'.mysqli_num_rows($data).'</span></a>
            <a href="#  " style="display:block; padding:0px 15px;" >Attempt :<span id="curr-attempt">'.$attempt.'</span></a>';

    $u_name = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    $cat=[];
            
            
    

    while($row = mysqli_fetch_assoc($data)){

        
        if(!(in_array($row['category'], $cat))){
            $curr_cat = $row['category'];
            array_push($cat, $curr_cat);
            $result.= '<a href="#" style="display:block; padding:4px 15px; color:white;text-transform: uppercase;" class="btn btn-success" id="'.strtoupper($row['category']).'">'.$row['category'].'</a>';
        }
        
        $ques_no=$row['ques_no'];
        $update_all_answ_to_zero_query = "update attempts set answer$ques_no=0 where ((test_name='$name' and user_id='$u_name') and attempt=$attempt)";
        
        if($ques_no==0) $ques_no=1;        
        
        if($_SESSION['resume']==0) $update_all_answ_to_zero = mysqli_query($conn,$update_all_answ_to_zero_query);            
                                    
        $result.='<a href="#" onclick="load_question('.$ques_no.',true)" id="question-indicator'.$ques_no.'" class="ques" style="width:3rem;">'.$ques_no.'</a>';
    }
    echo $result;
}

?>