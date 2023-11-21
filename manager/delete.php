<?php
	require_once 'includes/functions/db_config.php';
	if (!isset($_SESSION['admin_id'])) {
       redirect_to("index.php"); 
    }
	header('Content-type: application/json; charset=UTF-8');

	$response = [];


	if ($_POST['deletePackage']) {
		$id = intval($_POST['deletePackage']);

		$result = delete_package($id);

		if ($result) {
			$response['status'] = 'success';
			$response['message'] = 'Package Deleted Successfully...';
		}else {
			$response['status'] = 'error';
			$response['message'] = 'Unable to delete Package....';
		}

		echo json_encode($response);
	}