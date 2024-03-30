<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>pharmaceutical System</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../../public/css/fullcalendar.css" />
<link rel="stylesheet" href="../../public/css/matrix-style.css" />
<link rel="stylesheet" href="../../public/css/matrix-media.css" />
<link href="../../public/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../../public/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="">
  <h1><a href="index.php">pharmaceutical System </a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include '../includes/topheader.php' ?>
<!--close-top-Header-menu-->


<!--close-top-serch-->
<!--sidebar-menu-->
<?php $page="reminder";
include '../includes/sidebar.php' ?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    
<!--End-Action boxes-->    

    <div class="row-fluid">
	  
    
     
     
     <div class="span12">

	  <?php

      include "dbcon.php";
      $qry="SELECT reminder FROM members WHERE user_id='".$_SESSION['user_id']."'";
      $cnt = 1;
        $result=mysqli_query($con,$qry);

        
         
              
            while($row=mysqli_fetch_array($result)){ ?>


              <?php if($row['reminder'] == '1') { ?>
            
                <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">ALERT</h4>
                <p>This is to notify you that your current membership medicine program is going to expire soon. Please keep on with your purchasing program. <br>IT IS IMPORTANT THAT YOU KEEP ON BUY FROM US ON TIME IN ORDER TO AVOID SERVICE DISRUPTIONS.</p>
                <hr>
                <p class="mb-0">We value you as our customer and look forward to continue serving you in the future.</p>
              </div>

              <?php } else { ?>

                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">NO REMINDERS YET!</h4>
              </div>

                <?php } }?>

    
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

<script src="../../public/js/excanvas.min.js"></script>
<script src="../../public/js/jquery.min.js"></script>
<script src="../../public/js/jquery.ui.custom.js"></script>
<script src="../../public/js/bootstrap.min.js"></script>
<script src="../../public/js/jquery.flot.min.js"></script>
<script src="../../public/js/jquery.flot.resize.min.js"></script>
<script src="../../public/js/jquery.peity.min.js"></script>
<script src="../../public/js/fullcalendar.min.js"></script>
<script src="../../public/js/matrix.js"></script>
<script src="../../public/js/matrix.dashboard.js"></script>
<script src="../../public/js/jquery.gritter.min.js"></script>
<script src="../../public/js/matrix.interface.js"></script>
<script src="../../public/js/matrix.chat.js"></script>
<script src="../../public/js/jquery.validate.js"></script>
<script src="../../public/js/matrix.form_validation.js"></script>
<script src="../../public/js/jquery.wizard.js"></script>
<script src="../../public/js/jquery.uniform.js"></script>
<script src="../../public/js/select2.min.js"></script>
<script src="../../public/js/matrix.popover.js"></script>
<script src="../../public/js/jquery.dataTables.min.js"></script>
<script src="../../public/js/matrix.tables.js"></script>

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
