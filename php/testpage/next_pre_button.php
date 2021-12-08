<?php

session_start();

if($_SESSION['test']=="inactive"){
    header("Location: ../../mocktest.php");
}
include '../conn.php';
if(isset($_GET['name'])){
    $name=mysqli_real_escape_string($conn, $_GET['name']);
    $ques_no = mysqli_real_escape_string($conn, $_GET['quesno']);
    $image =false;
    $data = mysqli_query($conn,"Select * from questions where name='$name' and ques_no='$ques_no'");  

    $user_id = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    $attempt = mysqli_real_escape_string($conn, $_GET['attempt']);
        if($ques_no==1){
        $ques_no=0;
    }
    
 

    $checked_check = "select answer$ques_no from attempts where user_id='$user_id' and attempt=$attempt and test_name='$name'";    
    $checked_check = mysqli_query($conn,$checked_check);
    $checked_check = (mysqli_fetch_Assoc($checked_check));
    $checked_check = $checked_check['answer'.$ques_no];
    
    
    if($checked_check==0){
        $update_db_answer_query = "update attempts set answer$ques_no=-1 where (user_id='$user_id' and attempt=$attempt and test_name='$name')";
        $update_db_answer = mysqli_query($conn, $update_db_answer_query);
    }
    
    if($ques_no==1){
        $ques_no=0;
    }
    $checked_1 ="";
    $checked_2 ="";
    $checked_3 ="";
    $checked_4 ="";
    if($checked_check==1){
        $checked_1 ="checked";
    }elseif($checked_check==2){
        $checked_2 ="checked";
    }elseif($checked_check==3){
        $checked_3 ="checked";
    }elseif($checked_check==4){
        $checked_4 ="checked";
    }

   

    if($data)  {        
        if(mysqli_num_rows($data)>0){
            
            $row = mysqli_fetch_assoc($data);
            if($row['difficulty']==1){
            $diff = "Easy";
        }elseif($row['difficulty']==2){
            $diff = "Medium";
        }elseif($row['difficulty']==3){
            $diff = "Hard";
        }
            if($ques_no==1){
                $visible = "visibility-no";
            }else{
                $visible="";
            }

            
            $q_image = explode(".",$row['question']);  
            $q_format = end($q_image);
            
            $o_image = explode(".",$row['option1']);  
            $o_format = end($o_image);

            if((($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")) and (($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg"))){
                echo '<label class="question"><span id="qno">Question no 
                            '.$row['ques_no'].'. '.'</span></label><br><div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['question'].'"></div>'.'
                        
                        <p style="position:relative;"> 
                            <div style="display:flex;flex-direction:column;position:absolute;right:0;align-items: flex-end">
                                <p class="btn btn-success" style="font-weight: 500;width: 80px;padding: 3px;">'.$diff.'</p><br><br><br>
                                
                            </div>


                            <div class="option_con"><input type="radio" id="radio1" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)" '.$checked_1.' >'.' '.'<div  id="questionImg"><img style="display:inline-block;" class="img-fluid" src="'."./assets/question-image/".$row['option1'].'" ></div></div>'.'<br><br>
                            <div class="option_con"><input type="radio" id="radio2" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)" '.$checked_2.' >'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option2'].'"></div></div>'.'<br><br>
                            <div class="option_con"><input type="radio" id="radio3" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)" '.$checked_3.' >'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option3'].'"></div></div>'.'<br><br>
                            <div class="option_con"><input type="radio" id="radio4" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)" '.$checked_4.' >'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option4'].'"></div></div>'.'<br><br>
                            <a class="btn btn-danger" style="color:white;padding:7px;" id="unset-ans-btn" onclick="update_db_ans('.$row['ques_no'].',-1); uncheck()">Unset Answer</a></br>
                        </p>
                        <input type="button" class="'.$visible.'"value="Previous" name="submit" onclick="previous_question()" >
                        <input type="button" value="Next" id="next_question_button" name="submit" onclick="next_question()" style="margin-left:3px;" class="nextbutton">
                        <input type="button" value="Submit Test" id="submit_test" onclick="submitTest()">';
            
                
            }elseif(($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")){
                echo '<label class="question"><span id="qno">Question no 
                '.$row['ques_no'].'. '.'</span></label><br><div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['question'].'"></div>'.'
                        
                        <p style="position:relative;"> 
                            <div style="display:flex;flex-direction:column;position:absolute;right:0;align-items: flex-end">
                                <p class="btn btn-success" style="font-weight: 500;width: 80px;padding: 3px;">'.$diff.'</p><br><br><br>
                                
                            </div>


                            <div class="option_con"><input type="radio" id="radio1" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)" '.$checked_1.'>'.' '.$row['option1'].'</div><br>
                            <div class="option_con"><input type="radio" id="radio2" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)" '.$checked_2.'>'.' '.$row['option2'].'</div><br>
                            <div class="option_con"><input type="radio" id="radio3" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)" '.$checked_3.'>'.' '.$row['option3'].'</div><br>
                            <div class="option_con"><input type="radio" id="radio4" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)" '.$checked_4.'>'.' '.$row['option4'].'</div><br>
                            <a class="btn btn-danger" style="color:white;padding:7px;" id="unset-ans-btn" onclick="update_db_ans('.$row['ques_no'].',-1); uncheck()">Unset Answer</a><br>

                        </p>
                        <input type="button" class="'.$visible.'"value="Previous" name="submit" onclick="previous_question()" >
                        <input type="button" value="Next" id="next_question_button" name="submit" onclick="next_question()" style="margin-left:3px;" class="nextbutton">
                        <input type="button" value="Submit Test" id="submit_test" onclick="submitTest()">';

    
            }elseif(($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg")){
                echo '<label class="question"><span id="qno">Question no 
                            '.$row['ques_no'].'.</span></label><br> '.$row['question'].'
                      
                      <p style="position:relative;"> 
                            <div style="display:flex;flex-direction:column;position:absolute;right:0;align-items: flex-end">
                                <p class="btn btn-success" style="font-weight: 500;width: 80px;padding: 3px;">'.$diff.'</p><br><br><br>
                                
                            </div>


                            <input type="radio" id="radio1" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)" '.$checked_1.' >'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" id="radio2" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)" '.$checked_2.' >'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option2'].'"></div>'.'<br>
                            <input type="radio" id="radio3" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)" '.$checked_3.' >'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option3'].'"></div>'.'<br>
                            <input type="radio" id="radio4" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)" '.$checked_4.' >'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option4'].'"></div>'.'<br>
                            <a class="btn btn-danger"  style="color:white;padding:7px;" id="unset-ans-btn" onclick="update_db_ans('.$row['ques_no'].',-1); uncheck()">Unset Answer</a><br>

                        </p>
                        <input type="button" class="'.$visible.'"value="Previous" name="submit" onclick="previous_question()" >
                        <input type="button" value="Next" id="next_question_button" name="submit" onclick="next_question()" style="margin-left:3px;" class="nextbutton">
                        <input type="button" value="Submit Test" id="submit_test" onclick="submitTest()">';

            
            }else{
                echo '<label class="question"><span id="qno">Question no 
                            '.$row['ques_no'].'.</span></label><br> '.$row['question'].'
                      
                       <p style="position:relative;"> 
                            <div style="display:flex;flex-direction:column;position:absolute;right:0;align-items: flex-end">
                                <p class="btn btn-success" style="font-weight: 500;width: 80px;padding: 3px;">'.$diff.'</p><br><br><br>
                               
                            </div>


                        <input type="radio" id="radio1" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)" '.$checked_1.' >'.' '.$row['option1'].'<br>
                            <input type="radio" id="radi2" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)" '.$checked_2.' >'.' '.$row['option2'].'<br>
                            <input type="radio" id="radio3" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)" '.$checked_3.' >'.' '.$row['option3'].'<br>
                            <input type="radio" id="radio4" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)" '.$checked_4.' >'.' '.$row['option4'].'<br>
                            <a class="btn btn-danger"  style="color:white;padding:7px;" id="unset-ans-btn" onclick="update_db_ans('.$row['ques_no'].',-1); uncheck()">Unset Answer</a><br>

                        </p>
                        <input type="button" class="'.$visible.'"value="Previous" name="submit" onclick="previous_question()" >
                        <input type="button" value="Next" id="next_question_button" name="submit" onclick="next_question()" style="margin-left:3px;" class="nextbutton">
                        <input type="button" value="Submit Test" id="submit_test" onclick="submitTest()">';
            }
            

            
        }
    }
}
?>