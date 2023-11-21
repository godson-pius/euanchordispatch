<?php require_once '../includes/functions/db_config.php';
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
} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=1250">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome-animation.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="dataTables.bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .no_bg{
            background-color: transparent !important;
        }
    </style>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

    <title>EuanchorDispatch | Courier Cargo</title>

    <!-- Left side column. contains the logo and sidebar -->
    <style type="text/css">
        hr { margin:2px !important; }
        h3 { margin-top:5px; }
        #TableTab { width:100% !important; }
        .content-wrapper, .main-footer{
            margin-left: 0!important;
        }

        .content-wrapper{
            min-height: 94.5vh;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <style type="text/css">
                    .divhead {
                        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+0,e0e0e0+63,f3f3f3+63,e0e0e0+63,ffffff+100 */
                        background: rgb(255,255,255); /* Old browsers */
                        background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(224,224,224,1) 63%, rgba(243,243,243,1) 63%, rgba(224,224,224,1) 63%, rgba(255,255,255,1) 100%); /* FF3.6-15 */
                        background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(224,224,224,1) 63%,rgba(243,243,243,1) 63%,rgba(224,224,224,1) 63%,rgba(255,255,255,1) 100%); /* Chrome10-25,Safari5.1-6 */
                        background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(224,224,224,1) 63%,rgba(243,243,243,1) 63%,rgba(224,224,224,1) 63%,rgba(255,255,255,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */
                    }

                    @media print {
                        body * { visibility: hidden; }
                        .content-wrapper { min-height:100vh !important; }
                        .printcontent * { visibility: visible; }
                        .printcontent {  min-height:100vh !important;  max-height:100vh !important; height:100vh !important; }
                        .modal-footer, .close { display:none !important; }
                    }
                </style>
                <div class="modal fade printcontent in" style="display: block; padding-left: 17px; overflow-y: auto;" id="View<?= $id ?>" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="px-0 pull-left" style="width: 50%;">
                                    <img src="../../img/logo.png" alt="" class="w-100">
                                </div>
                                <div class="col-6 px-0 pull-right" style="width: 50%; padding-right: 70px;">
                                    <span class="pull-right"><?php echo date("F j, Y")?></span>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <h6 style="font-weight:bold;">SENDER</h6>
                                        <div style="line-height:28px; margin-bottom: 20px;">
                                            <h4 class="text-black"> <?= $sender_name ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-0" style="margin-bottom: 0"><strong>Phone:</strong> <?= $sender_phone ?></p>
                                            <p class="mb-0" style="margin-bottom: 0"><strong>Address:</strong> <?= $sender_address ?></p>
                                            <p class="mb-0" style="margin-bottom: 0"><strong>Country Origin:</strong> <?= $origin ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <h6 style="font-weight:bold;">RECIPIENT</h6>
                                        <div style="line-height:28px; margin-bottom: 20px;">
                                            <h4 class="text-black"> <?= $receiver_name ?></h4>
                                        </div>
                                        <div>
                                            <p class="mb-0" style="margin-bottom: 0"><strong>Phone:</strong> <?= $receiver_phone ?></p>
                                            <p class="mb-0" style="margin-bottom: 0"><strong>Address:</strong> <?= $receiver_address ?></p>
                                            <p class="mb-0" style="margin-bottom: 0"><strong>Country Origin: </strong><?= $destination ?></p>
                                            <p class="mb-0" style="margin-bottom: 0"><strong>email:</strong> <?= $receiver_email ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div style="line-height:28px; width:80%; margin: 0 auto 20px auto">
                                            <img src="img/barcode-clipart-one-dimensional-3.jpg" alt="" class="w-100" style="width: 100%">
                                            <p class="text-center">*<strong> <?= $track_no ?></strong>*</p>
                                        </div>
                                        <div>
                                            <p class="mb-0" style="margin-bottom: 0"><strong>Shipping Weight:</strong> <?= $weight ?> kg</p>
                                            <p class="mb-0" style="margin-bottom: 0"><strong>Payment Method: </strong> <small style="border-radius: 5px; border: 1px solid #000; padding: 0 5px 0 5px" class="text-bold"> <i class="fa fa-money"></i> <?= $pmode ?></small> </p>

                                        </div>
                                    </div>

                                    <div class="clearfix"></div><br />
                                    <div class="clearfix"></div>
                                    <div class="col-sm-12">
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
                                                <td><?= $qnty ?></td>
                                                <td><?= $product ?></td>
                                                <td><small style="border-radius: 5px; border: 1px solid #000;padding: 1px 4px; "><b><?= $status?></b></small></td>
                                                <td><?= $coments ?></td>
                                                <td><?= $amount ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-xs-6">
                                        <p style="font-size: 26px;">Methods Of Payment: </p>
                                        <img src="img/IMG-20200804-WA0s005%20(2).jpg" alt="">
                                        <p style="margin-top: 10px; color: #787878" >For your convenience we have several reliable, fast and secure payments</p>
                                    </div>
                                    <div class="col-xs-4">
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
                <div class="col-md-12"></div>

            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap.min.js"></script>
<!-- DataTables -->
<script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="demo.js"></script>
</body>
</html>
<script>
    $(function () {
        $('#TableTab').DataTable( {
            "order": [[ 6, "desc" ]],
            "columnDefs": [ {
                "targets": 7,
                "orderable": false
            } ]
        })
    })
</script>

