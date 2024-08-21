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

    $id = $_GET['id'];
    $invoice_data = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `id` = '$id'");
    $row_invoice_data = mysqli_fetch_assoc($invoice_data);

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
                <div class="page-title-right"></div>
                <h4 class="page-title">Invoices</h4>
              </div>
            </div>
          </div>
          <!-- end page title -->
          <form action="" method="POST" id="create_invoice">
            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="" class="form-label">Select Pet Owner</label>
                          <select name="petowner_id" id="petowner_id" class="form-control">
                            <option value="">Select Pet Owner</option> <?php
                                $petowners = mysqli_query($conn, "SELECT * FROM `user` WHERE `role` = 'petowner'");
                                while ($petowner = mysqli_fetch_assoc($petowners)) {
                                    ?> <option value="<?= $petowner['id'] ?>" 
                                    <?= ($petowner['id'] == $invoice['pet_owner_id']) ? "selected" : "" ?>>
                                    <?= $petowner['name'] ?> </option> <?php
                                }
                                ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="pet_owner_address" class="form-label">Pet Owner Address</label>
                          <input class="form-control" type="text" readonly placeholder="Enter your pet owner address"
                           id="pet_owner_address" name="pet_owner_address" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="units" class="form-label">Units</label>
                          <input class="form-control" type="text" placeholder="" name="units" required 
                          value="<?php echo $row_invoice_data['units']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="cost" class="form-label">Cost (Including Taxes)</label>
                          <input type="hidden" name="invoice_id" id="invoice_id" value="<?php echo $row_invoice_data['id']; ?>">
                          <input class="form-control" type="text" placeholder="" name="cost"
                           value="<?php echo $row_invoice_data['paid_to_vet']; ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="text-center d-grid">
                      <button type="button" class="btn btn-success create_invoice" name="create_invoice"> Create Invoice</button>
                    </div>
                  </div>
                </div>
                <!-- end card-->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </form>
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