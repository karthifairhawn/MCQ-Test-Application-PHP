<?php

include '../conn.php';
session_start();
$username = $_SESSION['u_name'];
$course = $_SESSION['course'];
$year = $_SESSION['year'];
$subject = $_GET['sub'];


$output = '<thead class=" text-warning">



<th>Name</th>
<th>Time(min)</th>
<th>Link</th>
<th>Result</th>
<th>Solution</th>
</thead>';


$disable="";
$attempt_count = mysqli_query($conn, "SELECT * From prac_attempts where user_id='$username'");
if($_SESSION['paid']==0){
    if(mysqli_num_rows($attempt_count)>=3){
        $_SESSION['attempt_limit']=1;
        $disable="disabled";
    }
}

if($_SESSION['paid']==2){
    $data = mysqli_query($conn, "SELECT * From prac_testlist where type='$course' and subject='$subject'");
}



if(mysqli_num_rows($data)>0){
    while($row = mysqli_fetch_array($data)){
        $timeout="";
        $ans = "";
        $ans_p = "disabled";
        $question_present = "";
        $name = $row['name'];
        $question_present_query = mysqli_query($conn, "SELECT * FROM prac_questions where name='$name' ");
        
        $check_attempt = mysqli_query($conn, "SELECT * FROM prac_attempts WHERE test_name='$name' and user_id='$username'");
        if(mysqli_num_rows($check_attempt)>0){
            $ans = $row['ans_pdf'];
            $ans_p = "";
        }
        if(mysqli_num_rows($question_present_query) == 0){
            $question_present = "disabled no_question";
        }
            $timeout = $row['timeout']/60;
            $output.='<tbody>
            <tr>
            <td>'.$row['name'].'</td>
            <td class="text-warning">'.$timeout.'</td>
            <td><a href="prac_test.php?name='.$row['name'].'" target="_blank" class="btn btn-primary '.$question_present.$disable.'" >Take Test</a></td>
            <td><a href="#" onclick="popup(\''.$row['name'].'\')" class="'.$ans_p.' btn btn-primary '.$question_present.$disable.'">Review Results</a></td>
            <td><button style="color:white;" onclick="viewAnswer(this.value)" class="btn btn-primary '.$ans_p.'" value="php/prac_testpage/viewanswer.php?answer_name='.$ans.'&testname='.$row['name'].'">View Answer Sheet</button></td>
            </tr>                                        
        </tbody>   ';
        
       
    }
        if($_SESSION['test']=='active'){
            $test_name = $_SESSION['test_name'];
            $attempt = $_SESSION['attempt'];
            echo 'Please complete all tests in progress<br><a href="php/prac_unset_test_status.php" class="btn btn-primary">Submit all tests.</a><a href="prac_test.php?name='.$test_name.'&attempt='.$attempt.'" target="_blank" class="btn btn-primary">Resume Test</a>';
        }else{
            echo "<br>Coming Soon.";
            // echo $output;
        }
    
}else{
    if($_GET['sub'] == 'unselected'){
        echo "<br>Coming Soon.";
    }else{
        echo "<br>Coming Soon.";
    }
}


?>