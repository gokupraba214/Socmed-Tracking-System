<!doctype html>
 <html lang="en" class="no-focus"> <!--<![endif]-->
 <head>
 <title>Bluedale SocMed Work Tracking System - Admin Dashboard</title>
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
                   
                        <!-- Row #1 -->
                        <div class="col-6 col-md-4 col-xl-3">
                            <a class="block text-center" href="master_record.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">

                                    <div class="ribbon-box"></div>
                                    <p class="mt-5">
                                        <i class="si si-book-open fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Master Records</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3">
                            <a class="block text-center" href="artwork_chase_record.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                     
                                    <div class="ribbon-box"></div>
                                    <p class="mt-5">
                                        <i class="si si-paper-plane fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Artwork Chase</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-3">
                            <a class="block text-center" href="posting_schedule.php">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                                   
                                    <div class="ribbon-box"></div>
                                    <p class="mt-5">
                                        <i class="si si-calendar fa-3x text-white-op"></i>
                                    </p>
                                    <p class="font-w600 text-white">Posting Schedule</p>
                                </div>
                            </a>
                        </div>
                       
                    
                        <!-- END Row #1 -->
                    </div>
                  
                  
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
        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_pages_dashboard.js"></script>
    </body>
</html>