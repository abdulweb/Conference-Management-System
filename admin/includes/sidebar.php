<!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu" style="margin-top: 10px;">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- User detail -->
                        <div class="user-details" >
                            <div class="overlay"></div>
                            <div class="text-center">
                                <img src="..\admin/assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
                            </div>
                            <div class="user-info">
                                <div class="text-uppercase">
                                    <a href="#setting-dropdown" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user']?> <span class="mdi mdi-menu-down"></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- end user detail -->

                        <div class="dropdown" id="setting-dropdown">
                            <ul class="dropdown-menu">
                                
                                <li><a href="..\index.php"><i class="mdi mdi-logout m-r-5"></i> Logout</a></li>
                            </ul>
                        </div>

                        <ul>
                        	<li class="menu-title">Navigation</li>
                            <?php 
                                if ($_SESSION['usertype'] == 'admin') {?>
                            <li class="has_sub">
                                <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Conference</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="createConference.php">Add Conference</a></li>
                                    <li><a href="manageConference.php">Manage Conference</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i><span> Fee Managemnt </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add_fee.php">Add Conference Fee</a></li>
                                    <li><a href="manageFee.php">Manage Conference Fee</a></li>
                                    
                                </ul>
                            </li>

                           <!--  <li>
                                <a href="calendar.html" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Calendar </span></a>
                            </li> -->

                           

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class=" mdi mdi-account-settings-variant"></i><span> users </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="author.php">Authors</a></li>
                                    <li><a href="reviewer.php">Reviewers</a></li>
                                    <li><a href="path.php">Participat</a></li>
                                    
                                </ul>
                            </li>

                            <?php }
                            elseif ($_SESSION['usertype'] == 'author') {?>
                                <li class="has_sub">
                                    <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                                </li>

                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Document</span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="upload.php">Upload Paper</a></li>
                                        <li><a href="myPaper.php">My Papers</a></li>
                                    </ul>
                               
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> conferences</span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="conference.php">All conference</a></li>
                                        <li><a href="myconference.php">My conference</a></li>
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="profile.php" class="waves-effect"><i class="mdi mdi-account-settings-variant"></i> <span> Profile </span> </a>
                                </li>
                            
                            <?php
                            }
                            elseif ($_SESSION['usertype'] == 'reviewer') {?>
                                <li class="has_sub">
                                    <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                                </li>
                                <li class="has_sub">
                                    <a href="author_list.php" class="waves-effect"><i class="mdi mdi-account-multiple"></i> <span> Review Author </span> </a>
                                </li>
                                <li class="has_sub">
                                    <a href="profile.php" class="waves-effect"><i class="mdi mdi-account-settings-variant"></i> <span> Profile </span> </a>
                                </li>
                           <?php }

                            else{
                                return 'role not get';
                            }
                            
                            ?>


                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                    <div class="help-box">
                        <h5 class="text-muted m-t-0">For Help ?</h5>
                        <p class=""><span class="text-dark"><b>Email:</b></span> <br/> support@support.com</p>
                        <p class="m-b-0"><span class="text-dark"><b>Call:</b></span> <br/> (+123) 123 456 789</p>
                    </div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->