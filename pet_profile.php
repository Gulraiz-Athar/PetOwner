<?php
session_start();

if (!isset($_SESSION['material_user'])) {
    header('Location: auth-login.php');
    exit();
}

$id = $_SESSION['login_users']['id'];
include('assets/php/function.php');
include('services/database.php');
include 'partials/main.php'; ?> <head> <?php
    $title = "Profile";
    include 'partials/title-meta.php'; ?> <?php include 'partials/head-css.php'; ?> </head>
<body>
  <!-- Begin page -->
  <div id="wrapper"> <?php include 'partials/menu.php'; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page"> <?php include 'partials/topbar.php'; ?> <div class="content">
        <!-- Start Content-->
        <div class="container-fluid"> <?php
                    $sub_title = "Contacts";
                    $title = "Profile";
                    include 'partials/page-title.php'; ?>
          <!-- end page title -->
          <div class="row">
            <div class="col-lg-4 col-xl-4">
              <form action="assets/php/update_pet_profile.php" method="post" enctype="multipart/form-data">
                <div class="card text-center">
                  <div class="card-body">
                    <img src="assets/images/<?php echo get_result($conn,$id, 'user')['image']; ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                    <input type="hidden" name="flag" value="update_image">
                    <h4 class="mb-0"> <?php echo $_SESSION['login_users']['name']; ?> </h4>
                    <div class="text-start mt-3">
                      <p class="text-muted mb-2 font-13">
                        <strong>Full Name :</strong>
                        <span class="ms-2"> <?php echo get_result($conn,$id, 'user')['name']; ?> </span>
                      </p>
                      <p class="text-muted mb-2 font-13">
                        <strong>Email :</strong>
                        <span class="ms-2"> <?php echo get_result($conn,$id, 'user')['email']; ?> </span>
                      </p>
                      <p class="text-muted mb-1 font-13">
                        <strong>City :</strong>
                        <span class="ms-2"> <?php echo get_result_users($conn,$id, 'user')['city']; ?> </span>
                      </p>
                    </div>
                    <br>
                    <input type="file" name="image">
                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2">
                      <i class="mdi mdi-content-save"></i> Save </button>
                  </div>
                </div>
                <!-- end card -->
                <form>
            </div>
            <!-- end col-->
            <div class="col-lg-8 col-xl-8">
              <div class="card">
                <div class="card-body">
                  <ul class="nav nav-pills nav-fill navtab-bg">
                  </ul>
                  <div class="tab-content">
                    <!-- end timeline content-->
                    <div class="tab-pane show active" id="settings">
                      <form action="assets/php/update_pet_profile.php" method="post">
                        <h5 class="mb-4 text-uppercase">
                          <i class="mdi mdi-account-circle me-1"></i> Personal Info
                        </h5>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo get_result($conn,$id, 'user')['name']; ?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="useremail" class="form-label">Email Address</label>
                              <input type="email" class="form-control" id="useremail" readonly placeholder="<?php echo get_result($conn,$id, 'user')['email']; ?>">
                            </div>
                          </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="pets_number" class="form-label">Pets Number</label>
                              <input type="text" class="form-control" id="pets_number" name="pets_number" placeholder="" value="<?php echo get_result_users($conn,$id)['pets_number']; ?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="pet_species" class="form-label">Pet Species</label>
                              <input type="text" class="form-control" id="pet_species" name="pet_species" placeholder="" value="<?php echo get_result_users($conn,$id)['pet_species']; ?>">
                            </div>
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="useremail" class="form-label">Address</label>
                              <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo get_result_users($conn,$id)['address']; ?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="
																																		<?php echo get_result($conn,$id, 'user')['password']; ?>">
                              <input type="hidden" name="flag" value="update_profile">
                            </div>
                          </div>
                          <!-- end col -->
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
                          </div>
                          <!-- end col -->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="city" class="form-label">City</label>
                              <input type="text" class="form-control" id="city" name="city" placeholder="" value="
																																				<?php echo get_result_users($conn,$id)['city']; ?>">
                            </div>
                          </div>
                          <!-- end col -->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="province" class="form-label">Province</label>
                              <input type="text" class="form-control" id="province" name="province" placeholder="" value="
																																					<?php echo get_result_users($conn,$id)['province']; ?>">
                            </div>
                          </div>
                          <!-- end col -->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="postal_code" class="form-label">Postal Code</label>
                              <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="" value="
																																						<?php echo get_result_users($conn,$id)['postal_code']; ?>">
                            </div>
                          </div>
                          <!-- end col -->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="
																																							<?php echo get_result($conn,$id, 'user')['phone']; ?>">
                            </div>
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="text-end">
                          <button type="submit" class="btn btn-success waves-effect waves-light mt-2">
                            <i class="mdi mdi-content-save"></i> Save </button>
                        </div>
                      </form>
                    </div>
                    <!-- end settings content-->
                  </div>
                  <!-- end tab-content -->
                </div>
              </div>
              <!-- end card-->
            </div>
            <!-- end col -->
          </div>
          <!-- end row-->
        </div>
        <!-- container -->
      </div>
      <!-- content --> <?php include 'partials/footer.php'; ?> </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>