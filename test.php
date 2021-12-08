<?php


include 'php/conn.php';
session_start();
if(isset($_GET['name'])  and isset($_SESSION['u_name'])){
    $testname = mysqli_real_escape_string($conn, $_GET['name']);
    $u_name = mysqli_real_escape_string($conn, $_SESSION['u_name']);
    
    
    if(isset($_GET['attempt'])){
            $_SESSION['resume']=1;
            $current_attempt = mysqli_real_escape_string($conn, $_GET['attempt']);
        
    }else{
        $_SESSION['resume']=0;
        $question_revealed = 0;
    
        $current_attempt = mysqli_query($conn, "SELECT * FROM attempts where user_id='$u_name' and test_name='$testname'");
        $current_attempt = mysqli_num_rows($current_attempt);
        $current_attempt++;    
    }
    
    $_SESSION['attempt'] = $current_attempt;    
    $_SESSION['test_name'] = $testname;
    

      if(!isset($_GET['attempt'])){
          
          if($_SESSION['resume']==0 and $question_revealed==0){
              $timeout = mysqli_query($conn,"Select timeout from test where name='$testname'");
              $timeout = mysqli_fetch_assoc($timeout);
              $timeout = $timeout['timeout'];
              mysqli_query($conn, "INSERT into attempts (user_id, test_name, attempt,countdown) values ('$u_name', '$testname','$current_attempt','$timeout')");
          }elseif($question_revealed==0){
              mysqli_query($conn, "INSERT into attempts (user_id, test_name, attempt) values ('$u_name', '$testname','$current_attempt')");  
          }
          
      }
      $_SESSION['test'] = "active";

}else{
  header('Location: index.php');
}


$attempt_count = mysqli_query($conn, "SELECT * From attempts where user_id='$u_name'");




$category = mysqli_query($conn, "Select distinct category from questions where name='$testname'");
$category_html = '';
while($row = mysqli_fetch_assoc($category)){
    $tt = $row['category'];
    $category_html.= '<a href="#'.strtoupper($tt).'" class="nav-link ques_cat" onclick="cat_fun(this.innerText)">'.strtoupper($tt).'</a>';
}

?>






























<!doctype html>
<html lang="en">

<head>
  <title>Mock Test</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="assets/css/main.css" rel="stylesheet" />
  <script src="assets/js/testpage/renderQuesno.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script type="text/javascript" src="assets/js/testpage/countdown.js"></script>
  <script type="text/javascript" src="assets/js/testpage/previous_next.js"></script>
  <script type="text/javascript" src="assets/js/testpage/update_db_answer.js"></script>
  <script type="text/javascript" src="assets/js/testpage/submit_test.js"></script>
    <style>
        #navbar{
             background-color:#2f3136 !important;
             color: white;
             border-bottom: 1px solid white;
        }
        #sidebar a{
            color:white !important;
        }
        #sidebar p{
            color:white !important;
        }
    </style>
</head>


<body onload="renderQuesNo()">
<!--<div class="processing" style="Display:none">-->
<!--    <div class="lds-circle"></div>-->

<!--</div>-->


  <div class="wrapper" id="wrapper">


    <div class="sidebar" id="sidebar" style="background-color:#202225;">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo" style="background-color:#202225;">
        <a href="#" class="simple-text logo-normal"><?php echo htmlspecialchars($_SESSION['name']); ?></a>
        <input type="hidden" id="u_name" value="<?php echo htmlspecialchars($_SESSION['u_name']); ?>">
      </div>
      <div class="sidebar-wrapper" style="background-color:#202225;">
        <ul class="nav">
          <li class="nav-item active  ">
                
            <div class="catgor">
                <p class="nav-link">Categories :</p>
                <div id="cat-container">
                        <?php echo $category_html ?>
                    
                </div>
            </div>
                  
                  <style>
                    .catgor{
                        border: 1px solid #2e2e2d;
                        padding:10px;
                        margin:5px;
                        }
                       
                    #cat-container a{
                        display: inline-block;
                        border-bottom: 3px solid #fff;

                        padding: 2px;

                    }
                    #cat-container a:hover{
                        transition: border 0.2s;
                    }
                    #question-div{
                        color: black;
                    }
                    
                    
                  </style>
            <div class="question-container" id="question-container" >
              
            </div>
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

            <a class="navbar-brand" href="#header">Mock Test<span id="testname" onclick="fetch_time()" style="display:none"><?php echo htmlspecialchars($testname);?></a></span>
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
                  <!-- <i class="material-icons">person</i> -->
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->




      <div class="content" style="background:#36393f">
        <div class="container-fluid">
          <div class="row">
            <div class="card">

              <div class="card-header card-header-primary" 
              style="background-color: #485461;
background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);display:flex;justify-content: space-between;">
                <h4 class="card-title"><?php echo htmlspecialchars($testname); ?></h4>
                <h4 class="card-title" id="countdown_r"></h4>
              </div>

              <div class="card-body" style="background-color:white;">
                  
                 
                  
                <div class="table-responsive">
                    <div class="time-taken-green" id="time-taken">
                      <span id="time_taken_sec">00</span>
                    </div>      
                        <div id="question-div">      
                                     
                        <!-- Questions will load here -->
                        
                        </div>                                                
                        
                        
                        

                    
                </div>
              </div>

          </div>
        </div>
      </div>
      </div>
  




     
    </div>
  </div>


<style>
  input[type="submit"]{
    padding: 7px;
    background-color: rgb(94, 228, 17,0.6);
    outline: none;
    border: none;
    float: right;
  }
</style>
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
  
  <script>
    function cat_fun(cat){
        var tt = "#"+cat;
       var cat = $(tt)
       cat.next().click();
    }
  </script>
    <script type="text/javascript" src="assets/js/testpage/auto_render_ques_no.js"></script>

    <script type="text/javascript" src="assets/js/testpage/time_taken.js"></script>



</body>


</html>





