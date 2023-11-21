<?php require_once 'includes/config.php';
if (isset($_POST['submit'])){
    $shipment = add_shipment($_POST);
    if ($shipment === true){
        $_SESSION['status'] = "Added Successfully";
        header("Location: /admin/");
        exit();
    }else{
        echo "<script>
            alert('Something went wrong');
        </script>";
    }

}?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <title>Admin Panel | Courier Cargo</title>
  <header class="main-header">
    <!-- Logo -->
    <a href="addshipment.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Admin</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
              <a><span class="hidden-xs">Welcome Admin</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-truck"></i> <span>Shipment</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class='active'><a href="addshipment"><i class="fa fa-angle-double-right"></i> Add Shipment</a></li>
                    <li ><a href="./"><i class="fa fa-angle-double-right"></i> List of Pending Shipment</a></li>
                    <li class=''><a href="../"><i class="fa fa-angle-double-right"></i> Track Shipment</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script>
		function getXMLHTTP() { //fuction to return the xml http object
			var xmlhttp=false;	
				try{
					xmlhttp=new XMLHttpRequest();
				}
				catch(e)	{		
					try{			
						xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
					}
					catch(e){
						try{
							req = new ActiveXObject("Msxml2.XMLHTTP");
						}
						catch(e1){
						xmlhttp=false;
						}
					}
				}
			return xmlhttp;
			}	
			function loadcustomer(x,y) {
				if(x==0)
				{
					document.getElementById(y+"name").readOnly = false;
					document.getElementById(y+"phone").readOnly = false;
					document.getElementById(y+"address1").readOnly = false;
					document.getElementById(y+"address2").readOnly = false;
					document.getElementById(y+"email").readOnly = false;
					
					document.getElementById(y+"name").value = "";
					document.getElementById(y+"phone").value = "";
					document.getElementById(y+"address1").value = "";
					document.getElementById(y+"address2").value = "";
					document.getElementById(y+"email").value = "";
				}
				else
				{		
					var strURL="find_customer.php?cid="+x;
					document.getElementById(y+"cusid").readOnly = true;
					var req = getXMLHTTP();
					if (req) {
						req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								var res = req.responseText;
								var retarr = res.split("|");
								document.getElementById(y+"name").readOnly = true;
								document.getElementById(y+"phone").readOnly = true;
								document.getElementById(y+"address1").readOnly = true;
								document.getElementById(y+"address2").readOnly = true;
								document.getElementById(y+"email").readOnly = true;

								document.getElementById(y+"name").value = retarr[1];
								document.getElementById(y+"phone").value = retarr[2];
								document.getElementById(y+"address1").value = retarr[3];
								document.getElementById(y+"address2").value = retarr[4];
								document.getElementById(y+"email").value = retarr[5];

								document.getElementById(y+"cusid").readOnly = false;
								if(y=="shipper") z="receiver";
								if(y=="receiver") z="shipper";
								var op = document.getElementById(z+"cusid").getElementsByTagName("option");
								for (var i = 0; i < op.length; i++) {
								  // lowercase comparison for case-insensitivity
								  (op[i].value == x) ? op[i].disabled = true : op[i].disabled = false ;
								}
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					};
					req.open("GET", strURL, true);
					req.send(null);
				}	
			}
		}
