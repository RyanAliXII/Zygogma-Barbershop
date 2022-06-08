
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="Datatables.php" >
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                               Appointments
                            </a>
                            <a class="nav-link" href="reviews_and_rating.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                                Reviews and Feedback
                            </a>
                            <?php
                           
                                $user_type = $_SESSION['type'];
                                if($user_type == 'admin'){
                            
                            ?>
                            <a class="nav-link" href="service.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-cut"></i></i></div>
                                Services
                            </a>
                            <a class="nav-link" href="staff.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Staff
                            </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Zygoma ADMIN
                    </div>
                </nav>
            </div>
