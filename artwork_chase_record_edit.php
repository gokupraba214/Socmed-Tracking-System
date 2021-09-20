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

 $cam=$_POST['cam'];
 $dur=$_POST['dur'];
 $artD=$_POST['artD'];
 $artR=$_POST['artR'];
 $cass=$_POST['cass'];
 $casr=$_POST['casr'];
 $dtl=$_POST['dtl'];
 $rmk=$_POST['rmk'];


  $sql="update tblartworkchaseform set Campaign=:cam,Duration=:dur,ArtworkDeadline=:artD,ArtworkReceived=:artR,ChopAndSignSent=:cass,ChopAndSignReceived=:casr,DatetoLive=:dtl,Remark=:rmk where ID=:ivid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':cam',$cam,PDO::PARAM_STR);
     $query->bindParam(':dur',$dur,PDO::PARAM_STR);
     $query->bindParam(':artD',$artD,PDO::PARAM_STR);
     $query->bindParam(':artR',$artR,PDO::PARAM_STR);
     $query->bindParam(':cass',$cass,PDO::PARAM_STR);
     $query->bindParam(':casr',$casr,PDO::PARAM_STR);
     $query->bindParam(':dtl',$dtl,PDO::PARAM_STR);
     $query->bindParam(':rmk',$rmk,PDO::PARAM_STR);
     $query->bindParam(':ivid',$ivid,PDO::PARAM_STR);
     $query->execute();
        echo '<script>alert("Client artwork chase data has been updated")</script>';
        echo "<script>window.location.href ='artwork_chase_record.php'</script>";
     

  }

?>
  		<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>Bluedale SocMed Work Tracking System - Artwork Chase Edit</title>
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
                    <h2 class="content-heading">Artwork Chase</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bootstrap Register -->
                            <div class="block block-themed">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">Artwork Chase Edit</h3>
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
                                            <label class="col-12">Campaign:</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control"  name="cam" value="" required="true" >
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12">Duration:</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control"  name="dur" value="" required="true" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Artwork Deadline:</label>
                                            <div class="col-12">
                                                 <input type="date" class="form-control"  name="artD" value="" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Artwork Received:</label>
                                            <div class="col-12">
                                                 <input type="date" class="form-control"  name="artR" value="" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Chop And Sign Sent:</label>
                                            <div class="col-12">
                                                 <input type="date" class="form-control"  name="cass" value=""  >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Chop And Sign Receive:</label>
                                            <div class="col-12">
                                                 <input type="date" class="form-control"  name="casr" value=""  >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Date to Live:</label>
                                            <div class="col-12">
                                                 <input type="date" class="form-control"  name="dtl" value=""  >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12">Remark:</label>
                                            <div class="col-12">
                                                 <input type="text" class="form-control"  name="rmk" value=""  >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-alt-success" name="submit">
                                                    <i class="fa fa-plus mr-5"></i> Edit
                                                </button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="artwork_chase_record.php">Close</a></button>
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