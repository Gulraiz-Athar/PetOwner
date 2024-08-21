<?php
session_start();
check_session($_SESSION['material_user']);

?> <head> <?php
    $title = "Invoices";
    include 'partials/main.php';
    include("../../services/database.php");
    include 'partials/title-meta.php'; 
    include 'partials/head-css.php'; 
    include("services/database.php");
    include("assets/php/function.php"); 

    $id = $_GET['id'];
    $invoices = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `id` = '$id'");
    
    $get_percentage = mysqli_query($conn, "SELECT `percentage`, `delivery_fee` FROM `user` WHERE `role` = 'admin'");
    $row_percentage = mysqli_fetch_assoc($get_percentage);
    $percentage = $row_percentage['percentage'];
    $delivery_fee = $row_percentage['delivery_fee'];
    $row_invoice_det = mysqli_fetch_assoc($invoices);

    ?>
</head>
<body>
  <!-- Begin page -->
  <div id="wrapper"> <?php include 'partials/menu.php'; ?>
    <div class="content-page"> <?php include 'partials/topbar.php'; ?> <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right">
                  <form class="d-flex align-items-center mb-3">
                </div>
              </div>
            </div>
          </div>
          <!-- end page title -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <br>
                      <h2 style="padding-left:40px;padding-bottom:40px;padding-top:40px;" class="page-title">INVOICE</h2>
                      <div class="col-md-6"></div>
                      <div class="col-md-6">
                        <img src="assets/images/mario_logo.png" alt="dark logo" 
                        style="width:150px;float:right;margin-bottom:65px;margin-right:70px;" class="logo-sm k">
                        <br><br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3>
                          <b>BILL To</b>
                        </h3>
                        <h4> <?php echo get_result($conn,$row_invoice_det['pet_owner_id'],'user')['name']; ?> <br>
                         <?php echo get_result($conn,$row_invoice_det['pet_owner_id'],'user')['email']; ?> <br>
                          <?php echo get_result_users($conn,$row_invoice_det['pet_owner_id'])['address']; ?> </h4>
                      </div>
                      <div class="col-md-6">
                        <br>
                        <h4 style="float:right;"> Invoice no: &emsp; &emsp; &emsp; <?= $row_invoice_det['id']; ?> <br> 
                        Issue Date: &emsp; &emsp; &nbsp; <?php current_date($row_invoice_det['created_at']); ?> <br> 
                        Exp Date: &emsp; &emsp; &emsp; <?php exp_date($row_invoice_det['created_at']); ?> </h4>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table id="" class="table activate-select dt-responsive nowrap w-100">
                        <thead class="table-light">
                          <tr>
                            <th>Invoice No</th>
                            <th>Delivery Status</th>
                            <th>Invoice Status</th>
                            <th>Cost</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <h5 class="m-0 fw-normal"> <?= $row_invoice_det['id'] ?> </h5>
                            </td>
                            <td> <?php
                                if($row_invoice_det['status'] == '1'){?> <span class="badge bg-soft-success text-success">Paid</span> <?php }
                                else if($row_invoice_det['status'] == '2'){?><span class="badge bg-soft-info text-info">New</span> <?php }
                                else if($row_invoice_det['status'] == '3'){?> <span class="badge bg-soft-danger text-danger">Pending</span> <?php }
                                else if($row_invoice_det['status'] == '4'){?> <span class="badge bg-soft-warning text-warning">Delivered</span> <?php }
                                ?> </td>
                            <td> <?php
                                if($row_invoice_det['status'] == '1'){?> <span class="badge bg-soft-success text-success">Paid</span> <?php }
                                else if($row_invoice_det['status'] == '2'){?> <span class="badge bg-soft-info text-info">New</span> <?php }
                                else if($row_invoice_det['status'] == '3'){?> <span class="badge bg-soft-danger text-danger">Pending</span> <?php }
                                else if($row_invoice_det['status'] == '4'){?> <span class="badge bg-soft-warning text-warning">Delivered</span> <?php }
                                ?> </td>
                            <td>
                              <h5 class="m-0 fw-normal">$ <?= $row_invoice_det['paid_to_vet']; ?>.00 </h5>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- end .table-responsive-->
                    <div class="row">
                      <div class="col-md-6"></div>
                      <div class="col-md-6">
                        <h4 style="border: 1px solid black;padding: 9px;border-bottom: none;">
                          <b>Fees(a percentage of goods):</b> &nbsp;&nbsp;&emsp; &nbsp; &nbsp; &emsp; &emsp;&emsp;
                           $ <?php $new_width =  ($percentage / 100) * $row_invoice_det['paid_to_vet'];
                              echo number_format((float)$new_width, 2, '.', '');  ?>
                        </h4>
                        <h4 style="border: 1px solid black;padding: 9px;border-bottom: none;margin-top: -10px;">
                          <b>Delivery Fee:</b> &emsp; &emsp;&nbsp; &nbsp;&nbsp; &nbsp; &emsp; &emsp; 
                          &emsp; &emsp;&emsp; &emsp; &emsp;&emsp; $ <?= $delivery_fee; ?>.00
                        </h4>
                        <h4 style="border: 1px solid black;padding: 9px;border-bottom: none;margin-top: -10px;">
                          <b>TOTAL (CAD):</b> &emsp; &emsp;&nbsp; &nbsp;&nbsp; &emsp; &emsp; &emsp; 
                          &emsp;&emsp; &emsp; &emsp;&emsp; $ <?= $row_invoice_det['paid_to_vet'] ?>.00
                        </h4>
                        <h4 style="border: 1px solid black;padding: 7px;padding-top: 0px;padding-bottom: 13px;margin-top: -10px;background: red;color: white;">
                          <br>
                          <b>TOTAL Due (CAD):</b> &emsp; &emsp; &nbsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp;&emsp; $ <?php 
                              $total = $row_invoice_det['paid_to_vet'] - $new_width;
                               echo number_format((float) $total, 2, '.', '') - $delivery_fee; ?>
                        </h4>
                        <br> <?php if($_SESSION['login_users']['role'] == "veterinarian"){ ?> 
                          <button invoice_id="<?= $row_invoice_det['id']; ?>" class="btn btn-info send_invoice" 
                          style="float:right;">Send Invoice </button> <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end card-->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- container -->
      </div>
      <!-- content -->
      <?php include 'partials/footer.php'; ?>
    </div>
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>