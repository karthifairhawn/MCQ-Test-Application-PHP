  <?php
include "config.php";
session_start();
if (!isset($_SESSION['user-id'])) {
  ?>
<script type="text/javascript">
  alert("You Need To Login First");
  window.location="../Login";
</script>
  <?php
}

$id=$_SESSION['user-id'];
$sql="SELECT * FROM student WHERE id=".$id;
$rs = $pdo->query($sql);
            $row=$rs->fetch(PDO::FETCH_ASSOC);

?>
  
    <style>
  .sidebar-wrapper ul{
	  font-family:verdana;
  }
    .sidebar-wrapper ul li a p{
        color:white;
    }
    </style>
    
    <div class="sidebar"  style="background-color:#202225; color:white;">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="index.php" class="simple-text logo-normal" style="font-family:courier;color:white;">
          <?php echo $row['name'] ?>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item dashboard">
            <a class="nav-link " id="dashboard"href="./index.php">
              <i class="fa fa-dashboard" style="color:white;"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" id="user_profile" href="./user.php">
              <i class="material-icons" style="color:white;">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <!-- li class="nav-item">
            <a class="nav-link" href="./time.php" id="timetable">
              <i class="material-icons" style="color:white;">content_paste</i>
              <p>Time-Table</p>
            </a>
          </li -->
          <li class="nav-item mock-test">
            <a class="nav-link" href="./mocktest.php" id="mocktest">
              <i class="material-icons" style="color:white;">note_alt</i>
              <p>Mock Test</p>
            </a>
          </li>
          <li class="nav-item prac-test">
            <a class="nav-link" href="./practice.php" id="practice-test">
              <i class="material-icons" style="color:white;">note_alt</i>
              <p>Practise Test</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./test-time.php" id="test">
              <i class="material-icons" style="color:white;">design_services</i>
              <p>Test</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./result.php" id="results">
              <i class="material-icons" style="color:white;">cast_for_education</i>
              <p>Results</p>
            </a>
          </li>
          <li class="nav-item ">
               <?php
              if($row['course']=="PCB")
              {
              ?>
            <a class="nav-link" href="pcb-videos.php" id="video">
              <i class="fa fa-video-camera" style="color:white;"></i>
              <p>Video</p>
            </a>
             <?php } 
             elseif($row['course']=="PCMB")
              {
              ?>
            <a class="nav-link" href="pcmb-videos.php" id="video">
              <i class="fa fa-video-camera" style="color:white;"></i>
              <p>Video</p>
            </a>
             <?php } 
             elseif($row['course']=="PCM")
              {
              ?>
            <a class="nav-link" href="pcm-videos.php" id="video">
              <i class="fa fa-video-camera" style="color:white;"></i>
              <p>Video</p>
            </a>
             <?php } ?>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="course.php" id="course-offer">
              <i class="fa fa-folder-open" style="color:white;"></i>
              <p>Course Offer</p>
            </a>
          </li>
          <li class="nav-item ">
             
            <a class="nav-link" href="online.php" id="online-classes">
              <i class="fa fa-wifi" style="color:white;"></i>
              <p>Online Classes</p>
            </a>
           
          </li>
          
          <!--li class="nav-item ">
            <a class="nav-link" href="attendance.php">
              <i class="fa fa-calendar" style="color:#DBD9DA;"></i>
              <p>Attendance</p>
            </a>
          </li-->
          <li class="nav-item ">
            <a class="nav-link" href="payment.php" id="payment">
              <i class="material-icons" style="color:white;">local_atm</i>
              <p>Payment</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.php" id="notification">
              <i class="material-icons" ></i>campaign</i>
              <p>Notifications</p>
            </a>
          </li>
          
          
        </ul>
      </div>
    </div>