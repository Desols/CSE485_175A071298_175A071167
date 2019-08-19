 <?php 
 require_once('../../mysql_connect.php');
 $subject=array();
 $subject=$_POST['subject'];
 $email=$_POST['email'];
 $id_subject=array();
 foreach ($subject as $value)
 {
 $q="SELECT * FROM subject WHERE name='$value' ";
 $result1=mysqli_query($dbcon,$q);
 $row=mysqli_fetch_array($result1);
 $num_row=mysqli_num_rows($result1);
 $id_subject[]=$row['id_subject'];
} 

 foreach ($id_subject as $value) {
 	$query="INSERT INTO teacher_subject values('$email','$value')";
 	$result=mysqli_query($dbcon,$query);
 }
?>