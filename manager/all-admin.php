<?php require_once 'includes/templates/header-page.php'; ?>

<?php 
    if (isset($_POST['submit'])) {
        $response = add_admin($_POST);

        if ($response === true) {
            $_SESSION['success'] = true;
            redirect_to('all-admin.php');
        }else {
            $errors = $response;
            extract($errors);
        }
    }
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
            <h4 class="header-title m-t-0 m-b-20">All Admin</h4>
        </div>

        <div class="pb-5 ml-2">  
            <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="ti-user mr-2"></i> add admin</button>


             <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= str_replace(".php", "", htmlentities($_SERVER['PHP_SELF'])); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="email" placeholder="Enter email"
                                class="form-control font-weight-bold" name="email" value="<?php if(isset($email)) echo $email; ?>">

                            <?php if (isset($email_err)) { ?>
                                <p class="text-danger err"><?php echo $email_err; ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <input type="password" placeholder="Enter password"
                                class="form-control font-weight-bold" name="password1" value="<?php if(isset($password1)) echo $password1; ?>">

                            <?php if (isset($pass_err)) { ?>
                                <p class="text-danger err"><?php echo $pass_err; ?></p>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <input type="password" placeholder="Confirm password"
                                class="form-control font-weight-bold" name="password2" value="<?php if(isset($password2)) echo $password2; ?>">

                            <?php if (isset($c_pass_err)) { ?>
                                <p class="text-danger err"><?php echo $c_pass_err; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-success modal-client-btn">Add Admin</button>
                    </div>

                    <?php if (isset($db)) {  ?>
                        <p class="text-danger err"><?php echo $db; ?></p>

                    <?php } ?>

                    <?php if (isset($mismatch)) {  ?>
                        <p class="text-danger err"><?php echo $mismatch; ?></p>

                    <?php } ?>
                    
                </form>
            </div>
        </div>  
    </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive" id="load_admin">
               
               
            </div>
        </div>

    </div>
</div> <!-- container -->


<?php require_once 'includes/templates/footer-page.php'; ?>
<script src="assets/js/ajax.js"></script>

<?php if (isset($_SESSION['success'])) {
    if ($_SESSION['success'] == true) {
        echo "<script>
            swal('Success', 'Admin added successfully', 'success');
        </script>";

        $_SESSION['success'] = false;
    }
} ?>

<?php if (isset($errors)) {
    echo "<script>
            swal('Error', 'Somthing went wrong', 'error');
        </script>";
} ?>



<!-- <script>
    swal('Success', 'Project created successfully', 'success');
</script> -->