<?php
  session_start();  //starts the session

  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    if($email=="admin@admin.com" && $pass=="admin"){
        header("Location: admin_dashboard.php");
    }
    else{
?>
<script>
  alert("Email or Password incorrect");
</script>
<?php
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    <style>
        <?php include 'C:\xampp\htdocs\onlineleavemanagemet\admin\admin_signin.css'; ?>
    </style>
</head>
<body>
  <div class="backimg">    <!-- background image-->

    <!--navigation bar -->
    <nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
      <a class="navbar-brand" href="#">Online Leave Management</a>

      <!--navbar links-->

      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item active px-4">
          <a class="nav-link" href="..\user\index.php">Home</a>
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
              <h5 class="card-title text-center">Admin Sign In</h5>
           

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
