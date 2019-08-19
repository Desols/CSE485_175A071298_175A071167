<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm bài viết</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="../../css/mycss.css"> 
	<link rel="stylesheet" type="text/css" href="../../css/fontawesome/css/all.css"> 
    <link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<script src="../../js/jquery-3.4.1.min.js"></script>
<script src="../../js/view_teacher.js"></script>
<script src="../../js/bootstrap.js"></script>
<body>
	<form>
		<div class="form-group col-md-4">
	      <label for="inputState">Thể loại</label>
	      <select id="inputState" class="form-control">
	        <option selected>Tin tức</option>
	        <option>Sự kiện</option>
	      </select>
	    </div>
	  <div class="form-row">
	    <div class="form-group">
	      <label for="inputEmail4">Title</label>
	      <input type="email" class="form-control" id="inputEmail4" placeholder="">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="form-group">
	      <label for="inputPassword4">Nội dung</label>
	      <textarea name="a" class="form-control" cols="20" >   </textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputAddress">Ảnh</label>
	    <input type="file" name="" value="" placeholder="">
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-2">
	      <label for="inputZip">Tải lên</label>
	      <input type="file" name="" value="" placeholder="">
	    </div>
	  </div>

	  <button type="submit" class="btn btn-primary">Sign in</button>
	</form>
	
</body>
</html>