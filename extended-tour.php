
<?php include 'partials/main.php'; ?>

<head>
    <?php
    $title = "Tour | Hopscotch";
    include 'partials/title-meta.php'; ?>

        <!-- Tour css -->
        <link href="assets/libs/hopscotch/css/hopscotch.min.css" rel="stylesheet" type="text/css" />

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
$sub_title = "Extended UI";$title = "Tour";
include 'partials/page-title.php'; ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="assets/images/mario_logo.png" alt="" height="20" id="logo-tour">
                                        </div>
    
                                        <h1 id="display-title-tour">This is a Heading 1</h1>
                                        <p class="text-muted">Suspendisse vel quam malesuada, aliquet sem sit
                                            amet, fringilla elit. Morbi
                                            tempor tincidunt tempor. Etiam id turpis viverra, vulputate sapien
                                            nec,
                                            varius sem. Curabitur ullamcorper fringilla eleifend. In ut eros
                                            hendrerit
                                            est consequat posuere et at velit.</p>
    
                                        <div class="clearfix"></div>
    
                                        <h2>This is a Heading 2</h2>
                                        <p class="text-muted">In nec rhoncus eros. Vestibulum eu mattis nisl.
                                            Quisque viverra viverra magna
                                            nec pulvinar. Maecenas pellentesque porta augue, consectetur
                                            facilisis diam
                                            porttitor sed. Suspendisse tempor est sodales augue rutrum
                                            tincidunt.
                                            Quisque a malesuada purus.</p>
    
                                        <div class="clearfix"></div>
    
                                        <h3>This is a Heading 3</h3>
                                        <p class="text-muted">Vestibulum auctor tincidunt semper. Phasellus ut
                                            vulputate lacus. Suspendisse
                                            ultricies mi eros, sit amet tempor nulla varius sed. Proin nisl
                                            nisi,
                                            feugiat quis bibendum vitae, dapibus in tellus.</p>
    
                                        <div class="clearfix"></div>
    
                                        <h4>This is a Heading 4</h4>
                                        <p class="text-muted">Nulla et mattis nunc. Curabitur scelerisque
                                            commodo condimentum. Mauris
                                            blandit, velit a consectetur egestas, diam arcu fermentum justo,
                                            eget
                                            ultrices arcu eros vel erat.</p>
    
                                        <div class="clearfix"></div>
    
                                        <h5>This is a Heading 5</h5>
                                        <p class="text-muted">Quisque nec turpis at urna dictum luctus.
                                            Suspendisse convallis dignissim
                                            eros at volutpat. In egestas mattis dui. Aliquam mattis dictum
                                            aliquet.
                                            Nulla sapien mauris, eleifend et sem ac, commodo dapibus odio.
                                            Vivamus
                                            pretium nec odio cursus elementum. Suspendisse molestie ullamcorper
                                            ornare.</p>
    
                                        <div class="clearfix"></div>
    
                                        <h6>This is a Heading 6</h6>
                                        <p class="text-muted">Donec ultricies, lacus id tempor condimentum, orci
                                            leo faucibus sem, a
                                            molestie libero lectus ac justo. ultricies mi eros, sit amet tempor
                                            nulla
                                            varius sed. Proin nisl nisi, feugiat quis bibendum vitae, dapibus in
                                            tellus.</p>
    
    
                                        <div class="text-center pt-4">
                                            <a href="javascript: void(0);" class="btn btn-danger" id="thankyou-tour">Thank you !</a>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        
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

        <!-- Tour page js -->
        <script src="assets/libs/hopscotch/js/hopscotch.min.js"></script>

        <!-- Tour init js-->
        <script src="assets/js/pages/tour.init.js"></script>

        
    </body>
</html>