<?php


include '../conn.php';
session_start();
$u_name = mysqli_real_escape_string($conn, $_SESSION['u_name']);
$test_name =mysqli_real_escape_string($conn,  $_GET['name']);
$attempt_data = mysqli_query($conn, "Select * from prac_attempts where user_id='$u_name' and test_name='$test_name'");
while ($attempt = mysqli_fetch_assoc($attempt_data)){
        echo '<tr>
            <td>'.$attempt["attempt"].'</td>
            <td>'.$attempt["test_date"].'</td>
            <td>'.$attempt['total_marks'].'</td>
            <td> <a href="prac_result.php?testname='.$test_name.'&attempt='.$attempt['attempt'].'&from_test=false" class="btn btn-primary">Review Attempt</a></td>
            <td><a href="./prac_omr.php?testname='.$test_name.'&attempt='.$attempt['attempt'].'" class="btn btn-primary">Review Test </a></td>
            </tr>';
}
?>