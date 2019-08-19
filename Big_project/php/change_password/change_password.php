<?php
require('../../mysql_connect.php'); 

if(isset($_POST['register'])){

$email=$_POST['email'];
$ps=$_POST['password_old'];
$newps=$_POST['password_new'];
$reps=$_POST['repassword'];


      $q = "SELECT * FROM user WHERE email='$email'";
      $result=@mysqli_query($dbcon,$q);
      $num_row=@mysqli_num_rows($result);
      $row=@mysqli_fetch_array($result,MYSQLI_ASSOC);

        $pshash= $row['password'];      
        if(password_verify($ps,$pshash) && $num_row==1)
            {             
                $pshash=password_hash($newps, PASSWORD_DEFAULT);
                $query="UPDATE user SET password='$pshash' WHERE email='$email'";
                $result=mysqli_query($dbcon,$query);
                if($result){

              session_start();
              $_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
              $_SESSION['user_level'] = (int) $row['user_level']; 
              echo $_SESSION['user_level'];
              // Ensure that the user level is an integer
              if($_SESSION['user_level'] == 1)
               {
                  echo header('Location: ../../index.php');             
              }
               else {
               echo header('Location: ../../sign_up.php');               
              } 
          }             
        } 
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
    <title>Thay đổi mật khẩu</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../css/mycss.css"> 
<link rel="stylesheet" type="text/css" href="../../css/fontawesome/css/all.css"> 
</head>
<script src="../../js/bootstrap.js" type="text/javascript"></script>

<script src="../../js/jquery-3.4.1.min.js" type="text/javascript"></script> 
<script src="../../js/repass.js" type="text/javascript"></script>
<body>
  <section class="col-sm-12 content nopadding">
    <div class="container nopadding">  
    <div class="row">
        
         <?php
        if(!isset($_SESSION['user_level']) or( $_SESSION['user_level'] !=1 &&  $_SESSION['user_level']!=2 && $_SESSION['user_level']!=0))
        {
           include('../header/header_view.php');
        }
        else{
          include('../header/header_view_student.php');
        }

?>
    </div>
 <div class="page-wrapper bg-gra-02 p-t-130 content noidung p-b-100 font-poppins bg-white pb-5" id="form_sign_up">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body alert-success">
                    <h2 class="title">Thay đổi mật khẩu</h2>
                    <form method="POST">
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
                                    <label class="label text-muted">Mật khẩu cũ</label>
                                    <input class="input--style-4" id="password_old" type="password" name="password_old" placeholder="" value="<?php if (isset($_POST['password_old'])) echo $_POST['password_old']; ?>">
                                    <i id="notice_password_old"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label text-muted">Mật khẩu mới</label>
                                    <input class="input--style-4" id="password_new" type="password" name="password_new" value="<?php if (isset($_POST['password_new'])) echo $_POST['password_new']; ?>">
                                    <i id="notice_password_new"></i>
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
                        <div id="notice"><i>
                <?php 

if (!empty($_POST['email']) && !empty($ps=$_POST['password_old'])&& !empty($ps=$_POST['password_new']) && !empty($ps=$_POST['repassword'])) {
  

                $email=$_POST['email'];
              $ps=$_POST['password_old'];

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
                        <div class="p-t-15 ">
                            <button class="btn btn--radius-2 bg-success btn-success" type="submit" id="bt_signup" name="register">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
          <?php include('../footer/footer.php') ?>         
        </div>
    </div>
  </section>
</body>

</html>
