<?php require_once 'includes/functions/db_config.php'; ?>

<?php 
    if (isset($_POST['submit'])) {
        $result = login_admin($_POST);
        extract($_POST);

        if ($result === true) {
            redirect_to('dashboard');
        }else {
            $errors = $result;
            extract($errors);
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>EuanchorDispatch — Logistics, Cargo & Courier Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../img/logo-mini.png">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <section>
            <div class="container">
                <div class="row ">
                    <div class="col-sm-12 pt-5">

                        <div class="wrapper-page">

                            <div class="m-t-40 card-box">
                                <div class="text-center">
                                    <h2 class="text-uppercase m-t-0 m-b-30">
                                        <a href="../index" class="text-success">
                                            <span><img src="../assets/img/logo.png" alt="logo" height="50"></span>
                                        </a>
                                    </h2>
                                    <!-- <h4 class="text-uppercase font-bold m-b-0">Sign In</h4> -->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" action="<?= str_replace(".php", "", htmlentities($_SERVER['PHP_SELF'])); ?>" method="POST">

                                        <div class="form-group m-b-20">
                                            <div class="col-12">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control" type="email" id="emailaddress" required="" placeholder="john@deo.com"   name="email" value="<?php if(isset($email)) echo $email; ?>">

                                                <?php if (isset($email_err)) { ?>
                                                    <p class="text-danger err"><?php echo $email_err; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <div class="col-12">
                                                
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" required="" id="password" placeholder="Enter your password" name="password" value="<?php if(isset($password)) echo $password; ?>">

                                                 <?php if (isset($pass_err)) { ?>
                                                    <p class="text-danger err"><?php echo $pass_err; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>

                                       

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-12">
                                                <button class="btn btn-lg btn-danger btn-block" type="submit" name="submit">Sign In</button>
                                            </div>
                                        </div>
                                        
                                         <?php if (isset($login_err)) { ?>
                                            <p class="text-danger err"><?php echo $login_err; ?></p>
                                        <?php } ?>
                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->
                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>