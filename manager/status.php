<?php require_once 'includes/templates/header-page.php'; ?>


<?php require_once 'includes/templates/sidebar.php'; ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<?php
if (isset($_GET['cGFja19pZA--'])) {
    $en = "data-encrypt";
    $dy = "data-decrypt";

    $pack_id = encryptor($dy, $_GET['cGFja19pZA--']);



    if ($pack_id){
        $all_package = status_history($pack_id);
        if (!$all_package){
            redirect_to('users');
        }
    }else{
        redirect_to('users');
    }


    if (isset($_POST['submit'])) {
        $response = add_status($_POST, $pack_id);
        extract($_POST);

        if ($response === true) {
            $_SESSION['success'] = true;
            $id = $_GET['cGFja19pZA--'];
            redirect_to("status?cGFja19pZA--=$id");
        }else {
            $errors = $response;
            extract($errors);
        }
    }
}else {
    redirect_to('users');
}

?>


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="header-title m-t-0 m-b-20">Status History</h4>
                </div>

                <div class="pb-5 ml-2">
                    <a href="#" class="btn btn-success" data-target="#View" data-toggle="modal"><i class="mdi mdi-plus mr-1"></i> Add Status</a>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <?php if ($all_package) {
                            $packages = $all_package;
                        }
                        ?>
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Status</th>
                                <th>Location</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Note</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            <?php
                            if (!empty($packages)) {
                                $counter = 0;
                                foreach ($packages as $package) {
                                    extract($package);
                                    $counter++;
                                    ?>
                                    <tr>
                                        <td><?php echo $counter ?></td>
                                        <td><?= $status; ?></td>
                                        <td><?= $location ?></td>
                                        <td><?= $time ?></td>
                                        <td><?= $date ?></td>
                                        <td><?= $comments ?></td>

                                        <td class="text-right status_<?= $id ?>">

                                            <div class="row">
                                                <a class="nav-link waves-effect waves-light nav-user btn-light ml-auto mr-4" data-toggle="dropdown" href="#" role="button">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                                    <a href="javascript:void(0);" data-id="<?php echo $id ?>" class="dropdown-item notify-item " id="del-status">
                                                        <i class="ti-trash"></i> <span>Delete</span>
                                                    </a>

                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- container -->

        <div class="modal fade printcontent in"  id="View" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="px-0 pull-left" style="width: 50%;">
                            <img src="../logo.png" alt="" class="w-100">
                        </div>
                        <div class="col-6 px-0 pull-right" style="width: 50%; padding-right: 70px;">
                            <span class="pull-right"><?php echo date("F j, Y", time())?></span>
                        </div>
                    </div>

                    <div class="modal-body">

                        <form action="<?= str_replace(".php", "", htmlentities($_SERVER['PHP_SELF'])); ?>?cGFja19pZA--=<?= encryptor($en, $pack_id); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">status</label>
                                    <select id="select2" class="form-control" name="status">

                                        <option disabled >--SELECT--</option>
                                        <option value="In Transit" selected>In Transit</option>
                                        <option value="Pending" >Pending</option>
                                        <option value="Delivered" >Delivered</option>
                                        <option value="Delayed" >Delayed</option>
                                        <option value="On Hold" >On Hold</option>
                                        <option value="Clearance" >Clearance </option>
                                        <option value="in  Sorting" >in  Sorting</option>
                                        <option value="Shipment Pickup" >Shipment Pickup</option>

                                    </select>
                                </div>
                                <div class="col-md-6">

                                    <label for="">Location</label>
                                    <input type="text" class="form-control" name="location" value="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Time</label>
                                    <input type="text" class="form-control" name="status_time" value="" id="timepicker2">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Date</label>
                                    <input type="text" class="form-control" name="status_date" value="" id="datepicker">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Note</label>
                                    <input type="text" class="form-control" name="note" value="">
                                </div>
                                <div class="col-6 mt-4">
                                    <input type="submit" class="form-control btn btn-success" name="submit" value="Add Status">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <?php require_once 'includes/templates/footer-page.php'; ?>
        <?php require_once 'ajax-loading.php'; ?>
        <script src="assets/js/ajax.js"></script>

        <?php if (isset($_SESSION['success'])) {
            if ($_SESSION['success'] == true) {
                echo "<script>
            swal('Success', 'Status added successfully', 'success');
        </script>";
                 unset($_SESSION['success']);
            }
        }

        ?>
        <?php
            if (isset($errors)){
                $err = '';
                foreach ($errors as $error){
                    $err .= "<p class='my-1 text-danger'> $error </p>";
                }
            }

            if (isset($err) && !empty($err)){
        ?>

        <script>
            swal({
                title: 'Error',
                type: 'error',
                html: "<?= $err ?>",
            })
        </script>
        <?php } ?>

<!--        <script src="assets/js/ajax-delete.js"></script>-->