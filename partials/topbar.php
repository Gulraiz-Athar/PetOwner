<?php

    // include 'assets/php/function.php';
    
    $id = $_SESSION['login_users']['id'];
    // echo $id;
    
    
    $invoices = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `veterinarian_id` = '$id'");



?>

<!-- ========== Topbar Start ========== -->
<div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.php" class="logo-light">
                    <img src="assets/images/mario_logo.png" alt="logo" class="logo-lg">
                    <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.php" class="logo-dark">
                    <img src="assets/images/mario_logo.png" alt="dark logo" class="logo-lg">
                    <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- Dropdown Menu -->
            <div class="dropdown d-none d-xl-block">
                
                <?php if($_SESSION['login_users']['role'] == "petowner"){ ?>
                
                
                 <?php }else{ ?>
                 
                      <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        Create New
                        <i class="mdi mdi-chevron-down ms-1"></i>
                    </a>
                 
                  <?php } ?>
               
                
                
                
                <div class="dropdown-menu">
                    
                     <?php if($_SESSION['login_users']['role'] == "veterinarian"){ ?>
                   
                          <!-- item-->
                        <a href="create_invoice.php" class="dropdown-item" >
                            <i class="fe-briefcase me-1"></i>
                            <span>New Invoice</span>
                        </a>
                   
                    
                    <?php }else{ ?>
                    
                    
                     
                    <?php } ?>
                    
                  

                    <?php if($_SESSION['login_users']['role'] == "veterinarian"){ ?>
                   
                    
                    <?php }else if($_SESSION['login_users']['role'] == "petowner"){ 
                    
                    
                     }else{ ?>
                        
                        <!-- item-->
                        <a href="create_user.php" class="dropdown-item" role="button">
                            <i class="fe-user me-1"></i>
                            <span>Create Users</span>
                        </a>
                    
                   
                    
                    <?php } 
                    
                     if($_SESSION['login_users']['role'] == "veterinarian"){ ?>

                    <!-- item-->
                    <a data-bs-toggle="modal" data-bs-target="#newdelivery" role="button" class="dropdown-item">
                        <i class="fe-bar-chart-line- me-1"></i>
                        <span>New Delivery</span>
                    </a>
                    
                      <?php }else{ ?>
                    
                    
                     
                    <?php } ?>

                    <!-- item-->
                    <!--<a href="javascript:void(0);" class="dropdown-item">-->
                    <!--    <i class="fe-settings me-1"></i>-->
                    <!--    <span>Settings</span>-->
                    <!--</a>-->

                    

                </div>
            </div>

            <!-- Mega Menu Dropdown -->
            <!-- <div class="dropdown dropdown-mega d-none d-xl-block">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    Mega Menu
                    <i class="mdi mdi-chevron-down  ms-1"></i>
                </a>
                <div class="dropdown-menu dropdown-megamenu">
                    <div class="row">
                        <div class="col-sm-8">

                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="text-dark mt-0">UI Components</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="widgets.php">Widgets</a>
                                        </li>
                                        <li>
                                            <a href="extended-nestable.php">Nestable List</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Range Sliders</a>
                                        </li>
                                        <li>
                                            <a href="pages-gallery.php">Masonry Items</a>
                                        </li>
                                        <li>
                                            <a href="extended-sweet-alert.php">Sweet Alerts</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Treeview Page</a>
                                        </li>
                                        <li>
                                            <a href="extended-tour.php">Tour Page</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <h5 class="text-dark mt-0">Applications</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="ecommerce-products.php">eCommerce Pages</a>
                                        </li>
                                        <li>
                                            <a href="crm-dashboard.php">CRM Pages</a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.php">Email</a>
                                        </li>
                                        <li>
                                            <a href="apps-calendar.php">Calendar</a>
                                        </li>
                                        <li>
                                            <a href="contacts-list.php">Team Contacts</a>
                                        </li>
                                        <li>
                                            <a href="task-kanban-board.php">Task Board</a>
                                        </li>
                                        <li>
                                            <a href="email-templates.php">Email Templates</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <h5 class="text-dark mt-0">Extra Pages</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);">Left Sidebar with User</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Menu Collapsed</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Small Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">New Header Style</a>
                                        </li>
                                        <li>
                                            <a href="pages-search-results.php">Search Result</a>
                                        </li>
                                        <li>
                                            <a href="pages-gallery.php">Gallery Pages</a>
                                        </li>
                                        <li>
                                            <a href="pages-coming-soon.php">Maintenance & Coming Soon</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center mt-3">
                                <h3 class="text-dark">Special Discount Sale!</h3>
                                <h4>Save up to 70% off.</h4>
                                <a href="https://1.envato.market/Televetadmin" target="_blank" class="btn btn-primary rounded-pill mt-3">Download Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <ul class="topbar-menu d-flex align-items-center">
            <!-- Topbar Search Form -->
            <!--<li class="app-search dropdown me-3 d-none d-lg-block">-->
            <!--    <form>-->
            <!--        <input type="search" class="form-control rounded-pill" placeholder="Search..." id="top-search">-->
            <!--        <span class="fe-search search-icon font-16"></span>-->
            <!--    </form>-->
            <!--    <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">-->
                    <!-- item-->
            <!--        <div class="dropdown-header noti-title">-->
            <!--            <h5 class="text-overflow mb-2">Found 22 results</h5>-->
            <!--        </div>-->

                    <!-- item-->
            <!--        <a href="javascript:void(0);" class="dropdown-item notify-item">-->
            <!--            <i class="fe-home me-1"></i>-->
            <!--            <span>Analytics Report</span>-->
            <!--        </a>-->

                    <!-- item-->
            <!--        <a href="javascript:void(0);" class="dropdown-item notify-item">-->
            <!--            <i class="fe-aperture me-1"></i>-->
            <!--            <span>How can I help you?</span>-->
            <!--        </a>-->

                    <!-- item-->
            <!--        <a href="javascript:void(0);" class="dropdown-item notify-item">-->
            <!--            <i class="fe-settings me-1"></i>-->
            <!--            <span>User profile settings</span>-->
            <!--        </a>-->

                    <!-- item-->
            <!--        <div class="dropdown-header noti-title">-->
            <!--            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>-->
            <!--        </div>-->

            <!--        <div class="notification-list">-->
                        <!-- item-->
            <!--            <a href="javascript:void(0);" class="dropdown-item notify-item">-->
            <!--                <div class="d-flex align-items-start">-->
            <!--                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/user-2.jpg" alt="Generic placeholder image" height="32">-->
            <!--                    <div class="w-100">-->
            <!--                        <h5 class="m-0 font-14">Erwin E. Brown</h5>-->
            <!--                        <span class="font-12 mb-0">UI Designer</span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </a>-->

                        <!-- item-->
            <!--            <a href="javascript:void(0);" class="dropdown-item notify-item">-->
            <!--                <div class="d-flex align-items-start">-->
            <!--                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/user-5.jpg" alt="Generic placeholder image" height="32">-->
            <!--                    <div class="w-100">-->
            <!--                        <h5 class="m-0 font-14">Jacob Deo</h5>-->
            <!--                        <span class="font-12 mb-0">Developer</span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</li>-->

            <!-- Fullscreen Button -->
            <li class="d-none d-md-inline-block">
                <a class="nav-link waves-effect waves-light" href="" data-toggle="fullscreen">
                    <i class="fe-maximize font-22"></i>
                </a>
            </li>

            <!-- Search Dropdown (for Mobile/Tablet) -->
            <li class="dropdown d-lg-none">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ri-search-line font-22"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <!-- App Dropdown -->
            <!--<li class="dropdown d-none d-md-inline-block">-->
            <!--    <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">-->
            <!--        <i class="fe-grid font-22"></i>-->
            <!--    </a>-->
            <!--    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">-->

            <!--        <div class="p-2">-->
            <!--            <div class="row g-0">-->
            <!--                <div class="col">-->
            <!--                    <a class="dropdown-icon-item" href="#">-->
            <!--                        <img src="assets/images/brands/slack.png" alt="slack">-->
            <!--                        <span>Slack</span>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--                <div class="col">-->
            <!--                    <a class="dropdown-icon-item" href="#">-->
            <!--                        <img src="assets/images/brands/github.png" alt="Github">-->
            <!--                        <span>GitHub</span>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--                <div class="col">-->
            <!--                    <a class="dropdown-icon-item" href="#">-->
            <!--                        <img src="assets/images/brands/dribbble.png" alt="dribbble">-->
            <!--                        <span>Dribbble</span>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->

            <!--            <div class="row g-0">-->
            <!--                <div class="col">-->
            <!--                    <a class="dropdown-icon-item" href="#">-->
            <!--                        <img src="assets/images/brands/bitbucket.png" alt="bitbucket">-->
            <!--                        <span>Bitbucket</span>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--                <div class="col">-->
            <!--                    <a class="dropdown-icon-item" href="#">-->
            <!--                        <img src="assets/images/brands/dropbox.png" alt="dropbox">-->
            <!--                        <span>Dropbox</span>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--                <div class="col">-->
            <!--                    <a class="dropdown-icon-item" href="#">-->
            <!--                        <img src="assets/images/brands/g-suite.png" alt="G Suite">-->
            <!--                        <span>G Suite</span>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div> -->
            <!--        </div>-->
            <!--    </div>-->
            <!--</li>-->

            <!-- Language flag dropdown  -->
            <!--<li class="dropdown d-none d-md-inline-block">-->
            <!--    <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">-->
            <!--        <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="18">-->
            <!--    </a>-->
            <!--    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">-->

                    <!-- item-->
            <!--        <a href="javascript:void(0);" class="dropdown-item">-->
            <!--            <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>-->
            <!--        </a>-->

                    <!-- item-->
            <!--        <a href="javascript:void(0);" class="dropdown-item">-->
            <!--            <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>-->
            <!--        </a>-->

                    <!-- item-->
            <!--        <a href="javascript:void(0);" class="dropdown-item">-->
            <!--            <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>-->
            <!--        </a>-->

                    <!-- item-->
            <!--        <a href="javascript:void(0);" class="dropdown-item">-->
            <!--            <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>-->
            <!--        </a>-->

            <!--    </div>-->
            <!--</li>-->

            <!-- Notofication dropdown -->
             <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell font-22"></i>
                    <!--<span class="badge bg-danger rounded-circle noti-icon-badge">9</span>-->
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
                            </div>
                            <div class="col-auto">
                                <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                    <small>Clear All</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    
                        $id = $_SESSION['login_users']['id']; 
                        
                       $role = $_SESSION['login_users']['role'];
                       
                        if($role == "veterinarian")  {
                            
                             $trans_vet = mysqli_query($conn, "SELECT * FROM `transactions` WHERE `veterinarian_id` = '$id' GROUP by `created` DESC LIMIT 3;");
                            
                            while($row_trans = mysqli_fetch_assoc($trans_vet)){
                                
                                $created = $row_trans['created'];
                                $user_id = $row_trans['user_id'];
                                $invoice_id = $row_trans['invoice_id'];
                                $amount = $row_trans['paid_amount'];
                                
                                
                                // print_r(get_result($conn,$user_id,'user'));
                                
                                ?>
                                
                                <div class="px-1" style="max-height: 300px;" data-simplebar>
    
                                    <h5 class="text-muted font-13 fw-normal mt-2"><?php 
                                        echo $newDate = date("Y-m-d", strtotime($created));
                                    ?></h5>
                                   
            
                                    <a href="invoice_detail.php?id=<?php echo $invoice_id; ?>" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14"><?php echo get_result($conn,$user_id,'user')['name']; ?> </h5>
                                                    <small class="noti-item-subtitle text-muted"><?php echo get_result($conn,$user_id,'user')['name']; ?> have successfuly paid the $ <?php echo intval($amount); ?> invoice.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
            
                                    <div class="text-center">
                                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                    </div>
                                </div>
                                
                                
                                
                           <?php } 
                            
                        }else if($role == "admin"){ 
                            
                             $trans_vet = mysqli_query($conn, "SELECT * FROM `transactions` GROUP by `created` DESC LIMIT 3;");
                            
                            while($row_trans = mysqli_fetch_assoc($trans_vet)){
                                
                                $created = $row_trans['created'];
                                $user_id = $row_trans['user_id'];
                                $invoice_id = $row_trans['invoice_id'];
                                $amount = $row_trans['paid_amount'];
                                
                                
                                // print_r(get_result($conn,$user_id,'user'));
                                
                                ?>
                                
                                <div class="px-1" style="max-height: 300px;" data-simplebar>
    
                                    <h5 class="text-muted font-13 fw-normal mt-2"><?php 
                                        echo $newDate = date("Y-m-d", strtotime($created));
                                    ?></h5>
                                   
            
                                    <a href="invoice_detail.php?id=<?php echo $invoice_id; ?>" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                        <div class="card-body">
                                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="notify-icon bg-primary">
                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 text-truncate ms-2">
                                                    <h5 class="noti-item-title fw-semibold font-14"><?php echo get_result($conn,$user_id,'user')['name']; ?> </h5>
                                                    <small class="noti-item-subtitle text-muted"><?php echo get_result($conn,$user_id,'user')['name']; ?> have successfuly paid the $ <?php echo intval($amount); ?> invoice.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
            
                                    <div class="text-center">
                                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                    </div>
                                </div>
                                
                                
                                
                           <?php }
                            
                        }    ?>
                             
                           
                            
                            
                      
                       

                    

                    <!--<a href="vet_notifications.php" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">-->
                    <!--    View All-->
                    <!--</a>-->

                </div>
            </li>

            <!-- Light/Dark Mode Toggle Button -->
            <li class="d-none d-sm-inline-block">
                <div class="nav-link waves-effect waves-light" id="light-dark-mode">
                    <i class="ri-moon-line font-22"></i>
                </div>
            </li>

            <!-- User Dropdown -->
            <li class="dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                    <span class="ms-1 d-none d-md-inline-block">
                        <?=ucfirst($_SESSION['material_user']['name'])?> <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome <?=ucfirst($_SESSION['login_users']['name'])?>!</h6>
                    </div>

                    <?php if($_SESSION['login_users']['role'] == "petowner"){ ?>
                        
                           <!-- item-->
                            <a href="pet_profile.php" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>
                    
                    <?php }else if($_SESSION['login_users']['role'] == "veterinarian"){ ?>
                    
                       <!-- item-->
                        <a href="vet_profile.php" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>
                    
                    <?php }else{ ?>
                    
                     <!-- item-->
                        <a href="admin_profile.php" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>
                    
                   <?php } ?>
                 

                    <!-- item-->
                    <!--<a href="javascript:void(0);" class="dropdown-item notify-item">-->
                    <!--    <i class="fe-settings"></i>-->
                    <!--    <span>Settings</span>-->
                    <!--</a>-->

                    <!-- item-->
                    <!--<a href="javascript:void(0);" class="dropdown-item notify-item">-->
                    <!--    <i class="fe-lock"></i>-->
                    <!--    <span>Lock Screen</span>-->
                    <!--</a>-->

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="./auth-logout.php" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>
    </div>
