<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>

    <?php include 'C:\xampp\htdocs\leavemanagementsystem\links.php' ?>
    <?php include 'C:\xampp\htdocs\leavemanagementsystem\admin\adminheader.php' ?>
    <style>
      <?php include 'C:\xampp\htdocs\leavemanagementsystem\css\admin.css'; ?>
    </style>
</head>
<body>
<div class="backgroundimage">

<table  class="table table-bordered">
<thead class="thead-light">
      <tr>
        <th scope="col">no</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">leave_type</th>
        <th scope="col">duration</th>
        <th scope="col">from_date</th>
        <th scope="col">to_date</th>
        <th scope="col">reason</th>
        <th scope="col">assign</th>
      </tr>
    </thead>

    <?php
    include 'C:\xampp\htdocs\leavemanagementsystem\connection.php';





//code selects mentioned fields based on email
$sql="select no,name,email,leave_type,duration,from_date,to_date,reason from apply_leave ORDER BY no DESC";
$result= $con->query($sql);
if($result->num_rows>0){
  while($row = $result->fetch_assoc()){
    echo "<tr><td>". $row["no"] . "</td><td>" .$row["name"] . "</td><td>" 
    .$row["email"] . "</td><td>" . $row["leave_type"] . "</td><td>" 
    . $row["duration"] . "</td><td>" . $row["from_date"] . "</td><td>" . $row["to_date"] . "</td><td>" 
    . $row["reason"] .  "</td><td>" . "<button onclick='accept()' id='accept'> Accept </button>" . "<button onclick='reject()' id='reject'> Reject </button>" . "</td></tr>" ;
  }
  echo "</table>";

}
else{
  echo "no results";
}
$con->close();



?>


</table>



</div>

<script>
document.getElementById("accept").addEventListener("click", myFunction);
function myFunction() {
  
  document.getElementById("accept").innerHTML = "ACCEPTED";

}

document.getElementById("reject").addEventListener("click", myFunction1);
function myFunction1() {
  document.getElementById("reject").innerHTML = "REJECTED";
}

</script>
</body>
</html>
