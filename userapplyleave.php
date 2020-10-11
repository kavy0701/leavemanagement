<?php 
session_start();
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
    
    <form method="POST">           <!--form-->
    <div class="form-label-group">
        <label for="leave">Leave Type</label> <input type="text" name="leave_type" id="leave_type" class="form-control" required>
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



<?php
include 'connection.php';

if(isset($_POST['submit'])){
  $leave_type = mysqli_real_escape_string($con,$_POST['leave_type']);
  $duration = mysqli_real_escape_string($con,$_POST['duration']);
  $from_date = mysqli_real_escape_string($con,$_POST['from_date']);
  $to_date = mysqli_real_escape_string($con,$_POST['to_date']);
  $reason = mysqli_real_escape_string($con,$_POST['reason']);

  
  $insertquery = "insert into apply_leave(leave_type,duration,from_date,to_date,reason) values('$leave_type','$duration','$from_date','$to_date','$reason') ";
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






     



