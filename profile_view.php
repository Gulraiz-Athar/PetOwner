<?php
session_start();

if (!isset($_SESSION['material_user'])) {
    header('Location: auth-login.php');
    exit();
}

include('assets/php/function.php');
include('services/database.php');
include 'partials/main.php'; ?>

<head>
    <?php
    $title = "Profile";
    include 'partials/title-meta.php'; ?>

    <?php include 'partials/head-css.php'; ?>
</head>

<body>



    <!-- Begin page -->
    <div id="wrapper">

        <?php include 'partials/menu.php'; ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <?php include 'partials/topbar.php'; ?>

            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <?php
                    // $sub_title = "Contacts";
                    $title = "Profile";
                    include 'partials/page-title.php'; ?>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-4 col-xl-4">
                            <form action="assets/php/update_vet_profile.php" method="post" enctype="multipart/form-data">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="assets/images/<?php echo get_result($conn,$_GET['id'], 'user')['image']; ?>" class="rounded-circle avatar-lg img-thumbnail" style="width:50%;height:200px;" alt="profile-image">

                                    <input type="hidden" name="flag" value="update_image">
                                    <h4 class="mb-0"><?php echo $_GET['name']; ?></h4>
                                    <div class="text-start mt-3">
                                        
                                       
                                    </div>
                                    <br>
                                  
                                </div>
                            </div> <!-- end card -->

                          <form>

                        </div> <!-- end col-->

                        <div class="col-lg-8 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills nav-fill navtab-bg">
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link">-->
                                        <!--        About Me-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">-->
                                        <!--        Timeline-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link">-->
                                        <!--        Settings-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="aboutme">

                                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase me-1"></i>
                                                Experience</h5>

                                            <ul class="list-unstyled timeline-sm">
                                                <li class="timeline-sm-item">
                                                    <span class="timeline-sm-date">2015 - 18</span>
                                                    <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                                    <p>websitename.com</p>
                                                    <p class="text-muted mt-2">Everyone realizes why a new common language
                                                        would be desirable: one could refuse to pay expensive translators.
                                                        To achieve this, it would be necessary to have uniform grammar,
                                                        pronunciation and more common words.</p>

                                                </li>
                                                <li class="timeline-sm-item">
                                                    <span class="timeline-sm-date">2012 - 15</span>
                                                    <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                                    <p>Software Inc.</p>
                                                    <p class="text-muted mt-2">If several languages coalesce, the grammar
                                                        of the resulting language is more simple and regular than that of
                                                        the individual languages. The new common language will be more
                                                        simple and regular than the existing European languages.</p>
                                                </li>
                                                <li class="timeline-sm-item">
                                                    <span class="timeline-sm-date">2010 - 12</span>
                                                    <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                                    <p>Spiderhunts LLP</p>
                                                    <p class="text-muted mt-2 mb-0">The European languages are members of
                                                        the same family. Their separate existence is a myth. For science
                                                        music sport etc, Europe uses the same vocabulary. The languages
                                                        only differ in their grammar their pronunciation.</p>
                                                </li>
                                            </ul>

                                            <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>
                                                Projects</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Project Name</th>
                                                            <th>Start Date</th>
                                                            <th>Due Date</th>
                                                            <th>Status</th>
                                                            <th>Clients</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>App design and development</td>
                                                            <td>01/01/2015</td>
                                                            <td>10/15/2018</td>
                                                            <td><span class="badge bg-info">Work in Progress</span></td>
                                                            <td>Halette Boivin</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Coffee detail page - Main Page</td>
                                                            <td>21/07/2016</td>
                                                            <td>12/05/2018</td>
                                                            <td><span class="badge bg-success">Pending</span></td>
                                                            <td>Durandana Jolicoeur</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Poster illustation design</td>
                                                            <td>18/03/2018</td>
                                                            <td>28/09/2018</td>
                                                            <td><span class="badge bg-pink">Done</span></td>
                                                            <td>Lucas Sabourin</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Drinking bottle graphics</td>
                                                            <td>02/10/2017</td>
                                                            <td>07/05/2018</td>
                                                            <td><span class="badge bg-blue">Work in Progress</span></td>
                                                            <td>Donatien Brunelle</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Landing page design - Home</td>
                                                            <td>17/01/2017</td>
                                                            <td>25/05/2021</td>
                                                            <td><span class="badge bg-warning">Coming soon</span></td>
                                                            <td>Karel Auberjo</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div> <!-- end tab-pane -->
                                        <!-- end about me section content -->

                                        <div class="tab-pane " id="timeline">

                                            <!-- comment box -->
                                            <form action="#" class="comment-area-box mt-2 mb-3">
                                                <span class="input-icon">
                                                    <textarea rows="3" class="form-control" placeholder="Write something..."></textarea>
                                                </span>
                                                <div class="comment-area-btn">
                                                    <div class="float-end">
                                                        <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="btn btn-sm btn-light"><i class="far fa-user"></i></a>
                                                        <a href="#" class="btn btn-sm btn-light"><i class="fa fa-map-marker-alt"></i></a>
                                                        <a href="#" class="btn btn-sm btn-light"><i class="fa fa-camera"></i></a>
                                                        <a href="#" class="btn btn-sm btn-light"><i class="far fa-smile"></i></a>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- end comment box -->

                                            <!-- Story Box-->
                                            <div class="border border-light p-2 mb-3">
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 avatar-sm rounded-circle" src="assets/images/users/user-3.jpg" alt="Generic placeholder image">
                                                    <div class="w-100">
                                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                                        <p class="text-muted"><small>about 2 minuts ago</small></p>
                                                    </div>
                                                </div>
                                                <p>Story based around the idea of time lapse, animation to post soon!</p>

                                                <img src="assets/images/small/img-1.jpg" alt="post-img" class="rounded me-1" height="60" />
                                                <img src="assets/images/small/img-2.jpg" alt="post-img" class="rounded me-1" height="60" />
                                                <img src="assets/images/small/img-3.jpg" alt="post-img" class="rounded" height="60" />

                                                <div class="mt-2">
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-heart-outline"></i> Like</a>
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                                </div>
                                            </div>

                                            <!-- Story Box-->
                                            <div class="border border-light p-2 mb-3">
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 avatar-sm rounded-circle" src="assets/images/users/user-4.jpg" alt="Generic placeholder image">
                                                    <div class="w-100">
                                                        <h5 class="m-0">Thelma Fridley</h5>
                                                        <p class="text-muted"><small>about 1 hour ago</small></p>
                                                    </div>
                                                </div>
                                                <div class="font-16 text-center fst-italic text-dark">
                                                    <i class="mdi mdi-format-quote-open font-20"></i> Cras sit amet nibh libero, in
                                                    gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                                                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Duis
                                                    sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                                    porta. Mauris massa.
                                                </div>

                                                <div class="post-user-comment-box">
                                                    <div class="d-flex align-items-start">
                                                        <img class="me-2 avatar-sm rounded-circle" src="assets/images/users/user-3.jpg" alt="Generic placeholder image">
                                                        <div class="w-100">
                                                            <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">3 hours ago</small></h5>
                                                            Nice work, makes me think of The Money Pit.

                                                            <br />
                                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>

                                                            <div class="d-flex align-items-start mt-3">
                                                                <a class="pe-2" href="#">
                                                                    <img src="assets/images/users/user-4.jpg" class="avatar-sm rounded-circle" alt="Generic placeholder image">
                                                                </a>
                                                                <div class="w-100">
                                                                    <h5 class="mt-0">Kathleen Thomas <small class="text-muted">5 hours ago</small></h5>
                                                                    i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start mt-2">
                                                        <a class="pe-2" href="#">
                                                            <img src="assets/images/users/user-1.jpg" class="rounded-circle" alt="Generic placeholder image" height="31">
                                                        </a>
                                                        <div class="w-100">
                                                            <input type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-2">
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (28)</a>
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                                                </div>
                                            </div>

                                            <!-- Story Box-->
                                            <div class="border border-light p-2 mb-3">
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 avatar-sm rounded-circle" src="assets/images/users/user-6.jpg" alt="Generic placeholder image">
                                                    <div class="w-100">
                                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                                        <p class="text-muted"><small>15 hours ago</small></p>
                                                    </div>
                                                </div>
                                                <p>The parallax is a little odd but O.o that house build is awesome!!</p>

                                                <iframe src='https://player.vimeo.com/video/87993762' height='300' class="img-fluid border-0"></iframe>
                                            </div>

                                            <div class="text-center">
                                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                                            </div>

                                        </div>
                                        <!-- end timeline content-->

                                        <div class="tab-pane show active" id="settings">
                                            <form action="assets/php/update_vet_profile.php" method="post">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                                
                                                     <input type="hidden" name="flag" value="update_profile">
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Name: <?php echo get_result($conn,$_GET['id'], 'user')['name']; ?></label>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="useremail" class="form-label">Email Address : <?php echo get_result($conn,$_GET['id'], 'user')['email']; ?> </label>
                                                           

                                                        </div>
                                                    </div>
                                                    
                                                </div> <!-- end row -->
                                                
                                                <?php 
                                                
                                                    $role =  get_result($conn,$_GET['id'], 'user')['role']; 
                                                
                                                   if($role == "petowner"){ ?>
                                                       
                                                       
                                                       <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="useremail" class="form-label">Pets No: <?php echo get_result_users($conn,$_GET['id'])['pets_number']; ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="userpassword" class="form-label">Pet Species : <?php echo get_result_users($conn,$_GET['id'])['pet_species']; ?></label>
                                                                   
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                       
                                                       <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="useremail" class="form-label">Pets Address : <?php echo get_result_users($conn,$_GET['id'])['address']; ?></label>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="userpassword" class="form-label">Phone: <?php echo get_result($conn,$_GET['id'], 'user')['phone']; ?></label>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                       
                                                       
                                                       
                                                   <?php }else if($role == "veterinarian"){ ?>
                                                       
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="useremail" class="form-label">Pharmacy Name:  <?php echo get_result_users($conn,$_GET['id'])['pharmacy_name']; ?></label>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="userpassword" class="form-label">Pharmacy Code : <?php echo get_result_users($conn,$_GET['id'])['pharmacy_code']; ?></label>
                                                                    
                                                                   
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                        
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="useremail" class="form-label">Pharmacy Address: <?php echo get_result_users($conn,$_GET['id'])['pharmacy_address']; ?></label>
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="userpassword" class="form-label">Phone: <?php echo get_result($conn,$_GET['id'], 'user')['phone']; ?></label>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                       
                                                       
                                                  <?php }else{
                                                       
                                                        
                                                       
                                                   } ?>
                                                
                                                
                                                
                                                
                                                

                                                
                                            </form>
                                        </div>
                                        <!-- end settings content-->

                                    </div> <!-- end tab-content -->
                                </div>
                            </div> <!-- end card-->

                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php include 'partials/footer.php'; ?>

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <?php include 'partials/right-sidebar.php'; ?>

    <?php include 'partials/footer-scripts.php'; ?>

</body>

</html>