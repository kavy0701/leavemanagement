<?php 

include 'connection.php';
session_start();   //session starts


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




if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $leave_type = mysqli_real_escape_string($con,$_POST['leave_type']);
  $duration = mysqli_real_escape_string($con,$_POST['duration']);
  $from_date = mysqli_real_escape_string($con,$_POST['from_date']);
  $to_date = mysqli_real_escape_string($con,$_POST['to_date']);
  $reason = mysqli_real_escape_string($con,$_POST['reason']);

  $status=mysqli_real_escape_string($con,$_POST['status']);



 

  $insertquery = "insert into apply_leave(name,email,leave_type,duration,from_date,to_date,reason,status) values('$name','$email','$leave_type','$duration','$from_date','$to_date','$reason','$status') ";
  $res = mysqli_query($con,$insertquery);
  if($res){
      ?>
      <script>
        alert("Submitted");
      </script>  
      <?php
    }else{
      ?>
      <script>
        alert("Not Submitted");
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
    <title>Apply Leave</title>

    
    <?php include 'links.php' ?>
    <?php include 'header.php' ?>
    <style>
      <?php include 'css/header.css'; ?>
      <?php include 'css/applyleave.css';?>
    </style>

</head>
<body>


<div class="container">            <!-- container starts-->
<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <h3 class="row justify-content-center">Apply Leave</h3>
    <br>
    
    <form class="form" method="POST">           <!--form-->

    <div class="form-label-group">
        <label for="name">Name</label> <input type="text" name="name" id="name" class="form-control" required autocomplete="off" value="<?php echo $name ?>" readonly>
    </div>
    <br>

    <div class="form-label-group">
        <label for="email">email</label> <input type="email" name="email" id="email" class="form-control" required autocomplete="off" value="<?php echo $email ?>" readonly>
    </div>
    <br>

    <div class="form-label-group">
        <label for="leave">Leave Type</label> <input type="text" name="leave_type" id="leave_type" class="form-control" required autocomplete="off">
    </div>
    <br>
    
    <div class="form-label-group">
        <label for="duration">Duration</label>
        <select name="duration" id="duration" class="form-control" required>
            <option value="full_day">Full Day</option>
            <option value="half_day">Half Day</option>
        </select>
    </div>
    <br>
    
    <div class="form-label-group">
        <label for="from_date">From Date</label> <input type="date" name="from_date" id="from_date" class="form-control" required>
    </div>
    <br>
    
    <div class="form-label-group">
        <label for="to_date">To Date</label> <input type="date" name="to_date" id="to_date" class="form-control" required>
    </div>
    <br>

    <div class="form-label-group">
        <label for="reason">Reason</label> <textarea class="form-control" name="reason" id="reason" rows="3" cols="20" required></textarea>
    </div>
    <br>
    
    <button class="btn btn-primary" type="submit" name="submit">Submit</button>

</form>                  <!--form ends-->

</div>
</div>                   <!--container ends-->
  
</body>
</html>









     












     




     



