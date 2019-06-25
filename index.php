<?php

include 'config.php';
include 'database.php';

spl_autoload_register(function($class){
  include 'class/'.$class.'.php';
});

$student_class= new Student_class();

if(isset($_POST['submit']))
{
  $student_class->store($_POST);
}

if(isset($_GET['delid']))
{
  $delid=$_GET['delid'];
  $student_class->destroy($delid);
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
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="roll">Roll:</label>
    <input type="text" class="form-control" name="roll">
  </div>
  <div class="form-group">
    <label for="reg">Reg:</label>
    <input type="text" class="form-control" name="reg">
  </div>
  
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
	</form>

	</div>


  <div class="container">
    <h1 style="text-align: center; color:blue;"> DATA TABLE </h1>

  <table class="table table-bordered">

    <thead>
      <tr>
        <th>Sl</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Reg</th>
        <th>Action</th>
   
      </tr>
    </thead>

    <tbody>
   
<?php
  $data=$student_class->show();

foreach ($data as $key => $value)
  {
    $i=$key+1;

?>
      <tr>

      <td><?=$i?></td>
      <td><?=$value['name']?></td>
      <td><?=$value['roll']?></td>
      <td><?=$value['reg']?></td>
      
    
        <td>
          <!-----------delete button ------------------>
          <a href="?delid=<?=$value['id']?>">
          <button onclick="return confirm('Are you sure?')" class="btn btn-danger" name="delete">Delete</button>
          </a>

           <!------------ update button -------------->
           <a href="update.php?upid=<?=$value['id']?>">
             <button class="btn btn-default" name="update"> Update </button>
           </a>

        </td>

      </tr>
<?php
  }
?>   

    </tbody>
  </table>

  </div>

</body>
</html>