</script>
<link rel="stylesheet" href="bootstrap-timepicker.min.css">
<link href="jquery-ui.min.css" rel="stylesheet" type="text/css" />
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Shipment
        <small>Add Shipment</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="addshipment.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Shipment - Add Shipment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <!-- Small boxes (Stat box) -->
      <div class="row">
      	      	
            <div class="col-md-12">
                <form name="addshipment" id="addshipment" method="post" action="<?= htmlentities($_SERVER['PHP_SELF']); ?>">
            	<div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Add Shipment</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                       <div class="col-md-12">
                            <div class="col-md-6">
                            <h3 class="box-title">Shipper info :</h3>
                                <div class="form-group">
                                    <label for="choose">Choose</label>
                                    <select name="shippercusid" id="shippercusid" class="form-control" onchange="loadcustomer(this.value,'shipper')">
                                        <option value="0">Unassigned</option>
                                        <?php $shippers = fetch_agents();
                                            if (!empty($shippers)){
                                                foreach ($shippers as $shipper){
                                                    extract($shipper);?>

                                    	         <option value="<?= $id ?>"><?= $name ?></option>
                                        <?php }} ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shippername">Shipper Name<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Shipper Name" name="shippername" id="shippername" maxlength="35">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="shipperphone" id="shipperphone" maxlength="30">
                                </div>
                                <div class="form-group">
                                    <label for="shipperaddress">Address<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Address Line 1" name="shipperaddress1" id="shipperaddress1"><br />
                                    <input type="text" class="form-control" placeholder="Address Line 2" name="shipperaddress2" id="shipperaddress2">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email Address" name="shipperemail" id="shipperemail" maxlength="55">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                            <h3 class="box-title">Receiver info :</h3>
                                <div class="form-group">
                                    <label for="choose">Choose</label>
                                    <select name="receivercusid" id="receivercusid" class="form-control" onchange="loadcustomer(this.value,'receiver')">
                                    	<option value="0">Unassigned</option>
                                        <?php if (!empty($shippers)){
                                            foreach ($shippers as $shipper){
                                                extract($shipper);?>
                                                <option value="<?= $id ?>"><?= $name ?></option>
                                            <?php }} ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Name" name="receivername" id="receivername" maxlength="35">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="receiverphone" id="receiverphone" maxlength="35">
                                </div>
                                <div class="form-group">
                                    <label for="receiveraddress">Address<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" placeholder="Address Line 1" name="receiveraddress1" id="receiveraddress1"><br />
                                    <input type="text" class="form-control" placeholder="Address Line 2" name="receiveraddress2" id="receiveraddress2">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Email Address" name="receiveremail" id="receiveremail" maxlength="55">
                                </div>
                            </div>
                       </div>
                       
                       <div class="col-md-12">
                       <h3 class="box-title">Shipment info :</h3>
                            	<div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="consignmentnumber">Consignment No<span class="text-red">*</span></label>
                                    	<input type="text" class="form-control" placeholder="Enter Consignment No" name="consignmentnumber" id="consignmentnumber" maxlength="50">
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="typeofshipment">Type of Shipment</label>
                                    	<select name="typeofshipment" id="typeofshipment" class="form-control">
                                        	<option value="">- - - - - - - - - Select - - - - - - - - -</option>
                                            <option value="1">Documents</option>
                                            <option value="2">Sentiments</option>
                                            <option value="3">Parcel</option>
                                            <option value="10">Perishable</option>
                                            <option value="11">ملابس</option>
                                            <option value="12">مكياج</option>
                                            <option value="13">مكياج</option>
                                            <option value="14">اثاث</option>
                           			</select>
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="weight">Weight</label>
                                    	<input type="text" class="form-control" placeholder="Enter Weight" name="weight" id="weight" maxlength="25">
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="courier">Courier</label>
                                    	<input type="text" class="form-control" placeholder="Enter Courier" name="courier" id="courier" maxlength="50">
                                	</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="packages">Packages</label>
                                    	<input type="text" class="form-control" placeholder="Enter Packages" name="packages" id="packages" maxlength="30">
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="Mode">Mode</label>
                                        	<select name="bookmode" id="bookmode" class="form-control"> 
                                                <option value="">- - - - - - - - - Select - - - - - - - - -</option>
                                                <option value="1">Air</option>
                                                <option value="2">Road</option>
                                                <option value="4">Sea</option>
                                                <option value="12">شحن جوي</option>
                                                <option value="14">شحن بحري</option>
                                                <option value="15">Overland</option>
                                                <option value="16">62654684</option>
                                                                               
                               				</select>
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="product">Product</label>
                                    	<input type="text" class="form-control" placeholder="Enter Product" name="product" id="product" maxlength="35">
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="qnty">Qnty</label>
                                    	<input type="text" class="form-control" placeholder="Enter Qnty" name="qnty" id="qnty" maxlength="40">
                                	</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="paymentmode">Payment Mode<span class="text-red">*</span></label>
                                    	<select name="paymentmode" id="paymentmode" class="form-control">                                		
                                        	<option value="">- - - - - - - - - Select - - - - - - - - -</option>
                                            <option value="3">To Pay</option>
                                            <option value="8">Paid</option>
                                            <option value="9">Credit</option>
                                            <option value="10">Cash</option>
                                            <option value="11">cheque</option>
                                            <option value="12">online paypal</option>
                                            <option value="14">Account</option>
                                                                         
                               			</select>
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="totalfreight">Total Freight</label>
                                    	<input type="text" class="form-control" placeholder="Enter Total Freight" name="totalfreight" id="totalfreight" maxlength="40">
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="carrier">Carrier</label>
                                    	<select name="carrier" id="carrier" class="form-control">                                		
                                        	<option value="">- - - - - - - - - Select - - - - - - - - -</option>
                                            <option value="1">DHL</option>
                                            <option value="2">FEDEX</option>
                                            <option value="3">DPD UK</option>
                                            <option value="6">Speed Bike</option>
                                            <option value="8">MCS LOGISTIC</option>
                                            <option value="9">MCS LOGISTIC</option>
                                                                         
                               			</select>
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="carrierreferencenumber">Carrier Reference Number</label>
                                    	<input type="text" class="form-control" placeholder="Required if Courier is Chosen" name="carno" id="carno" maxlength="35">
                                	</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-3 bootstrap-timepicker">
                                	<div class="form-group">
                                    	<label for="depttime">Depttime</label>
                                    	<input type="text" class="form-control timepicker" placeholder="Enter Depttime" name="depttime" id="depttime" maxlength="15" readonly="readonly">
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="origin">Origin<span class="text-red">*</span></label>
                                    	<select name="origin" id="origin" class="form-control">                                		
                                        	<option value="">- - - - - - - - - Select - - - - - - - - -</option>
                                            <option value="1">United Kingdom </option>
                                            <option value="2">UK</option>
                                            <option value="3">U.S.A</option>
                                            <option value="4">Accra Ghana</option>
                                            <option value="5">Dubai</option>
                                            <option value="6">Mumbai</option>
                                            <option value="7">United States</option>
                                            <option value="10">china</option>
                                            <option value="11">Lagos Nigeria</option>
                                            <option value="12">Nairobi kenya</option>
                                            <option value="13">Saudi Arabia </option>
                                            <option value="14">Bangalore</option>
                                                                         
                               			</select>
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="destination">Destination<span class="text-red">*</span></label>
                                    	<select name="destination" id="destination" class="form-control">
                                        	<option value="">- - - - - - - - - Select - - - - - - - - -</option>
                                            <option value="1">United Kingdom </option>
                                            <option value="2">UK</option>
                                            <option value="3">U.S.A</option>
                                            <option value="4">Accra Ghana</option>
                                            <option value="5">Dubai</option>
                                            <option value="6">Mumbai</option>
                                            <option value="7">United States</option>
                                            <option value="10">china</option>
                                            <option value="11">Lagos Nigeria</option>
                                            <option value="12">Nairobi kenya</option>
                                            <option value="13">Saudi Arabia </option>
                                            <option value="14">Bangalore</option>
                               			</select>
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="pickupdate">Pickup Date<span class="text-red">*</span></label>
                                    	<input type="text" class="form-control" placeholder="Enter Pickup Date" name="pickupdate" id="pickupdate" readonly="readonly" value="27-08-2020">
                                	</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-3 bootstrap-timepicker">
                                	<div class="form-group">
                                    	<label for="pickuptime">Pickup Time</label>
                                    	<input type="text" class="form-control timepicker" placeholder="Enter Pickup Time" name="pickuptime" id="pickuptime" readonly="readonly">
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="destination">Status</label>
                                    	<select name="status" id="status" class="form-control">
	                                        <option value="1" selected>In Transit</option>
	                                        <option value="2" >Pending</option>
	                                        <option value="3" >Delivered</option>
	                                        <option value="4" >Delayed</option>
	                                        <option value="5" >On Hold</option>
	                                        <option value="6" >Landing</option>
	                                        <option value="7" >Clearance </option>
	                                        <option value="8" >in  Sorting</option>
	                                        <option value="9" >Shipment Pickup</option>
	                                        <option value="10" >c</option>
                                		</select>
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="exptdeliverydate">Expected Delivery date<span class="text-red">*</span></label>
                                    	<input type="text" class="form-control" placeholder="Enter Expected Delivery date" name="exptdeliverydate" id="exptdeliverydate" maxlength="15" readonly="readonly" value="27-08-2020">
                                	</div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label for="destination">Comments</label>
                                    	<textarea class="form-control" placeholder="Enter Destination" name="comments" id="comments"></textarea>
                                	</div>
                                </div>
                                
                          </div>
                            <input type="hidden" name="add" id="add" value="Add">
                    </div>
                        <!-- /.box-body -->
                      <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
                      </div>
                  </div>
                  </form>
            </div>
            
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
  <script src="bootstrap-timepicker.min.js"></script>
    <script type="text/javascript">
  	$( function() {
		  	$( "#pickupdate,#exptdeliverydate" ).datepicker({
			  dateFormat: "dd-mm-yy"
			});
			$(".timepicker").timepicker({
			  showInputs: false
			});
	});
  </script>  
	<script src="jquery.validate.min.js"></script>    
	<script>
		jQuery(document).ready(function() {
			// validate signup form on keyup and submit
			jQuery("#addshipment").validate({
				rules: {
					shippername: {
						required: true
					},
					receivername: {
						required: true
					},
					name: {
						required: true
					},
					shipperaddress1: {
						required: true
					},
					receiveraddress1: {
						required: true
					},
					consignmentnumber: {
						required: true,
						remote : "cnocheck.php"
					},
					paymentmode: {
						required: true
					},
					carno:
					{
						required: { depends: function(element) {
						return  ( ( $('#carrier').val() != ""));
						} }
					},
					origin: {
						required: true
					},
					destination: {
						required: true
					},
					pickupdate: {
						required: true
					},
					pickuptime: {
						required: true
					},
					exptdeliverydate: {
						required: true
					}					
				},
				messages : {
					consignmentnumber: {
						remote : "Consignment No. already Exists"
					}
				}
			});
		});
	</script>