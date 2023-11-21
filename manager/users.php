<?php require_once 'includes/templates/header-page.php'; ?>


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
            <h4 class="header-title m-t-0 m-b-20">Packages</h4>
        </div>

         <div class="pb-5 ml-2">  
            <a href="add-package" class="btn btn-success"><i class="mdi mdi-plus mr-1"></i> Add Package</a>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive" id="load_package">
               
               
            </div>
        </div>
    </div>
</div> <!-- container -->

<?php require_once 'includes/templates/footer-page.php'; ?>
<script src="assets/js/ajax.js"></script>

<?php if (isset($_SESSION['success'])) {
    if ($_SESSION['success'] == true) {
        echo "<script>
            swal('Success', 'Package added successfully', 'success');
        </script>";

        $_SESSION['success'] = false;
    }
} ?>


<script src="assets/js/ajax-delete.js"></script>