<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['socmed_work_tracking']==0)) {
  header('location:logout.php');
  } else{
 if(isset($_POST['submit']))
  {
	  
 $cname=$_GET['cname'];
 $cid=$_GET['cid'];
 
 $camp=$_POST['camp'];
 $dur=$_POST['dur'];
 $artD=$_POST['artD'];
 $artR=$_POST['artR'];
 $cass=$_POST['cass'];
 $casr=$_POST['casr'];
 $dtl=$_POST['dtl'];
 $rmr=$_POST['rmr'];
$sql="insert into tblartworkchaseform (Client_ID,ClientName,Campaign,Duration,ArtworkDeadline,ArtworkReceived,ChopAndSignSent,ChopAndSignReceived,DatetoLive,Remark)values(:cid,:cname,:camp,:dur,:artD,:artR,:cass,:casr,:dtl,:rmr)";
$query=$dbh->prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
$query->bindParam(':camp',$camp,PDO::PARAM_STR);
$query->bindParam(':dur',$dur,PDO::PARAM_STR);
$query->bindParam(':artD',$artD,PDO::PARAM_STR);
$query->bindParam(':artR',$artR,PDO::PARAM_STR);
$query->bindParam(':cass',$cass,PDO::PARAM_STR);
$query->bindParam(':casr',$casr,PDO::PARAM_STR);
$query->bindParam(':dtl',$dtl,PDO::PARAM_STR);
$query->bindParam(':rmr',$rmr,PDO::PARAM_STR);


 $query->execute();
 $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Data is sucessfully added.")</script>';
echo "<script>window.location.href ='artwork_chase_record.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>


<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>Bluedale SocMed Work Tracking System - Artwork Chase Pop Up Action</title>
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
                                    <h3 class="block-title">Artwork Chase Action</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>


                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

   
                             <form method="post" name="submit">

  
  <tr>
    <th>Campaign :</th>
    <td>
    <input name="camp" placeholder="" class="form-control wd-450" required="true"></input></td>
  </tr>
 
  <tr>
    <th>Duration :</th>
    <td>
    <input name="dur" placeholder="" class="form-control wd-450" required="true"></input></td>
  </tr>
  
  <tr>
    <th>Artwork Deadline :</th>
    <td> <input type="date" id="artD" name="artD"></td>
  </tr>
  
  <tr>
    <th>Artwork Receive :</th>
    <td> <input type="date" id="artR" name="artR"></td>
  </tr>
  
  <tr>
    <th>Chop & Sign Sent :</th>
    <td> <input type="date" id="cass" name="cass"></td>
  </tr>
  
  <tr>
    <th>Chop & Sign Receive :</th>
    <td>
    <input type="date" id="casr" name="casr"></td>
  </tr>
  
  <tr>
    <th>Date to Live :</th>
    <td>
    <input type="date" id="dtl" name="dtl"></td>
  </tr>
  
  <tr>
    <th>Remark :</th>
    <td>
    <textarea name="rmr" placeholder="Remark" rows="12" cols="14" class="form-control wd-450"></textarea></td>
  </tr>
</table>  
  
  <div class="form-group row">
  <div class="col-12">
  <button type="submit" class="btn btn-alt-success" name="submit">
  <i class="fa fa-plus mr-5"></i> Add </button>
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