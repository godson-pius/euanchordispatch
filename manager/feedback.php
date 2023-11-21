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
            <h4 class="header-title m-t-0 m-b-20">Feedbacks</h4>
        </div>
    </div>

    <div class="row pt-5" >
        <div class="col-12" id="feed-cont" >
            <div class="table-responsive" id="load_feedback">
               
               
            </div>
        </div>

        <div id="load_more" class="w-100">
            
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