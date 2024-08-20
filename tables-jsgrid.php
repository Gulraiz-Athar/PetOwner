
<?php include 'partials/main.php'; ?>

<head>
    <?php
    $title = "JsGrid Tables";
    include 'partials/title-meta.php'; ?>

        <!-- JsGrid css -->
        <link href="assets/libs/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css" />

		<?php include 'partials/head-css.php'; ?>
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
                        
                        <?php
$sub_title = "Tables";$title = "JsGrid Tables";
include 'partials/page-title.php'; ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="jsGrid"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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

        <!-- JsGrid js -->
        <script src="assets/libs/jsgrid/jsgrid.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/jsgrid.init.js"></script>

        
    </body>
</html>