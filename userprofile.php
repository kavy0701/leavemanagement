<!-- php code for displaying the info about user -->
<?php

include 'connection.php';
session_start();


if($_SESSION['is_login']){
  $email = $_SESSION['email'];
}else{
  header("Location:index.php");
}

$sql="select name,email from registration where email='$email'";
$result= $con->query($sql);
if($result->num_rows == 1){
  $row=$result->fetch_assoc();
  $name=$row['name'];
}

//code for updating details in the table

if(isset($_REQUEST['save'])){
  if($_REQUEST['name']== ""){
    $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill all Fields </div>';
  }else{
    $name = $_REQUEST['name'];
    $sql= "UPDATE registration SET name = '$name' where email='$email'";
    if($con->query($sql) == true){
      $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
    }else{
      $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update</div>';
    }
  }
}

?>
<!--php code ends here-->

<!--html code begins here -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <?php include 'links.php' ?>
    
    <style>
      <?php include 'css/header.css'; ?>
      <?php include 'css/profile.css'; ?>
    </style>
</head>
<body>

<div class="column backgroundimg">  <!--background image starts -->
<?php include 'header.php' ?>       <!--navigation bar-->

<!--Profile content start-->

<div class="container">              <!--container starts here -->         
<div class="col-sm-12 mt-5">
<div class="row justify-content-center">  
<div class="card profile-container py-4"> 
<div class="card-body">
<h5 class="card-title text-center">My Profile</h5>

<form action="" method="POST" class="form">
  <div class="form-group">
    <label for="name">Name</label><input type="text" name="name" id="name" class="form-control" autocomplete="off" value="<?php echo $name ?>">    
  </div>

  <div class="form-group">
    <label for="email">Email</label><input type="email" name="email" id="email" class="form-control" autocomplete="off" value="<?php echo $email ?>" readonly>     
  </div>
  <br>



  <button type="submit" class="btn btn-danger" name="save">Save</button>
  <?php if(isset($passmsg)){
    echo $passmsg;
  } 
  ?>

</form>

</div>
</div>
</div>
</div>
</div>     <!--container closes here -->
</div>     <!--background image closes here -->

<!--Profile content ended-->
    
</body>
</html>
