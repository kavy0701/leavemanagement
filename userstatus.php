<?php
session_start();

  include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';

  if($_SESSION['is_login']){
    $email = $_SESSION['email'];
  }else{
    header("Location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>

    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\links.php' ?>
    
    <style>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\user\header.css'; ?>
      <?php include 'C:\xampp\htdocs\onlineleavemanagemet\user\applied_status.css'; ?>
    </style>

</head>
<body>

  <div class="backgroundimg">

    <?php include 'C:\xampp\htdocs\onlineleavemanagemet\user\header.php' ?>

    <h3 class="h3">Status of Applied Leaves</h3>
    <br>
    <div class="mx-5 mt-4 text-center">
      <table  class="table table-bordered text-center">
      <thead class="thead">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Leave Type</th>
          <th scope="col">Duration</th>
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Reason</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      
      <tbody>
      <?php

        $no=1;
      ?>

      <?php
        include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';

        if($_SESSION['is_login']){
          $email = $_SESSION['email'];
        }else{
          header("Location:index.php");
        }



        //code selects mentioned fields based on email
        $selectquery = "select $no,leave_type,duration,from_date,to_date,reason,status from applied_leave where email='$email'";
        $query = mysqli_query($con,$selectquery);
        $num = mysqli_num_rows($query);

        if($num){
          while($res = mysqli_fetch_assoc($query)){
      ?>
          <tr>
            <td><?php echo $no ?> </td>
            <td><?php echo $res['leave_type']; ?> </td>
            <td><?php echo $res['duration']; ?> </td>
            <td><?php echo $res['from_date']; ?> </td>
            <td><?php echo $res['to_date']; ?> </td>
            <td><?php echo $res['reason']; ?> </td>
            <td><?php echo $res['status']; ?> </td>
            <td><a href="deleteleave.php?id=<?php echo $res['leave_type'];?>" data-toggle="tooltip" data-placement="top" title="DELETE"><i class="fas fa-trash"></i></a></td>              
          </tr>
      <?php $no++; ?>

      <?php
       }
      }
                    
      ?>

    </tbody>            
      </table>
   </div>
  </div>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>
</html>
