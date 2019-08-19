<?php
//session_start();
//if (!isset($_SESSION['user_level']) or ($_SESSION['user_level']) != 1)
//{
 //  header("Location: login.php");
 //  exit();
//}
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">

<link rel="stylesheet" type="text/css" href="css/mycss.css"> 
<link rel="stylesheet" type="text/css" href="css/all.css"> 
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<body>
	<div class="row">
		<div>
			<a href="login.php" title="">Login</a>
			<a href="logout.php" title="">Logout</a>
			<a href="php/change_password/change_password.php" title="">Change password</a>
		</div>	
	</div>
	<a href="php/file_up/file_view_student.php" title="">File Up111111</a>
	<a href="php/file_up/file_up.php" title="">File Up</a>


	<div class="row">
    	<?php
         session_start();
        if(!isset($_SESSION['user_level']) && $_SESSION['user_level'] !=1 &&  $_SESSION['user_level']!=2 && $_SESSION['user_level']!=0)
        {
           include('../header/header_view.php');
        }
        else{
        	include('../header/header_view_student.php');
        }

?>
    </div>
</body>
</html>
	