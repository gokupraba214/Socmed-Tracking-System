<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['socmed_work_tracking']==0)) {
  header('location:logout.php');
  } else{
	  
	  
	  ?>
  <!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>Socmed Work Tracking System  - View Posting Schedule</title>
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
                    <h2 class="content-heading">Posting Schedule</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bootstrap Register -->
                            <div class="block block-themed">
                                <div class="block-header bg-gd-emerald">
                                    <h3 class="block-title">Posting Schedule Record</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
              <?php
                  $eid=$_GET['cid'];

$sql="SELECT tblclientname.ClientName,tblclientname.CS,tblclientname.SocialMediaType,tblclientname.Tenure,tblclientname.AudienceReach,tblclientname.StartDate,tblartworkchaseform.Campaign,tblartworkchaseform.Duration,tblartworkchaseform.DatetoLive from tblclientname join tblartworkchaseform on tblclientname.ID=tblartworkchaseform.Client_ID where tblclientname.ID=:eid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>


  <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                            <tr>
    <th>Client Name</th>
    <td colspan="5"><?php echo $row->ClientName;?></td>
    <th>CS</th>
    <td colspan="2"><?php echo $row->CS;?></td>
    
  </tr>
  <tr>
    <th>Type</th>
    <td colspan="2"><?php echo $row->SocialMediaType;?></td>
    <th>Tenure</th>
    <td colspan="2"><?php echo $row->Tenure;?></td>
    <th>Reach</th>
    <td colspan="3"><?php echo $row->AudienceReach;?></td>
  </tr>
  
<tr>
    <td  colspan="10"></td>
</tr>

  
  <tr>  
    <th colspan="4">Campaign</th>
	<th colspan="2">Duration</th>
    <th colspan="2">Start Date</th>
    <th colspan="2">Date to Live</th>
  </tr>
   <tr>
    <td colspan="4"><?php echo $row->Campaign;?></td>
	<td colspan="2"><?php echo $row->Duration;?></td>
    <td colspan="2"><?php echo $row->StartDate;?></td>
    <td colspan="2"><?php echo $row->DatetoLive;?></td>
    </tr>

<?php $cnt=$cnt+1;}} ?>
</table> 
</div>
</div>
</div>
</div>
</div>
</main>

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