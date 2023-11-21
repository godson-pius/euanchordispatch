<?php require_once 'includes/templates/header-page.php'; ?>

<?php 
    if (isset($_POST['submit'])) {
        $response = add_package($_POST);
        extract($_POST);

        if ($response === true) {
            $_SESSION['success'] = true;
            redirect_to("users");
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
                <div class="col-sm-12 px-5">
                    <h4 class="header-title m-t-0 m-b-20">Add Trip</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form class="p-4" method="post" action="<?= str_replace(".php", "", htmlentities($_SERVER['PHP_SELF'])); ?>">
                       <div class="row mx-0 py-3 px-2 form-round">
                            <div class="col-12">
                                <h6 class="header-title">Sender's Details</h6>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Sender's Name</label>
                                <input type="text" class="form-control <?php if(isset($sname_err)) echo 'err-alert' ?>" name="sname" value="<?php if(isset($sname)) echo $sname; ?>">
                                <?php if (isset($sname_err)) { ?>
                                    <p class="text-danger err"><?php echo $sname_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Sender's Country</label>
                                <input type="text" class="form-control <?php if(isset($sphone_err)) echo 'err-alert' ?>" name="sphone" value="<?php if(isset($sphone)) echo $sphone; ?>">
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
                                <input type="text" class="form-control <?php if(isset($rname_err)) echo 'err-alert' ?>" name="rname" value="<?php if(isset($rname)) echo $rname; ?>">
                                <?php if (isset($rname_err)) { ?>
                                    <p class="text-danger err"><?php echo $rname_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Receiver's Country</label>
                                <input type="text" class="form-control <?php if(isset($rphone_err)) echo 'err-alert' ?>" name="rphone" value="<?php if(isset($rphone)) echo $rphone; ?>">
                                <?php if (isset($rphone_err)) { ?>
                                    <p class="text-danger err"><?php echo $rphone_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Receiver's Email</label>
                                <input type="text" class="form-control <?php if(isset($remail_err)) echo 'err-alert' ?>" name="remail" value="<?php if(isset($remail)) echo $remail; ?>">
                                <?php if (isset($remail_err)) { ?>
                                    <p class="text-danger err"><?php echo $remail_err; ?></p>
                                <?php } ?>
                            </div>

                           
                        </div>
                        


                        <div class="row mx-0 py-3 px-2 form-round">
                            <div class="col-12">
                                <h6 class="header-title">Shipment info</h6>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Tracking Code</label>
                                <input type="text" class="form-control <?php if(isset($track_err)) echo 'err-alert' ?>" name="track" value="<?php if(isset($track)) echo $track; ?>">
                                <?php if (isset($track_err)) { ?>
                                    <p class="text-danger err"><?php echo $track_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Product</label>
                                <input type="text" class="form-control <?php if(isset($pname_err)) echo 'err-alert' ?>" name="pname" value="<?php if(isset($pname)) echo $pname; ?>">
                                <?php if (isset($pname_err)) { ?>
                                    <p class="text-danger err"><?php echo $pname_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Courier</label>
                                <input type="text" class="form-control <?php if(isset($courier_err)) echo 'err-alert' ?>" name="courier" value="<?php if(isset($courier)) echo $courier; ?>">
                                <?php if (isset($courier_err)) { ?>
                                    <p class="text-danger err"><?php echo $courier_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Type of Shipment</label>
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
                                <label for="">Package Status</label>
                                <select id="select2" class="form-control <?php if(isset($pstatus_err)) echo 'err-alert' ?>" name="pstatus">

                                    <option disabled >--SELECT--</option>
                                    <option value="In Transit" selected>In Transit</option>
                                    <option value="Waiting For Payment ">Waiting For Payment </option>
                                    <option value="Pending" >Pending</option>
                                    <option value="Delivered" >Delivered</option>
                                    <option value="Delayed" >Delayed</option>
                                    <option value="On Hold" >On Hold</option>
                                    <option value="Clearance" >Clearance </option>
                                    <option value="in  Sorting" >in  Sorting</option>
                                    <option value="Shipment Pickup" >Shipment Pickup</option>

                                </select>

                                 <?php if (isset($pstatus_err)) { ?>
                                    <p class="text-danger err"><?php echo $pstatus_err; ?></p>
                                <?php } ?>
                            </div>
                            
                            <div class="col-sm-6 p-2">
                                <label for="">Origin</label>
                                <input type="text" class="form-control <?php if(isset($origin_err)) echo 'err-alert' ?>" name="origin" value="<?php if(isset($origin)) echo $origin; ?>">
                                <?php if (isset($origin_err)) { ?>
                                    <p class="text-danger err"><?php echo $origin_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Destination</label>
                                <input type="text" class="form-control <?php if(isset($des_err)) echo 'err-alert' ?>" name="des" value="<?php if(isset($des)) echo $des; ?>">
                                <?php if (isset($des_err)) { ?>
                                    <p class="text-danger err"><?php echo $des_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Mode of Shipment</label>
                                <input type="text" class="form-control <?php if(isset($mode_err)) echo 'err-alert' ?>" name="mode" value="<?php if(isset($mode)) echo $mode; ?>">
                                    <?php if (isset($mode_err)) { ?>
                                    <p class="text-danger err"><?php echo $mode_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Carrier Reference Number</label>
                                <input type="text" class="form-control <?php if(isset($refno_err)) echo 'err-alert' ?>" name="refno" value="<?php if(isset($refno)) echo $refno; ?>">
                                <?php if (isset($refno_err)) { ?>
                                    <p class="text-danger err"><?php echo $refno_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control <?php if(isset($quan_err)) echo 'err-alert' ?>" name="quan" value="<?php if(isset($quan)) echo $quan; ?>">
                                <?php if (isset($quan_err)) { ?>
                                    <p class="text-danger err"><?php echo $quan_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Weight(kg)</label>
                                <input type="text" class="form-control <?php if(isset($kg_err)) echo 'err-alert' ?>" name="kg" value="<?php if(isset($kg)) echo $kg; ?>">
                                <?php if (isset($kg_err)) { ?>
                                    <p class="text-danger err"><?php echo $kg_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Total Amount</label>
                                <input type="text" class="form-control <?php if(isset($amount_err)) echo 'err-alert' ?>" name="amount" value="<?php if(isset($amount)) echo $amount; ?>">
                                <?php if (isset($amount_err)) { ?>
                                    <p class="text-danger err"><?php echo $amount_err; ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="">Payment Mode</label>
                                <select name="pmode" id="paymentmode" class="form-control <?php if(isset($pmode_err)) echo 'err-alert' ?>">
                                    <option disabled selected>--SELECT--</option>
                                    <option value="Online Transfer">Online Transfer</option>
                                </select>
                                <?php if (isset($pmode_err)) { ?>
                                    <p class="text-danger err"><?php echo $pmode_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Departure Date</label>
                                <input type="text" class="form-control <?php if(isset($depDate_err)) echo 'err-alert' ?>" name="depDate" value="<?php if(isset($depDate)) echo $depDate; ?>" id="datepicker2">
                                <?php if (isset($depDate_err)) { ?>
                                    <p class="text-danger err"><?php echo $depDate_err; ?></p>
                                <?php } ?>
                            </div>
                            
                            <div class="col-sm-6 p-2">
                                <label for="">Expected Delivery date</label>
                                <input type="text" class="form-control <?php if(isset($arrival_err)) echo 'err-alert' ?>" id="datepicker" name="arrival" value="<?php if(isset($arrival)) echo $arrival; ?>">
                                <?php if (isset($arrival_err)) { ?>
                                    <p class="text-danger err"><?php echo $arrival_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Departure Time</label>
                                <input type="text" class="form-control <?php if(isset($dept_time_err)) echo 'err-alert' ?>" name="dept_time" value="<?php if(isset($dept_time)) echo $dept_time; ?>" id="timepicker2">
                                <?php if (isset($dept_time_err)) { ?>
                                    <p class="text-danger err"><?php echo $dept_time_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-6 p-2">
                                <label for="">Delivery Time</label>
                                <input type="text" class="form-control <?php if(isset($del_time_err)) echo 'err-alert' ?>" name="del_time" value="<?php if(isset($del_time)) echo $del_time; ?>" id="timepicker2">
                                <?php if (isset($del_time_err)) { ?>
                                    <p class="text-danger err"><?php echo $del_time_err; ?></p>
                                <?php } ?>
                            </div>

                            <div class="col-sm-12 p-2">
                                <label for="">Remark</label>
                                <textarea type="text" class="form-control <?php if(isset($note_err)) echo 'err-alert' ?>" name="note"><?php if(isset($note)) echo $note; ?></textarea>
                                <?php if (isset($note_err)) { ?>
                                    <p class="text-danger err"><?php echo $note_err; ?></p>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-12 px-0 pt-2">
                            <a href="users" class="btn btn-dark mr-2">Cancel</a>
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

   
<?php require_once 'includes/templates/footer-page.php'; ?>


<?php if (isset($db)) {
    echo "<script>
            swal('Error', '$db', 'error');
        </script>";
} ?>