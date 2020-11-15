<?php
  session_start();  //starts the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOD Login</title>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    <style>
        <?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_signin.css'; ?>
    </style>
</head>
<body>

<?php
  include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';

  if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //selects email from database  
    $email_search ="select * from user_register where email='$email'";
    $query= mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if ($email_count==1){
      while($row=mysqli_fetch_assoc($query)){
        $_SESSION['name']=$row['name'];
        //$_SESSION['name']=$row['name'];
        if(password_verify($password,$row['password'])){
         
          $_SESSION['is_login']=true;
          $_SESSION['email']=$email;

?>
    <script>
      alert("Login Successful");
      location.replace("hod_dashboard.php");
    </script>
    <?php
    }else{
    ?>
    <script>
      alert("Password Incorrect");
    </script>
    <?php
    }

    }
  }
  else{
    ?>
    <script>
      alert("Invalid Email");
    </script>
    <?php
    }

  }

?>

  <div class="backimg">    <!-- background image-->

<!--navigation bar -->
<nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
<a class="navbar-brand" href="#">Online Leave Management</a>


<!--navbar links-->

  <ul class="nav navbar-nav ml-auto">

    <li class="nav-item active">
       <a class="nav-link" href="..\user\index.php">User</a>
    </li>
  
    <li class="nav-item active">
       <a class="nav-link" href="..\admin\admin_signin.php">Admin</a>
    </li>

  </ul>
</nav>

<!-- naviagtion bar ends here-->

<!--Sign in form-->
<div class="container">                         <!-- container starts here-->

    <div class="row justify-content-center">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
       <div class="card card-signin py-4">
         <div class="card-body">
           <h5 class="card-title text-center">Hod Sign In</h5>
           

           <!--Form-->
           <form class="form-signin" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
              <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus autocomplete="off">
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Sign in</button>
            </form>
          </div>
       </div>
     </div>
  </div>

</div>               <!--container ends here-->
</div>               <!-- background image ends-->
    
</body>
</html>
