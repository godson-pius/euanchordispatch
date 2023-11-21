<?php require_once 'includes/functions/db_config.php'; ?>

<?php 
$admin = view_admin();

if ($admin) {
    $all_admin = $admin;
}?>


 <table id="datatable" class="table border">
    <thead>
    <tr >
        <th>Email</th>
        <th class="text-right">Action</th>
    </tr>
    </thead>
        <?php 
            if (!empty($all_admin)) {
                foreach ($all_admin as $ad) {
                    extract($ad); ?>
                <tr>
                    <td><?= $email ?></td>
                    <td class="text-right">

                        <div class="row">
                            <?php if ($id != $_SESSION['admin_id']) { ?>
                                 <a class="nav-link waves-effect waves-light nav-user btn-light ml-auto mr-4" data-toggle="dropdown" href="#" role="button">
                                    <i class="ti-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                   
                                    <!-- item-->
                                    <a href="javascript:void(0);" data-id="<?= $id ?>" id="admin-del" class="dropdown-item notify-item">
                                        <i class="ti-trash"></i> <span>Delete</span>
                                    </a>

                                </div>
                            <?php } ?>
                        </div>
                    </td>
                    
                </tr>

            <?php }}else { ?>
                <tr>  
                    <td class="text-center" colspan="2">
                        <p class="py-2 mb-0">No admin</p>
                    </td>  
                </tr>
            <?php } ?>
    <tbody >
        
    </tbody>
</table>



<?php require_once 'ajax-loading.php'; ?>
