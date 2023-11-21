<?php require_once 'includes/templates/header-page.php'; ?>

<?php 
    if (isset($_GET['cGFja19pZA--'])) {
        $en = "data-encrypt";
        $dy = "data-decrypt";
        $pack_id = encryptor($dy, $_GET['cGFja19pZA--']);


        if ($pack_id){
            $package = view_details($pack_id);
            if ($package) {
                extract($package);
            }
        }else{
            redirect_to('users');
        }


        if (isset($_POST['submit'])) {
            $response = update_package($_POST, $pack_id);
            extract($_POST);

            if ($response === true) {
                $_SESSION['success'] = true;
                $id = $_GET['cGFja19pZA--'];
                redirect_to("details?cGFja19pZA--=$id");
            }else {
                $errors = $response;
                extract($errors);
            }
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
                <div class="col-sm-12 px-5">
                    <h4 class="header-title m-t-0 m-b-20">Update Package</h4>

                </div>
            </div>

            <div class="row">
                <?php if (!empty($package)) { ?>
                <div class="col-12">
                    <form class="p-4" method="post" action="<?= str_replace(".php", "", htmlentities($_SERVER['PHP_SELF'])); ?>?cGFja19pZA--=<?= encryptor($en, $id); ?>">
                       <div class="row mx-0 py-3 px-2 form-round">
                            <div class="col-12">
                                <h6 class="header-title">Sender's Details</h6>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Sender's Name</label>
                                <input type="text" class="form-control <?php if(isset($sname_err)) echo 'err-alert' ?>" name="sname" value="<?php if(isset($sender_name)) echo $sender_name; ?>">
                                <?php if (isset($sname_err)) { ?>
                                    <p class="text-danger err"><?php echo $sname_err; ?></p>
                                <?php } ?>
                                <input type="hidden" name="hidden_sname" value="<?= $sender_name ?>">
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Sender's Country</label>
                                <input type="hidden" name="hidden_sphone" value="<?= $sender_country ?>">
                                <input type="text" class="form-control <?php if(isset($sphone_err)) echo 'err-alert' ?>" name="sphone" value="<?php if(isset($sender_country)) echo $sender_country; ?>">
                                <?php if (isset($sphone_err)) { ?>
                                    <p class="text-danger err"><?php echo $sphone_err; ?></p>
                                <?php } ?>
                            </div>

                       </div>

            
                        <div class="row mx-0 py-3 px-2 form-round">
                            <div class="col-12">
                                <h6 class="header-title">Receiver's Details</h6>
                            </div>



                            <div class="col-sm-6 p-2">
                                <label for="">Receiver's Name</label>
                                <input type="hidden" name="hidden_rname" value="<?= $receiver_name ?>">
                                <input type="text" class="form-control <?php if(isset($rname_err)) echo 'err-alert' ?>" name="rname" value="<?php if(isset($receiver_name)) echo $receiver_name; ?>">
                                <?php if (isset($rname_err)) { ?>
                                    <p class="text-danger err"><?php echo $rname_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Receiver's Country</label>
                                <input type="hidden" name="hidden_rphone" value="<?= $receiver_country ?>">
                                <input type="text" class="form-control <?php if(isset($rphone_err)) echo 'err-alert' ?>" name="rphone" value="<?php if(isset($receiver_name)) echo $receiver_name; ?>">
                                <?php if (isset($rphone_err)) { ?>
                                    <p class="text-danger err"><?php echo $rphone_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-12 p-2">
                                <label for="">Receiver's Email</label>
                                <input type="text" class="form-control <?php if(isset($remail_err)) echo 'err-alert' ?>" name="remail" value="<?php if(isset($receiver_email)) echo $receiver_email; ?>">
                                <input type="hidden" class="form-control <?php if(isset($remail_err)) echo 'err-alert' ?>" name="remail_hidden" value="<?php if(isset($receiver_email)) echo $receiver_email; ?>">

                                <?php if (isset($remail_err)) { ?>
                                    <p class="text-danger err"><?php echo $remail_err; ?></p>
                                <?php } ?>
                            </div>

                           
                        </div>
                        


                        <div class="row mx-0 py-3 px-2 form-round">
                            <div class="col-12">
                                <h6 class="header-title">Package Details</h6>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Consignment Number</label>
                                <input type="text" class="form-control <?php if(isset($track_err)) echo 'err-alert' ?>" name="track" value="<?php if(isset($track_no)) echo $track_no; ?>">
                                <input type="hidden" class="form-control <?php if(isset($track_err)) echo 'err-alert' ?>" name="track_hidden" value="<?php if(isset($track_no)) echo $track_no; ?>">
                                <?php if (isset($track_err)) { ?>
                                    <p class="text-danger err"><?php echo $track_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Product</label>
                                <input type="hidden" name="hidden_pname" value="<?= $product?>">
                                <input type="text" class="form-control <?php if(isset($pname_err)) echo 'err-alert' ?>" name="pname" value="<?php if(isset($product)) echo $product; ?>">
                                <?php if (isset($pname_err)) { ?>
                                    <p class="text-danger err"><?php echo $pname_err; ?></p>
                                <?php } ?>
                            </div>
                           
                            <div class="col-sm-6 p-2">
                                <label for="">Courier</label>
                                <input type="hidden" name="hidden_ploc" value="<?= $courier ?>">
                                <input type="text" class="form-control <?php if(isset($location_err)) echo 'err-alert' ?>" name="location" value="<?php if(isset($courier)) echo $courier; ?>">
                                <?php if (isset($location_err)) { ?>
                                    <p class="text-danger err"><?php echo $location_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Package Status</label>
                                <input type="hidden" name="hidden_pstatus" value="<?= $status ?>">
                                <select id="select2" class="form-control <?php if(isset($pstatus_err)) echo 'err-alert' ?>" name="pstatus" >

                                    <option disabled="" >--SELECT--</option>

                                    <option value="In Transit" <?= ($status == "In Transit" ? 'selected' : ''); ?>>In Transit</option>
                                    <option value="In Transit" <?= ($status == "Waiting For Payment " ? 'selected' : ''); ?>>Waiting For Payment </option>
                                    <option value="Pending" <?= (($status == "Pending") ? 'selected' : ''); ?>>Pending</option>
                                    <option value="Delivered" <?= ($status == "Delivered" ? 'selected' : ''); ?>>Delivered</option>
                                    <option value="Delayed" <?= ($status == "Delayed" ? 'selected' : ''); ?>>Delayed</option>
                                    <option value="On Hold" <?= ($status == "On Hold" ? 'selected' : ''); ?>>On Hold</option>
                                    <option value="Clearance" <?= ($status == "Clearance" ? 'selected' : ''); ?>>Clearance </option>
                                    <option value="in  Sorting" <?= ($status == "in  Sorting" ? 'selected' : ''); ?>>in  Sorting</option>
                                    <option value="Shipment Pickup" <?= ($status == "Shipment Pickup" ? 'selected' : ''); ?>>Shipment Pickup</option>

                                </select>


                                 <?php if (isset($pstatus_err)) { ?>
                                    <p class="text-danger err"><?php echo $pstatus_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Expected Delivery date</label>
                                <input type="hidden" name="hidden_arrival" value="<?= $exp_date ?>" >
                                <input type="text" class="form-control <?php if(isset($arrival_err)) echo 'err-alert' ?>" id="datepicker" name="arrival" value="<?php if(isset($exp_date)) echo $exp_date; ?>">
                                <?php if (isset($arrival_err)) { ?>
                                    <p class="text-danger err"><?php echo $arrival_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Origin</label>
                                <input type="hidden" name="hidden_origin" value="<?= $origin ?>">
                                <input type="text" class="form-control <?php if(isset($origin_err)) echo 'err-alert' ?>" name="origin" value="<?php if(isset($origin)) echo $origin; ?>">
                                <?php if (isset($origin_err)) { ?>
                                    <p class="text-danger err"><?php echo $origin_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Destination</label>
                                <input type="hidden" name="hidden_des" value="<?= $destination ?>">
                                <input type="text" class="form-control <?php if(isset($des_err)) echo 'err-alert' ?>" name="des" value="<?php if(isset($destination)) echo $destination; ?>">
                                <?php if (isset($des_err)) { ?>
                                    <p class="text-danger err"><?php echo $des_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Mode of Transportation</label>
                                <input type="hidden" name="hidden_trans" value="<?= $mode ?>">
                                <input type="text" class="form-control <?php if(isset($mode_err)) echo 'err-alert' ?>" name="mode" value="<?php if(isset($mode)) echo $mode; ?>">
                                    <?php if (isset($mode_err)) { ?>
                                    <p class="text-danger err"><?php echo $mode_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Carrier Reference Number</label>
                                <input type="hidden" name="hidden_ref" value="<?= $ref_no ?>">
                                <input type="text" class="form-control <?php if(isset($refno_err)) echo 'err-alert' ?>" name="refno" value="<?php if(isset($ref_no)) echo $ref_no; ?>">
                                <input type="hidden" class="form-control <?php if(isset($refno_err)) echo 'err-alert' ?>" name="refno_hidden" value="<?php if(isset($ref_no)) echo $ref_no; ?>">
                                <?php if (isset($refno_err)) { ?>
                                    <p class="text-danger err"><?php echo $refno_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Quantity</label>
                                <input type="hidden" name="hidden_quan" value="<?= $qnty ?>">
                                <input type="text" class="form-control <?php if(isset($quan_err)) echo 'err-alert' ?>" name="quan" value="<?php if(isset($qnty)) echo $qnty; ?>">
                                <?php if (isset($quan_err)) { ?>
                                    <p class="text-danger err"><?php echo $quan_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Package Weight(kg)</label>
                                <input type="hidden" name="hidden_pweight" value="<?= $weight ?>">
                                <input type="text" class="form-control <?php if(isset($kg_err)) echo 'err-alert' ?>" name="kg" value="<?php if(isset($weight)) echo $weight; ?>">
                                <?php if (isset($kg_err)) { ?>
                                    <p class="text-danger err"><?php echo $kg_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Type Of Shipment</label>
                                <input type="hidden" name="hidden_type" value="<?= $type ?>">
                                <input type="text" class="form-control <?php if(isset($type_err)) echo 'err-alert' ?>" name="type" value="<?php if(isset($type)) echo $type; ?>">
                                <?php if (isset($type_err)) { ?>
                                    <p class="text-danger err"><?php echo $type_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Packages</label>
                                <input type="text" class="form-control <?php if(isset($packages_err)) echo 'err-alert' ?>" name="packages" value="<?php if(isset($packages)) echo $packages; ?>">
                                <?php if (isset($packages_err)) { ?>
                                    <p class="text-danger err"><?php echo $packages_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Amount</label>
                                <input type="hidden" name="hidden_amt" value="<?= $amount ?>">
                                <input type="text" class="form-control <?php if(isset($amount_err)) echo 'err-alert' ?>" name="amount" value="<?php if(isset($amount)) echo $amount; ?>">
                                <?php if (isset($amount_err)) { ?>
                                    <p class="text-danger err"><?php echo $amount_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Payment Mode</label>
                                <input type="hidden" name="hidden_mode" value="<?= $pmode ?>">
                                <select name="pmode" id="pmode" class="form-control <?php if(isset($pmode_err)) echo 'err-alert' ?>">
                                    <option disabled="" >--SELECT--</option>
                                    <option value="Online Transfer" selected>Online Transfer</option>

                                </select>
                                <?php if (isset($pmode_err)) { ?>
                                    <p class="text-danger err"><?php echo $pmode_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Departure Date</label>
                                <input type="hidden" name="hidden_dDate" value="<?= $dept_date ?>" >
                                <input type="text" class="form-control <?php if(isset($depDate_err)) echo 'err-alert' ?>" id="datepicker2" name="depDate" value="<?php if(isset($dept_date)) echo $dept_date; ?>">
                                <?php if (isset($depDate_err)) { ?>
                                    <p class="text-danger err"><?php echo $depDate_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Delivery Time</label>
                                <input type="hidden" name="hidden_d_Date" value="<?= $dept_time ?>" >
                                <input type="text" class="form-control <?php if(isset($del_time_err)) echo 'err-alert' ?>" id="timepicker2" name="delivery_time" value="<?php if(isset($del_time)) echo $del_time; ?>">
                                <?php if (isset($del_time_err)) { ?>
                                    <p class="text-danger err"><?php echo $del_time_err; ?></p>
                                <?php } ?>

                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Departure Time</label>
                                <input type="hidden" name="hidden_dDate2" value="<?= $dept_time ?>" >
                                <input type="text"  class="form-control <?php if(isset($dept_time_err)) echo 'err-alert' ?>" id="timepicker" name="dept_time" value="<?php if(isset($dept_time)) echo $dept_time; ?>">
                                <?php if (isset($dept_time_err)) { ?>
                                    <p class="text-danger err"><?php echo $dept_time_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-12 p-2">
                                <label for="">Note</label>
                                <input type="hidden" name="hidden_note" value="<?= $coments ?>">
                                <textarea class="form-control" name="note" id=""  rows="5" <?php if(isset($coments_err)) echo 'err-alert' ?>><?php if(isset($coments)) echo $coments; ?></textarea>
                                <?php if (isset($note_err)) { ?>
                                    <p class="text-danger err"><?php echo $note_err; ?></p>
                                <?php } ?>
                            </div>
                        </div>


                        <div class="col-12 px-0 pt-2">
                            <a href="details?cGFja19pZA--=<?= $_GET['cGFja19pZA--'] ?>" class="btn btn-dark mr-2">Cancel</a>
                            <input type="submit" name="submit" value="Update" class="btn btn-success">
                        </div>
                    </form>
                </div>
                <?php }else { ?>

                    <div class="col-12 table-responsive px-5 pb-3">
                        <div class="col-sm-12 pt-5">
                            <h6 class="text-center pt-5">No Data</h6>
                        </div>
                    </div>
                <?php } ?>
            </div>



   
<?php require_once 'includes/templates/footer-page.php'; ?>



<?php if (isset($db)) {
    echo "<script>
            swal('Error', 'Something went wrong!', 'error');
        </script>";
} ?>
<?php if (isset($change)) { ?>
    <script>
            swal('Info',  "<?= $change ?>" , 'info');
        </script>
<?php } ?>

