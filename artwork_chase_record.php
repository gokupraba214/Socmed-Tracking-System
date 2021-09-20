<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['socmed_work_tracking']==0)) {
  header('location:logout.php');
  } 
  else{

if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblartworkchaseform where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'artwork_chase_record.php'</script>";     


}

?>
<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>Bluedale SocMed Work Tracking System - Artwork Chase Record</title>

        <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" id="css-main" href="assets/css/codebase.css">

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
					
                       <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Artwork Chase Table Record</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead>

                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Client Name</th>
                                        <th class="d-none d-sm-table-cell">CS</th>
                                        <th class="d-none d-sm-table-cell">Type</th>
                                        <th class="d-none d-sm-table-cell">Artwork Format</th>
                                        <th class="d-none d-sm-table-cell">Tenure</th>
										                    <th class="d-none d-sm-table-cell">Campaign</th>
                                        <th class="d-none d-sm-table-cell">Duration</th>
                                        <th class="d-none d-sm-table-cell">Artwork Deadline</th>
                                        <th class="d-none d-sm-table-cell">Artwork Received</th>
                                        <th class="d-none d-sm-table-cell">Chop & Sign Sent</th>
                                        <th class="d-none d-sm-table-cell">Chop & Sign Received</th>
                                        <th class="d-none d-sm-table-cell">Date to Live</th>
                                        <th class="d-none d-sm-table-cell">Remarks</th>
                                        <th class="d-none d-sm-table-cell"></th>
                                        <th class="d-none d-sm-table-cell"></th>
                                       </tr>
                                </thead>
						                       <tbody>
                                
										<?php

$sql="SELECT * FROM tblclientname INNER JOIN tblartworkchaseform on tblclientname.ClientName = tblartworkchaseform.ClientName";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                  
                                    <tr>
                                        <td  class="font-w600"><?php echo htmlentities($cnt);?></td>
                                         <td  class="font-w600"><?php  echo htmlentities($row->ClientName);?></td>
                                         <td  class="font-w600"><?php  echo htmlentities($row->CS);?></td>
                                         <td  class="font-w600"><?php  echo htmlentities($row->SocialMediaType);?></td>
                                         <td  class="font-w600"><?php  echo htmlentities($row->ArtworkFormat);?></td>
                                         <td  class="font-w600"><?php  echo htmlentities($row->Tenure);?></td> 
										                     <td class="font-w600"><?php  echo htmlentities($row->Campaign);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->Duration);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->ArtworkDeadline);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->ArtworkReceived);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->ChopAndSignSent);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->ChopAndSignReceived);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->DatetoLive);?></td>
										                    <td class="font-w600"><?php  echo htmlentities($row->Remark);?></td>
                                        <td class="font-w600"><a href="artwork_chase_record_edit.php?ivid=<?php echo htmlentities ($row->ID);?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                        <td class="d-none d-sm-table-cell"><a href="artwork_chase_record.php?delid=<?php echo ($row->ID);?>" onclick="return confirm('Do you really want to Delete ?');"><i class="fa fa-trash fa-delete" aria-hidden="true"></i></a></td>
                                      </tr>
                                         
     <?php $cnt=$cnt+1;}} ?>                                         
                                </tbody>
 

                            </table>
                        </div>
                      </div>
               
                    <!-- END Dynamic Table Full Pagination -->

                    <!-- END Dynamic Table Simple -->
								
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