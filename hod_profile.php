<!-- php code for displaying the info about user -->
<?php

include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';
session_start();


if($_SESSION['is_login']){
  $email = $_SESSION['email'];
}else{
  header("Location:hod_signin.php");
}

//code selects mentioned fields based on email
$sql="select name,mobile,year,course from user_register where email='$email'";
$result= $con->query($sql);
if($result->num_rows == 1){
  $row=$result->fetch_assoc();
  $name=$row['name'];
  $mobile=$row['mobile'];
  $year=$row['year'];
  $course=$row['course'];
}

//code for updating details in the table

if(isset($_REQUEST['save'])){
  if($_REQUEST['name']== ""||$_REQUEST['mobile']=="") {
      $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert">Fill all Fields </div>';
  }else{
    $name = $_REQUEST['name'];
    $mobile=$_REQUEST['mobile'];
    $q= "UPDATE user_register SET name = '$name', mobile='$mobile' where email='$email'";
    if($con->query($q) == true){
      $passmsg = '<div class="alert alert-success col-sm-7 mt-2" role="alert">Updated Successfully</div>';
    }else{
      $passmsg = '<div class="alert alert-danger col-sm-6 mt-2" role="alert">Unable to update</div>';
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
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    
    <style>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_header.css'; ?>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_profile.css'; ?>
    </style>
</head>
<body>

<div class="column backgroundimg">  <!--background image starts -->
<?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_header.php' ?>       <!--navigation bar-->

<!--Profile content start-->

<h5 class="card-title text-center">My Profile</h5>

<form action="" method="POST" class="form">
  <div class="form-group">
    <label for="name">Name</label><input type="text" name="name" id="name" class="form-control" autocomplete="off" value="<?php echo $name ?>">    
  </div>

  <div class="form-group">
    <label for="mobile">Mobile no</label><input type="number" name="mobile" id="mobile" class="form-control" autocomplete="off" value="<?php echo $mobile ?>" >     
  </div>

  <div class="form-group">
    <label for="email">Email</label><input type="email" name="email" id="email" class="form-control" autocomplete="off" value="<?php echo $email ?>" readonly >     
  </div>

  

  <div class="form-group">
    <label for="year">Year</label><input type="text" name="year" id="year" class="form-control" autocomplete="off" value="<?php echo $year ?>" readonly>     
  </div>

  <div class="form-group">
    <label for="course">Course</label><input type="text" name="course" id="course" class="form-control" autocomplete="off" value="<?php echo $course ?>" readonly>     
  </div>


  <br>



  <button type="submit" class="btn btn-primary" name="save">Save</button>
  <?php if(isset($passmsg)){
    echo $passmsg;
  } 
  ?>

</form>

</div>     <!--background image closes here -->

<!--Profile content ended-->
    
</body>
</html>
