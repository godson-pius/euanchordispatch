<?php
require_once 'manager/includes/functions/db_config.php';

if (isset($_GET['cGFja19pZA--'])) {
    $en = 'data-encrypt';
    $dy = 'data-decrypt';
    $tid = encryptor($dy, $_GET['cGFja19pZA--']);

    if ($tid){
        $result = track_packages($tid);

        if ($result) {
            extract($result);
        }else {
            redirect_to('404');
        }
    }else{
        redirect_to('404');
    }
}else {
    redirect_to('404');
}
?>

<?php require_once 'components/header.php'; ?>
    
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/banner/breadcrumb.png')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">CARGO DETAILS</h2>
                            <ul class="page-list">
                                <li><a href="index">Cargo Tracking Number: </a></li>
                                <li><?= $tid; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->  

    <!-- cargo form start -->
    <div class="container">
        <div class="contact-area mb-120">
            <center>
            <img src="assets/img/logo.png" alt="logo" width="300" class="mb-5">
            </center>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-12">
                <table class="table table-bordered table-striped firsttable table-condensed cf" id="no-more-tables">
                    <tbody><tr>
                        <td data-title=" " class="headertab text-center text-dark second-track" style="padding: 20px" colspan="3">
                            <h3 class="fs-17 in_blk"><strong><?= $tid ?></strong></h3>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="3" style="padding: 20px;">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <h6 style="font-weight:bold;">SENDER</h6>
                                    <div style="line-height:28px; margin-bottom: 20px;">
                                        <h4 class="text-black text-uppercase"> <?= $sender_name ?></h4>
                                    </div>
                                    <div class="user">
                                        <p class="mb-0 text-black-5" style="margin-bottom: 0"><strong class="font-weight-bold">Country:</strong> <span class="text-black-50 font-weight-bold"> <?= $sender_country ?></span></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 pt-3 pt-md-0">
                                    <h6 style="font-weight:bold;">RECEIVER</h6>
                                    <div style="line-height:28px; margin-bottom: 20px;">
                                        <h4 class="text-black text-uppercase"> <?= $receiver_name ?></h4>
                                    </div>
                                    <div class="user">
                                        <p class="mb-0 text-black-5" style="margin-bottom: 0"><strong class="font-weight-bold">Email:</strong> <span class="text-black-50 font-weight-bold"> <?= $receiver_email ?></span></p>
                                        <p class="mb-0 text-black-5" style="margin-bottom: 0"><strong class="font-weight-bold">Country:</strong> <span class="text-black-50 font-weight-bold"> <?= $receiver_country ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody><tbody>
                    <tr >
                        <td data-title="Orgin : ">Origin:   <strong> <?= $origin ?></strong>&nbsp;</td>
                        <!--                        <td data-title="Updated Date : "><strong>Saturday , August 29 , 2020</strong>&nbsp;</td>-->
                        <td data-title="Status : " colspan="2" style="border-top: none">Status: <strong> <?= $status ?></strong>&nbsp;</td>
                    </tr>
                    <tr>
                        <td data-title="Destination : ">Destination: <strong> <?= $destination ?></strong>&nbsp;</td>
                    </tr>
                    <tr>
                        <td data-title="Type of Shipment : ">Type of Shipment: <strong>
                                <?= $type ?></strong>&nbsp;</td>
                        <td data-title="Weight(kg) : ">Weight(kg): <strong><?= $weight ?></strong>&nbsp;</td>
                        <td data-title="Courier : ">Courier: <strong><?= $courier ?></strong>&nbsp;</td>
                    </tr>
                    <tr>
                        <td data-title="Carrier Reference No. : ">Carrier Reference No. :<strong>
                                <a href="" target="_blank"><?= $ref_no ?></a>
                            </strong>&nbsp;</td>
                        <td data-title="Product : ">Product: <strong><?= $product ?></strong>&nbsp;</td>
                        <td data-title="Quantity : ">Quantity: <strong><?= $qnty; ?></strong>&nbsp;</td>
                    </tr>
                    <tr>
                        <!--<td data-title="Payment Mode : " ><strong>-->
                        <!--        <?= $pmode ?> </strong>&nbsp;</td>-->
                        <td data-title="Departure Time: " >Departure Time: <strong>
                                <?= $dept_time ?> </strong>&nbsp;</td>
<!--                        <td data-title="Total freight : "><strong>--><?//= $package_name ?><!--</strong>&nbsp;</td>-->
                        <td data-title="Mode of Shipment: ">Mode of Shipment: <strong>
                                <?= $mode ?></strong>&nbsp;</td>
                                
                    </tr>
                    <tr>
                        <td data-title="Departure Date : ">Departure Date: <strong><?= date("F j, Y", strtotime($dept_date)) ?></strong>&nbsp;</td>
                        <td data-title="Expected Delivery date : ">Expected Delivery date: <strong><?= date("F j, Y", strtotime($exp_date)) ?></strong> &nbsp;</td>
                        <td data-title="Delivery Time : ">Delivery Time: <strong><?= $del_time ?></strong> &nbsp;</td>
                    </tr>
                    <tr>
                        <td data-title="Remark : " colspan="3">Remark: <strong><?= $coments ?></strong>&nbsp;</td>
                    </tr>
                    </tbody></table>


                <h4 class="text-dark p-3">Shipment Travel History :</h4>
                <table class="table table-bordered table-striped table-condensed cf" id="no-more-tables">
                    <thead class="cf">
                    <tr>
                        <th class="headertab"><strong>Status</strong></th>
                        <th class="headertab"><strong>Location</strong></th>
                        <th class="headertab"><strong>Time</strong></th>
                        <th class="headertab"><strong>Date</strong></th>
                        <th class="headertab"><strong>Remark</strong></th>
                    </tr>
                    </thead><tbody>

                    <?php $shipment_history = status_history($id);
                    if (!empty($shipment_history)) {
                        foreach ($shipment_history as $ship) {?>
                            <tr>
                                <td data-title="Status:"><?= $ship['status'] ?>&nbsp;</td>
                                <td data-title="Location:"><?= $ship['location'] ?>&nbsp;</td>
                                <td data-title="Time:"><?= $ship['time'] ?>&nbsp;</td>
                                <td data-title="Date:"><?= date("F j, Y", strtotime($ship['date'])) ?></td>
                                <td data-title="Remarks:"><?= $ship['comments'] ?></td>
                            </tr>
                        <?php }} ?>
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
    <!-- cargo form end -->


    <!-- footer area start  -->
    <?php require_once 'components/footer.php'; ?>
    <!-- footer area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- all plugins here -->
    <script src="assets/js/vendor.js"></script>
    <!-- main js  -->
    <script src="assets/js/main.js"></script>
</body>
</html>