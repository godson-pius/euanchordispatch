<?php 
session_start();
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

define("HOST", "localhost");
define("USERNAME", "euanchordispatch");
define("PASSWORD", "euanchordispatch");
define("DBNAME", "anamcrke_euanchordispatch");
// define("HOST", "localhost");
// define("USERNAME", "root");
// define("PASSWORD", "");
// define("DBNAME", "nimble");

$link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

require_once 'helpers.php';
require_once 'functions.php';

