<?php

include '../conn.php';

$output = '<thead class=" text-warning">
<th>Class</th>
<th>Subject</th>
<th>Name</th>
<th>Date</th>
<th>Time(min)</th>
<th>Link</th>
<th>Result</th>
<th>OMR Sheet</th>
</thead>';
$data = mysqli_query($conn, "SELECT * From test");
if(mysqli_num_rows($data)>0){
    while($row = mysqli_fetch_array($data)){
        $question_present = "";
        $name = $row['name'];
        $question_present_query = mysqli_query($conn, "SELECT * FROM questions where name='$name'");
        if(mysqli_num_rows($question_present_query) == 0){
            $question_present = "disabled no_question";
        }
            $output.='<tbody>
            <tr>
            <td>'.$row['class'].'</td>
            <td>'.$row['subject'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['date'].'</td>
            <td class="text-warning">'.$row['timeout'].'</td>
            <td><a href="test.php?name='.$row['name'].'" target="_blank" class="btn btn-primary '.$question_present.'" >Take Test</a></td>
            <td><a href="#" onclick="popup(\''.$row['name'].'\')" class="btn btn-primary">Review <span>'.$row['name'].'</span></a></td>
            <td><a href="#" class="btn btn-primary">OMR</a></td>
            </tr>                                        
        </tbody>   ';
        
       
    }
    echo $output;
}


?>