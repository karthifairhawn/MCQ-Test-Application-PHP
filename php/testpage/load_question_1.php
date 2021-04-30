<?php

include '../conn.php';
if(isset($_GET['name'])){
    $name=$_GET['name'];
    $data = mysqli_query($conn,"Select * from questions where name='$name'");    
    if(mysqli_num_rows($data)==0){
        echo "No questions added yet";
    }
    while($row = mysqli_fetch_assoc($data)){
        echo '<label class="question">
                        '.$row['ques_no'].'. '.$row['question'].'
                    </label>
                    <p>
                        <input type="radio" name="question'.$row['ques_no'].'" value="1" onclick="update_db_ans('.$row['ques_no'].',1)">'.' '.$row['option1'].'<br>
                        <input type="radio" name="question'.$row['ques_no'].'" value="2" onclick="update_db_ans('.$row['ques_no'].',2)">'.' '.$row['option2'].'<br>
                        <input type="radio" name="question'.$row['ques_no'].'" value="3" onclick="update_db_ans('.$row['ques_no'].',3)">'.' '.$row['option3'].'<br>
                        <input type="radio" name="question'.$row['ques_no'].'" value="4" onclick="update_db_ans('.$row['ques_no'].',4)">'.' '.$row['option4'].'<br>
                    </p>
                    
                        <input type="button" id="next_question_button" value="Next Question " name="submit" onclick="next_question()" style="margin-left:10px;" class="nextbutton">
                        <input type="button" value="Submit Test" id="submit_test" onclick="submitTest()">';

        break;
    }
}

?>