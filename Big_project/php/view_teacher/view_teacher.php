
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách giảng viên</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="../../css/mycss.css"> 
<link rel="stylesheet" type="text/css" href="../../css/fontawesome/css/all.css">
<link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<script src="../../js/jquery-3.4.1.min.js"></script>
<script src="../../js/bootstrap.js"></script>
<!-- <script src="js/sign_up.js"></script> -->
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

<div class="container-fluid bg-white content noidung pb-5 p-0">
		<h4 align="center">Danh sách giảng viên</h4>
		<?php
         
        if(isset($_SESSION['user_level']) && $_SESSION['user_level']==0)
        {
            echo '<center><button type="submit" class alert-success><a href="http://localhost/Big_project/php/view_teacher/view_teacher_admin.php" title="">Thêm giảng viên</a></button></center>';
        }

?>
		<?php 
require_once ('../../mysql_connect.php');
$query="SELECT * FROM teacher ";
$result=mysqli_query($dbcon,$query);
while($row=@mysqli_fetch_array($result,MYSQLI_ASSOC))
{


	if($row['screaming']=="") {$link= '../../photo_card/user.png';}
					else{
						$link= '../../photo_card/'.$row['screaming'];
					}
 ?>
		<div class="row">
		<div class="col-xl-2">
				
			</div>	
        <div class=" col-xl-8 ">
				<div class="row  alert-link pb-1" style="border: 1px dashed #7E7E7D">
					<div class=" col-sm-4 col-lg-4 col-xl-4 text-center alert-secondary">
					<img src="<?php echo $link; ?> " class="" alt="Hình ảnh" width="150px">  <h4 class=" alert-info">
	                		<?php echo $row['name']; ?>
	                	</h4>             
	                </div>
	         <div class=" col-sm-4 col-xl-4 text-center alert-success" style="border-left: 1px dashed #7E7E7D">

	         	
	                    <p class=""><?php echo $row['position']; ?></p>
	                    <p class=""><?php echo $row['department_subject']; ?></p>
	                    <p class=""><?php echo $row['email']; ?></p>
	         </div>
	           <div class="  col-sm-4 col-xl-4 alert-primary" style="border-left: 1px dashed #7E7E7D">
	           	    <h5 class="">
	                		Các bộ môn giảng dạy
	                	</h5>

	                <ul class="list-unstyled">
                        <ul>
	                	<?php
	                	$query2="SELECT * FROM teacher_subject,teacher,subject WHERE (teacher_subject.email=teacher.email  AND teacher_subject.id_subject=subject.id_subject and teacher.email='".$row['email']."')"
	                	;

$result2=mysqli_query($dbcon,$query2);
while($row2=@mysqli_fetch_array($result2,MYSQLI_ASSOC))
{
	echo '<li>'.$row2['name'].'</li>';

}
	                	 ?>

                        </ul>
                    </ul>	
	            </div>
				</div>                     	
			</div>
<div class="col-xl-2">
				
			</div>
</div>
<?php } ?>
</div>
<div class="row">
          <?php include('../footer/footer.php') ?>         
        </div>
</div>
</section>
</body>
</html>