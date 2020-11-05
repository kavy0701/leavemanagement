<!--navigation bar common in all pages-->

<nav class="navbar navbar-expand navbar-dark bg-primary"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span style="font-size:20px;cursor:pointer;color:white" onclick="openNav()">&#9776; My Menu</span></a>


<!--navigation bar elements-->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="user_dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
  <a href="user_profile.php"><i class="fas fa-users"></i>Profile</a>
  <a href="user_applyleave.php"><i class="fas fa-calendar-plus"></i>Apply leave</a>
  <a href="applied_status.php"><i class="fas fa-star"></i>Status</a>
  <a href="user_logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
</script>
