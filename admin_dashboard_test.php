<?php
session_start();
if (!$_SESSION['Admin_Id_No']) {
  echo "<script>alert('Name Not Available');
    location.replace('admin_login.html');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Victory EM School</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="css/style2.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<style>
  #main {
    width: 100%;
    height: 900px;
    background: #E3D2C4;
  }

  #header {
    background: linear-gradient(#6A11CB, #2754c7);
    padding: 10px;
    border-radius: 10px;
  }

  #side_logo {
    margin-left: 50px;
  }

  #heading {
    color: white;
    margin-top: 10px;
    font-family: Georgia, 'Times New Roman', Times, serif;
  }

  #stu_item {
    text-decoration: none;
    color: black;
    opacity: 80%;
  }

  .details-form {
    margin-top: 20px;
    font-family: "comic sans ms", sans serif;
    padding-left: 100px;
    padding-right: 100px;
    padding-bottom: 50px;
  }

  h2 {
    background-color: forestgreen;
    color: white;
    padding: 10px;
    text-align: center;
    border-radius: 10px;
  }

  td {
    padding: 7px;
  }

  input {
    height: 30px;
    border-radius: 10px;
    border: none;
  }

  input:focus {
    outline: none;
    border: 1px solid forestgreen;
  }

  input:hover {
    box-shadow: 5px 5px 5px black;
  }

  .form-control {
    width: 285px;
    border-radius: 10px;
  }

  .buttons {
    margin-left: 500px;
    margin-top: 20px;
  }

  .btn {
    height: 40px;
    margin-left: 20px;
  }

  .sidebar {
    padding-top: 50px;
  }

  .profile {
    color: white;
    margin-top: 20px;
    display: flex;
  }

  .profile a {
    color: white;
    text-decoration: none;
  }

  .dropdown-menu {
    width: 200px;
    margin-left: 20px;
  }

  .profile_img {
    border-radius: 15px;
    background-color: darkgrey;
  }

  .btn {
    margin-left: 50px;
  }
</style>

<body>
  <div class="container-scroller">
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Administrator</h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="admin_dashboard.php"><i class="mdi mdi-home menu-icon"></i> Dashboard</a>
                </li>
                <li class="submenu1">
                    <a href=""><i class="mdi mdi-account menu-icon"></i> Student <span style="margin-left: 10px;">&rsaquo;</span></a>
                    <ul class="collapse collapse1 list-unstyled">
                        <li class="submenu2">
                            <a href=""><i class="mdi mdi-circle-medium menu-icon"></i>Entry<span style="margin-left: 10px;">&rsaquo;</span></a>
                            <ul class="collapse list-unstyled">
                              <li>
                                <a href="Stu_Register1.php"><i class="mdi mdi-circle-medium menu-icon"></i>Add Student</a>
                              </li>
                              <li>
                                <a href="show_student_page.php"><i class="mdi mdi-circle-medium menu-icon"></i>Modify Student Details</a>
                              </li>
                            </ul>
                        </li>
                        <li class="submenu2">
                          <a href=""><i class="mdi mdi-circle-medium menu-icon"></i>View<span style="margin-left: 10px;">&rsaquo;</span></a>
                          <ul class="collapse list-unstyled">
                            <li>
                              <a href="Reports/class_wise_stu_report.php"><i class="mdi mdi-circle-medium menu-icon"></i>Class Wise Student Details</a>
                            </li>
                            <li>
                              <a href="Reports/search_student.php"><i class="mdi mdi-circle-medium menu-icon"></i>Search Student</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="mdi mdi-information menu-icon"></i>About</a>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>
    <div class="container-fluid" id="main">
      <div class="container-fluid" id="header">
        <div class="row">
          <div class="logo col-md-2">
          <button type="button" id="sidebarCollapse" class="navbar-toggler navbar-toggler align-self-center mr-2" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-left"></i>
          </button>
            <img src="Images/Victory Logo2.jpg" alt="Victory Logo" style="width: 60px;">
          </div>
          <div class="heading col-md-5">
            <h1 id="heading">VICTORY SCHOOLS</h1>
          </div>
          <img src="Images/<?php echo $_SESSION['Admin_Id_No'] . ".jpg" ?>" alt="Img Not Available" id="user-img" width="60px" height="60px" style="border-radius: 50%;">
          <div class="profile col-md-3">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <h5><?php echo $_SESSION['Admin_Id_No'] . "(Administrator)" ?><img src="Images/arrow.png" width="20px" id="arrow"></h5>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <button style="border-radius:8px;margin-left:5px; margin-top:2px;" onclick="document.getElementById('getFile').click()">Upload New Photo</button>
              <input type='file' id="getFile" name="img" accept=".png,.jpg,.jpeg" onchange="if(!confirm('Confirm to Update User Image?')){location.replace('admin_dashboard.php')}; document.getElementById('user-img').src = window.URL.createObjectURL(this.files[0])" style="display:none">
              <div class="dropdown-divider"></div>
              <button class="btn btn-success" onclick="location.replace('logout.php')">Sign Out</button>
            </div>
          </div>
          <div class="btncollapse col-md-1">
            <button type="button" id="profileCollapse" class="navbar-toggler navbar-toggler align-self-center mr-2" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-align-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="text/javascript">
    const menu = document.querySelector(".navbar-toggler");
  menu.addEventListener("click", function () {
    expandSidebar();
});
function expandSidebar() {
    document.querySelector("body").classList.toggle("short");
    let keepSidebar = document.querySelectorAll("body.short");
    if (keepSidebar.length === 1) {
        localStorage.setItem("keepSidebar", "true");
    } else {
        localStorage.removeItem("keepSidebar");
    }
}
  </script>
  <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
  <script src="script.js"></script>
</body>

</html>