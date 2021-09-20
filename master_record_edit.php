<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['socmed_work_tracking']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['submit']))
  {
 $ivid=$_GET['ivid'];


 $aud=$_POST['aud'];
 $tn=$_POST['tn'];
 $sd=$_POST['sd'];
 $ed=$_POST['ed'];
 $rmk=$_POST['rmk'];
 $sts=$_POST['sts'];


  $sql="update tblclientname set AudienceReach=:aud,Tenure=:tn,StartDate=:sd,EndDate=:ed,Remark=:rmk,Status=:sts where ID=:ivid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':aud',$aud,PDO::PARAM_STR);
     $query->bindParam(':tn',$tn,PDO::PARAM_STR);
     $query->bindParam(':sd',$sd,PDO::PARAM_STR);
     $query->bindParam(':ed',$ed,PDO::PARAM_STR);
     $query->bindParam(':rmk',$rmk,PDO::PARAM_STR);
     $query->bindParam(':sts',$sts,PDO::PARAM_STR);
     $query->bindParam(':ivid',$ivid,PDO::PARAM_STR);
     $query->execute();
        echo '<script>alert("Client data has been updated")</script>';
        echo "<script>window.location.href ='master_record.php'</script>";
     

  }

?>
  		<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>Bluedale SocMed Work Tracking System - Master Record</title>
 <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

    </head>
      <body>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
     

           <?php include_once('includes/sidebar.php');?>

          <?php include_once('includes/header.php');?>

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                
                    <!-- Register Forms -->
                    <h2 class="content-heading">Master Record</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bootstrap Register -->
                            <div class="block block-themed">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">Master Record Edit</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">

      
                                    
                                    <form method="post">
                                         <div class="form-group row">
                                            <label class="col-12">Audience Reach:</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control"  name="aud" value="" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Tenure:</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control"  name="tn" value="" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Start Date:</label>
                                            <div class="col-12">
                                                 <input type="date" class="form-control"  name="sd" value="" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">End Date:</label>
                                            <div class="col-12">
                                                 <input type="date" class="form-control"  name="ed" value=""  required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Remark:</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control"  name="rmk" value=""  >
                                            </div>
                                        </div>

    
  
 <div class="form-group row">
 	<?php  $sts=$row->Status;
    
if($row->Status=="Completed")
{
  echo "Completed";
}

if($row->Status=="On Hold")
{
 echo "On Hold";
}
     ;?>
 	<label class="col-12">Status:</label>
 	   <div class="col-12">
   <select name="sts" class="form-control wd-450" required="true" >
     <option value="Completed" selected="true">Completed</option>
     <option value="On Hold">On Hold</option>
   </select>
   </div>
   </div>

                                    
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-success" name="submit">
                                                    <i class="fa fa-plus mr-5"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="master_record.php">Close</a></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- END Bootstrap Register -->
                        </div>
                        
                       </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

          <?php include_once('includes/footer.php');?>
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>
    </body>
</html>
<?php }  ?>