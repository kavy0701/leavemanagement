<?php
  include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';
  session_start();        //starts session

  if(isset($_SESSION['name'])){
    $email = $_SESSION['email'];
  }else{
    header('location:index.php');
  }

  $no=1;
  $sql="select $no from applied_leave where email='$email'";
  $result = $con->query($sql);
  if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
      $submitrequest = $no;
      $no++; 
    }
  }else{
    $submitrequest = 0;
 }

  $no=1;
  $sql1 = "select $no from applied_leave where email='$email' AND status='Approved'"; 
  $result1 = $con->query($sql1);
  if($result1->num_rows>0){
    while($row1 = $result1->fetch_assoc()){
      $submitrequest1 = $no;
      $no++; 
    }
  }else{
    $submitrequest1 = 0;
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\user\header.php' ?>
    <style>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\user\header.css'; ?>

      .col-sm-7{
        margin-left:-20px;
        opacity:1;
      }

      .col-sm-4{
        width:100px;
      }
      
      .card-header{
        background-image: linear-gradient(to right, rgba(167, 167, 168), rgba(207, 207, 207));
        opacity:0.7;
        font-weight:bold;
      }

      .card-body{
        background-image: linear-gradient(to right, rgba(167, 167, 168), rgba(207, 207, 207));
        opacity:0.7;
        font-weight:bold;
      }

      .welcome{
        color:#605d6b;
        font-style:italic;
        font-family:Cursive;
      }

      .text{
        color:red;
        font-size:19px;
      }

    </style>
</head>
<body>
<div class="background">       <!--background image-->
    <div class="container">
      <div class="row pr-2">
        <div class="col-sm-7 pl-0 pt-5">
          <div class="row text-center mx-5">  <!--row starts-->
            <div class="col-sm mt-3">
              <div class="card text-white mb-3" style="max-width:18rem;">
                <div class="card-header">Leave Applied</div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $submitrequest ?></h4>
                  <a class="btn" href="applied_status.php">View</a>
                </div>
              </div>
            </div>
          </div> <!--row2 closes-->

          <div class="row text-center mx-5">  <!--row2 starts-->
            <div class="col-sm mt-3 pt-3">
              <div class="card text-white  mb-3" style="max-width:18rem;">
                <div class="card-header">Leave Granted</div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $submitrequest1 ?></h4>
                  <a class="btn" href="applied_status.php">View</a>
                </div>
              </div>
            </div>
          </div> <!--row2 closes-->
        </div> <!--column1 closes-->

        <div class="col-sm pt-5 pl-1">
          <h2 class="welcome">Welcome <?php echo $_SESSION['name']; ?></h2>
          <br>
          <p class="text">Your recent leaves-</p>
          <div class="table-responsive-sm pr-2">
            <!--table-->
            <table  class="table table-bordered text-center ">
              <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Leave Type</th>
                    <th scope="col">duration</th>
                    <th scope="col">status</th>
                </tr>
              </thead>
          </div> 
        </div>
  
      </div>  <!--row1 closes-->
    </div>   <!--container closes-->    
  </div>     <!--background image ends-->

</body>
</html>

<!--code for displaying table details-->
<?php
  include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';
  $no=1;
  $sql="select $no,leave_type,duration,status from applied_leave where email='$email' ORDER BY no DESC LIMIT 3";
  $result= $con->query($sql);
  if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
      echo "<tr><td>". $no . "</td><td>"   
      . $row["leave_type"] . "</td><td>" . $row["duration"] . 
      "</td><td>"   . $row["status"] . "</td></tr>";
      $no++;
    }

      echo "</table>";
      
  }
  else{
    echo "no results";
  }

  $con->close();
  
?>



