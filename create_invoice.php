<?php
session_start();

if (!isset($_SESSION['material_user'])) {
    header('Location: auth-login.php');
    exit();
}

include 'partials/main.php';
?>

<head>
    <?php
    $title = "Invoices";
    include 'partials/title-meta.php'; ?>

    <!-- Plugins css -->
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <?php include 'partials/head-css.php'; 
    include("services/database.php");
    include("assets/php/function.php");

    $createvaterinaries = mysqli_query($conn,"SELECT * FROM `vetprofiles`");
    $createpetowners = mysqli_query($conn,"SELECT * FROM `petowners`");


    ?>
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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    </div>
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
                                                     <option value="">Select Pet Owner</option>
                                                    <?php
                                                    $petowners = mysqli_query($conn, "SELECT * FROM `user` WHERE `role` = 'petowner'");
                                                    while ($petowner = mysqli_fetch_assoc($petowners)) {
                                                        ?>
                                                       
                                                        <option value="<?= $petowner['id'] ?>" <?= ($petowner['id'] == $invoice['pet_owner_id']) ? "selected" : "" ?>><?= $petowner['name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="pet_owner_address" class="form-label">Pet Owner Address</label>
                                                <input class="form-control" type="text" readonly  placeholder="Enter your pet owner address" id="pet_owner_address" name="pet_owner_address" required>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="pet_owner_address" class="form-label">Units</label>
                                                <input class="form-control" type="text"  placeholder="" name="units" required>
                                            </div>
                                            
                                        </div>
                                        
                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Cost (Including Taxes)</label>
                                                <input class="form-control" type="text"  placeholder="" name="cost" required>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="text-center d-grid">
                                        <button type="button" class="btn btn-success create_invoice" name="create_invoice"> Create Invoice</button>
                                    </div>

                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                    
                    </form>

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

    <!-- Plugins js-->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/libs/selectize/js/standalone/selectize.min.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="assets/js/pages/datatables.init.js"></script>
    <script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="assets/js/pages/authentication.init.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    

        
        $("#petowner_id").change(function(){
        
            var value = $(this).val();
            if(value){
                $.ajax({
                  url: "assets/php/services.php",
                  method: 'post',
                   data: {'flag' : 'petowner_data',
                       'id': value,
                   },
                  success: function(data){
                      var json = $.parseJSON(data);
                      var petowner_add = json.address;
                      
                      $("#pet_owner_address").val(petowner_add);

                  }
                });
            }else{
                $("#pet_owner_address").val('');
            }
            
        });
        
        $(".create_invoice").click(function(){
           
          $.ajax({
              url: "assets/php/create_invoice.php",
              method: 'post',
               data: $('#create_invoice').serialize(),
              success: function(petowner){  
                  
                 Swal.fire({
                  icon: "success",
                  title: "Congratulation",
                  text: "Invoice Created Successfully!",
                }).then((result) => {
                    
                    
                    window.location.href="invoice_detail.php?id="+petowner;
                    
                 
                });

              }
            });
            
            
        });
        
        
    </script>

</body>

</html>