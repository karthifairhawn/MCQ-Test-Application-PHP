<?php
session_start();

if($_SESSION['test']=="inactive"){
    header("Location: ../../mocktest.php");
}
include '../conn.php';
if(isset($_GET['name'])){    
    $u_name   = $_SESSION['u_name'];
    $name= mysqli_real_escape_string($conn, $_GET['name']);
    $attempt =  mysqli_real_escape_string($conn, $_SESSION['attempt']);
    $data = mysqli_query($conn,"Select * from questions where name='$name' order by ques_no asc");
    

    
    $result='<a href="#" style="display:block;" >Total Questions :<span id="total-ques">'.mysqli_num_rows($data).'</span></a>
            <a href="#" style="display:block; padding:0px 15px;" >Attempt :<span id="curr-attempt">'.$attempt.'</span></a>';
    $ques_no = 1;
    $u_name = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    if($ques_no==1){
        $ques_no = 0;
    }
            $cat=[];
            
    $select_test_data_query = "SELECT * from attempts where user_id='$u_name' and attempt=$attempt and test_name='$name'";
    $select_test_data_query = mysqli_query($conn,$select_test_data_query);
    $select_test_data_query =mysqli_fetch_assoc($select_test_data_query);

    

    
    
    $test_data_del_iterator=0;
    foreach($select_test_data_query as $key=>$value)
        {
            unset($select_test_data_query[$key]);
            
            $test_data_del_iterator++;
            if($test_data_del_iterator==15){
                break;
            }
        }

            
    $select_test_data_query = array_values($select_test_data_query);
    $test_data_active_iterator = 0;
    while($row = mysqli_fetch_assoc($data)){
        $ques_no=$row['ques_no'];
        $answered_html="";


        if($select_test_data_query[$test_data_active_iterator]!=0 and $select_test_data_query[$test_data_active_iterator]!=-1)      $answered_html="answered";
        elseif($select_test_data_query[$test_data_active_iterator]==-1)                                                             $answered_html="unanswered";
        

        
        if(!(in_array($row['category'], $cat))){
            $curr_cat = $row['category'];
            array_push($cat, $curr_cat);
            $result.= '<a href="#" style="display:block; padding:4px 15px; color:white;text-transform: uppercase;" class="btn btn-success" id="'.strtoupper($row['category']).'">'.$row['category'].'</a>';

        }
        
        

        if($ques_no==0) $ques_no=1;
        

        $result.='<a href="#" onclick="load_question('.$ques_no.',true)" id="question-indicator'.$ques_no.'" class="ques '.$answered_html.'" style="width:3rem;">'.$ques_no.'</a>';        
        $test_data_active_iterator++;
    }
    echo $result;
}

?>