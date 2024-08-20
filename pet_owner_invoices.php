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
                                    <form class="d-flex align-items-center mb-3 "><a href="create_invoice.php" class="btn btn-success">Create Invoice</a></div>
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
                                            <tbody>
                                            <?php
                                        
                                                        $pet_id = $_GET['id'];
                                                        $vet_id = $_SESSION['login_users']['id'];
                                                        $invoices = mysqli_query($conn, "SELECT * FROM `invoices` WHERE `pet_owner_id` = '$pet_id' AND `veterinarian_id` = '$vet_id'  ORDER by `id` DESC");

                                                       
                                                        while ($invoice = mysqli_fetch_assoc($invoices)) {
                                                            
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <h5 class="m-0 fw-normal"><a href="invoice_detail.php?id=<?php echo  $invoice['id'] ?>"><?= $invoice['id'] ?></a></h5>
                                                                </td>
                                                                
                                                                <td>
                                                                    <h5 class="m-0 fw-normal"><?php 
                                                                    
                                                                   $date = $invoice['created_at'];
                                                                    
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
                                                                        if($invoice['status'] == '1'){?>
                                                                            <span class="badge bg-soft-warning text-warning">Created</span>
                                                                        <?php }else if($invoice['status'] == '2'){?>
                                                                             <span class="badge bg-soft-info text-info">Pending</span>
                                                                        <?php }else if($invoice['status'] == '3'){?>
                                                                            <span class="badge bg-soft-success text-success">Delivered</span>
                                                                        <?php }else if($invoice['status'] == '4'){?>
                                                                            <span class="badge bg-soft-warning text-warning">Delivered</span>
                                                                        <?php }
                                                                        ?>
                                                                    
                                                                      <!--get_result($conn, $invoice['veterinarian_id'], "vetprofiles")['name'] -->
                                                                </td>

                                                                <td>
                                                                    
                                                                    <?php
                                                                        if($invoice['status'] == '1'){?>
                                                                            <span class="badge bg-soft-success text-success">Paid</span>
                                                                        <?php }else if($invoice['status'] == '2'){?>
                                                                             <span class="badge bg-soft-info text-info">New</span>
                                                                        <?php }else if($invoice['status'] == '3'){?>
                                                                            <span class="badge bg-soft-success text-success">Paid</span>
                                                                        <?php }else if($invoice['status'] == '4'){?>
                                                                            <span class="badge bg-soft-warning text-warning">Delivered</span>
                                                                        <?php }
                                                                        ?>
                                                                    
                                                                      <!--get_result($conn, $invoice['pet_owner_id'], "petowners")['name'] -->
                                                                </td>

                                                                <td>
                                                                        
                                                                        <?php
                                                                        if($invoice['status'] == '1'){?>
                                                                            <a href="#" invoice_id=<?php echo $invoice['id']; ?> class="badge bg-soft-success text-success">Pending</a>
                                                                        <?php }else if($invoice['status'] == '2'){?>
                                                                             <span class="badge bg-soft-info text-info">New</span>
                                                                        <?php }else if($invoice['status'] == '3'){?>
                                                                            <a href="https://api.wyngit.com/api/v1/orders/<?php echo $invoice['wyngit_id'] ?>/label?api_key=210511497528261495a6869d06439dc93d9220da5b129572e68f1ad1f3fbf8dc" class="badge bg-soft-danger text-danger">Paid</a>
                                                                        <?php }else if($invoice['status'] == '4'){?>
                                                                            <span class="badge bg-soft-warning text-warning">Delivered</span>
                                                                        <?php }
                                                                        ?>
                                                                </td>
                                                        
                                                                <td>
                                                                    
                                                                    <div class="dropdown float-end">
                                                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="mdi mdi-dots-vertical"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <!-- item-->
                                                                            <a href="assets/php/invoice_pdf.php?id=<?= $invoice['id'] ?>" class="dropdown-item" role="button"><i class="mdi mdi-download"></i>Download </a>
                                                                            
                                                                        
                                                                            
                                                                             <a data-bs-toggle="modal" data-bs-target="#newdelivery" role="button" class="dropdown-item"><i class="fe-bar-chart-line- me-1"></i><span>New Delivery<span></a>
                                
                                                                             <a href="edit_invoice.php?id=<?= $invoice['id'] ?>" class="dropdown-item" role="button"><i class="mdi mdi-pencil"></i>Edit invoice </a>
                                                                                   
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <!--<a class="btn btn-xs btn-light" data-bs-toggle="modal" data-bs-target="#editinvoice<?= $invoice['id'] ?>"><i class="mdi mdi-eye"></i></a>-->
                                                                    <!--<a href="assets/php/invoice_pdf.php?id=<?= $invoice['id'] ?>" class="btn btn-xs btn-light" data_id="<?= $invoice['id'] ?>"><i class="mdi mdi-download"></i></a>-->
                                                                     
                                                                     
                                                                    <!--<a class="btn btn-xs btn-danger delete-btn-invoice" data_id="<?= $invoice['id'] ?>"><i class="mdi mdi-minus"></i></a>-->

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