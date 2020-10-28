<!--navigation bar common in all pages-->

<nav class="navbar navbar-expand navbar-dark bg-primary"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span style="font-size:20px;cursor:pointer;color:white" onclick="openNav()">&#9776; My Menu</span></a>
<ul class="nav navbar-nav ml-auto">
    <li class="nav-item active px-5">
       <a class="nav-link" href="admin_signin.php">Home</a>
    </li>
</ul>

<!--navigation bar elements-->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="hod_dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
  <a href="hod_profile.php"><i class="fas fa-user"></i>Profile</a>
  <a href="hod_grantleave.php"><i class="fas fa-calendar-plus"></i>Grant leave</a>
  <button class="dropdown-btn"><i class="fas fa-users"></i>Manage user<i class="fa fa-caret-down"></i></button>
  <div class="dropdown-container">
    <a href="fystud.php">FY</a>
    <a href="systud.php">SY</a>
    <a href="tystud.php">TY</a>
  </div>
  <a href="hod_logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
  } else {
  dropdownContent.style.display = "block";
  }
  });
}



</script>
