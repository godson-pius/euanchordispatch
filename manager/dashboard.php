<?php require_once 'includes/templates/header-page.php'; ?>

<?php 
    $pack_num = view_package_num();

    $on_hold_num = view_hold_num();

    $on_tran_num = view_trip_num();

    $feed_num = view_feedback_num();
?>

<?php require_once 'includes/templates/sidebar.php'; ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
<!-- Start content -->
<div class="content">
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <h4 class="header-title m-t-0 m-b-20">Welcome! Admin</h4>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="card-box widget-inline">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="widget-inline-box text-center">
                            <h3 class="m-t-10"><i class="text-primary mdi  mdi mdi-package"></i> <b><?= $pack_num ?></b></h3>
                            <p class="text-muted">Packages</p>
                        </div>
                    </div>

                    

                    <div class="col-sm-4">
                        <div class="widget-inline-box text-center b-0">
                            <h3 class="m-t-10"><i class="text-success mdi mdi-truck-delivery"></i> <b><?= $on_tran_num ?></b></h3>
                            <p class="text-muted">On Transit</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="widget-inline-box text-center b-0">
                            <h3 class="m-t-10"><i class="text-danger mdi mdi-account-off"></i> <b><?= $on_hold_num ?></b></h3>
                            <p class="text-muted">On Hold</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-box widget-inline">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-inline-box text-center">
                            <h3 class="m-t-10"><i class="text-info mdi   mdi-book-open"></i> <b><?= $feed_num ?></b></h3>
                            <p class="text-muted">Feedbacks</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row -->




</div> <!-- container -->
<?php require_once 'includes/templates/footer-page.php'; ?>