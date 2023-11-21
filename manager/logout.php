<?php 
	require_once 'includes/functions/db_config.php';
	session_start();
	session_destroy();

	redirect_to('index');