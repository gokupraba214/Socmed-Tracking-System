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
        <title>Bluedale SocMed Work Tracking System - Posting Schedule</title>
		
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
                    <h2 class="content-heading">Posting Schedule</h2>
					
                       <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Posting Schedule Table Record</h3>
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
                                        <th class="d-none d-sm-table-cell">Tenure</th>
                                        <th class="d-none d-sm-table-cell">Start Date</th>
                                        <th class="d-none d-sm-table-cell">End Date</th>
										<th class="d-none d-sm-table-cell">View</th>
                                </thead>
                                <tbody>
								<?php
$sql="SELECT * from tblclientname";
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
                                       <td class="font-w600"><?php echo htmlentities($row->Date);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->ClientName);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->CS);?></td>
									   <td class="font-w600"><?php  echo htmlentities($row->SocialMediaType);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->Tenure);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->StartDate);?></td>
                                       <td class="font-w600"><?php  echo htmlentities($row->EndDate);?></td>
									  <td class="d-none d-sm-table-cell"><a href="view_posting_schedule.php?cid=<?php echo htmlentities ($row->ID);?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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
</html><?php }  ?>