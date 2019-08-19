
 <?php 


require('mysql_connect.php'); 

if(isset($_POST['login'])){

$email=$_POST['email'];
$ps=$_POST['password'];

      $q = "SELECT * FROM user WHERE email='$email'";
      $result=@mysqli_query($dbcon,$q);
      $num_row=@mysqli_num_rows($result);
      $row=@mysqli_fetch_array($result,MYSQLI_ASSOC);

        $pshash= $row['password'];      
        if(password_verify($ps,$pshash) && $num_row==1)
            {             
              session_start();
              $_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
              $_SESSION['user_level'] = (int) $row['user_level']; 
              echo $_SESSION['user_level'];
              // Ensure that the user level is an integer
              if($_SESSION['user_level'] == 1)
               {
                  echo header('Location: index.php');             
              }
               else {
               echo header('Location: sign_up.php');               
              }                
        } 
      }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <link rel="stylesheet" type="text/css" href="css/mycss.css"> 
<link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.css"> 
<link rel="stylesheet" href="css/bootstrap.css">
    <title>Đăng nhập</title>
</head>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/login.js"></script>
<link rel="stylesheet" type="text/css" href="css/mycss.css"> 
<link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.css">
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script> 
    <link rel="shortcut icon" href="images/CSE logo.jpg" type="image/jpg"/>
    <script type="text/javascript" src="js/script.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
<body>
  <section class="col-sm-12 content nopadding">
    <div class="row">
      <?php
         session_start();
        if(!isset($_SESSION['user_level']) or( $_SESSION['user_level'] !=1 &&  $_SESSION['user_level']!=2 && $_SESSION['user_level']!=0))
        {
           include('php/header/header_view.php');
        }
        else{
          include('php/header/header_view_student.php');
        }

?>
    </div>
 

  <div class="container p-5 bg-white">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto bg-primary">
        <div class="card card-signin my-5 ">
          <div class="card-body">
            <h5 class="card-title text-center text-muted">Đăng nhập</h5>
            <form class="form-signin" method="POST" >
              <div class="form-label-group">
                <label for="inputEmail" class="text-muted">Email</label>
                <input class="input--style-4  btn-primary" type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" id="email"   placeholder="">
                <p id="notice_email"></p>               
              </div>

              <div class="form-label-group">
                <label for="inputPassword" class="text-muted">Mật khẩu</label>
                <input class="input--style-4 btn-primary" id="password" type="password" name="password" placeholder="" value="<?php if (isset($_POST['email'])) echo $_POST['password']; ?>">
                <p id="notice_password"></p>              
              </div>

             <!--  <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div> -->
              <div id="notice">
                <?php 

if (!empty($_POST['email']) && !empty($ps=$_POST['password'])) {
  

                $email=$_POST['email'];
                $ps=$_POST['password'];

      $q = "SELECT * FROM user WHERE email='$email'";
      $result=@mysqli_query($dbcon,$q);
      $num_row=@mysqli_num_rows($result);
      $row=@mysqli_fetch_array($result,MYSQLI_ASSOC);
      $pshash= $row['password'];

        if(!password_verify($ps,$pshash) || $num_row==1)
            {
             echo 'Mật khẩu hoặc id sai!';
           }
}
                 ?>
              </div>
              <input type="submit" class="btn btn-success btn-block " name="login" value="Đăng nhập" id="login" />
              <a href="sign_up.php" title=""><i>Bạn chưa có tài khoản?</i></a>
              
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


   </section>
</body>
</html> 
