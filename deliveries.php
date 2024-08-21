<?php
session_start();
check_session($_SESSION['material_user']);
?> <head>
   <?php
    $title = "Payouts";
    include 'partials/main.php';
    include 'partials/title-meta.php'; 
    include 'partials/head-css.php'; 
    include("services/database.php");
    include("assets/php/function.php"); ?>
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
                  <form class="d-flex align-items-center mb-3 ">
                    <!--<a href="create_invoice.php" class="btn btn-success">Create Invoice</a>-->
                </div>
                <h4 class="page-title">Invoices </h4>
              </div>
            </div>
          </div>
          <!-- end page title -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title mb-3">Deliveries History</h4>
                  <div class="table-responsive">
                    <table id="" class="table activate-select dt-responsive nowrap w-100">
                      <thead class="table-light">
                        <tr>
                          <th>Invoice No</th>
                          <th>Name & Email</th>
                          <th>Date Issued</th>
                          <th>Exp Date</th>
                          <th>Paid Amount</th>
                          <th>Invoice Status</th>
                        </tr>
                      </thead>
                      <tbody> <?php $invoice = mysqli_query($conn, "SELECT * FROM `transactions` ORDER by id DESC");
                                 while ($invoices = mysqli_fetch_assoc($invoice)) { ?> 
                        <tr>
                          <td>
                            <h5 class="m-0 fw-normal">
                              <a href="invoice_detail.php?id=<?php echo  $invoices['invoice_id'] ?>"> <?= $invoices['invoice_id'] ?> </a>
                            </h5>
                          </td>
                          <td> <?php  $user_id = $invoices['user_id']; ?>
                            <h5 class="m-0 fw-normal"> <?php echo get_result($conn,$user_id,'user')['name']; ?> </h5>
                            <p class="mb-0 text-muted">
                              <small>
                                <a href="#"> <?php echo get_result($conn,$user_id,'user')['email']; ?> </a>
                              </small>
                            </p>
                          </td>
                          <td>
                            <h5 class="m-0 fw-normal"> 
                               <?php current_date($invoices['created']); ?> </h5>
                          </td>
                          <td>
                            <h5 class="m-0 fw-normal"> 
                                <?php exp_date($invoices['created_at']); ?> </h5>
                          </td>
                          <td> <?php $amount = $invoices['paid_amount'];
                                     echo '$'.$amount_without_decimal = number_format($amount, 0, '.', '');                                      
                                ?>
                          </td>
                          <td>
                            <span class="badge bg-soft-success text-success">Paid</span>
                          </td>
                        </tr> <?php } ?> 
                    </tbody>
                    </table>
                  </div>
                  <!-- end .table-responsive-->
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
       <?php include 'partials/footer.php'; ?>
    </div>
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
  
</body>
</html>