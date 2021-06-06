<?php


session_start();
include '../conn.php';

if(isset($_GET['testname'])){
    
    $u_name = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    $testname=mysqli_real_escape_string($conn, $_GET['testname']);    
    $data = mysqli_query($conn,"Select * from questions where name='$testname'");   
    if(mysqli_num_rows($data)==0){
        header('Location:index.php');
    }


    $user_id = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    $attempt = mysqli_real_escape_string($conn, $_GET['attempt']);
    $back_url= mysqli_real_escape_string($conn, $_SESSION['attempt_page']);

    $attempt_info = "SELECT total_questions from attempts where test_name='$testname' and attempt=$attempt";
    $attempt_info = mysqli_query($conn,$attempt_info);
    $attempt_info = mysqli_fetch_assoc($attempt_info);
    $total_questions = $attempt_info['total_questions'];
    
    $user_answer = "SELECT * from attempts where (user_id='$u_name' and attempt=$attempt) and test_name='$testname'";
    
    $result="";
    $org_answer = "SELECT answer,positive,negative from questions where name='$testname'";
    
    $user_answer = mysqli_query($conn,$user_answer);
    $user_answer = mysqli_fetch_assoc($user_answer);
    $org_answer_q = mysqli_query($conn,$org_answer);
    $org_answer = [];

    while($row = mysqli_fetch_assoc($org_answer_q)){

        $temp = array_values($row);
        array_push($org_answer,array_values($temp));
    }

    foreach($user_answer as $key=>$value)
    {
    if(is_null($value) || $value == '')
        unset($user_answer[$key]);
    }

    
    $i=0;

    while($i<15 ){
        array_shift($user_answer);
        $i++;
    }    
    $user_answer = array_values($user_answer);

    // print_r($org_answer);
    // echo '<br/>';
    // print_r($user_answer);
    


    



  


    $i=0;
  
    while($row = mysqli_fetch_assoc($data)){
        
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
        $view_soln_test = "View Complete Solution";
            $solution_img_name = $row['solution'];
            $solution_link = './assets/question-image/'.$solution_img_name;
            if($solution_link == "./assets/question-image/"){
                $view_soln_test = "";
            }
            $corerct_answer="";
            $wrong_answer="";
            if($user_answer[$i]==1){
                $checked_1 ="checked";
            }elseif($user_answer[$i]==2){
                $checked_2 ="checked";
            }elseif($user_answer[$i]==3){
                $checked_3 ="checked";
            }elseif($user_answer[$i]==4){
                $checked_4 ="checked";
            }
            $wrong_mark_html = '<br><span class=wrong><i class="fa fa-times"></i> Mark : '.$org_answer[$i][2].'</span>';
            $correct_mark_html = '<br><span class="answer"><i class="fa fa-check ">Mark : '.$org_answer[$i][1].'</i></span>';


            if($org_answer[$i][0] == $user_answer[$i]){                
                $corerct_answer = $correct_mark_html;

                
            }elseif($user_answer[$i] == 0 or $user_answer[$i] == -1){
                $corerct_answer = '<br><span class=neutral>Mark : +0 </span>';
            }elseif($org_answer[$i][0] != $user_answer[$i]){
                $wrong_answer=$wrong_mark_html;
                
            }
            if($org_answer[$i][0] == 1){
                $answer = "a";
            }elseif($org_answer[$i][0] == 2){
                $answer = "b";
            }elseif($org_answer[$i][0] == 3){
                $answer = "c";
            }elseif($org_answer[$i][0] == 4){
                $answer = "d";
            }


            $i++;
            
            
            $q_image = explode(".",$row['question']);  
            $q_format = end($q_image);
            
            $o_image = explode(".",$row['option1']);  
            $o_format = end($o_image);

            if((($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")) and (($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg"))){
                $result.= '<label class="question" id="qno">Question no 
                            '.$row['ques_no'].'. '.'</label><br><div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['question'].'"></div>'.$wrong_answer.$corerct_answer.'
                        
                        
                        <span class="option_con"><input type="radio" name="question'.$row['ques_no'].'" value="Option 1" '.$checked_1.' disabled>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'" '.$checked_1.' ></div></span>'.'<br>
                        <span class="option_con"><input type="radio" name="question'.$row['ques_no'].'" value="Option 1" '.$checked_2.' disabled>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option2'].'" '.$checked_2.' ></div></span>'.'<br>
                        <span class="option_con"><input type="radio" name="question'.$row['ques_no'].'" value="Option 1" '.$checked_3.' disabled>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option3'].'" '.$checked_3.' ></div></span>'.'<br>
                        <span class="option_con"><input type="radio" name="question'.$row['ques_no'].'" value="Option 1" '.$checked_4.' disabled>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option4'].'" '.$checked_4.' ></div></span>'.'<br>

                        <a  data-lightbox="image-1" href="'.$solution_link.'" style="font-weight:600;">'.$view_soln_test.'</a><br>
                        <hr>';
                        
                        
            
                
            }elseif(($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")){
                $result.= '<label class="question" id="qno">Question no 
                '.$row['ques_no'].'. '.'</label><br><div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['question'].'"></div>'.$wrong_answer.$corerct_answer.'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1"  '.$checked_1.' disabled>'.' '.$row['option1'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1"  '.$checked_2.' disabled>'.' '.$row['option2'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1"  '.$checked_3.' disabled>'.' '.$row['option3'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1"  '.$checked_4.' disabled>'.' '.$row['option4'].'<br>

                            <a  data-lightbox="image-1" href="'.$solution_link.'" style="font-weight:600;">'.$view_soln_test.'</a><br>
                        </p><hr>';
                        
                        

    
            }elseif(($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg")){
                $result.= '<label class="question" id="qno">Question no 
                            '.$row['ques_no'].'.</label><br> '.$row['question'].$wrong_answer.$corerct_answer.'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" '.$checked_1.' disabled>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" '.$checked_2.' disabled>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option2'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" '.$checked_3.' disabled>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option3'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" '.$checked_4.' disabled>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option4'].'"></div>'.'<br>

                            <a data-lightbox="image-1" href="'.$solution_link.'" style="font-weight:600;">'.$view_soln_test.'</a><br>
                        </p><hr>';
                        

            
            }else{
                $result.= '<label class="question" id="qno">Question no 
                            '.$row['ques_no'].'.</label><br> '.$row['question'].$wrong_answer.$corerct_answer.'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1"  '.$checked_1.' disabled >'.' '.$row['option1'].'</span><br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1"  '.$checked_2.' disabled>'.' '.$row['option2'].'</span><br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1"  '.$checked_3.' disabled>'.' '.$row['option3'].'</span><br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1"  '.$checked_4.' disabled>'.' '.$row['option4'].'</span><br>

                            
                            <a data-lightbox="image-1" href="'.$solution_link.'" style="font-weight:600;">'.$view_soln_test.'</a><br>
                        </p><hr>';                                                             
            }
                        
        
    }
    
    // $result.= '<div class="buttons">                
    //             <button class="btn btn-primary "><a href="'.$back_url.'" style="color: white;"><i class="fa fa-chevron-left"></i> Go Back</a></button>
    //             </div>';
    echo $result;
}

?>