</div>
<div id="editnewuser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel"></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
            <form id="auth_register_page_admin" method="POST">

            <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input class="form-control" type="text" placeholder="Enter your name" name="fullname" required="">
            </div>
            <div class="mb-3">
            <label for="emailaddress" class="form-label">Email address</label>
            <input class="form-control" type="email" required="" placeholder="Enter your email" name="email">
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group input-group-merge"> 
            <input type="password" class="form-control" placeholder="Enter your password" name="password" required="">
            <div class="input-group-text" data-password="false">
            <span class="password-eye"></span>
            </div>
            </div>
            </div>
            <div class="mb-3">
            <label for="emailaddress" class="form-label">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="user">User</option>
                <option value="petowner">Pet Owner</option>
                <option value="vetowner">Vet Owner</option>
            </select>
            </div>
            <div class="text-center d-grid">
            <button class="btn btn-success submit_register_admin" name="submit_register"> Create New User</button>
            </div>

            </form>
            </div>
        </div>
    </div>
</div>
<div id="newdelivery" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel"></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
            <form id="new_delivery" method="POST">

            <div class="mb-3">
                <label for="fullname" class="form-label">Invoice No</label>
                <select class="form-control invoice_no" name="invoice_no">
                    
                    
                    <option>Select Invoice</option>
                    
                    <?php
                    
                    while($row_invoices = mysqli_fetch_assoc($invoices)){ 
                        
                        if(empty($row_invoices['wyngit_id'])){ ?>
                        
                        <option value="<?php echo $row_invoices['id']; ?>"><?php echo $row_invoices['id']; ?></option>
                        
                     <?php   } 
                     }
                    
                    ?>
                </select>
            </div>
           
            <div class="mb-3">
                <label for="fullname" class="form-label">Pet Owner</label>
                <input type="text" class="form-control pet_owner" name="pet_owner" placeholder="" value="" required>
            </div>
            
             <div class="mb-3">
                <label for="fullname" class="form-label">Pick up Address</label>
                <input type="text" class="form-control pickupaddress" name="pickupaddress" placeholder="" readonly value="<?php echo get_result_users($conn,$id)['pharmacy_name']; ?>">
                <input type="hidden" name="flag" value="new_delivery">
            </div>
            
            <div class="mb-3">
                <label for="fullname" class="form-label">Drop off Address</label>
                <input type="text" class="form-control dropoffaddress" name="dropoffaddress" placeholder="" readonly value="">
            </div>
            
             <div class="mb-3">
                <label for="fullname" class="form-label">Weight</label>
                <input type="text" class="form-control weight" name="weight" placeholder="" value="" required>
            </div>
           

            <div class="text-center d-grid">
            <button class="btn btn-success new_delivery" name="new_delivery"> Create New Delivery</button>
            </div>

            </form>
            </div>
        </div>
    </div>
</div>

<!-- ========== Topbar End ========== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    
      $(document).ready(function(){
          
            $(".invoice_no").change(function(){
               
               var invoice_no = $(this).val();
               
               $.ajax({

                    url : 'assets/php/delivery_invoices.php',
                    type : 'POST',
                    data : {
                        'flag' : 'invoice_no_data_one',
                        'invoice_no' : invoice_no,
                    },
                    success : function(data) {              
                        const obj = JSON.parse(data);
                        $(".pet_owner").val(obj.name);
                        
                        
                        
                    }
                });
              
                $.ajax({

                    url : 'assets/php/delivery_invoices.php',
                    type : 'POST',
                    data : {
                        'flag' : 'invoice_no_data',
                        'invoice_no' : invoice_no,
                    },
                    success : function(data) {              
                        const obj = JSON.parse(data);
                        $(".dropoffaddress").val(obj.address);
                        
                        
                        
                    }
                });
               
                
                
            });
            
            
       
            
            
          
          
      });
    
</script>
