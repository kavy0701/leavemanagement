<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online leave</title>
    
    
    <?php include 'links.php' ?>
    <?php include 'header.php' ?>
    <style>
      <?php include 'css/header.css'; ?>
    </style>
</head>
<body>
<div class="background">

<div class="row h-50 justify-content-center align-items-center">

<h2 class="heading">Welcome <?php echo $_SESSION['name']; ?> </h2>

</div>

<h3>Instructions :</h3>
<br>

<p>1.After signing in,you can apply for your leave by clicking on <code>Apply Leave</code> option</p>
<p>2.Provide a valid reason for your leave.</p>
<p>3.Once clicked on apply,you will receive an email about acceptance or rejection of your leave.</p>
<p>4.You can also submit a valid softcopy medical certificate for medical absence.</p>



</body>

</html>
