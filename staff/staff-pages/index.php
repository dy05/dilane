<?php
session_start();
//the isset function to check username is already loged in and stored on the session
//if(!isset($_SESSION['user_id'])){
//header('location:../login.php');
//}
?>

<!DOCTYPE html>

<html lang="en">
<head>
<title>pharmaceutical System Staff A/C</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/fullcalendar.css" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/matrix-style.css" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/matrix-media.css" />
<link href="<?= SITE_URL; ?>/public/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/x-icon" href="<?= SITE_URL; ?>/public/assets2/img/favicon.ico">
</head>
<body>

<!--Header-part-->
<div id="">
  <h2><a href="dashboard.html" >pharmaceutical <br> system</a></h2>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php $page="dashboard"; include '../includes/header.php'?>
<!--close-top-Header-menu-->


<!--sidebar-menu-->
<?php $page="dashboard"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header" >
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid" >

<!--Chart-box-->    
    <div class="row-fluid">
    <div class="widget-box widget-plain">
      <div class="center">
        <ul class="stat-boxes2">
          <li>
            <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,7,12,10,12</span>
              <canvas width="60" height="24"></canvas>
              </span>+10%</div>
            <div class="right"> <strong><?php include 'dashboard-usercount.php' ?></strong> Registered </div>
          </li>
          <li>
            <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
              <canvas width="60" height="24"></canvas>
              </span>17.8%</div>
            <div class="right"> <strong>cfa<?php include 'income-count.php' ?></strong> Total Earnings </div>
          </li>
          <li>
            <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
              <canvas width="60" height="24"></canvas>
              </span>-40%</div>
            <div class="right"> <strong><?php include 'actions/count-trainers.php' ?></strong> Active Suppliers</div>
          </li>
          <li>
            <div class="left peity_line_good"><span><span style="display: none;">12,6,9,23,14,10,17</span>
              <canvas width="60" height="24"></canvas>
              </span>+5%</div>
            <div class="right"> <strong><?php include 'actions/count-equipments.php' ?></strong>pharmaceutical Equipments </div>
          </li>
          <li>
            <div class="left peity_bar_good"><span>12,6,9,23,14,10,13</span>+9%</div>
            <div class="right"> <strong><?php include 'actions/dashboard-staff-count.php' ?></strong> Staffs</div>
          </li>
        </ul>
      </div>
    </div>
    </div><!-- End of row-fluid -->
	
<!--End-Chart-box--> 
    <hr/>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>pharmaceuticalms Announcement</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>

              <?php

                include "dbcon.php";
                $qry="select * from announcements";
                  $result=mysqli_query($conn,$qry);
                  
                while($row=mysqli_fetch_array($result)){
                  echo"<div class='user-thumb'> <img width='70' height='40' alt='User' src='../img/demo/av1.jpg'> </div>";
                  echo"<div class='article-post'>"; 
                  echo"<span class='user-info'> By: System Administrator / Date: ".$row['date']." </span>";
                  echo"<p><a href='#'>".$row['message']."</a> </p>";
                 
                }

                echo"</div>";
                echo"</li>";
              ?>

                <button class="btn btn-warning btn-mini">View All</button>
              </li>
            </ul>
          </div>
        </div>
       
         
      </div>
      <div class="span6">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-tasks"></i></span>
            <h5>Customer's To-Do Lists</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
              <?php

                include "dbcon.php";
                $qry="SELECT * FROM todo";
                $result=mysqli_query($conn,$qry);

                while($row=mysqli_fetch_array($result)){ ?>

                <li class='clearfix'> 
                                                                        
                    <div class='txt'> <?php echo $row["task_desc"]?> <?php if ($row["task_status"] == "Pending") { echo '<span class="date badge badge-important">Pending</span>';} else { echo '<span class="date badge badge-success">In Progress</span>'; }?></div>
                
               <?php }
                echo"</li>";
              echo"</ul>";
              ?>
            </div>
          </div>
        </div>
       
      
       
      </div> 
    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy; copy right</a> </div>
</div>

<style>
#footer {
  color: white;
}
</style>

<!--end-Footer-part-->

<script src="<?= SITE_URL; ?>/public/js/excanvas.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.ui.custom.js"></script>
<script src="<?= SITE_URL; ?>/public/js/bootstrap.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.flot.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.flot.resize.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.peity.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/fullcalendar.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/matrix.js"></script>
<script src="<?= SITE_URL; ?>/public/js/matrix.dashboard.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.gritter.min.js"></script>
<!-- <script src="<?= SITE_URL; ?>/public/js/matrix.interface.js"></script>  -->
<script src="<?= SITE_URL; ?>/public/js/matrix.chat.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.validate.js"></script>
<script src="<?= SITE_URL; ?>/public/js/matrix.form_validation.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.wizard.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.uniform.js"></script>
<script src="<?= SITE_URL; ?>/public/js/select2.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/matrix.popover.js"></script>
<script src="<?= SITE_URL; ?>/public/js/jquery.dataTables.min.js"></script>
<script src="<?= SITE_URL; ?>/public/js/matrix.tables.js"></script>

<script type="text/javascript">
 
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
