 <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                            <!--Zircos-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="index.php" class="logo">
                            <!-- <img src="assets/images/logo.png" alt="" height="30"> -->
                            <h2 style="color: white;font-style: italic;margin-left: 270px;text-shadow: 1px 1px red;">ONLINE CONFERENCE MANAGEMENT SYSTEM</h2>
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>
                    <!-- end menu-extras -->

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="index.php"><i class="mdi mdi-view-dashboard"></i>Dasboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="conference.php"><i class="mdi mdi-layers"></i>Conference</a>
                                
                            </li>

                            <li class="has-submenu">
                                <a href="profile.php"><i class="mdi mdi-account"></i>Profile</a>
                                
                            </li>

                           
                            <li class="has-submenu navbar-right">
                                <a href="#"><i class=" mdi mdi-account-outline"></i>
                                <?php
                                $user_email = $_SESSION['user'] ;
                                    $query = mysqli_query($con, "select * from user_profile where email = '$user_email'");
                                    if (mysqli_num_rows($query) > 0) {
                                        $row = mysqli_fetch_assoc($query);
                                        echo 'Welcome'. " ". $row['fullname'];
                                    }
                                    else{
                                        echo $_SESSION['user'];
                                    }
                                ?>
                                </a>
                                <ul class="submenu">
                                    <li><a href="logout.php">Logout</a></li>
                                    <li><a href="profile.php"> My Profile</a></li>
                                    
                                </ul>
                            </li>

                            
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

