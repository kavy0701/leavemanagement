<?php

include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';

$id = $_GET['id'];

$deletequery = " delete from user_register where email = '$id'";

$query = mysqli_query($con,$deletequery);

header("Location:manage_user.php");

?>
