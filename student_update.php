<!--php code for inserting valid data in database-->
<?php

include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';

$showquery = "select name,email,mobile,year,course,post from user_register where email='$email'";


$showdata = mysqli_query($con,$showquery);

//$arrdata = mysqli_fetch_array($showdata);

//if(isset($_POST['update'])){
  //$idupdate = $_GET['id'];
  if(mysqli_num_rows($showdata)==1){
    $row = mysqli_fetch_assoc($showdata);
    $name = $_row['name'];
    $email = $_row['email'];
    $mobile = $_row['mobile'];
    $year = $_row['year'];
    $course = $_row['course'];
    $post = $_row['post'];
  }

  if(isset($_POST['update'])){


    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $year = $_POST['year'];
    $course = $_POST['course'];
    $post = $_POST['post'];

    $query = "UPDATE user_register set  name='$name',  email='$email', mobile='$mobile', year='$year', 
    course='$course',post='$post' where email='$email'";

    $res = mysqli_query($con,$query);
    if($res){
      ?>
      <script>
        alert("Updated Successfully");
      </script>  
      <?php
    }
    else{
      ?>
      <script>
      alert("Unable to update");
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
    <title>Update</title>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    <style>
      body html{
    margin: 0;
    padding: 0;
    }

     /*background image*/
    .backgroundimg{
      background-image: url("https://visme.co/blog/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-021.jpg") ;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      height: 180vh;
      width: 100%;
    }

    .container{
      position: relative;
      top: 10vh;
    }

    .card-signin {
      border: 0;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    /*title*/
    .card-signin .card-title {
      margin-bottom: 1.8rem;
      font-weight: 400;
      font-size: 1.9rem;
    }

.card-signin .card-body {
    padding: 2rem;
}

.form-signin {
    width: 100%;
}

/*Firefox */
input[type=number] {
    -moz-appearance: textfield;
  }

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.form-signin .btn {
    font-size: 90%;
    border-radius: 5rem;
    letter-spacing: .1rem;
    font-weight: bold;
    padding: 1rem;
    transition: all 0.2s;
}

.form-label-group {
    position: relative;
    margin-bottom: 0.4rem;
}

.form-label-group input {
    height: auto;
    border-radius: 2rem;
}

.form-label-group select{
    height: auto;
    border-radius: 2rem;
}






    </style>
</head>
<body>

<div class="column backgroundimg">   <!--background image starts here-->

<!--navigation bar starts here -->
<nav class="navbar navbar-expand-md bg-primary navbar-dark fixed-top">
<a class="navbar-brand" href="#">Online Leave Management</a>
    
</nav>

<!--Registration form starts here-->

<div class="container">                                    <!--container starts -->
  <div class="row justify-content-center">                 <!--row starts-->
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin py-4">                  
        <div class="card-body">                            
          <h5 class="card-title text-center">Update User Details</h5>

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
                <label for="mobile">Mobile no</label>
                  <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Enter mobile number" required autocomplete="off">
              </div>
              <br>

              <div class="form-label-group">
                <label for="year">Select year</label>
                <select name="year" id="year" name="year" class="form-control" required >
                    <option value="fy">FY</option>
                    <option value="sy">SY</option>
                    <option value="ty">TY</option>
                </select>
              </div>
              <br>

              <div class="form-label-group">
                <label for="course">Select Course</label>
                <select name="course" id="course" name="course"class="form-control" required >
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
                    <option value="Student" name="Student">Student</option>
                    <option value="Staff">Staff</option>
                </select>
              </div>
              <br><br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="update">Update</button>
              





          </form>    
        </div>
      </div>
    </div>
   </div>                              <!-- row ends-->
</div>                                 <!-- container ends -->

    
</body>
</html>

