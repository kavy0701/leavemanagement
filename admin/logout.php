<?php

session_start();

session_destroy();
$_SESSION[''] = "";
header("Location:admin_signin.php");

?>
