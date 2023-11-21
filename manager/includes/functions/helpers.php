<?php 
ob_start();

function sanitize($input)
{
    global $link;
	$text = mysqli_real_escape_string($link, htmlentities(htmlspecialchars(strip_tags(trim($input)))));
	return $text;
}


function sanitize_email($email)
{
	$email = trim($email);
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return $email;
	}return false;
}

function redirect_to($url)
{
	$url = urldecode($url);
	header("Location: $url");
	exit();
}


function check_duplicate($email){
	global $link;
	$sql = "SELECT email FROM admin WHERE email = '$email'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		if (mysqli_num_rows($query) > 0) {
			return true;
		} return false;
	} return false;
}


function check_duplicate_entry($table, $col, $entry){
	global $link;
	$sql = "SELECT $col FROM $table WHERE $col = '$entry'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		if (mysqli_num_rows($query) > 0) {
			return true;
		} return false;
	} return false;
}


function format_text($text)
{
	$message = str_replace(array('"', "'"), array('&quot;', '&apos;'), $text);
	return $message;
}
function encryptor($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'listing';
    $secret_iv = 'listing123';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if ($action == 'data-encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'data-decrypt') {
        //decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}


function url_encode($input) {
    return strtr(base64_encode($input), '+/=', '._-');
}

function url_decode($input) {
    return base64_decode(strtr($input, '._-', '+/='));
}