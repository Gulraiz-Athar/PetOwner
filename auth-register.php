<?php include 'partials/main.php'; ?> 
  <head> <?php
    $title = "Register & Signup";
    include 'partials/title-meta.php'; 
   include 'partials/head-css.php'; ?>
</head>
<body class="authentication-bg authentication-bg-pattern">
  <div class="account-pages mt-5 mb-5">
    <div class="container">
      <form id="auth_register_page" method="POST">
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-12">
            <div class="card bg-pattern">
              <div class="card-body p-4">
                <div class="text-center w-75 m-auto">
                  <div class="auth-brand">
                    <a href="index.php" class="logo logo-dark text-center">
                      <span class="logo-lg">
                        <img src="assets/images/mario_logo.png" alt="" height="100">
                      </span>
                    </a>
                    <a href="index.php" class="logo logo-light text-center">
                      <span class="logo-lg">
                        <img src="assets/images/mario_logo.png" alt="" height="100">
                      </span>
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="fullname" class="form-label">Full Name</label>
                      <input class="form-control" type="text" placeholder="Enter your name" name="fullname" required>
                    </div>
                    <div class="mb-3">
                      <label for="country" class="form-label">Country</label>
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
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group input-group-merge">
                        <input type="password" class="form-control" placeholder="Enter your password" 
                        name="password" required>
                        <div class="input-group-text" data-password="false">
                          <span class="password-eye"></span>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3 veterian">
                      <label for="pharmacy_name" class="form-label ">Pharmacy Name</label>
                      <input class="form-control" type="text" placeholder="Enter your pharmacy name" 
                      name="pharmacy_name" required>
                    </div>
                    <div class="mb-3 pet_owner" style="display:none;">
                      <label for="no_of_pets" class="form-label">No of Pets</label>
                      <input class="form-control" type="text" placeholder="" name="pets_number" required>
                    </div>
                    <div class="mb-3 pet_owner" style="display:none;">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="checkbox_signup">
                        <label class="form-check-label" name="over_18" for="checkbox-signup">Over 18 yo</label>
                      </div>
                    </div>
                    <div class="mb-3 veterian">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="checkbox_signup">
                        <label class="form-check-label" for="checkbox-signup">I am authorized by VCBC to prescribe</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input class="form-control" type="email" required placeholder="Enter your email" name="email" 
                      required>
                    </div>
                    <div class="mb-3">
                      <label for="province" class="form-label">Province</label>
                      <input class="form-control" type="text" placeholder="Enter your province" name="province" required>
                    </div>
                    <div class="mb-3">
                      <label for="postal_code" class="form-label">Postal Code</label>
                      <input class="form-control" type="text" placeholder="Enter your Postal Code" name="postal_code" 
                      required>
                    </div>
                    <div class="mb-3 veterian">
                      <label for="pharmacy_code" class="form-label ">Pharmacy Postal Code</label>
                      <input class="form-control" type="text" placeholder="" name="pharmacy_code" required>
                    </div>
                    <div class="mb-3 pet_owner" style="display:none;">
                      <label for="pet_species" class="form-label">Pets Species</label>
                      <input class="form-control" type="text" placeholder="" name="pet_species" required>
                    </div>
                    <div class="col-md-12">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="checkbox_signup">
                        <label class="form-check-label" for="checkbox-signup">Tele-Vet user </label>
                      </div>
                    </div>
                    <br>
                    <div class="text-center d-grid">
                      <button class="btn btn-success submit_register" name="submit_register"> Sign Up </button>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                      <label for="city" class="form-label">City</label>
                      <input class="form-control" type="text" placeholder="Enter your city" name="city" required>
                    </div>
                    <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <div class="input-group input-group-merge">
                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="role" class="form-label">Type of User</label>
                      <select class="form-control" name="role" id="role">
                        <option value="veterinarian">Veterinarian</option>
                        <option value="petowner">Pet Owner</option>
                      </select>
                    </div>
                    <div class="mb-3 veterian">
                      <label for="pharmacy_address" class="form-label ">Pharmacy Address</label>
                      <input class="form-control" type="text" placeholder="Enter your pharmacy address" 
                      name="pharmacy_address" required>
                    </div>
                    <div class="mb-3 pet_owner" style="display:none;">
                      <label for="address" class="form-label">Address</label>
                      <input class="form-control" type="text" placeholder="Enter your address" name="address" required>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end card-body -->
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->
          <div class="col-md-8 col-lg-6 col-xl-6">
      </form>
      <div class="row mt-3">
        <div class="col-12 text-center">
          <p class="text-white-50">Already have account? <a href="auth-login.php" class="text-white ms-1">
              <b>Sign In</b>
            </a>
          </p>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end col -->
  </div>
  </form>
  <!-- end row -->
  </div>
  <!-- end container -->
  </div>
  <!-- end page -->
  <?php include 'partials/right-sidebar.php'; ?>
  <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>