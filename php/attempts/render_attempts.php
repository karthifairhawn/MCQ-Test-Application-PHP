<?php


include '../conn.php';
session_start();
$u_name = $_SESSION['u_name'];
$test_name = $_GET['name'];
$attempt_data = mysqli_query($conn, "Select * from attempts where user_id='$u_name' and test_name='$test_name'");
while ($attempt = mysqli_fetch_assoc($attempt_data)){
        echo '<tr>
            <td>'.$attempt["attempt"].'</td>
            <td>'.$attempt["test_date"].'</td>
            <td>'.$attempt['total_marks'].'</td>
            <td> <a href="result.php?testname='.$test_name.'&attempt='.$attempt['attempt'].'&from_test=false" class="btn btn-primary">Review Attempt</a></td>
            <td><a href="./omr.php?testname='.$test_name.'&attempt='.$attempt['attempt'].'" class="btn btn-primary">Reveal Answers</a></td>
            </tr>';
}
?>