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
                                    <!--<div class="dropdown float-end">-->
                                    <!--    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">-->
                                    <!--        <i class="mdi mdi-dots-vertical"></i>-->
                                    <!--    </a>-->
                                    <!--    <div class="dropdown-menu dropdown-menu-end">-->
                                            <!-- item-->
                                    <!--        <a  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editnewinvoice" role="button">Create Invoice</a>-->

                                    <!--    </div>-->
                                    <!--</div>-->

                                    <h4 class="header-title mb-3">Prescription History</h4>

                                    <div class="table-responsive">
                                    <table id="" class="table activate-select dt-responsive nowrap w-100">

                                            <thead class="table-light">
                                                <tr>
                                                    <th>Invoice No</th>
                                                    <th>Date Issued</th>
                                                    <th>Exp Date</th>
                                                    <th>Paid Amount</th>
                                                    <th>Invoice Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                        
                                                        $vet_id = $_SESSION['login_users']['id'];
                                                        $invoices = mysqli_query($conn, "SELECT * FROM `transactions` WHERE `user_id` = '$vet_id' ORDER by id DESC");

                                                        while ($invoice = mysqli_fetch_assoc($invoices)) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <h5 class="m-0 fw-normal"><a href="invoice_detail.php?id=<?php echo  $invoice['invoice_id'] ?>"><?= $invoice['invoice_id'] ?></a></h5>
                                                                </td>
                                                                
                                                                <td>
                                                                    <h5 class="m-0 fw-normal"><?php 
                                                                    
                                                                   $date = $invoice['created'];
                                                                    
                                                                    $old_date_timestamp = strtotime($date);
                                                                    echo $new_date = date('Y/m/d', $old_date_timestamp);   
                                                                    
                                                                    ?></h5>
                                                                </td>
                                                                
                                                                <td>
                                                                    <h5 class="m-0 fw-normal"><?php
                                                                    
                                                                    // $invoice['created_at']
                                                                    $date = $invoice['created_at'];
                                                                    
                                                                    $old_date_timestamp = strtotime($date. ' + 3 days');
                                                                    echo $new_date = date('Y/m/d', $old_date_timestamp); 
                                                                    
                                                                    
                                                                    ?></h5>
                                                                </td>

                                                                <td>
                                                                    
                                                                        <?php
                                                                       
                                                                     $amount = $invoice['paid_amount'];
                                                                   echo '$'.$amount_without_decimal = number_format($amount, 0, '.', '');
                                                                       
                                                                       
                                                                        ?>
                                                                    
                                                                      <!--get_result($conn, $invoice['veterinarian_id'], "vetprofiles")['name'] -->
                                                                </td>

                                                                <td>
                                                             
                                                                            <span class="badge bg-soft-success text-success">Paid</span>
                                                                        
                                                                      
                                                                </td>

                                                               
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>

                                            </tbody>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->
            <div id="editnewinvoice" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="standard-modalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                        <form id="invoice_create" method="POST">

                            <div class="mb-3">
                            <label for="fullname" class="form-label">Invoice No</label>
                            <input class="form-control" type="text" placeholder="Enter your invoice no" name="invoiceno" required>
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Select Veterinary</label>
                            <select name="veterinary_id" id="" class="form-control">
                                <?php
                                while($vaternaryall = mysqli_fetch_assoc($createvaterinaries)){
                                ?>
                                <option value="<?=$vaternaryall['id']?>"><?=$vaternaryall['name']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Select Pet Owner</label>
                            <select name="petowner_id" id="" class="form-control">
                                <?php
                                while($petownerall = mysqli_fetch_assoc($createpetowners)){
                                ?>
                                <option value="<?=$petownerall['id']?>"><?=$petownerall['name']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <label for="" class="form-label">Veterinary Paid</label>
                            <input class="form-control" type="number" placeholder="Enter your vaterinary paid amount less than $127" name="vaterinary" required="">
                            </div>
                            <div class="mb-3">
                            <label for="fullname" class="form-label">Petowners Paid</label>
                            <input class="form-control" type="number" placeholder="Enter your petowners paid amount " name="petowner" required="">
                            </div>
                            <div class="text-center d-grid">
                            <button class="btn btn-success submit_invoice" name="submit_invoice"> Create New Invoice</button>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
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
    
    <script>
        
        $(".generate_label").click(function(){
           
           var invoice_id = $(this).attr('invoice_id');
        
        $.ajax({
              url: "assets/php/generate_label.php",
              method: 'post',
               data: {'invoice_id': invoice_id,},
              success: function(data){
                  
                //   console.log(data);
                 
                 Swal.fire({
                  icon: "success",
                  title: "Congratulation",
                  text: "Label Generated Successfully!",
                }).then((result) => {
                    
                    // window.location.href="pet_owner_invoices.php?id="+petowner;
                    location.reload();
                 
                });

              }
            });
        
         
        });
        
        
        
    </script>
    
    
    

</body>

</html>