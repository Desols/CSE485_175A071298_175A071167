<?php

function Insert($email,$password,$user_level,$dbcon)
{
  $q = "INSERT INTO user
                  VALUES ('$email','$password',NOW(),'$user_level')";      
                  $result = @mysqli_query ($dbcon, $q); // Run the query.
                  if ($result) { 
                     session_start();
                     $_SESSION['user_level']=$user_level;
                     echo header("Location: index.php");
                     exit();      
                   } else { // If it did not run
        // Message:
                      echo 'System Error! You could not be registered due to a system error. We apologize for any inconvenience.'; 
                    } // End of if ($result)
                     mysqli_close($dbcon); // Close the database connection.
                     exit();
}



try {
// This script retrieves all the records from the users table.
require('mysql_connect.php'); 

if(isset($_POST['register'])){

$email=$_POST['email'];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
if(!empty($_POST["email"]) &&! empty($_POST["password"]) && !empty($_POST["password"]) && $password!=$_POST['repassword'])
{


    $p="SELECT * FROM user WHERE email='$email'";
    $result=@mysqli_query($dbcon,$p);
    $num_row=@mysqli_num_rows($result);
        if($num_row==0)
        {
           $p="SELECT * FROM student WHERE email='$email'";
            $result1=@mysqli_query($dbcon,$p);
            $num_row1=@mysqli_num_rows($result1);
            if($num_row1==0)
            {
                 $p2="SELECT * FROM teacher WHERE email='$email'";
                  $result2=@mysqli_query($dbcon,$p2);
                  $num_row2=@mysqli_num_rows($result2);
                  if($num_row2!=0){
                  $user_level=1;
                  
                  Insert($email,$password,$user_level,$dbcon);
            }
          }
        else {
            $user_level=2;
            Insert($email,$password,$user_level,$dbcon);
            }
        }
}
}
}
catch(Exception $id) // We finally handle any problems here                
   {
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
   }
   catch(Error $id)
   {
      //print "An Error occurred. Message: " . $e->getMessage();
      print "The system is busy please try again later.";
   }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.css"> 
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/mycss.css"> 
<link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.css">
<link rel="shortcut icon" href="images/CSE logo.jpg" type="image/jpg"/>
    <link rel="stylesheet" href="css/style.css">
    <title>Đăng ký</title>
</head>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/script.js" defer></script>
<script src="js/sign_up.js"></script>


<body>
  <section class="col-sm-12 content nopadding">
    <div class="container nopadding">
      
    
    <div class="row">
        
         <?php
        if(!isset($_SESSION['user_level']) or( $_SESSION['user_level'] !=1 &&  $_SESSION['user_level']!=2 && $_SESSION['user_level']!=0))
        {
           include('php/header/header_view.php');
        }
        else{
          include('php/header/header_view_student.php');
        }

?>
    </div>
 <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins bg-white content noidung pd-5" id="form_sign_up">
        <div class="wrapper wrapper--w680 ">
            <div class="card card-4 alert-success">
                <div class="card-body">
                    <h2 class="title text-center">Đăng ký</h2>
                    <form method="POST" class="">
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label text-muted">Email</label>
                                    <input class="input--style-4" type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" id="email"   placeholder="">
                                    <i id="notice_email"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label text-muted">Mật khẩu</label>
                                    <input class="input--style-4" id="password" type="password" name="password" placeholder="" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                                    <i id="notice_password"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label text-muted">Nhập lại mật khẩu</label>
                                    <input class="input--style-4" id="repassword" type="password" name="repassword" value="<?php if (isset($_POST['repassword'])) echo $_POST['repassword']; ?>">
                                    <i id="notice_repassword"></i>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15 ">
                            <button class="btn btn--radius-2 bg-success btn-success" type="submit" id="bt_signup" name="register">Đăng ký</button>

                        </div>
                        <a href="login.php" title=""><i>Bạn đã có tài khoản ?</i></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
          <?php include('php/footer/footer.php') ?>         
        </div>
    </div>
  </div>
</section>
</body>

</html>
