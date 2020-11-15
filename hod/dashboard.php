<?php
include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';
session_start();      //starts session

if(isset($_SESSION['name'])){
  $email = $_SESSION['email'];
}else{
  header('location:hod_signin.php');
}

  $sql="select max(no) from applied_leave";
  $result = $con->query($sql);
  $row = mysqli_fetch_row($result);
  $submitrequest = $row[0];

  $no=1;
  $sql1 = "select $no from applied_leave where status=''"; 
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
    <title>Online leave</title>
    
   
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_header.php' ?>
    <style>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\hod\hod_header.css'; ?>

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

     
    </style>
</head>
<body>
<div class="background">       <!--background image-->
    <div class="container">
      <div class="row pr-2">
        <div class="col-sm-7 pl-0">
          <div class="row text-center mx-5 pt-4">  <!--row starts-->
            <div class="col-sm mt-3">
              <div class="card  mb-3" style="max-width:15rem; ">
                <div class="card-header">Total Leave Applied</div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo  $submitrequest;?></h4>
                  <a class="btn" href="total_leaves.php">View</a>
                </div>
              </div>
            </div>
          </div> <!--row2 closes-->

          


          <div class="row text-center mx-5">  <!--row2 starts-->
            <div class="col-sm mt-3">
              <div class="card mb-3" style="max-width:15rem;">
                <div class="card-header">Leave Pending</div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo  $submitrequest1;?></h4>
                  <a class="btn" href="hod_grantleave.php">View</a>
                </div>
              </div>
            </div>
          </div> <!--row2 closes-->
        </div> <!--column1 closes-->

        <div class="col-sm pt-5 pl-1">
          <h2 class="welcome">Welcome <?php echo $_SESSION['name']; ?></h2>
          <br>

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
  $sql="select $no,leave_type,duration,status from applied_leave  ORDER BY no DESC LIMIT 3";
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
