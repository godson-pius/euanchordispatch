<?php
require_once 'manager/includes/functions/db_config.php';

if (isset($_POST['submit'])) {
    $errors = [];
    extract($_POST);
    if (!empty($track)) {
        $result = track_packages($track);
       
        if (is_array($result)) {
            $en = "data-encrypt";
            $pid = url_encode('pack_id');
            $track = encryptor($en, $track);
            redirect_to("tracking-details?$pid=$track");
        } else {
            redirect_to('404');
        }
    }else {
        $errors['track_err'] = "Empty field not allowed";
        extract($errors);
    }
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
                            <h2 class="page-title">TRACK CARGO</h2>
                            <ul class="page-list">
                                <li><a href="index">Home</a></li>
                                <li>Cargo Tracking</li>
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
        <div class="contact-area mg-top-120 mb-120">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-12">
                    <form class="contact-form text-center" method="post">
                        <h3>TRACK YOUR PACKAGE</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-truck"></i></label>
                                    <input type="text" required name="track" placeholder="Tracking number">
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                                <button class="btn btn-base" type="submit" name="submit">Track Package</button>
                            </div>
                        </div>
                    </form>
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