<?php
session_start();
if (!isset($_SESSION['user_level'])) {
header("Location:sign_up.php");
exit();
}else{ 
	$_SESSION = array(); 
	session_destroy(); 
	setcookie('PHPSESSID', ", time()-3600,'/', ", 0, 0);
	header("Location:login.php");
	exit();
}
?>