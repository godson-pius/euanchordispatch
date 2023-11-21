<?php 
require_once 'includes/functions/db_config.php';

    // if (!isset($_SESSION['admi_id'])) {
    //     redirect_to("index.php"); 
    // }


    if (isset($_POST['feed_id'])) {
        $id = $_POST['feed_id'];

        $result = fetch_feedback($id);

        if ($result) {
            extract($result);
        
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="container-fluid">


<div class="tab-content">
    <div class="tab-pane active" id="home-b1">
        <div class="row">
            <div class="col-md-4">
                <!-- Personal-Information -->
                <div class="panel panel-default panel-fill">
                    <div class="panel-heading">
                        <h3 class="panel-title">Personal Information</h3>
                        
                    </div>
                    <div class="panel-body">

                         <div class="m-b-20">
                            <strong>Name</strong>
                            <br>
                            <p class="text-muted"><?= $name ?></p>
                        </div>

                         <div class="m-b-20">
                            <strong>Subject</strong>
                            <br>
                            <p class="text-muted"><?= $surname ?></p>
                        </div>

                        <div class="m-b-20">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?= $email ?></p>
                        </div>

                    </div>
                </div>
                <!-- Personal-Information -->

                
            </div>
            
            

            <div class="col-md-8">
                <!-- Personal-Information -->
                <div class="panel panel-default panel-fill">
                    <div class="panel-heading">
                        <h3 class="panel-title">Feedback</h3>
                    </div>
                    <div class="panel-body">
                        <h5 class="font-14 mb-3 text-uppercase">Message</h5>
                        <p><?= $message ?></p>
                    </div>
                </div>
                <!-- Personal-Information -->

            </div>

       
    
        </div>

        <div>
            <a href="javascript:void(0);" id="go-back" class="btn btn-light"><i class="fa fa-arrow-left mr-2" ></i>Back to comments</a>
        </div>
    </div>
</div>

<?php }} ?>



