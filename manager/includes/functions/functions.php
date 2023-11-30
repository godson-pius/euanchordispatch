<?php
function login_admin($post)
{
	extract($post);
	$error = [];
	global $link;

	if (!empty($email)) {
		$temp_email = sanitize_email($email);

		if ($temp_email) {
			$email = $temp_email;
		}else {
			$error['email_err'] = 'Enter a valid email address';
		}
	}else {
		$error['email_err'] = 'Enter your email address';
	}


	if (!empty($password)) {
		$password = sanitize($password);
	}else {
		$error['pass_err'] = 'Enter your password';
	}


	if (!$error) {
		$sql = "SELECT id, password FROM admin WHERE email = '$email'";

		$query = mysqli_query($link, $sql);

		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);

			$hash_password = $row['password'];

			if (password_verify($password, $hash_password)) {
				$_SESSION['admin_id'] = $row['id'];
				return true;		
			}$error['login_err'] = 'Invalid login details';		
		}$error['login_err'] = 'Invalid login details';
	}return $error;

}

function add_admin($post)
{
	extract($post);
	$error = [];
	global $link;

	if (!empty($email)) {
		$temp_email = sanitize_email($email);

		if ($temp_email) {
			if (!check_duplicate($temp_email)) {
				$email = $temp_email;
			}else {
				$error['email_err'] = "This email has already been used!";
			}
		}else {
			$error['email_err'] = 'Enter a valid email address';
		}
	}else {
		$error['email_err'] = 'Enter your email address';
	}


	if (!empty($password1)) {
		$password1 = sanitize($password1);
	}else {
		$error['pass_err'] = 'Enter password';
	}

	if (!empty($password2)) {	
		$password2 = sanitize($password2);
	}else {
		$error['c_pass_err'] = 'Enter confirm password';
	}


	if (isset($password1) && isset($password2)) {
		if ($password1 == $password2) {
			$password = password_hash($password1, PASSWORD_DEFAULT);
		}else {
			$error['mismatch'] = "Password Mismatch";
		}
	}

	if (!$error) {
		$sql = "INSERT INTO admin (email, password) VALUES ('$email', '$password')";
		$query = mysqli_query($link, $sql);

		if ($query) {
			return true;
		}$error['db'] = "Ooops!!! Something went wrong.";
	}return $error;
}


function view_admin()
{
	global $link;

	$sql = "SELECT * FROM admin ORDER BY id DESC";

	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
		   $packages[] = $row; 
		}return $packages;
	}return false;
}

