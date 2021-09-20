<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['socmed_work_tracking']==0)) {
  header('location:logout.php');
  } 
  else{


?>
<html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
      <title>Bluedale SocMed Work Tracking System - Artwork Chase Record</title>

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
                    <h2 class="content-heading">Search Artwork Chase</h2>

                   

                    <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Search Artwork Chase Record</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <form id="basic-form" method="post">
                                <div class="form-group">
                                    <label>Search by Client Name</label>
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Client Name"></div>
                                
                                <br>
                                <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                            </form>
                            <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
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
                                       </tr>
                                </thead>
						 
                                


                                    <?php
$sql="SELECT * FROM tblclientname INNER JOIN tblartworkchaseform on tblclientname.ClientName = tblartworkchaseform.ClientName ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                   <tbody>
                                    <tr>
                                       <td rowspan="30" class="font-w600"><?php echo htmlentities($cnt);?></td>
									   </tr>
									   <tr>
                                        <td rowspan="30" class="font-w600"><?php  echo htmlentities($row->ClientName);?></td>
										</tr>
										<tr>
                                        <td  rowspan="30"class="font-w600"><?php  echo htmlentities($row->CS);?></td>
										</tr>
										<tr>
                                        <td  rowspan="30"class="font-w600"><?php  echo htmlentities($row->SocialMediaType);?></td>
										</tr>
										<tr>
                                        <td rowspan="30" class="font-w600"><?php  echo htmlentities($row->ArtworkFormat);?></td>
										</tr>
										<tr>
                                        <td rowspan="30" class="font-w600"><?php  echo htmlentities($row->Tenure);?></td> 
										</tr>
                                    <tr>
										 <td class="font-w600"><?php  echo htmlentities($row->Campaign);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->Duration);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->ArtworkDeadline);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->ArtworkReceived);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->ChopAndSignSent);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->ChopAndSignReceived);?></td>
                                         <td class="font-w600"><?php  echo htmlentities($row->DatetoLive);?></td>
										 <td class="font-w600"><?php  echo htmlentities($row->Remark);?></td>
                                      </tr>
                                         
                                        
                                </tbody>
 
 <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
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