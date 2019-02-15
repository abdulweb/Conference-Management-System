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
                        <a href="index.html" class="logo">
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

                           <!--  <li class="has-submenu">
                                <a href="reviwers.php"><i class="mdi mdi-diamond"></i>Reviwer</a>
                                
                            </li> -->

                            <!-- <li class="has-submenu">
                                <a href="login.php"><i class="mdi mdi-google-pages"></i>Login</a>
                               
                            </li>

                            <li class="has-submenu">
                                <a href="register.php"><i class="mdi mdi-book-multiple"></i>Register</a>
                               
                            </li> -->
                            <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-email"></i>
                                    <span class="badge up bg-danger">8</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li>
                                        <h5>Messages</h5>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-2.jpg" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Patricia Beach</span>
                                                <span class="desc">There are new settings available</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-3.jpg" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Connie Lucas</span>
                                                <span class="desc">There are new settings available</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="assets/images/users/avatar-4.jpg" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Margaret Becker</span>
                                                <span class="desc">There are new settings available</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="all-msgs text-center">
                                        <p class="m-0"><a href="#">See all Messages</a></p>
                                    </li>
                                </ul>
                            </li>
                           <!--  <li class="has-submenu navbar-right">
                                <a href="../"><i class=" mdi mdi-logout"> Logout</i> </a>
                                
                            </li> -->
                            <li class="has-submenu navbar-right">
                                <a href="#"><i class=" mdi mdi-account-outline"></i><?=$_SESSION['user']?></a>
                                <ul class="submenu">
                                    <li><a href="logout.php">Logout</a></li>
                                    <li><a href="#">Profile</a></li>
                                    
                                </ul>
                            </li>

                            <!-- <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-home-map-marker"></i>Real Estate</a>
                                <ul class="submenu">
                                    <li><a href="real-estate-dashboard.html">Dashboard</a></li>
                                    <li><a href="real-estate-list.html">Property List</a></li>
                                    <li><a href="real-estate-column.html">Property Column</a></li>
                                    <li><a href="real-estate-detail.html">Property Detail</a></li>
                                    <li><a href="real-estate-agents.html">Agents</a></li>
                                    <li><a href="real-estate-profile.html">Agent Details</a></li>
                                    <li><a href="real-estate-add.html">Add Property</a></li>
                                </ul>
                            </li> -->
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

