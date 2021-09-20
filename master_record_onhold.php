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
    echo "<script>window.location.href ='master_record.php'</script>";
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
					
                       <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Master Record Table Record</h3>
                        </div>
								
								 <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="d-none d-sm-table-cell">Date</th>
                                        <th class="d-none d-sm-table-cell">Client Name</th>
                                        <th class="d-none d-sm-table-cell">CS</th>
                                        <th class="d-none d-sm-table-cell">Social Media Type</th>
                                        <th class="d-none d-sm-table-cell">Artwork Format</th>
                                        <th class="d-none d-sm-table-cell">Audience Reach</th>
                                        <th class="d-none d-sm-table-cell">Tenure</th>
                                        <th class="d-none d-sm-table-cell">Start Date</th>
                                        <th class="d-none d-sm-table-cell">End Date</th>
                                        <th class="d-none d-sm-table-cell">Remark</th>
                                        <th class="d-none d-sm-table-cell">Status</th>
										                    <th class="d-none d-sm-table-cell"></th>
                                       </tr>
                                </thead>
                                <tbody>
								
								<?php
$sql="SELECT * from tblclientname where Status='On Hold'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <tr>
                                       <td class="font-w600"><?php echo htmlentities($cnt);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->Date);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->ClientName);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->CS);?></td>
									   <td class="font-w600"><?php  echo htmlentities($row->SocialMediaType);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->ArtworkFormat);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->AudienceReach);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->Tenure);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->StartDate);?></td>
									   <td class="font-w600"><?php  echo htmlentities($row->EndDate);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->Remark);?></td>
                                       <td class="font-w600"><?php echo htmlentities($sts=$row->Status);?></td>
									   <td class="d-none d-sm-table-cell"><a href="artwork_chase_action.php?cid=<?php echo htmlentities ($row->ID);?>cname=<?php echo htmlentities ($row->ClientName);?>"><i class="fa fa-plus-square" aria-hidden="true"></i></a> || <a href="master_record_edit.php?ivid=<?php echo htmlentities ($row->ID);?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
									   </tr> 
									   <?php $cnt=$cnt+1;}} ?> 
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full Pagination -->

                    <!-- END Dynamic Table Simple -->
                </div>
								
								<div class="block-content">

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
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
    <input type="date" id="date" name="date" required="true"></td>
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
    <input type="date" id="sdate" name="sdate" required="true"></td>
  </tr>
  
  <tr>
    <th>End Date :</th>
    <td>
    <input type="date" id="edate" name="edate" required="true"></td>
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

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_tables_datatables.js"></script>
    </body>
</html>
<?php }  ?>