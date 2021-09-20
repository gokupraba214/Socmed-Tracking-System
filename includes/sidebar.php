<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['socmed_work_tracking']==0)) {
  header('location:logout.php');
  } 
  else{

  ?>
   <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="content-header content-header-fullrow px-15">
                            <!-- Mini Mode -->
                            <div class="content-header-section sidebar-mini-visible-b">
                                <!-- Logo -->
                                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
                                <!-- END Logo -->
                            </div>
                            <!-- END Mini Mode -->

                            <!-- Normal Mode -->
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <!-- Close Sidebar, Visible only on mobile screens -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                                <!-- END Close Sidebar -->

                                <!-- Logo -->
                                <div class="content-header-item">
                                    <a class="link-effect font-w700" href="dashboard.php">
                                        
                                        <span class="font-size-xl text-dual-primary-dark">SocMed</span><span class="font-size-xl text-primary"> System</span>
                                    </a>
                                </div>
                                <!-- END Logo -->
                            </div>
                            <!-- END Normal Mode -->
                        </div>
                        <!-- END Side Header -->

                        <!-- Side User -->
                        <div class="content-side content-side-full content-side-user px-10 align-parent">
                            <!-- Visible only in mini mode -->
                            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                                <img class="img-avatar img-avatar32" src="assets/img/avatars/avatar15.jpg" alt="">
                            </div>
                            <!-- END Visible only in mini mode -->

                            <!-- Visible only in normal mode -->
                            <div class="sidebar-mini-hidden-b text-center">
                                <a class="img-link" href="">
                                    <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                                </a>
                                <ul class="list-inline mt-10">
                                       <?php
$aid=$_SESSION['socmed_work_tracking'];
$sql="SELECT AdminName from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                   
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="admin-profile.php"><?php  echo $row->AdminName;?></a>
                                    </li><?php $cnt=$cnt+1;}} ?>
                                    <li class="list-inline-item">
                                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="admin-profile.php">
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark" href="logout.php">
                                            <i class="si si-logout"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END Visible only in normal mode -->
                        </div>
                        <!-- END Side User -->

                        <!-- Side Navigation -->
                        <div class="content-side content-side-full">
                            <ul class="nav-main">
                                <li class="open">
                                    <a href="dashboard.php"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboards</span></a>
                                   
                                </li>
                              
                               
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu"><i class="si si-puzzle"></i><span class="sidebar-mini-hide"></span>Main Tables</a>
                                    <ul>
                                        <li>
                                            <a href="master_record.php">Master Records</a>
                                        </li>
                                        <li>
                                            <a href="master_record_completed.php">Completed Table</a>
                                        </li>
                                        <li>
                                            <a href="master_record_onhold.php">On Hold Table</a>
                                        </li>
                                    </ul>
                                </li>
                               
                                <li>
                                    <a  href="artwork_chase_record.php"><i class="si si-paper-plane fa-3x text-white-op"></i><span class="sidebar-mini-hide">Artwork chase</span></a>
                                 
                                </li>
                                 <li>
                                    <a  href="posting_schedule.php"><i class="fa fa-calendar"></i><span class="sidebar-mini-hide">Posting Schedule</span></a>
                                 
                                </li>

                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu"><i class="fa fa-table"></i><span class="sidebar-mini-hide"></span>Data Export</a>
                                    <ul>
                                        <li>
                                            <a href="export_master_record.php">Master Records</a>
                                        </li>
                                        <li>
                                            <a href="export_artwork_chase.php">Artwork Chase</a>
                                        </li>
                                        <li>
                                            <a href="export_posting_schedule.php">Posting Schedule</a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <!-- END Side Navigation -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
  <?php }  ?>