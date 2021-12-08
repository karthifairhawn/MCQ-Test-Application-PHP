<?php

session_start();

if(isset($_SESSION['u_name'])){


}else{
  header('Location:index.php');
}
    
if($_SESSION['course']=="PCM"){
        $dropdown='   <select id="test_to_get" class="form-select form-select-sm" aria-label=".form-select-sm example">
                      <option >Select Test</option>
                      <option value="1">Physics</option>
                      <option value="2">Chemistry</option>
                      <option value="3">Maths</option>
                      <option value="3">PCM</option>
                    </select>
                    ';
    }elseif($_SESSION['course']=="PCB"){
        $dropdown='   <select id="test_to_get" class="form-select form-select-sm" aria-label=".form-select-sm example">
                      <option >Select Test</option>
                      <option value="1">Physics</option>
                      <option value="2">Chemistry</option>
                      <option value="3">Biology</option>
                      <option value="3">PCB</option>
                    </select>
                    ';
    }elseif($_SESSION['course']=="PCMB"){
        $dropdown='   <select id="test_to_get" class="form-select form-select-sm" aria-label=".form-select-sm example">
                      <option >Select Test</option>
                      <option value="1">Physics</option>
                      <option value="2">Chemistry</option>
                      <option value="3">Maths</option>
                      <option value="3">Biology</option>
                      <option value="3">PCMB</option>
                    </select>
                    ';
    }
    





?>












  


<!doctype html>
<html lang="en">

<head>

  <title>Mock Test</title>
  <!-- Required meta tags -->
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <script src="assets/js/testlist-page/load_test.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>


    <link href="assets/css/main.css" rel="stylesheet" />

  <style>
        #navbar{
             background-color:#2f3136 !important;
             color: white;
             border-bottom: 1px solid white;
        }
        .card th{
         color : white !important;
         font-weight: 600 !important;
        }
        .card td{
            color : white !important;
        }
        .card a{
            background-color:#2f3136 !important;
             color: white;
             border-bottom: 1px solid white; 
        }
        .card button{
            background-color:#2f3136 !important;
             color: white;
             border-bottom: 1px solid white; 
        }
        
        .table{
            color:white !important;
        }
        #test_to_get{
            width:30%;
        }
        @media only screen and (max-width: 500px){
	        #test_to_get{
            width:50%;
            }
        }
      </style>

</head>

<body onload="updateTests()">
  <div class="wrapper ">
    <?php
require('sidebar.php');
?>
    
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navbar">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">NEET/JEE Mock Test</a>
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
              <a class="nav-link" href="php/logout.php">
                  <span><i class="material-icons">power_settings_new</i>Logout</span>
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
            <div class="card" style="background-image: linear-gradient(to right, #3c434d, #48565b, #5b6867, #727974, #8a8b85);">
            
              <div class="card-header card-header-primary" 
              style="background-color: #485461;
background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);text-align:center;">
                <h4 class="card-title">Test List</h4>
                <p class="card-category">You can practice the below tests.<br><?php
                    $paid_data = "";
                    if($_SESSION['paid']==0){
                        $paid_data = "Unpaid users can only have one attempt in any 3 tests";
                        echo $paid_data;
                    }
                ?></p>
              </div>
                

              <div class="card-body">

                                <?php echo $dropdown;?>
                                
                <div class="table-responsive" >
                <style>
                ::-webkit-scrollbar {
                      -webkit-appearance: none;
                  }

                  ::-webkit-scrollbar:vertical {
                      width: 12px;
                  }

                  ::-webkit-scrollbar:horizontal {
                      height: 12px;
                  }

                  ::-webkit-scrollbar-thumb {
                      background-color: rgba(0, 0, 0, .5);
                      border-radius: 10px;
                      border: 2px solid #ffffff;
                  }

                  ::-webkit-scrollbar-track {
                      border-radius: 10px;
                      background-color: #ffffff;
                  }
                </style>
                  <table class="table" id="table">
                    
                                 
                  </table>
                </div>
              </div>
          </div>
        </div>
      </div>
      </div>
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
  <script>
    $("#mocktest").css({'border-left':'3px solid white','background-color':'#393c43'
    });
      


      
  </script>
    <script src="assets/js/testlist-page/review_popup.js"></script>

</body>

</html>

