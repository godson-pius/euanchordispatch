<?php require_once 'includes/templates/header-page.php'; ?>

<?php 
if (isset($_GET['cGFja19pZA--'])) {
    $en = "data-encrypt";
    $dy = "data-decrypt";
    $pack_id = encryptor($dy, $_GET['cGFja19pZA--']);
    if ($pack_id){
        $package = view_details($pack_id);
    }else{
        redirect_to('users');
    }

    if ($package) {
        extract($package);
    }
}else {
    redirect_to('users');
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
                <div class="col-sm-6">
                    <h6 class=" m-t-0 ">Details</h6>
                </div>
                <div class="col-sm-6">
                    <a href="users" class=" m-t-0 float-right text-muted"><i class="mdi mdi-arrow-left-bold mr-1"></i>Users</a>
                </div>
                <div class="col-12">
                    <h4 class="header-title"></h4>
                </div>
            </div>
            
        <div class="container-main">
          
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                
                <?php if (!empty($package)) { ?>
                    <div class="element-box">
                <div class="col-12 table-responsive pb-3 pt-5">
                    <div class="col-sm-12">
                        <h6 class="">SENDER'S DETAILS</h6>
                    </div>
                    <table class="p-4 table table table-striped table-lightfont">
                        <tr>
                            <th>Sender's Name</th>
                            <td><?= $sender_name ?></td>
                        </tr>

                        <tr>
                            <th>Sender's Country</th>
                            <td><?= $sender_country ?></td>
                        </tr>
                    </table>
                </div>
                </div>


                <div class="element-box">
                <div class="col-12 table-responsive pb-3">
                    <div class="col-sm-12">
                        <h6 class="">RECEIVER'S DETAILS</h6>
                    </div>
                    <table class="p-4 table table table-striped table-lightfont">
                        <tr>
                            <th>Receiver's Name</th>
                            <td><?= $receiver_name ?></td>
                        </tr>



                        <tr>
                            <th>Receiver's Country</th>
                            <td><?= $receiver_country ?></td>
                        </tr>


                         <tr>
                            <th>Receiver's Email</th>
                            <td><?= $receiver_email ?></td>
                        </tr>
                    </table>
                </div>
                </div>

                <div class="element-box">
                <div class="col-12 table-responsive pb-3">
                    <div class="col-sm-12">
                        <h6 class="">PACKAGE DETAILS</h6>
                    </div>
                    <table class="p-4 table table table-striped table-lightfont">
                        <tr>
                            <th>Product</th>
                            <td><?= $product ?></td>
                        </tr>


                         <tr>
                            <th>Status</th>
                            <td><?= $status ?></td>
                        </tr>

                         <tr>
                            <th>Expected Delivery Date</th>
                            <td><?= $exp_date ?></td>
                        </tr>

                         <tr>
                            <th>Origin</th>
                            <td><?= $origin ?></td>
                        </tr>

                        <tr>
                            <th>Courier</th>
                            <td><?= $courier ?></td>
                        </tr>

                        <tr>
                            <th>Packages</th>
                            <td><?= $packages ?></td>
                        </tr>

                        <tr>
                            <th>Destination</th>
                            <td><?= $destination ?></td>
                        </tr>

                        <tr>
                            <th>Mode of Transportation</th>
                            <td><?= $mode ?></td>
                        </tr>

                         <tr>
                            <th>Quantity</th>
                            <td><?= $qnty ?></td>
                        </tr>

                        <tr>
                            <th>Departure Date</th>
                            <td><?= $dept_date ?></td>
                        </tr>

                         <tr>
                            <th>Weight(kg)</th>
                            <td><?= $weight ?></td>
                        </tr>

                         <tr>
                            <th>Amount</th>
                            <td><?= $amount ?></td>
                        </tr>

                        <tr>
                            <th>Payment Mode</th>
                            <td><?= $pmode ?></td>
                        </tr>
                    </table>


                </div>
                </div>
                    <div class="element-box">
                        <div class="col-12 table-responsive pb-3">
                            <table class="p-4 table table table-striped table-lightfont">

                                <tr>
                                    <th>Consignment Number</th>
                                    <td><?= $track_no ?></td>
                                </tr>
                                <tr>
                                    <th>Comments</th>
                                    <td><?= $coments ?></td>
                                </tr>
                            </table>
                            <div class="col-12 px-0 pt-3">
                                <a href="update?<?= url_encode('pack_id') ?>=<?= $_GET['cGFja19pZA--'] ?>" class="btn-success btn"><i class=" mdi mdi-update mr-22"></i> Edit </a>
                            </div>
                        </div>
                    </div>


            <?php }else { ?>

                <div class="col-12 table-responsive pb-3">
                    <div class="col-sm-12 pt-5">
                        <h6 class="text-center pt-5">No Data</h6>
                    </div>
                </div>
            <?php } ?>
            </div>
        
                </div>
            </div>
          </div>
        
            
        </div> <!-- container -->

<?php require_once 'includes/templates/footer-page.php'; ?>

<?php if (isset($_SESSION['success'])) {
    if ($_SESSION['success'] == true) {
        echo "<script>
            swal('Success', 'Package Updated successfully', 'success');
        </script>";

        $_SESSION['success'] = false;
    }
} ?>