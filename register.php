<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <?php include 'links.php' ?>
    <style>
      <?php include 'css/register.css'; ?>
    </style>
</head>
<body>

<div class="column backgroundimg">

<!--navigation bar -->
<nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
<a class="navbar-brand" href="#">Online Leave Management</a>
    
<!--links-->

  <ul class="nav navbar-nav ml-auto">
    <li class="nav-item active px-4">
       <a class="nav-link" href="index.php">Sign in</a>
    </li>
  </ul>
</nav>

<!--Registration form-->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin py-4">
        <div class="card-body">
          <h5 class="card-title text-center">Registration Form</h5>

          <!--Form-->
          <form class="form-signin" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
              <div class="form-label-group">
                <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Enter full name" required autofocus autocomplete="off">
              </div>
              <br>

              <div class="form-label-group">
                <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder=" Enter email address" required autocomplete="off">
              </div>
              <br>

              <div class="form-label-group">
                <label for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
              </div>
              <br>

              <div class="form-label-group">
                <label for="cpassword">Confirm Passsword</label>
                  <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm Password" required autocomplete="off">
              </div>
              <br>

              <div class="form-label-group">
                <label for="mobile">Mobile no</label>
                  <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Enter mobile number" required autocomplete="off">
              </div>
              <br>

              <div class="form-label-group">
                <label for="year">Select year</label>
                <select name="year" id="year" name="year" class="form-control" required>
                    <option value="fy">FY</option>
                    <option value="sy">SY</option>
                    <option value="ty">TY</option>
                </select>
              </div>
              <br>

              <div class="form-label-group">
                <label for="course">Select Course</label>
                <select name="course" id="course" name="course"class="form-control" required>
                    <option value="cs">CS</option>
                    <option value="it">IT</option>
                    <option value="bcom">BCom</option>
                    <option value="baf">BAF</option>
                    <option value="bbi">BBI</option>
                    <option value="bfm">BFM</option>
                    <option value="bms">BMS</option>
                </select>
              </div>
              <br>

              <div class="form-label-group">
                <label for="post">Select Post</label>
                <select name="post" id="post" name="post" class="form-control" required>
                    <option value="Student">Student</option>
                    <option value="Staff">Staff</option>
                    <option value="HOD">HOD</option>
                </select>
              </div>
              <br><br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Register</button>
              





          </form>    
        </div>
      </div>
    </div>
   </div>
</div>  

    
</body>
</html>


<?php

include 'connection.php';

if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
  $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
  $year = mysqli_real_escape_string($con,$_POST['year']);
  $course = mysqli_real_escape_string($con,$_POST['course']);
  $post = mysqli_real_escape_string($con,$_POST['post']);


  $pass=password_hash($password, PASSWORD_BCRYPT);
  $cpass=password_hash($cpassword, PASSWORD_BCRYPT);
  
  /**checks whether email already exists or not */
  $emailquery="select * from registration where email='$email'";
  $query=mysqli_query($con,$emailquery);

  $emailcount = mysqli_num_rows($query);
  if($emailcount>0){
    ?>
     <script>
        alert("Email already exists");
     </script>
    <?php
  }
  else{
    if($password === $cpassword){
      $insertquery = "insert into registration(name,email,password,cpassword,mobile,year,course,post) values('$name','$email','$pass','$cpass','$mobile','$year','$course','$post') ";
      $res = mysqli_query($con,$insertquery);
      if($res){
        ?>
        <script>
          alert("Data inserted");
        </script>  
        <?php
      }else{
        ?>
        <script>
          alert("Data not inserted");
        </script>
        <?php
      }
     
  }else{
    ?>
        <script>
          alert("Password not matching");
        </script>
        <?php
  }


} 

  

  

}

?>
