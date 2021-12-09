<?php


session_start();
include '../conn.php';
$result="";


if(isset($_GET['testname'])){

    $user_id = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    $attempt = mysqli_real_escape_string($conn, $_GET['attempt']);
    $back_url= mysqli_real_escape_string($conn, $_SESSION['attempt_page']);
    
    $u_name = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    $testname=mysqli_real_escape_string($conn, $_GET['testname']);    
    $question_presence_check = mysqli_query($conn,"Select * from questions where name='$testname'");   
    if(mysqli_num_rows($question_presence_check)==0)   header('Location:index.php');
    
    
    
    $user_answer = "SELECT * from attempts where (user_id='$u_name' and attempt=$attempt) and test_name='$testname'";        
    $org_answer = "SELECT * from questions where name='$testname'";
    
    $user_answer = mysqli_query($conn,$user_answer);    
    $org_answer = mysqli_query($conn,$org_answer);

    
    $user_answer = mysqli_fetch_assoc($user_answer);
    $total_questions = $user_answer['total_questions'];






    // $org_answer = [];

    // while($row = mysqli_fetch_assoc($org_answer_q)){
    //     $temp = array_values($row);
    //     array_push($org_answer,array_values($temp));
    // }

    // foreach($user_answer as $key=>$value)
    // {
    //     if(is_null($value) || $value == '') unset($user_answer[$key]);
    // }

    
    // $i=0;

    // while($i<15 ){
    //     array_shift($user_answer);
    //     $i++;
    // }    
    // $user_answer = array_values($user_answer);


    $i=0;
    $ques_no=0;
    while($org_answer_row = mysqli_fetch_assoc($org_answer)){
        
        
        $view_soln_test ="View Solution";
        $ques_no_to_use = "answer".$ques_no;
        $corerct_answer_1 ="";
        $corerct_answer_2 ="";
        $corerct_answer_3 ="";
        $corerct_answer_4 ="";
        $wrong_answer_1 = "";
        $wrong_answer_2 = "";
        $wrong_answer_3 = "";
        $wrong_answer_4 = "";
        $checked_1 ="";
        $checked_2 ="";
        $checked_3 ="";
        $checked_4 ="";       
        $corerct_answer="";
        $wrong_answer=""; 
    
        $solution_img_name = $org_answer_row['solution'];
        $solution_link = './assets/question-image/'.$solution_img_name;


        if($solution_link == "./assets/question-image/")            $view_soln_test = "";
        
        if($ques_no_to_use=="answer1") $ques_no_to_use = "answer2";
        if($user_answer[$ques_no_to_use]==1)        $checked_1 ="checked";
        elseif($user_answer[$ques_no_to_use]==2)    $checked_2 ="checked";
        elseif($user_answer[$ques_no_to_use]==3)    $checked_3 ="checked";
        elseif($user_answer[$ques_no_to_use]==4)    $checked_4 ="checked";
        

        $wrong_mark_html = '<br><span class=wrong><i class="fa fa-times"></i> Mark : '.$org_answer_row["negative"].'</span>';
        $correct_mark_html = '<br><span class="answer"><i class="fa fa-check ">Mark : '.$org_answer_row["positive"].'</i></span>';


        if($org_answer_row["answer"] == $user_answer[$ques_no_to_use]){                
            $corerct_answer = $correct_mark_html;            
        }elseif($org_answer_row["answer"] == 0 or $user_answer[$ques_no_to_use] == -1){
            $corerct_answer = '<br><span class=neutral>Mark : +0 </span>';
        }elseif($org_answer_row["answer"] != $user_answer[$ques_no_to_use]){
            $wrong_answer=$wrong_mark_html;            
        }

        if($org_answer_row["answer"] == 1)      $answer = "a";
        elseif($org_answer_row["answer"] == 2)  $answer = "b";
        elseif($org_answer_row["answer"]== 3)   $answer = "c";
        elseif($org_answer_row["answer"] == 4)  $answer = "d";
        


        $i++;        
        
        $q_image = explode(".",$org_answer_row['question']);  
        $q_format = end($q_image);        
        $o_image = explode(".",$org_answer_row['option1']);  
        $o_format = end($o_image);


        if((($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")) and (($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg"))){
            $result.= '<label class="question" id="qno">Question no 
                        '.$org_answer_row['ques_no'].'. '.'</label><br><div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$org_answer_row['question'].'"></div>'.$wrong_answer.$corerct_answer.'
                    <br><a  data-lightbox="image-1" href="'.$solution_link.'" style="font-weight:600;">'.$view_soln_test.'</a><br>
                    <hr>';
                    
                    
        
            
        }elseif(($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")){
            $result.= '<label class="question" id="qno">Question no 
            '.$org_answer_row['ques_no'].'. '.'</label><br><div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$org_answer_row['question'].'"></div>'.$wrong_answer.$corerct_answer.'
                    </label>
                    <p>
                        <br><a  data-lightbox="image-1" href="'.$solution_link.'" style="font-weight:600;">'.$view_soln_test.'</a><br>
                    </p><hr>';
                    
                    


        }elseif(($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg")){
            $result.= '<label class="question" id="qno">Question no 
                        '.$org_answer_row['ques_no'].'.</label><br> '.$org_answer_row['question'].$wrong_answer.$corerct_answer.'
                    </label>';
            if($view_soln_test!="")
                    $result.='<p>
                        <br><a data-lightbox="image-1" href="'.$solution_link.'" style="font-weight:600;">'.$view_soln_test.'</a><br>
                    </p><hr>';
            else $result.="<br><hr>";
                    

        
        }else{
            $result.= '<label class="question" id="qno">Question no 
                        '.$org_answer_row['ques_no'].'.</label><br> '.$org_answer_row['question'].$wrong_answer.$corerct_answer.'
                    </label>';
            if($view_soln_test!="")
                    $result.='<p>
                        <br><a data-lightbox="image-1" href="'.$solution_link.'" style="font-weight:600;">'.$view_soln_test.'</a><br>
                    </p><hr>';      
            else $result.="<br><hr>";                                                                         
        }
                        
        $ques_no++;
    }

    echo $result;
}

?>