function add_package($post)
{
	global $link;
	extract($post);

	$error = [];

	if (!empty($sname)) {
		$sname = sanitize($sname);
	}else {
		$error['sname_err'] = "Empty field not allowed";
	}

	if (!empty($sphone)) {
		$sphone = sanitize($sphone);
	}else {
		$error['sphone_err'] = "Empty field not allowed";
	}

	if (!empty($rname)) {
		$rname = sanitize($rname);
	}else {
		$error['rname_err'] = "Empty field not allowed";
	}

	if (!empty($rphone)) {
		$rphone = sanitize($rphone);
	}else {
		$error['rphone_err'] = "Empty field not allowed";
	}



	if (!empty($remail)) {
		$temp_email = sanitize_email($remail);

		if ($temp_email) {
            $remail = $temp_email;
		}else {
			$error['remail_err'] = "Enter a valid email address";
		}

	}else {
		$error['remail_err'] = "Empty field not allowed";
	}

	if (!empty($track)) {
		$code = sanitize(ucwords($track));

		if ($code) {
			$table = "shipment";
			$col = "track_no";
			if (!check_duplicate_entry($table, $col, $code)) {
				$track = $code;
			}else {
				$error['track_err'] = "Track code has been used";
			}
		}
	}else {
		$error['track_err'] = "Empty field not allowed";
	}

	if (!empty($pname)) {
		$pname = sanitize($pname);
	}else {
		$error['pname_err'] = "Empty field not allowed";
	}


	if (!empty($pstatus)) {
		$pstatus = sanitize($pstatus);
	}else {
		$error['pstatus_err'] = "Select Package status";
	}

	if (!empty($arrival)) {
		$arrival = sanitize($arrival);
	}else {
		$error['arrival_err'] = "Empty field not allowed";
	}


	if (!empty($origin)) {
		$origin = sanitize($origin);
	}else {
		$error['origin_err'] = "Empty field not allowed";
	}

	if (!empty($des)) {
		$des = sanitize($des);
	}else {
		$error['des_err'] = "Empty field not allowed";
	}

	if (!empty($mode)) {
		$mode = sanitize($mode);
	}else {
		$error['mode_err'] = "Empty field not allowed";
	}

	if (!empty($refno)) {
		$ref = sanitize($refno);

		if ($ref) {
			$table = "shipment";
			$col = "ref_no";

			if (!check_duplicate_entry($table, $col, $ref)) {
				$refno = $ref;
			}else {
				$error['refno_err'] = "Carrier Reference Number has been used";
			}
		}

	}else {
		$error['refno_err'] = "Empty field not allowed";
	}

	if (!empty($quan)) {
		$quan = sanitize($quan);
	}else {
		$error['quan_err'] = "Empty field not allowed";
	}

	if ($kg) {
		$kg = sanitize($kg);
	}

	if ($amount) {
		$amount = sanitize($amount);
	}

	if ($pmode) {
		$pmode = sanitize($pmode);
	}

    if (!empty($depDate)) {
        $depDate = sanitize($depDate);
    }else {
        $error['depDate_err'] = "Empty field not allowed";
    }

    if ($type) {
        $type = sanitize($type);
    }

    if ($courier) {
        $courier = sanitize($courier);
    }

    if (!empty($note)) {
        $note = sanitize($note);
    }else {
        $error['note_err'] = "Empty field not allowed";
    }

    if (!empty($packages)) {
        $shipment = sanitize($packages);
    }else {
        $error['packages_err'] = "Empty field not allowed";
    }

    if (!empty($del_time)) {
        $del_time = sanitize($del_time);
    }else {
        $error['del_time_err'] = "Empty field not allowed";
    }

    if (!empty($dept_time)) {
        $dept_time = sanitize($dept_time);
    }else {
        $error['dept_time_err'] = "Empty field not allowed";
    }

	if (!$error) {
        $token = sha1($track);
		$sql = "INSERT INTO shipment (token, track_no, sender_name, sender_country,  receiver_name, receiver_country,  receiver_email, product, status, exp_date, origin, destination, mode, ref_no, qnty, weight, amount, pmode, dept_date, coments, type, courier, packages, dept_time, del_time) VALUES ('$token','$track', '$sname', '$sphone',  '$rname', '$rphone', '$remail', '$pname','$pstatus', '$arrival', '$origin','$des','$mode', '$refno','$quan', '$kg', '$amount', '$pmode', '$depDate', '$note' , '$type', '$courier', '$packages', '$dept_time', '$del_time')";

		$query = mysqli_query($link, $sql);


		if ($query) {
            $s_id = mysqli_insert_id($link);

            $sql = "INSERT INTO shipment_history (date, location, status, comments, ship_id, time, token) VALUES ('$depDate', '$origin', '$pstatus', '$note', '$s_id', '$dept_time', '$token')";

            $query = mysqli_query($link, $sql);

            if ($query){
                return true;
            }
		}$error['db'] = "Oops something went wrong";
	}return $error;
}


function delete_admin($id)
{
	global $link;

	$sql = "DELETE FROM admin WHERE id = '$id'";

	$query = mysqli_query($link, $sql);

	if ($query) {
		return true;
	}return false;
}

function delete_status($id)
{
    global $link;

    $sql = "DELETE FROM shipment_history WHERE id = '$id'";

    $query = mysqli_query($link, $sql);

    if ($query) {
        return true;
    }return false;
}


function delete_package($id)
{
	global $link;

	$sql = "DELETE FROM shipment WHERE id = '$id'";

	$query = mysqli_query($link, $sql);

	if ($query) {
		return true;
	}return false;
}


