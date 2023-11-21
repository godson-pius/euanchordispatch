<?php require_once 'includes/functions/db_config.php'; ?>
<?php 
$all_feedback = view_feedbacks();

if ($all_feedback) {
    $feedbacks = $all_feedback;
}
?>
<table id="datatable" class="table table-bordered table-hover">
    <thead>
    <tr >
        <th>S/N</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Email Address</th>
        <th>Message</th>
        <th class="text-right">Action</th>
    </tr>
    </thead>


    <tbody>
    <?php 
    if (!empty($feedbacks)) {
        $counter = 0;
        foreach ($feedbacks as $feedback) {
            extract($feedback);
            $counter++;
        ?>
            <tr>
                <td><?php echo $counter ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $surname; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo substr($message, 0, 10); if (strlen($message) > 10) {
                    echo '.....';
                } ?></td>
                <td class="text-right">

                    <div class="row">
                     <a class="nav-link waves-effect waves-light nav-user btn-light ml-auto mr-4" data-toggle="dropdown" href="#" role="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                       
                        <!-- item-->
                        <a href="javascript:void(0);" data-id="<?php echo $id ?>" id="more" class="dropdown-item notify-item">
                            <i class="ti-list"></i> <span>More Details</span>
                        </a>

                        <a href="javascript:void(0);" data-id="<?php echo $id ?>" class="dropdown-item notify-item" id="del-feed">
                            <i class="ti-trash"></i> <span>Delete</span>
                        </a>

                    </div>
                    </div>
                </td>
                
            </tr>
    <?php }} ?>
       </tbody>
</table>

<?php require_once 'ajax-loading.php'; ?>