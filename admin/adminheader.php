<?php
  include 'C:\xampp\htdocs\onlineleavemanagemet\connection.php';
  $r = mysqli_query($con,"select count(status) as total from hod_applied_leave where status='';");
  $c = mysqli_fetch_assoc($r);
?>

<!--navigation bar common in all pages-->

<nav class="navbar navbar-expand navbar-dark bg-primary"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span style="font-size:20px;cursor:pointer;color:white" onclick="openNav()">&#9776; My Menu</span></a>

<a href="" class="notification nav navbar-nav ml-auto">
  <span><i class="fas fa-envelope"></i></span><span class="badge"><?php echo $c['total'];?></span>
</a>
  <!--navigation bar elements-->

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="admin_dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
    <button class="dropdown-btn"><i class="fas fa-calendar-plus"></i>Grant leave<i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
      <a href="grant_hod.php">HOD</a>
      <a href="grant_staff.php">Staff</a>
    </div>
    <button class="dropdown-btn"><i class="fas fa-users"></i>Manage user<i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
      <a href="manage_hod.php">HOD</a>
      <a href="manage_staff.php">Staff</a>
    </div>
    <a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
  </div>
</nav>

<!--javascript code for navigation bar-->
<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } 
      else {
        dropdownContent.style.display = "block";
      }
    });
  }

</script>
