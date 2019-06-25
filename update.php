<?php
include 'config.php';
include 'database.php';

spl_autoload_register(function($class){
 include 'class/'.$class.'.php';
});
$student_class= new Student_class();


if(isset($_GET['upid']))
{
  $id=$_GET['upid'];
  $data=$student_class->first_select($id);
}
if(isset($_POST['update']))
{
	$id=$_GET['upid'];
	$student_class->update_data($id,$_POST);
}


?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container" style="margin-top: 100px;">

	<form method="POST">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" value="<?=$data['name']?>">
  </div>
  <div class="form-group">
    <label for="roll">Roll:</label>
    <input type="text" class="form-control" name="roll" value="<?=$data['roll']?>">
  </div>
  <div class="form-group">
    <label for="reg">Reg:</label>
    <input type="text" class="form-control" name="reg" value="<?=$data['reg']?>">
  </div>

  <button type="submit" name="update" class="btn btn-default">Update</button>
  
	</form>

	</div>
</body>
</html>