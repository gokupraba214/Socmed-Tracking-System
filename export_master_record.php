<?php
include 'includes/DBController.php';
$db_handle = new DBController();
$productResult = $db_handle->runQuery("select * from tblclientname");

if (isset($_POST["export"])) {
    $filename = "Master_record.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();
}
?>

<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
 <title>Bluedale SocMed Work Tracking System - Master Record</title>
 <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">

        <link rel="stylesheet" id="css-main" href="assets/css/codebase.css">

    </head>
    <body>
        
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
           
           <?php include_once('includes/sidebar.php');?>

          <?php include_once('includes/header.php');?>
          <!-- Main Container -->
            <main id="main-container">
            	<div class="content">
                <!-- Register Forms -->
                    <h2 class="content-heading">Master Record</h2>
					
                       <!-- Dynamic Table Full Pagination -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Master Record Table Record</h3>
                        </div>
								
								 <div class="block-content block-content-full">
<div id="table-container">
    <table id="tab" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
        <thead>
            <tr>
                                        
                                        <th >Date</th>
                                        <th>Client Name</th>
                                        <th >CS</th>
                                        <th>Social Media Type</th>
                                        <th >Artwork Format</th>
                                        <th >Audience Reach</th>
                                        <th >Tenure</th>
                                        <th >Start Date</th>
                                        <th >End Date</th>
                                        <th >Remark</th>
                                        <th>Status</th>
                <!-- <th width="20%">Average Rating</th> -->
            </tr>
        </thead>
        <tbody>
 
            <?php
            $query = $db_handle->runQuery("select * from tblclientname");
            if (! empty($productResult)) {
                foreach ($productResult as $key => $value) {
                    ?>
                 
                     <tr>
           

                                      
                                       <td><?php echo $productResult[$key]["Date"]; ?></td>
                                       <td><?php echo $productResult[$key]["ClientName"]; ?></td>
                                       <td><?php echo $productResult[$key]["CS"]; ?></td>
									   <td><?php echo $productResult[$key]["SocialMediaType"]; ?></td>
                                       <td><?php echo $productResult[$key]["ArtworkFormat"]; ?></td>
                                       <td><?php echo $productResult[$key]["AudienceReach"]; ?></td>
                                       <td><?php echo $productResult[$key]["Tenure"]; ?> </td>
                                       <td> <?php echo $productResult[$key]["StartDate"]; ?></td>
									   <td><?php echo $productResult[$key]["EndDate"]; ?></td>
                                       <td><?php echo $productResult[$key]["Remark"]; ?></td>
                                       <td><?php echo $productResult[$key]["Status"]; ?></td>
									   
               
            </tr>
             <?php
                }
            }
            ?>
      </tbody>
    </table>

    <div class="btn">
        <form action="" method="post">
            <button type="submit" id="btnExport" name='export'
                value="Export to Excel" class="btn btn-info">Export to
                excel</button>
        </form>
    </div>
</div>
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

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_tables_datatables.js"></script>
    </body>
</html>