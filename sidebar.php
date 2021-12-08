<?php
  $id=$_SESSION['u_name'];
  $sql="SELECT * FROM student WHERE id=".$id;
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
          <?php echo $_SESSION['name'] ?>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">          
          <li class="nav-item mock-test">
            <a class="nav-link" href="./mocktest.php" id="mocktest">
              <i class="material-icons" style="color:white;">note_alt</i>
              <p>Mock Test</p>
            </a>
          </li>                              
        </ul>
      </div>
    </div>