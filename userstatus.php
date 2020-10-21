 <?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>

    <?php include 'links.php' ?>
    
    <style>
      <?php include 'css/header.css'; ?>
      <?php include 'css/status.css'; ?>
    </style>

</head>
<body>

<?php include 'header.php' ?>

<h3 class="h3">Status</h3>
<br>
<table  class="table table-bordered">
<thead class="thead-light">
      <tr>
        <th scope="col">no</th>
        <th scope="col">leave_type</th>
        <th scope="col">duration</th>
        <th scope="col">from_date</th>
        <th scope="col">to_date</th>
        <th scope="col">reason</th>
        <th scope="col">status</th>
      </tr>
    </thead>
    
<?php

$no=1;
?>

<?php
    include 'connection.php';

if($_SESSION['is_login']){
  $email = $_SESSION['email'];
}else{
  header("Location:index.php");
}



//code selects mentioned fields based on email
$sql="select $no,leave_type,duration,from_date,to_date,reason,status from apply_leave where email='$email'";
$result= $con->query($sql);
if($result->num_rows>0){
  while($row = $result->fetch_assoc()){
    echo "<tr><td>". $no . "</td><td>"   
    . $row["leave_type"] . "</td><td>" . $row["duration"] . 
    "</td><td>" . $row["from_date"] . "</td><td>" . $row["to_date"] . 
    "</td><td>" . $row["reason"] . "</td><td>"  . $row["status"] . "</td></tr>";
    
    $no++;
  }

  
  
    echo "</table>";
    
}
else{
  echo "no results";
}





$con->close();



?>



</table>
    
</body>
</html>

