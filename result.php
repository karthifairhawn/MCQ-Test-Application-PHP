<?php


session_start();

if(isset($_SESSION['u_name'])){
  include 'php/conn.php';
  $u_name = mysqli_real_escape_string($conn, $_SESSION['u_name']);
  $name = mysqli_real_escape_string($conn, $_SESSION['name']);

}else{
  header('Location:index.php');
}


$testname = mysqli_real_escape_string($conn, $_GET['testname']);
$attempt  = mysqli_real_escape_string($conn, $_GET['attempt']);
$from_test = mysqli_real_escape_string($conn, $_GET['from_test']);

$result_data_query = "SELECT total_questions, unanswered_questions, answered_questions, correct_answers, wrong_answers, total_marks from attempts where test_name='$testname' and attempt=$attempt";
$result_data = mysqli_query($conn,$result_data_query);
$result_data = mysqli_fetch_assoc($result_data);
if($from_test == 'true'){
    $_SESSION['test']="inactive";
  $back_option = '<a class="btn btn-primary" href="testlist.php"><i class="fa fa-angle-left"></i>  Go Home</a>';
}else{
  $back_option = '<a class="btn btn-primary " href="attempts.php?testname='.$testname.'"><i class="fa fa-angle-left"></i>  Go Back</a>';
}




?>













<!doctype html>
<html lang="en">

<head>
  <title>Test Review</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <script src="js/render_attempts.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <style>
      #navbar{
             background-color:#2f3136 !important;
             color: white;
             border-bottom: 1px solid white;
        }
    .card-body label{
        color: white;
    }
    
    .btn{
        background-color: #485461;
background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);text-align:center;
    }
  </style>
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" style="background-color:#eee;">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo" style="background-color:#202225;">
        <a class="simple-text logo-normal">
        </a>
      </div>
      <div class="sidebar-wrapper" style="background-color:#202225;">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="#0">
              <i class="material-icons" style="color:white;">rate_review</i>
              <p style="color:white";>Test Submitted</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navbar">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Result</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">person</i>
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->




      <div class="content" style="background:#444f56">
        <div class="container-fluid">
          <div class="row">
            <div class="card" style="background-image: linear-gradient(to right, #3c434d, #48565b, #5b6867, #727974, #8a8b85);">

              <div class="card-header card-header-primary" 
              style="background-color: #485461;
background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);text-align:center;">
                <h4 class="card-title">Test Result</h4>            
              </div>

              <div class="card-body">
                <label>Total Questions: <?php echo htmlspecialchars($result_data['total_questions']); ?></label><br>
                <label>Answered Questions: <?php echo htmlspecialchars($result_data['answered_questions']); ?></label><br>
                <label>Unanswered Questions:<?php echo htmlspecialchars($result_data['unanswered_questions']); ?></label><br>  
                <label>Correct Answers:<?php echo htmlspecialchars($result_data['correct_answers']); ?></label><br>                     
                <label>Wrong Answers: <?php echo htmlspecialchars($result_data['wrong_answers']); ?></label><br>                                     
                <label style="font-weight:600">Total Marks Obtained:<?php echo htmlspecialchars($result_data['total_marks']); ?></label><br>          
                <?php echo $back_option; ?>
                </div>
              </div>

          </div>
        </div>
      </div>
      </div>
  




      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://prashnottar.in/" target="_blank">Prashnottar</a> for a better e-learning.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
</body>

 <script>
    $("#testsubmitted").css({'border-left':'3px solid white','background-color':'#393c43'
    });
      


      
  </script>
</html>
