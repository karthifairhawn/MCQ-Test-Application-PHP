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
            <td>'.$attempt['mark'].'</td>
            <td> <a href="#" class="btn btn-primary">Review Attempt</a></td>
            </tr>';
}
?>