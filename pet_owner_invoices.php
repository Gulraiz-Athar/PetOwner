<?php
session_start();
check_session($_SESSION['material_user']);

?> <head> <?php
    $title = "Invoices";
    include 'partials/main.php';
    include 'partials/title-meta.php';
    include 'partials/head-css.php'; 
    include("services/database.php");
    include("assets/php/function.php");
    ?>
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
                    <a href="create_invoice.php" class="btn btn-success">Create Invoice</a>
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
                  <h4 class="header-title mb-3">Invoices History</h4>
                  <div class="table-responsive">
                    <table id="" class="table activate-select dt-responsive nowrap w-100">
                      <thead class="table-light">
                        <tr>
                          <th>Invoice No</th>
                          <th>Date Issued</th>
                          <th>Exp Date</th>
                          <th>Delivery Status</th>
                          <th>Invoice Status</th>
                          <th>Paid to Vet?</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody> <?php $pet_id = $_GET['id'];
                              $vet_id = $_SESSION['login_users']['id'];
                              $invoice = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `pet_owner_id` = '$pet_id' AND `veterinarian_id` = '$vet_id'  ORDER by `id` DESC");
                               while ($invoices = mysqli_fetch_assoc($invoice)) {
                                                            
                              ?> <tr>
                          <td>
                            <h5 class="m-0 fw-normal">
                              <a href="invoice_detail.php?id=<?php echo  $invoices['id'] ?>"> <?= $invoices['id'] ?> </a>
                            </h5>
                          </td>
                          <td>
                            <h5 class="m-0 fw-normal">  <?php current_date($invoices['created_at']); ?></h5>
                          </td>
                          <td>
                            <h5 class="m-0 fw-normal">  <?php exp_date($invoices['created_at']); ?></h5>
                          </td>
                          <td> <?php if($invoices['status'] == '1'){?> <span class="badge bg-soft-warning text-warning">Created
                              </span> <?php }else if($invoices['status'] == '2'){?> <span class="badge bg-soft-info text-info">Pending
                              </span> <?php }else if($invoices['status'] == '3'){?> <span class="badge bg-soft-success text-success">Delivered
                              </span> <?php }else if($invoices['status'] == '4'){?> <span class="badge bg-soft-warning text-warning">Delivered</span>
                            <?php } ?>
                          </td>
                          <td> <?php if($invoices['status'] == '1'){?> <span class="badge bg-soft-success text-success">Paid
                          </span> <?php }else if($invoices['status'] == '2'){?> <span class="badge bg-soft-info text-info">New
                          </span> <?php }else if($invoices['status'] == '3'){?> <span class="badge bg-soft-success text-success">Paid
                          </span> <?php }else if($invoices['status'] == '4'){?> <span class="badge bg-soft-warning text-warning">Delivered
                          </span> <?php } ?>
                          </td>
                          <td> <?php if($invoices['status'] == '1'){?> <a href="#" invoice_id=<?= $invoices['id']; ?> class="badge bg-soft-success text-success">Pending 
                          </a> <?php }else if($invoices['status'] == '2'){?> <span class="badge bg-soft-info text-info">New
                              </span> <?php }else if($invoices['status'] == '3'){?> <a href="https://api.wyngit.com/api/v1/orders/
																<?php echo $invoices['wyngit_id'] ?>/label?api_key=210511497528261495a6869d06439dc93d9220da5b129572e68f1ad1f3fbf8dc" 
                                class="badge bg-soft-danger text-danger">Paid </a> <?php }
                                else if($invoices['status'] == '4'){?> <span class="badge bg-soft-warning text-warning">Delivered</span> <?php }
                           ?> </td>
                          <td>
                            <div class="dropdown float-end">
                              <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a href="assets/php/invoice_pdf.php?id=
																		<?= $invoices['id'] ?>" class="dropdown-item" role="button">
                                  <i class="mdi mdi-download"></i>Download </a>
                                <a data-bs-toggle="modal" data-bs-target="#newdelivery" role="button" class="dropdown-item">
                                  <i class="fe-bar-chart-line- me-1"></i>
                                  <span>New Delivery <span>
                                </a>
                                <a href="edit_invoice.php?id=<?= $invoices['id'] ?>" class="dropdown-item" role="button">
                                  <i class="mdi mdi-pencil"></i>Edit invoice </a>
                              </div>
                            </div>
                          </td>
                        </tr> <?php  } ?> 
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
      <!-- content --> <?php include 'partials/footer.php'; ?> </div>
  </div>
  <!-- END wrapper --> <?php include 'partials/right-sidebar.php'; ?> <?php include 'partials/footer-scripts.php'; ?>
</body>
</html>