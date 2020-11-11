<?php
include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';
session_start();   //starts the session


$sql="select max(no) from hod_applied_leave";
  $result = $con->query($sql);
  $row = mysqli_fetch_row($result);
  $submitrequest = $row[0];

  $no=1;
  $sql1 = "select $no from hod_applied_leave where status=''"; 
  $result1 = $con->query($sql1);
  if($result1->num_rows>0){
    while($row1 = $result1->fetch_assoc()){
      $submitrequest1 = $no;
      $no++; 
    }
  }else{
    $submitrequest1 = 0;
  }


  $no=1;
  $sql2 = "select $no from hod_applied_leave where status='Approved'"; 
  $result2 = $con->query($sql2);
  if($result2->num_rows>0){
    while($row2 = $result2->fetch_assoc()){
      $submitrequest2 = $no;
      $no++; 
    }
  }else{
    $submitrequest2 = 0;
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\admin\admin_header.php' ?>
    <style>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\admin\admin_header.css'; ?>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\admin\admin_dashboard.css'; ?>

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
    </style>  
</head>
<body>
  <div class="backgrd">
    <div class="container">
      <div class="col-sm-9 col-md-11 ">  <!--dashboard-->
        <div class="row text-center mx-5 pl-5">  <!--row starts-->

          <div class="col-sm-4 mt-5 pl-5">
            <div class="card  mb-3" style="max-width:18rem;">
              <div class="card-header"> Requests Received</div>
              <div class="card-body">
                <h4 class="card-title"><?php echo  $submitrequest;?></h4>
                <a class="btn text-white" href="#">View</a>
              </div>  <!--card body ends-->
            </div>  <!--card ends-->
          </div>

          <div class="col-sm-4 mt-5 pl-5">
            <div class="card  mb-3" style="max-width:18rem;">
              <div class="card-header">Leave Assigned</div>
              <div class="card-body">
                <h4 class="card-title"><?php echo  $submitrequest2;?></h4>
                <a class="btn text-white" href="#">View</a>
              </div>  <!--card body ends-->
            </div>  <!--card ends-->
          </div>

          <div class="col-sm-4 mt-5 pl-5">
            <div class="card mb-3" style="max-width:18rem;">
              <div class="card-header">Leave Pending</div>
              <div class="card-body">
                <h4 class="card-title"><?php echo  $submitrequest1;?></h4>
                <a class="btn text-white" href="#">View</a>
              </div>  <!--card body ends-->
            </div>  <!--card ends-->
          </div>

        </div>   <!--end row-->
      </div>
    </div>   <!--container ends here-->


    <div class="mx-5 mt-5 text-center">
      <p class="text-white p-3">List of applied leaves</p>
      <?php
        
        $sql = "select * from hod_applied_leave where status='' ORDER BY no DESC LIMIT 5";
        $result = $con->query($sql);
        if($result->num_rows>0){
          echo '<table  class="table table-bordered text-center">
          <thead>
            <tr>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th scope="col">leave_type</th>
              <th scope="col">duration</th>
              <th scope="col">from_date</th>
              <th scope="col">to_date</th>
              <th scope="col">reason</th>
            </tr>
          </thead>
          <tbody>';
            while($row = $result->fetch_assoc()){
              echo '<tr>';
              echo '<td>'.$row["name"]. '</td>';
              echo '<td>'.$row["email"]. '</td>';
              echo '<td>'.$row["leave_type"]. '</td>';
              echo '<td>'.$row["duration"]. '</td>';
              echo '<td>'.$row["from_date"]. '</td>';
              echo '<td>'.$row["to_date"]. '</td>';
              echo '<td>'.$row["reason"]. '</td>';
              echo '</tr>';
            }
          echo '</tbody>
          </table> ';
        }
        else{
          echo "NO NEW REQUESTS";
        }

      ?>
    </div>

    </div>   <!--end dashboard-->
    </div>   <!--background image ends-->
  
    
</body>
</html>
  
    
</body>
</html>

