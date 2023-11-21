<?php 
	require_once 'includes/functions/db_config.php';
	if (!isset($_SESSION['admin_id'])) {
       redirect_to("index.php"); 
    }
	header('Content-type: application/json; charset=UTF-8');

	$response = [];
	if ($_POST['delete']) {
		$id = intval($_POST['delete']);

		$result = delete_feedback($id);

		if ($result) {
			$response['status'] = 'success';
			$response['message'] = 'Feedback Deleted Successfully...';
		}else {
			$response['status'] = 'error';
			$response['message'] = 'Unable to delete Feedback....';
		}

		echo json_encode($response);
	}
