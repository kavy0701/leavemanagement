<!--navigation bar common in all pages-->

<nav class="navbar navbar-expand navbar-dark bg-primary"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span style="font-size:20px;cursor:pointer;color:white" onclick="openNav()">&#9776; My Menu</span></a>
<ul class="nav navbar-nav ml-auto">
    <li class="nav-item active px-5">
       <a class="nav-link" href="adminsignin.php">Home</a>
    </li>
</ul>

<!--navigation bar elements-->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="admindashboard.php"><i class="fas fa-home"></i>Dashboard</a>
  <a href="adminprofile.php"><i class="fas fa-users"></i>Profile</a>
  <a href="grantleave.php"><i class="fas fa-calendar-plus"></i>Grant leave</a>
  <a href="manage.php"><i class="fas fa-check"></i>Manage user</a>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
