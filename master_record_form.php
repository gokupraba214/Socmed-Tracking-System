<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['socmed_work_tracking']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {

$date=$_POST['date'];
$cn=$_POST['cn'];
$cs=$_POST['cs'];
$smt=$_POST['smt'];
$af=$_POST['af'];
$ar=$_POST['ar'];
$tnr=$_POST['tnr'];
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
$rmk=$_POST['rmk'];

$sql="insert into tblclientname(Date,ClientName,CS,SocialMediaType,ArtworkFormat,AudienceReach,Tenure,StartDate,EndDate,Remark)values(:date,:cn,:cs,:smt,:af,:ar,:tnr,:sdate,:edate,:rmk)";
$query=$dbh->prepare($sql);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':cn',$cn,PDO::PARAM_STR);
$query->bindParam(':cs',$cs,PDO::PARAM_STR);
$query->bindParam(':smt',$smt,PDO::PARAM_STR);
$query->bindParam(':af',$af,PDO::PARAM_STR);
$query->bindParam(':ar',$ar,PDO::PARAM_STR);
$query->bindParam(':tnr',$tnr,PDO::PARAM_STR);
$query->bindParam(':sdate',$sdate,PDO::PARAM_STR);
$query->bindParam(':edate',$edate,PDO::PARAM_STR);
$query->bindParam(':rmk',$rmk,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Data is sucessfully added.")</script>';
echo "<script>window.location.href ='master_record_form.php'</script>";
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
 <title>Bluedale SocMed Work Tracking System - Master Record</title>
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
                                    <h3 class="block-title">Master Record</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
<p align="center"  style="padding-top: 20px">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">

                                
                               
     <tr>
    <th>Date :</th>
    <td>
    <input type="date" id="date" name="date"></td>
  </tr> 
   
   <tr>
    <th>Client Name :</th>
    <td>
    <input name="cn" placeholder="Client Name" class="form-control wd-450" required="true"></input></td>
  </tr> 
 
 <tr>
    <th>CS :</th>
    <td>
    <input name="cs" placeholder="CS" class="form-control wd-450" required="true"></input></td>
  </tr>
 
  <tr>
    <th>Social Media Type :</th>
    <td>

   <select name="smt" class="form-control wd-450" required="true" >
     <option value="fb" selected="true">Facebook</option>
     <option value="instagram">Instagram</option>
   </select></td>
  </tr>
  
  <tr>
    <th>Artwork Format :</th>
    <td>

   <select name="af" class="form-control wd-450" required="true" >
     <option value="static" selected="true">Static</option>
     <option value="carousel">Carousel</option>
   <option value="video" selected="true">Video</option>
     <option value="story">Story</option>
   </select></td>
  </tr>
  
  <tr>
    <th>Audience Reach :</th>
    <td>
    <input name="ar" placeholder="Audience Reach" class="form-control wd-450" required="true"></input></td>
  </tr>
  
  <tr>
    <th>Tenure :</th>
    <td>
    <input name="tnr" placeholder="Tenure" class="form-control wd-450" required="true"></input></td>
  </tr>
  
  <tr>
    <th>Start Date :</th>
    <td>
    <input type="date" id="sdate" name="sdate"></td>
  </tr>
  
  <tr>
    <th>End Date :</th>
    <td>
    <input type="date" id="edate" name="edate"></td>
  </tr>
  
  <tr>
    <th>Remark :</th>
    <td>
    <textarea name="rmk" placeholder="Remark" rows="12" cols="14" class="form-control wd-450"></textarea></td>
  </tr> 
  <div class="form-group row">
  <div class="col-12">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-alt-success" name="submit">
  <i class="fa fa-plus mr-5"></i> Add
                                                </button>
                                            </div>
                                        </div>
</table>
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