function update_package($post, $id)
{
	global $link;
	extract($post);
	$err = false;

	$error = [];

	if (!empty($sname)) {
        $sname = sanitize($sname);
	}else {
		$error['sname_err'] = "Empty field not allowed";
	}

	if (!empty($sphone)) {
        $sphone = sanitize($sphone);
	}else {
		$error['sphone_err'] = "Empty field not allowed";
	}


	if (!empty($rname)) {
		$rname = sanitize($rname);
	}else {
		$error['rname_err'] = "Empty field not allowed";
	}

	if (!empty($rphone)) {
		$rphone = sanitize($rphone);
	}else {
		$error['rphone_err'] = "Empty field not allowed";
	}

	if (!empty($remail)) {
		if ($remail != $remail_hidden) {
			$temp_email = sanitize_email($remail);

			if ($temp_email) {
                $remail = $temp_email;
			}else {
				$error['remail_err'] = "Enter a valid email address";
			}
		}else {
			$remail = $remail_hidden;
		}

	}else {
		$error['remail_err'] = "Empty field not allowed";
	}

	if (!empty($track)) {
		if ($track != $track_hidden) {
			$code = sanitize(ucwords($track));

			if ($code) {
				$table = "packages";
				$col = "track_code";
				if (!check_duplicate_entry($table, $col, $code)) {
					$track = $code;
				}else {
					$error['track_err'] = "Track code has been used";
				}
			}
		}else {
			$track = $track_hidden;
		}
	}else {
		$error['track_err'] = "Empty field not allowed";
	}

	if (!empty($pname)) {
		$pname = sanitize($pname);
	}else {
		$error['pname_err'] = "Empty field not allowed";
	}


	// if (!empty($location)) {
	// 	$location = sanitize($location);
	// }else {
	// 	$error['location_err'] = "Empty field not allowed";
	// }


	if (!empty($pstatus)) {
		$pstatus = sanitize($pstatus);
	}else {
		$error['pstatus_err'] = "Empty field not allowed";
	}

	if (!empty($arrival)) {
		$arrival = sanitize($arrival);
	}else {
		$error['arrival_err'] = "Empty field not allowed";
	}


	if (!empty($origin)) {
		$origin = sanitize($origin);
	}else {
		$error['origin_err'] = "Empty field not allowed";
	}

	if (!empty($des)) {
		$des = sanitize($des);
	}else {
		$error['des_err'] = "Empty field not allowed";
	}

	if (!empty($mode)) {
		$mode = sanitize($mode);
	}else {
		$error['mode_err'] = "Empty field not allowed";
	}

	if (!empty($refno)) {
		if ($refno != $refno_hidden) {
			$ref = sanitize($refno);

			if ($ref) {
				$table = "packages";
				$col = "ref_no";

				if (!check_duplicate_entry($table, $col, $ref)) {
					$refno = $ref;
				}else {
					$error['refno_err'] = "Carrier Reference Number has been used";
				}
			}

		}else {
			$refno = $refno_hidden;
		}
	}else {
		$error['refno_err'] = "Empty field not allowed";
	}

	if (!empty($quan)) {
		$quan = sanitize($quan);
	}else {
		$error['quan_err'] = "Empty field not allowed";
	}

    if (!empty($packages)) {
        $packages = sanitize($packages);
    }else {
        $error['packages_err'] = "Empty field not allowed";
    }

    if (!empty($dept_time)) {
        $dept_time = sanitize($dept_time);
    }else {
        $error['dept_time_err'] = "Empty field not allowed";
    }

    if (!empty($delivery_time)) {
        $delivery = sanitize($delivery_time);
    }else {
        $error['del_time_err'] = "Empty field not allowed";
    }

    // if (!empty($type)) {
    //     $type = sanitize($type);
    // }else {
    //     $error['type_err'] = "Empty field not allowed";
    // }

	if (!empty($kg)) {
		$kg = sanitize($kg);
	}else {
		$error['kg_err'] = "Empty field not allowed";
	}

	// if (!empty($amount)) {
	// 	$amount = sanitize($amount);
	// }else {
	// 	$error['amount_err'] = "Empty field not allowed";
	// }

	if (!empty($pmode)) {
		$pmode = sanitize($pmode);
	}else {
		$error['pmode_err'] = "Empty field not allowed";
	}

    if (!empty($depDate)) {
        $depDate = sanitize($depDate);
    }else {
        $error['depDate_err'] = "Empty field not allowed";
    }



    if (!empty($note)) {
        $note = sanitize($note);
    }else {
        $error['note_err'] = "Empty field not allowed";
    }


	if (!$error) {
	    global $link;
		$sql = "SELECT token FROM shipment WHERE id = '$id'";
		$response = mysqli_query($link, $sql);
		
		if ($response){
            $response = mysqli_fetch_assoc($response);
		    $token = $response['token'];

            $sql = "UPDATE shipment SET track_no='$track',sender_name='$sname',sender_country='$sphone',receiver_name='$rname',receiver_email='$remail',product='$pname', status='$pstatus',exp_date='$arrival',origin='$origin',destination='$des',mode='$mode',ref_no='$refno',qnty='$quan',weight='$kg',amount='$amount',pmode='$pmode', coments='$note', dept_date='$depDate', courier = '$location', type = '$type', packages = '$packages', dept_time = '$dept_time', del_time = '$delivery' WHERE id = '$id'";

            $query = mysqli_query($link, $sql);

            if ($query) {
                if (mysqli_affected_rows($link) > 0){
                    $sql = "UPDATE shipment_history SET comments = '$note', date = '$depDate', location = '$origin', status = '$pstatus', time = '$dept_time' WHERE ship_id = '$id' AND token = '$token'";
                    $result = mysqli_query($link, $sql);
                    if ($result){
                        return true;
                    }

                }else{
                    $error['change'] = "No Change(s) Made!";
                }

            }
        }$error['db'] = "Update Not Successful";
	}return $error;
}

