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
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/fullcalendar.css" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/matrix-style.css" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/matrix-media.css" />
<link href="<?= SITE_URL; ?>/public/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= SITE_URL; ?>/public/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="">
  <h1><a href="<?= SITE_URL; ?>/dashboard">pharmaceutical system</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include '../includes/header.php'?>

<!--sidebar-menu-->

<?php $page="equipment"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Equipment List</a> </div>
    <h1 class="text-center">pharmaceuticalms's Equipment List <i class="icon icon-cogs"></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='icon-cogs'></i> </span>
            <h5> pharmaceutical Equipment table</h5>
          </div>
          <div class='widget-content nopadding'>
	  
	  <?php

      include "dbcon.php";
      $qry="select * from equipment";
      $cnt = 1;
        $result=mysqli_query($conn,$qry);

        
          echo"<table class='table table-bordered table-striped'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Equipment</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th>Amount</th>
                  <th>Vendor</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Purchased Date</th>
                </tr>
              </thead>";
              
            while($row=mysqli_fetch_array($result)){
            
            echo"<tbody> 
               
                <td><div class='text-center'>".$cnt."</div></td>
                <td><div class='text-center'>".$row['name']."</div></td>
                <td><div class='text-center'>".$row['description']."</div></td>
                <td><div class='text-center'>".$row['quantity']."</div></td>
                <td><div class='text-center'>cfa".$row['amount']."</div></td>
                <td><div class='text-center'>".$row['vendor']."</div></td>
                <td><div class='text-center'>".$row['address']."</div></td>
                <td><div class='text-center'>".$row['contact']."</div></td>
                <td><div class='text-center'>".$row['date']."</div></td>
             
                
              </tbody>";
         $cnt++;   }
            ?>

            </table>
          </div>
        </div>
   
		
	
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"><?php echo date("Y");?> &copy; copyright</div>
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
<script src="<?= SITE_URL; ?>/public/js/matrix.interface.js"></script>
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
      if (newURL !== "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL === "-" ) {
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
   if (document.gomenu) {
       document.gomenu.selector.selectedIndex = 2;
   }
}
</script>
</body>
</html>
