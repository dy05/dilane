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
  <h1><a href="index.php">pharmaceutical System</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<?php include '../includes/topheader.php' ?>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<?php $page="todo";
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
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Update To-Do Lists</h5>
          </div>
   
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" action="actions/modified-todo.php" method="POST">
              <div id="form-wizard-1" class="step">
              <?php
      include 'dbcon.php';
      $id=$_GET['id'];
      $qry= "select * from todo where id='$id'";
      $result=mysqli_query($con,$qry);
      while($row=mysqli_fetch_array($result)){
?> 
              <div class="control-group">
                <label class="control-label">Please Enter Your Task :</label>
                <div class="controls">
                    <input type="text" class="span11" name="task_desc" value='<?php echo $row['task_desc']; ?>' />
                </div>
                </div>

                 <div class="control-group">
                    <label class="control-label">Please Select a Status:</label>
                    <div class="controls">
                        <select name="task_status" required="required" id="select">
                        <option value="In Progress">In Progress</option>
                        <option value="Pending">Pending</option>
                        </select>
                    </div>
                </div>

              <div class="form-actions">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input id="add" class="btn btn-primary" type="submit" value="Save Changes" />
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
            
          </div><!--end of widget-content -->
          <?php
}
?>
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
