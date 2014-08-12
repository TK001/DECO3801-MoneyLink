<?php

/********************** checkuser.php **************************
This page checks if the username is available
************************************************************/

include 'inc/dbconn.php';
include 'inc/functions.php';

foreach($_GET as $key => $value) {
	$get[$key] = filter($value);
}

$user = mysqli_real_escape_string($link, $get['user']);

if(isset($get['cmd']) && $get['cmd'] == 'check') {

if(!isUserID($user)) {
echo "Invalid User ID <br />";
exit();
}

if(empty($user) && strlen($user) <=3) {
echo "Enter 5 chars or more<br />";
exit();
}



$rs_duplicate = mysqli_query($link, "select count(*) as total from users where user_name='$user' ") or die(mysqli_error($link));
list($total) = mysqli_fetch_row($rs_duplicate);

	if ($total > 0)
	{
	echo "Not Available<br />";
	} else {
	echo "Available<br />";
	}
}
mysqli_close($link);
?>