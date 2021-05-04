<?php


session_start();
include '../conn.php';

if(isset($_GET['testname'])){
    
    $u_name = $_SESSION['u_name'];
    $testname=$_GET['testname'];    
    $data = mysqli_query($conn,"Select * from questions where name='$testname'");   
    if(mysqli_num_rows($data)==0){
        // header('Location:index.php');
    }


    $user_id = $_SESSION['u_name'];
    $attempt = $_GET['attempt'];


    $attempt_info = "SELECT total_questions from attempts where test_name='$testname' and attempt=$attempt";
    $attempt_info = mysqli_query($conn,$attempt_info);
    $attempt_info = mysqli_fetch_assoc($attempt_info);
    $total_questions = $attempt_info['total_questions'];

    $user_answer = "SELECT * from attempts where user_id='".$u_name."' and attempt=".$attempt." and test_name='".$testname."'";
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

    while($i<11 ){
        array_shift($user_answer);
        $i++;
    }
    print_r($org_answer);
    echo '<br>';
    print_r(array_values($user_answer));

    


    



    $checked_1 ="";
    $checked_2 ="";
    $checked_3 ="";
    $checked_4 ="";

    $result="";

    $wrong_mark_html = '<span class=wrong><i class="fa fa-times"></i> Mark : -1</span>';
    $correct_mark_html = '<span class="answer"><i class="fa fa-check ">Mark : +4</i></span>';

    while($row = mysqli_fetch_assoc($data)){
            $q_image = explode(".",$row['question']);  
            $q_format = end($q_image);
            
            $o_image = explode(".",$row['option1']);  
            $o_format = end($o_image);

            if((($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")) and (($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg"))){
                $result.= '<label class="question">
                            '.$row['ques_no'].'. '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['question'].'"></div>'.'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'" '.$checked_1.' ></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'" '.$checked_2.' ></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'" '.$checked_3.' ></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)">'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'" '.$checked_4.' ></div>'.'<br>
                        </p>';
                        
                        
            
                
            }elseif(($q_format == "jpg")  or ($q_format == "png") or ($q_format == "jpeg")){
                $result.= '<label class="question">
                '.$row['ques_no'].'. '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['question'].'"></div>'.'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)" '.$checked_1.' >'.' '.$row['option1'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)" '.$checked_2.' >'.' '.$row['option2'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)" '.$checked_3.' >'.' '.$row['option3'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)" '.$checked_4.' >'.' '.$row['option4'].'<br>
                        </p>';
                        
                        

    
            }elseif(($o_format == "jpg")  or ($o_format == "png") or ($o_format == "jpeg")){
                $result.= '<label class="question">
                            '.$row['ques_no'].'. '.$row['question'].'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)"'.$checked_1.'>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)"'.$checked_2.'>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)"'.$checked_3.'>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)"'.$checked_4.'>'.' '.'<div  id="questionImg"><img class="img-fluid" src="'."./assets/question-image/".$row['option1'].'"></div>'.'<br>
                        </p>';
                        

            
            }else{
                $result.= '<label class="question">
                            '.$row['ques_no'].'. '.$row['question'].'
                        </label>
                        <p>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',1)"'.$checked_1.' >'.' '.$row['option1'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',2)"'.$checked_2.'>'.' '.$row['option2'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',3)"'.$checked_3.'>'.' '.$row['option3'].'<br>
                            <input type="radio" name="question'.$row['ques_no'].'" value="Option 1" onclick="update_db_ans('.$row['ques_no'].',4)"'.$checked_4.'>'.' '.$row['option4'].'<br>
                        </p>';
                        
                        
            }
        
    }
    $result.= '<div class="buttons">
                <button class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i>    Go Home</button>
                <button class="btn btn-primary "><i class="fa fa-chevron-left"></i> Go Back</button>
                </div>';
    echo $result;
}

?>