function fetch_packages($id = null)
{
    global $link;
    if (is_null($id)){
        $sql = "SELECT * FROM shipment ORDER BY id DESC";
        $query = mysqli_query($link, $sql);

        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[]  = $row;
            }
            return $result;
        } else {
			return false;
		}
    }

    $sql = "SELECT * FROM shipment WHERE id = '$id'";
    $query = mysqli_query($link, $sql);
    if ($query){
        $result = mysqli_fetch_assoc($query);
        return $result;
    }return false;
}

function track_packages($tracknum)
{
    global $link;

    $sql = "SELECT * FROM `shipment` WHERE track_no = '$tracknum'";
    $query = mysqli_query($link, $sql);
    if ($query){
        $result = mysqli_fetch_assoc($query);
        return $result;
    }return false;
}


function view_details($id)
{
	global $link;

	$sql = "SELECT * FROM shipment WHERE id  = '$id'";

	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_array($query);
		return $row;
	}return false;
}




function view_package_num()
{
	global $link;
	
	$sql = "SELECT * FROM shipment";

	$query = mysqli_query($link, $sql);

	if ($query) {
		return mysqli_num_rows($query);
	}return false;
}


function view_hold_num()
{
	global $link;
	
	$sql = "SELECT * FROM shipment WHERE status = 'On Hold'";

	$query = mysqli_query($link, $sql);

	if ($query) {
		return mysqli_num_rows($query);
	}return false;
}

function view_trip_num()
{
	global $link;
	
	$sql = "SELECT * FROM shipment WHERE status = 'On Transit'";

	$query = mysqli_query($link, $sql);

	if ($query) {
		return mysqli_num_rows($query);
	}return false;
}

function view_feedback_num(){
	global $link;
	
	$sql = "SELECT * FROM feedback";

	$query = mysqli_query($link, $sql);

	if ($query) {
		return mysqli_num_rows($query);
	}return false;
}

function view_feedbacks()
{
	global $link;

	$sql = "SELECT * FROM feedback ORDER BY id DESC";

	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
		   $packages[] = $row; 
		}return $packages;
	}return false;
}

function delete_feedback($id)
{
	global $link;

	$sql = "DELETE FROM feedback WHERE id = '$id'";

	$query = mysqli_query($link, $sql);

	if ($query) {
		return true;
	}return false;
}


function fetch_feedback($id)
{
	global $link;

	$sql = "SELECT * FROM feedback WHERE id  = '$id'";

	$query = mysqli_query($link, $sql);

	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_array($query);
		return $row;
	}return false;
}

function status_history($id){
    global $link;
    $sql = "SELECT * FROM shipment_history WHERE ship_id = '$id'";
    $query = mysqli_query($link, $sql);
    if ($query){
        return $query;
    }return false;
}

function add_status($post, $id){
    $errors = [];
    extract($post);

    if (!empty($status)){
        $status = sanitize($status);
    }else{
        $errors['status_err'] = "Status Field is required";
    }

    if (!empty($location)){
        $location = sanitize($location);
    }else{
        $errors['loc_err'] = "Location Field is required";
    }


    if (!empty($status_date)){
        $date = sanitize($status_date);
    }else{
        $errors['date_err'] = "Date Field is required";
    }

    if (!empty($status_time)){
        $time = sanitize($status_time);
    }else{
        $errors['time_err'] = "Time Field is required";
    }


    if (!empty($note)){
        $note = sanitize($note);
    }else{
        $errors['note_err'] = "Note Field is required";
    }

    if (!$errors){
        global  $link;
        $sql = "UPDATE shipment SET status = '$status', coments = '$note' WHERE id = '$id'";
        $query = mysqli_query($link, $sql);
        if ($query){
            $sql = "INSERT INTO shipment_history (date, location, status, comments, ship_id, time) VALUES ('$date', '$location', '$status', '$note', '$id', '$time')";
            $result = mysqli_query($link, $sql);
            if ($result){
                return true;
            }
        }$errors['db'] = "Oops Something went wrong";
    }return $errors;
}