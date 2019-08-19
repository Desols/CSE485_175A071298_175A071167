<?php require_once ('../../mysql_connect.php'); 

function getExtension($str)
{
	$i=strripos($str,".");
	if(!$i)
	{
		return "";
	}
	else {
		$l=strlen($str) -$i;
		$ext=substr($str,$i+1,$i);
		return $ext;
	}
}


if(isset($_POST['register'])){
        $filename=stripcslashes($_FILES['photo']['name']);
        $extension=getExtension($filename);
        $extension=strtolower($extension);
       if($extension =='jpg' || $extension =='png' || $extension =='jpge' || $extension =='gif')
        {
   $name=$_FILES['photo']['name'];
   $size=$_FILES['photo']['size'];
   $type=$_FILES['photo']['type'];
   $temp=$_FILES['photo']['tmp_name'];

   move_uploaded_file($temp,"../../images/".$name);
 
  $fname=$_POST['fname'];
  $email=$_POST['email'];
  $department=$_POST['department'];
  $position=$_POST['position'];
   $query="INSERT INTO teacher values('$fname','$email','$department','$position','$name')";
   $result=mysqli_query($dbcon,$query);
   if($result)
   {
   	echo header('Location: view_teacher.php');
   }
}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm giảng viên</title>
	<link rel="stylesheet" type="text/css" href="../../css/mycss.css"> 
	<link rel="stylesheet" type="text/css" href="../../css/fontawesome/css/all.css"> 
    <link rel="stylesheet" href="../../css/bootstrap.css">
     <link rel="stylesheet" href="../../css/style.css">
</head>
<script src="../../js/jquery-3.4.1.min.js"></script>
<script src="../../js/view_teacher.js"></script>
<script src="../../js/bootstrap.js"></script>


<body>
  <section class="col-sm-12 content nopadding">
    <div class=" nopadding">
      
    
    <div class="row">
      <?php
         session_start();
        if((!isset($_SESSION['user_level'])) || ($_SESSION['user_level'] !=1 &&  $_SESSION['user_level']!=2 && $_SESSION['user_level']!=0))
        {
           include('../header/header_view.php');
        }
        else{
          include('../header/header_view_student.php');
        }

?>
    </div>  
<div class="container-fluid bg-white content noidung p-0">

<form method="POST" enctype="multipart/form-data" class="alert-success m-1 p-5">
  <center><h3>Thêm mới giảng viên</h3></center>
  <div class="form-row">
    <div class="form-group">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control alert-primary w-auto" id="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group">
      <label for="inputname">Họ và tên</label>
      <input type="text" name="fname" class="form-control alert-primary w-auto" id="fname" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>" placeholder="">
    </div>
  </div>
  <div class="form-row">
  	<div class="form-group col-md-6">
       <label for="inputDepartment">Bộ môn</label>
       <input type="text" value="<?php if (isset($_POST['department'])) echo $_POST['department']; ?>" name="department" class="form-control alert-primary" id="inputDepartment" placeholder="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
       <label for="inputPosition">Chức vụ</label>
       <input type="text" name="position" value="<?php if (isset($_POST['position'])) echo $_POST['position']; ?>" class="form-control alert-primary w-auto" id="inputPosition" placeholder="">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputState">Chọn môn học</label>
      <select id="inputState" class="form-control" multiple name="select_subject" >
      	<?php
					$query = "SELECT * FROM subject";
                    $result=mysqli_query($dbcon,$query);
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                    	echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                    }          
					 ?>
      </select>   
    </div>
  </div>
    <div class="form-group col-md-6 col-xl-4">
      <label for="photo">Ảnh đại diện</label>
      <input type="file" name="photo" id="photo" />
      <div id="notice">
      	<?php 
      
      	if(isset($_POST['register']))
      	{
          $name=$_FILES['photo']['name'];
          if($name){
        
      	$filename=stripcslashes($_FILES['photo']['name']);
        $extension=getExtension($filename);
        $extension=strtolower($extension);
       if($extension !='jpg' && $extension !='png' && $extension !='jpge' && $extension !='gif')
        {
	   echo 'Đây không phải hình ảnh';
        }
      }

}
      	 ?>
      </div>
    </div>
    <div class="form-row w-100" >
       <button type="submit" name="register" id="submit" class=" btn btn-primary">Thêm</button>
    </div>   
    <div>
    	<ul id="hala">
    	</ul>   

    </div>
   
</form>
</div>
<div class="row">
          <?php include('../footer/footer.php') ?>         
        </div>
</div>
</section>
	
</body>
</html>
