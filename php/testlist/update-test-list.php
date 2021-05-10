<?php

include '../conn.php';
session_start();
$username = $_SESSION['u_name'];
$output = '<thead class=" text-warning">
<th>Class</th>
<th>Subject</th>
<th>Name</th>
<th>Time(min)</th>
<th>Link</th>
<th>Result</th>
<th>Solution</th>
</thead>';
$data = mysqli_query($conn, "SELECT * From test");
if(mysqli_num_rows($data)>0){
    while($row = mysqli_fetch_array($data)){
        $ans = "";
        $ans_p = "disabled";
        $question_present = "";
        $name = $row['name'];
        $question_present_query = mysqli_query($conn, "SELECT * FROM questions where name='$name'");
        
        $check_attempt = mysqli_query($conn, "SELECT * FROM attempts WHERE test_name='$name' and user_id='$username'");
        if(mysqli_num_rows($check_attempt)>0){
            $ans = $row['ans_pdf'];
            $ans_p = "";
        }
        if(mysqli_num_rows($question_present_query) == 0){
            $question_present = "disabled no_question";
        }
            $output.='<tbody>
            <tr>
            <td>'.$row['class'].'</td>
            <td>'.$row['subject'].'</td>
            <td>'.$row['name'].'</td>
            <td class="text-warning">'.$row['timeout'].'</td>
            <td><a href="test.php?name='.$row['name'].'" target="_blank" class="btn btn-primary '.$question_present.'" >Take Test</a></td>
            <td><a href="#" onclick="popup(\''.$row['name'].'\')" class="btn btn-primary '.$question_present.'">Review <span>'.$row['name'].'</span></a></td>
            <td><a class="btn btn-primary '.$ans_p.'" href="./assets/question-image/'.$ans.'">Downlaod PDF</a></td>
            </tr>                                        
        </tbody>   ';
        
       
    }
    echo $output;
}


?>