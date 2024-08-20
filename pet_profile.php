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
                    $sub_title = "Contacts";
                    $title = "Profile";
                    include 'partials/page-title.php'; ?>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-4 col-xl-4">
                            <form action="assets/php/update_pet_profile.php" method="post" enctype="multipart/form-data">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="assets/images/<?php echo get_result($conn,$_SESSION['login_users']['id'], 'user')['image']; ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                   <input type="hidden" name="flag" value="update_image">
                                    <h4 class="mb-0"><?php echo $_SESSION['login_users']['name']; ?></h4>
                                    <div class="text-start mt-3">
                                        
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2"><?php echo get_result($conn,$_SESSION['login_users']['id'], 'user')['name']; ?></span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2"><?php echo get_result($conn,$_SESSION['login_users']['id'], 'user')['email']; ?></span></p>

                                        <p class="text-muted mb-1 font-13"><strong>City :</strong> <span class="ms-2"><?php echo get_result_users($conn,$_SESSION['login_users']['id'], 'user')['city']; ?></span></p>
                                    </div>
                                    <br>
                                   <input type="file" name="image" >
                                   
                                   <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                   
                                   
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
                                            <form action="assets/php/update_pet_profile.php" method="post">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo get_result($conn,$_SESSION['login_users']['id'], 'user')['name']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="useremail" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" id="useremail" readonly placeholder="<?php echo get_result($conn,$_SESSION['login_users']['id'], 'user')['email']; ?>">

                                                        </div>
                                                    </div>
                                                    
                                                </div> <!-- end row -->
                                                

                                                
                                                 <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="useremail" class="form-label">Pets Number</label>
                                                            <input type="text" class="form-control" id="pets_number" name="pets_number"  placeholder="" value="<?php echo get_result_users($conn,$_SESSION['login_users']['id'])['pets_number']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Pet Species</label>
                                                            <input type="text" class="form-control" id="pet_species" name="pet_species"  placeholder="" value="<?php echo get_result_users($conn,$_SESSION['login_users']['id'])['pet_species']; ?>">
                                                           
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="useremail" class="form-label">Address</label>
                                                            <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo get_result_users($conn,$_SESSION['login_users']['id'])['address']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="<?php echo get_result($conn,$_SESSION['login_users']['id'], 'user')['password']; ?>">
                                                            <input type="hidden" name="flag" value="update_profile">
                                                
                                                        </div>
                                                    </div> <!-- end col -->
                                                     <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Country</label>
                                                            <select class="form-select" autocomplete="country" id="country" name="country">
                                                
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Åland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia (Plurinational State of)</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="CV">Cabo Verde</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="BQ">Caribbean Netherlands</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo, Democratic Republic of the</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">Curaçao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="CI">Côte d'Ivoire</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="SZ">Eswatini (Swaziland)</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard Island and Mcdonald Islands</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, North</option>
                                                <option value="KR">Korea, South</option>
                                                <option value="XK">Kosovo</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MK">Macedonia North</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia</option>
                                                <option value="MD">Moldova</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar (Burma)</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="AN">Netherlands Antilles</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PS">Palestine</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn Islands</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Reunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthelemy</option>
                                                <option value="SH">Saint Helena</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin</option>
                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="CS">Serbia and Montenegro</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syria</option>
                                                <option value="TW">Taiwan</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey (Türkiye)</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UM">U.S. Outlying Islands</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VA">Vatican City Holy See</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Vietnam</option>
                                                <option value="VG">Virgin Islands, British</option>
                                                <option value="VI">Virgin Islands, U.S</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>

                                                        </div>
                                                    </div> <!-- end col -->
                                                    
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">City</label>
                                                             <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?php echo get_result_users($conn,$_SESSION['login_users']['id'])['city']; ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                    
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Province</label>
                                                             <input type="text" class="form-control" id="province" name="province" placeholder="" value="<?php echo get_result_users($conn,$_SESSION['login_users']['id'])['province']; ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                    
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Postal Code</label>
                                                             <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="" value="<?php echo get_result_users($conn,$_SESSION['login_users']['id'])['postal_code']; ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                    
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Phone</label>
                                                             <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?php echo get_result($conn,$_SESSION['login_users']['id'], 'user')['phone']; ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                    
                                                    
                                                </div> <!-- end row -->

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
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