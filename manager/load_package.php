<?php require_once 'includes/functions/db_config.php'; ?>
<?php 
$all_package = fetch_packages();
$en = "data-encrypt";

if ($all_package) {
    $packages = $all_package;
}
?>
<table id="datatable" class="table table-bordered table-hover">
    <thead>
    <tr >
        <th>S/N</th>
        <th>Package Name</th>
        <th>Consign No.</th>
        <th>Origin</th>
        <th>Destination</th>
        <th>Sender Name</th>
        <th>Status</th>
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
                <td><?= $product; ?></td>
                <td><?= $track_no ?></td>
                <td><?= $origin ?></td>
                <td><?= $destination ?></td>
                <td><?php echo $sender_name; ?></td>
                <td><?= $status; ?></td>
                <td class="text-right">

                    <div class="row">
                     <a class="nav-link waves-effect waves-light nav-user btn-light ml-auto mr-4" data-toggle="dropdown" href="#" role="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <a href="shipping/?<?= url_encode('pack_id') ?>=<?= encryptor($en, $id)?>" data-target="#View<?= $id ?>" data-id="<?php echo $id ?>" class="dropdown-item notify-item">
                            <i class="ti-eye"></i> <span>Preview</span>
                        </a>
                        <a href="status?<?= url_encode('pack_id') ?>=<?= encryptor($en, $id)?>" data-id="<?php echo $id ?>" class="dropdown-item notify-item" >
                            <i class="ti-stats-down"></i> <span>Add Status</span>
                        </a>
                        <!-- item-->
                        <a href="details?<?= url_encode('pack_id') ?>=<?= encryptor($en, $id)?>" class="dropdown-item notify-item">
                            <i class="ti-list"></i> <span>More Details</span>
                        </a>

                        <a href="javascript:void(0);" data-id="<?php echo $id ?>" class="dropdown-item notify-item" id="del-pack">
                            <i class="ti-trash"></i> <span>Delete</span>
                        </a>

                    </div>
                        <style>
                            .modal-lg{ width: 1200px !important;}
                            @page  {
                                size: A4;
                                margin: 0;
                            }
                            @media print {
                                html, body{
                                    width: 100%;
                                    height: 297mm;
                                }
                                body * { visibility: hidden; }
                                .content-wrapper { min-height:100vh !important; }
                                .printcontent * { visibility: visible;  }
                                .printcontent {  min-height:100vh !important;  max-height:100vh !important; height:100vh !important; width: 100%; }
                                .modal-footer, .close { display:none !important; }

                            }
                        </style>
                        <div class="col-12">
                            <div class="modal fade printcontent text-left" id="View<?= $id ?>" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div class="px-0 pull-left" style="width: 50%;">
                                                <img src="../img/logo-main.png" alt="" class="w-100">
                                            </div>
                                            <div class="col-6 px-0 pull-right" style="width: 50%; padding-right: 70px;">
                                                <span class="pull-right"><?php echo date("F j, Y", time())?></span>
                                            </div>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row">
                                                
                                                <div class="col-md-4 col-sm-4 col-xs-4">
                                                    <div style="line-height:28px; width:80%; margin: 0 auto 20px auto">
                                                        <img src="../barcode-clipart-one-dimensional-3.jpg" alt="" class="w-100" style="width: 100%">
                                                        <p class="text-center"><strong>* <?= $track_no ?> *</strong></p>
                                                    </div>
                                                    <div>
                                                        <p class="mb-0" style="margin-bottom: 0"><strong>Shipping Weight:</strong> 3.25 kg</p>
                                                        <p class="mb-0" style="margin-bottom: 0"><strong>Payment Method: </strong> <small style="border-radius: 5px; border: 1px solid #000; padding: 0 5px 0 5px" class="text-bold"> <i class="fa fa-money"></i> credit_card</small> </p>
                                                        <p class="mb-0" style="margin-bottom: 0"><strong>Shipping Insurance:</strong> USD 150</p>
                                                    </div>
                                                </div>

                                                <div class="clearfix"></div><br />
                                                <div class="clearfix"></div>
                                                <div class="col-sm-12 pt-3">
                                                    <table class="table border-0">
                                                        <thead>
                                                        <tr>
                                                            <th class="no_bg">Quantity</th>
                                                            <th class="no_bg">Product</th>
                                                            <th class="no_bg">State</th>
                                                            <th class="no_bg">Description</th>
                                                            <th class="no_bg">Total</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Mark</td>
                                                            <td><small style="border-radius: 5px; border: 1px solid #000;padding: 1px 4px; "><b><?=  ucwords($status) ?></b></small></td>
                                                            <td><?= $coments ?></td>
                                                            <td><?= $amount ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-6">
                                                    <p style="font-size: 26px;">Methods Of Payment: </p>
                                                    <img src="../IMG-20200804-WA0s005%20(2).jpg" alt="">
                                                    <p style="margin-top: 10px; color: #787878" >For your convenience we have several reliable, fast and secure payments</p>
                                                </div>
                                                <div class="col-4">
                                                    <p style="font-size: 26px;">Amount </p>
                                                    <p><strong>Total:</strong> <span class="pull-right"><?= $amount ?></span></p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-xs btn-primary print" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

            </tr>
    <?php }} ?>
       </tbody>
</table>

<?php require_once 'ajax-loading.php'; ?>