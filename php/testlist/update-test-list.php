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
</thead>';
$data = mysqli_query($conn, "SELECT * From test");
if(mysqli_num_rows($data)>0){
    while($row = mysqli_fetch_array($data)){
        $output.='<tbody>
                    <tr>
                    <td>'.$row['class'].'</td>
                    <td>'.$row['subject'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['date'].'</td>
                    <td class="text-warning">'.$row['timeout'].'</td>
                    <td><a href="test.php?name='.$row['name'].'" target="_blank" class="btn btn-primary">Take Test</a></td>
                    <td><a href="#" onclick="popup(\''.$row['name'].'\')" class="btn btn-primary">Review <span>'.$row['name'].'</span></a></td>
                    </tr>                                        
                </tbody>   ';
    }
    echo $output;
}


?>