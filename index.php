<?php

session_start();
$_SESSION['u_name']='karthifairhawn';
$_SESSION['name']='Karthi Fair Hawn';







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
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <script src="assets/js/testlist-page/load_test.js"></script>
  <script src="assets/js/testlist-page/review_popup.js"></script>
</head>

<body onload="updateTests()">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="white" style="background-color:#eee;">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          <?php echo $_SESSION['name']; ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="#0">
              <i class="material-icons" style="color:grey;">rate_review</i>
              <p style="color:grey";>Mock Test</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Mock Test</a>
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




      <div class="content" style="background:#FEC94F">
        <div class="container-fluid">
          <div class="row">
            <div class="card">

              <div class="card-header card-header-primary" 
              style="background: #093028; 
              background: -webkit-linear-gradient(to right, #021B79, #093028);  
              background: linear-gradient(to right, #021B79, #093028); 
              font-family:verdana;
              text-align:center">
                <h4 class="card-title">Test List</h4>
                <p class="card-category">Complete the below Mock Tests.</p>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    
                                 
                  </table>
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
</body>

</html>
