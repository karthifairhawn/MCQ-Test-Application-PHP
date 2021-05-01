<?php

include '../conn.php';
if(isset($_GET['name'])){
    $name=$_GET['name'];
    $data = mysqli_query($conn,"Select * from questions where name='$name'");    
    if(mysqli_num_rows($data)==0){
        echo "No questions added yet";
    }
    while($row = mysqli_fetch_assoc($data)){
        $q_image = explode(".",$row['question']);  
            $q_format = end($q_image);
            
            $o_image = explode(".",$row['option1']);  
            $o_format = end($o_image);

            if((($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")) and (($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg"))){
                echo '<label class="question">
                            '.$row['ques_no'].'. '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['question'].'"></div>'.'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                        </p>
                        <input type="button" value="Next Question" id="next_question_button" name="submit" onclick="next_question()" style="margin-left:10px;" class="nextbutton">
                        <input type="button" value="Submit Test" id="submit_test" onclick="submitTest()">';
            
                
            }elseif(($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")){
                echo '<label class="question">
                '.$row['ques_no'].'. '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['question'].'"></div>'.'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)">'.' '.$row['option1'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)">'.' '.$row['option2'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)">'.' '.$row['option3'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)">'.' '.$row['option4'].'<br>
                        </p>
                        <input type="button" value="Next Question" id="next_question_button" name="submit" onclick="next_question()" style="margin-left:10px;" class="nextbutton">
                        <input type="button" value="Submit Test" id="submit_test" onclick="submitTest()">';

    
            }elseif(($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg")){
                echo '<label class="question">
                            '.$row['ques_no'].'. '.$row['question'].'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                        </p>
                        <input type="button" value="Next Question" id="next_question_button" name="submit" onclick="next_question()" style="margin-left:10px;" class="nextbutton">
                        <input type="button" value="Submit Test" id="submit_test" onclick="submitTest()">';

            
            }else{
                echo '<label class="question">
                            '.$row['ques_no'].'. '.$row['question'].'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)">'.' '.$row['option1'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)">'.' '.$row['option2'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)">'.' '.$row['option3'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)">'.' '.$row['option4'].'<br>
                        </p>
                        <input type="button" value="Next Question" id="next_question_button" name="submit" onclick="next_question()" style="margin-left:10px;" class="nextbutton">
                        <input type="button" value="Submit Test" id="submit_test" onclick="submitTest()">';
            }

        break;
    }
}

?>