<?php 
require('mysql_connect.php'); 


$email=$_POST['email'];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);


    $p="SELECT * FROM user WHERE email='$email'";
    $result=@mysqli_query($dbcon,$p);
    $num_row=@mysqli_num_rows($result);


           $p="SELECT * FROM student WHERE email='$email'";
            $result1=@mysqli_query($dbcon,$p);
            $num_row1=@mysqli_num_rows($result1);

            $p2="SELECT * FROM teacher WHERE email='$email'";
                  $result2=@mysqli_query($dbcon,$p2);
                  $num_row2=@mysqli_num_rows($result2);
                 
            if(($num_row1==0 && $num_row2==0) || $num_row==1)
            {
                 
                  echo 'Email không hợp lệ, hoặc đã tồn tại!';
            }
 ?>
 