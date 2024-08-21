<?php
session_start();
if (!isset($_SESSION['login_users'])) {
    header('Location: auth-login.php');
    exit();
}

if ($_SESSION['login_users']['role'] == "petowner" ) {
    header('Location:vet_invoices.php');
}

include 'partials/main.php';
include 'assets/php/function.php';
include 'services/database.php';

$id = $_SESSION['login_users']['id']; 
$users = mysqli_query($conn, "SELECT * FROM `user` WHERE `role` = 'petowner'");


?> <head> <?php
    $title = "Dashboard";
    include 'partials/title-meta.php'; ?>
  <!-- Plugins css -->
  <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" /> <?php include 'partials/head-css.php'; ?>
</head>
<body>
  <!-- Begin page -->
  <div id="wrapper"> <?php include 'partials/menu.php'; ?>
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page"> <?php include 'partials/topbar.php'; ?> <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Dashboard</h4>
              </div>
            </div>
          </div>
          <!-- end page title -->
          <div class="row"> <?php if($_SESSION['login_users']['role'] == "veterinarian"){ ?> <div class="col-md-6 col-xl-4">
              <div class="widget-rounded-circle card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                        <i class="fe-heart font-22 avatar-title text-white"></i>
                      </div>
                    </div>
                    <div class="col-6">
                      <a href="pet_owners_available.php">
                        <div class="text-end">
                          <h3 class="text-dark mt-1">
                            <span data-plugin="counterup"> <?php echo get_pet_owners_count($conn); ?> </span>
                          </h3>
                          <p class="text-muted mb-1 text-truncate">Pet Owners</p>
                        </div>
                      </a>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div>
              <!-- end widget-rounded-circle-->
            </div>
            <!-- end col--> <?php }else if($_SESSION['login_users']['role'] == "petowner"){ ?> <div class="col-md-6 col-xl-4">
              <div class="widget-rounded-circle card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                        <i class="fe-heart font-22 avatar-title text-white"></i>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="text-end">
                        <h3 class="text-dark mt-1">
                          <span data-plugin="counterup"> <?php echo get_revenue_count_pet($conn, $id); ?> </span>
                        </h3>
                        <p class="text-muted mb-1 text-truncate">Paid Amount</p>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div>
              <!-- end widget-rounded-circle-->
            </div>
            <!-- end col--> <?php }else{ ?> <div class="col-md-6 col-xl-4">
              <div class="widget-rounded-circle card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                        <i class="fe-heart font-22 avatar-title text-white"></i>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="text-end">
                        <h3 class="text-dark mt-1">
                          <span data-plugin="counterup"> <?php echo get_admin_count($conn); ?> </span>
                        </h3>
                        <p class="text-muted mb-1 text-truncate">Users</p>
                      </div>
                    </div>
                  </div>
                  <!-- end row-->
                </div>
              </div>
              <!-- end widget-rounded-circle-->
            </div>
            <!-- end col--> <?php } ?> <div class="col-md-6 col-xl-4">
              <div class="widget-rounded-circle card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                        <i class="fe-shopping-cart font-22 avatar-title text-white"></i>
                      </div>
                    </div> <?php if($_SESSION['login_users']['role'] == "veterinarian"){ ?> <div class="col-6">
                      <div class="text-end">
                        <h3 class="text-dark mt-1">$ <span data-plugin="counterup"> <?php echo get_revenue_count_vet($conn, $id); ?> </span>
                        </h3>
                        <p class="text-muted mb-1 text-truncate">Revenue</p>
                      </div>
                    </div> <?php }else if($_SESSION['login_users']['role'] == "petowner"){ ?> <div class="col-6">
                      <div class="text-end">
                        <h3 class="text-dark mt-1">$ <span data-plugin="counterup"> <?php echo get_revenue_count_pet($conn, $id); ?> </span>
                        </h3>
                        <p class="text-muted mb-1 text-truncate">Revenue</p>
                      </div>
                    </div> <?php }else{ ?> <div class="col-6">
                      <div class="text-end">
                        <h3 class="text-dark mt-1">$ <span data-plugin="counterup"> <?php echo get_revenue_count_admin($conn); ?> </span>
                        </h3>
                        <p class="text-muted mb-1 text-truncate">Revenue</p>
                      </div>
                    </div> <?php } ?>
                  </div>
                  <!-- end row-->
                </div>
              </div>
              <!-- end widget-rounded-circle-->
            </div>
            <!-- end col-->
            <div class="col-md-6 col-xl-4">
              <div class="widget-rounded-circle card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                        <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                      </div>
                    </div> <?php if($_SESSION['login_users']['role'] == "veterinarian"){ ?> <div class="col-6">
                      <div class="text-end">
                        <h3 class="text-dark mt-1">
                          <span data-plugin="counterup"> <?php echo get_invoice_count($conn, $id); ?> </span>
                        </h3>
                        <p class="text-muted mb-1 text-truncate">Invoices</p>
                      </div>
                    </div> <?php }else if($_SESSION['login_users']['role'] == "petowner"){ ?> <div class="col-6">
                      <div class="text-end">
                        <h3 class="text-dark mt-1">
                          <span data-plugin="counterup"> <?php echo get_invoice_count_petowner($conn, $id); ?> </span>
                        </h3>
                        <p class="text-muted mb-1 text-truncate">Invoices</p>
                      </div>
                    </div> <?php }else{ ?> <div class="col-6">
                      <div class="text-end">
                        <h3 class="text-dark mt-1">
                          <span data-plugin="counterup"> <?php echo get_invoice_count_admin($conn, $id); ?> </span>
                        </h3>
                        <p class="text-muted mb-1 text-truncate">Invoices</p>
                      </div>
                    </div> <?php } ?>
                  </div>
                  <!-- end row-->
                </div>
              </div>
              <!-- end widget-rounded-circle-->
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->
          <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                  </div>
                  <h4 class="header-title mb-0">Total Revenue</h4>
                  <div class="widget-chart text-center" dir="ltr">
                    <div id="total-revenue" class="mt-0" data-colors="#f1556c"></div>
                    <h5 class="text-muted mt-0">Total sales made today</h5>
                    <h2>$ <?php echo get_revenue_count_day($conn, $id);?> </h2>
                    <p class="text-muted w-75 mx-auto sp-line-2">Traditional heading elements are designed to work best in the meat of your page content.</p>
                    <div class="row mt-3">
                    </div>
                  </div>
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col-->
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body pb-2">
                  <h4 class="header-title mb-3">Sales Analytics</h4>
                  <div dir="ltr">
                    <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                  </div>
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col-->
          </div>
          <!-- end row -->
          <div class="row"> 
             <div class="col-xl-6">
              <div class="card">
                <div class="card-body">
                  <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                      <!-- item-->
                      <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                  </div>
                  <h4 class="header-title mb-3">Invoice History</h4>
                  <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-hover table-centered m-0">
                      <thead class="table-light">
                        <tr>
                          <th>Pet Owner</th>
                          <th>Created</th>
                          <th>Expires</th>
                          <th>Total Invoice</th>
                          <th>Status</th>
                          <!--<th>Action</th>-->
                        </tr>
                      </thead>
                      <tbody> <?php while($row_users = mysqli_fetch_assoc($users)){ ?> <tr>
                          <td>
                            <h5 class="m-0 fw-normal">
                              <a href="profile_view.php?id=<?php echo $row_users['id']; ?>"> <?php echo $row_users['name']; ?> </a>
                            </h5>
                          </td>
                          <td> <?php $date = $row_users['created_at'];
                                     $old_date_timestamp = strtotime($date);
                                     echo $new_date = date('Y/m/d', $old_date_timestamp); 
                           ?> </td>
                          <td> <?php $date = $row_users['created_at'];
                                     $old_date_timestamp = strtotime($date. ' + 3 days');
                                     echo $new_date = date('Y/m/d', $old_date_timestamp); 
                                ?> </td>
                          <td> <?php echo get_pet_owners_invoices_count($conn, $row_users['id']); ?> </td>
                          <td>
                            <span class="badge bg-soft-warning text-warning">Pending</span>
                          </td>
                        </tr> <?php     } ?> 
                    </tbody>
                    </table>
                  </div>
                  <!-- end .table-responsive-->
                </div>
              </div>
              <!-- end card-->
            </div>
            <!-- end col --> <?php if($_SESSION['login_users']['role'] == 'veterinarian'){ ?> <div class="col-xl-6">
              <div class="card">
                <div class="card-body" style="text-align:center;overflow-y: scroll;height: 348px;">
                  <h4 class="header-title mb-3">Notification History</h4> <?php  
                    $trans_vet = mysqli_query($conn, "SELECT * FROM `transactions` WHERE `veterinarian_id` = '$id' GROUP by `created` DESC;");
                    while($row_trans = mysqli_fetch_assoc($trans_vet)){
                        
                        $user_id = $row_trans['user_id'];
                        $amount = $row_trans['paid_amount'];
                        $invoice_id = $row_trans['invoice_id'];
                        
                        ?> <br> <br> <br>
                        <a href="invoice_detail.php?id=<?php echo $invoice_id; ?>" style="border: 1px solid #212136;padding: 8px;font-size: 15px;color: #092D48;background: #5EC1CE;border-radius: 7px;"> <?php echo get_result($conn,$user_id,'user')['name']; ?> have successfuly paid invoice no $ <?php echo $invoice_id; ?>. </a>
                        <br> <br> <br> 
                    <?php } ?>

                </div>
              </div>
              <!-- end card-->
            </div>
            <!-- end col --> <?php }else if($_SESSION['login_users']['role'] == 'admin') { ?> <div class="col-xl-6">
              <div class="card">
                <div class="card-body" style="text-align:center;overflow-y: scroll;height: 300px;">
                  <h4 class="header-title mb-3">Notification History</h4> <?php
                    $trans_vet = mysqli_query($conn, "SELECT * FROM `transactions` GROUP by `created` DESC;");
                    while($row_trans = mysqli_fetch_assoc($trans_vet)){
                        $user_id = $row_trans['user_id'];
                        $amount = $row_trans['paid_amount'];
                        $invoice_id = $row_trans['invoice_id'];
                        
                        ?> <br> <br> <br>
                            <a href="invoice_detail.php?id=<?php echo $invoice_id; ?>" style="border: 1px solid #212136;padding: 8px;font-size: 15px;color: #092D48;background: #5EC1CE;border-radius: 7px;"> <?php echo get_result($conn,$user_id,'user')['name']; ?> have successfuly paid invoice no <?php echo $invoice_id; ?>. </a>
                            <br ><br>
                    <br> <?php } ?>
                </div>
              </div>
              <!-- end card-->
            </div>
            <!-- end col --> <?php }
                        ?>
          </div>
          <!-- end row -->
        </div>
        <!-- container -->
      </div>
      <!-- content --> <?php include 'partials/footer.php'; ?> </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
  <!-- Plugins js-->
  <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
  <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
  <script src="assets/libs/selectize/js/standalone/selectize.min.js"></script>
  <!-- Dashboar 1 init js-->
  <script src="assets/js/pages/dashboard-1.init.js"></script>
</body>
</html>