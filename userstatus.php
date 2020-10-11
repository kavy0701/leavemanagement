

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>

    <?php include 'links.php' ?>
    <?php include 'header.php' ?>
    <style>
      <?php include 'css/header.css'; ?>
    </style>

</head>
<body>

<h3>Status of your leave</h3>
<br>
<table class="table table-bordered">
<thead>
      <tr>
        <th>no</th>
        <th>leave_type</th>
        <th>duration</th>
        <th>from_date</th>
        <th>to_date</th>
        <th>reason</th>
        <th>status</th>
      </tr>
    </thead>

<?php
include 'connection.php';




$sql = "select no,leave_type,duration,from_date,to_date,reason from apply_leave";
$result = $con->query($sql);

if($result->num_rows>0){
  while($row = $result->fetch_assoc()){
    echo "<tr><td>" . $row["no"] . "</td><td>" . $row["leave_type"] . "</td><td>" . $row["duration"] . "</td><td>" . $row["from_date"] . "</td><td>" . $row["to_date"] . "</td><td>" . $row["reason"] . "</td></tr>" ;
  }
  echo "</table>";
}
else{
  echo "0 result";
}
$con->close();

?>

</table>
    
</body>
</html>
