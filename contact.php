<?php
    if (isset($_POST['submit'])) {
        echo "<script>alert('Message sent!')</script>";
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
                            <h2 class="page-title">CONTACT US</h2>
                            <ul class="page-list">
                                <li><a href="index.html">Home</a></li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->  

    <!-- contact area start -->
    <div class="container">
        <div class="contact-area mg-top-120 mb-120">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-7">
                    <form class="contact-form text-center" method="post">
                        <h3>GET A QUOTE</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-user"></i></label>
                                    <input required type="text" placeholder="Your name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-envelope"></i></label>
                                    <input required type="text" placeholder="Your email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fas fa-calculator"></i></label>
                                    <input required type="text" placeholder=" Phone number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-select-inner">
                                    <label><i class="far fa-file-alt"></i></label>
                                    <select required class="single-select">
                                        <option>Subject</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner">
                                    <label><i class="fas fa-pencil-alt"></i></label>
                                    <textarea required placeholder="Write massage"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-base" name="submit"> SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="contact-information-wrap">
                        <h3>CONTACT INFORMATION</h3>
                        <div class="single-contact-info-wrap">
                            <h6>Contact Number:</h6>
                            <div class="media">
                                <div class="icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="media-body">
                                    <p>+1 952-435-7106</p>
                                    <p>+1 932-654-9874</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-contact-info-wrap">
                            <h6>Mail Address:</h6>
                            <div class="media">
                                <div class="icon" style="background: #080C24;">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="media-body">
                                    <p>info@euanchordispatch.com</p>
                                    <p>info.example@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-contact-info-wrap mb-0">
                            <h6>Office Location:</h6>
                            <div class="media">
                                <div class="icon" style="background: #565969;">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="media-body">
                                    <p>2245 Gilbert Ave, Cincinnati, OH</p>
                                    <p>45206, United States</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->

    <div class="contact-g-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d29208.601361499546!2d90.3598076!3d23.7803374!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1589109092857!5m2!1sen!2sbd"></iframe>
    </div>

    <!-- footer area start  -->
    <?php require_once 'components/footer.php'; ?>

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