<?php
include_once '../link.php';
session_start();
if (!$_SESSION['Admin_Id_No']) {
  echo "<script>alert('Name Not Available');
    location.replace('../admin_login.html');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Victory EM School</title>
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../css/style2.css">
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
    padding-left: 40px;
    border-radius: 10px;
  }

  #side_logo {
    margin-left: 50px;
  }

  #heading {
    color: white;
    margin-top: 20px;
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
    margin-left: 250px;
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
    margin-top: 30px;
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

  .inputs {
    margin-top: 50px;
    margin-left: 200px;
  }

  .select {
    display: flex;
  }

  .select label {
    margin-left: 20px;
    font-weight: bold;
  }

  .select select {
    margin-left: 20px;
  }

  .textinp {
    margin-top: 30px;
    margin-left: 20px;
    font-weight: bold;
  }
  #report_heading{
    margin-top: 20px;
    margin-left: 400px;
    font-weight: bold;
  }
  table {
    width: 100%;
    margin: 0 auto;
    margin-top: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  .table-wrapper{
    max-height: 500px;
    overflow-y: scroll;
    margin: 20px;
  }
  th {
    position: sticky;
    top: 0px;
    background: #E3D2C4;
    padding-left: 35px;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  td {
    padding-left: 25px;
  }
  table,td,th{
    border: 2px solid black;
  }
</style>
<script type="text/javascript">
  function hideTable() {
    document.getElementById('table').style.visibility = "hidden";
  }
</script>
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
              <li class="submenu11">
                <a href=""><i class="mdi mdi-circle-medium menu-icon"></i>Entry<span style="margin-left: 10px;">&rsaquo;</span></a>
                <ul class="collapse list-unstyled">
                  <li>
                    <a href="../Stu_Register1.php"><i class="mdi mdi-circle-medium menu-icon"></i>Personal Details</a>
                  </li>
                  <li>
                    <a href="../show_student_page.php"><i class="mdi mdi-circle-medium menu-icon"></i>Modify Personal Details</a>
                  </li>
                </ul>
              </li>
              <li class="submenu12">
                <a href=""><i class="mdi mdi-circle-medium menu-icon"></i>View<span style="margin-left: 10px;">&rsaquo;</span></a>
                <ul class="collapse list-unstyled">
                  <li>
                    <a href="../Reports/class_wise_stu_report.php"><i class="mdi mdi-circle-medium menu-icon"></i>Class Wise Student Details</a>
                  </li>
                  <li>
                    <a href="../Reports/search_student.php"><i class="mdi mdi-circle-medium menu-icon"></i>Search Student</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="submenu2">
            <a href=""><i class="mdi mdi-library-books menu-icon"></i>Examinations<span style="margin-left: 10px;">&rsaquo;</span></a>
            <ul class="collapse collapse1 list-unstyled">
              <li class="submenu21">
                <a href=""><i class="mdi mdi-circle-medium menu-icon"></i>Entry<span style="margin-left: 10px;">&rsaquo;</span></a>
                <ul class="collapse list-unstyled">
                  <li>
                    <a href="class_wise_examination.php"><i class="mdi mdi-circle-medium menu-icon"></i>Class Wise Examinations</a>
                  </li>
                </ul>
              </li>
              <li class="submenu22">
                <a href=""><i class="mdi mdi-circle-medium menu-icon"></i>View<span style="margin-left: 10px;">&rsaquo;</span></a>
                <ul class="collapse list-unstyled">
                  <li>
                    <a href=""><i class="mdi mdi-circle-medium menu-icon"></i>Class Wise Examinations</a>
                  </li>
                </ul>
              </li>
            </ul>
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
              <img src="../Images/Victory Logo2.jpg" alt="Victory Logo" style="width: 100px;">
            </div>
            <div class="heading col-md-6">
              <h1 id="heading">VICTORY SCHOOLS</h1>
            </div>
            <img src="../Images/<?php echo $_SESSION['Admin_Id_No'] . ".jpg" ?>" alt="Img Not Available" id="user-img" width="100px" height="100px" style="border-radius: 50%;">
            <div class="profile col-md-3">
              <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h4><?php echo $_SESSION['Admin_Id_No'] . "(Administrator)" ?><img src="../Images/arrow.png" width="20px" id="arrow"></h4>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <button style="border-radius:8px;margin-left:5px; margin-top:2px;" onclick="document.getElementById('getFile').click()">Upload New Photo</button>
                <input type='file' id="getFile" name="img" accept=".png,.jpg,.jpeg" onchange="if(!confirm('Confirm to Update User Image?')){location.replace('admin_dashboard.php')}; document.getElementById('user-img').src = window.URL.createObjectURL(this.files[0])" style="display:none">
                <div class="dropdown-divider"></div>
                <button class="btn btn-success" onclick="location.replace('../logout.php')">Sign Out</button>
              </div>
            </div>
          </div>
        </div>
        <form action="" method="post">
        <div class="inputs">
          <div class="select">
              <label for="max_marks">Class:</label>
              <select name="Class" class="form-control" id="class">
                <option value="selectclass" disabled selected>Select Class</option>
                <option value="Nursery">Nursery</option>
              <option value="LKG">LKG</option>
              <option value="UKG">UKG</option>
              <option value="1 CLASS">1 CLASS</option>
              <option value="2 CLASS">2 CLASS</option>
              <option value="3 CLASS">3 CLASS</option>
              <option value="4 CLASS">4 CLASS</option>
              <option value="5 CLASS">5 CLASS</option>
              <option value="6 CLASS">6 CLASS</option>
              <option value="7 CLASS">7 CLASS</option>
              <option value="8 CLASS">8 CLASS</option>
              <option value="9 CLASS">9 CLASS</option>
              <option value="10 CLASS">10 CLASS</option>
              </select>
              <label for="exam">Name of Examination:</label>
              <select name="Exam" class="form-control" id="exam">
                <option value="selectexam" disabled selected>Select Examination</option>
                <option value="Assignment-1">Assignment-1</option>
                <option value="Unit Test-1">Unit Test-1</option>
                <option value="Unit Test-2">Unit Test-2</option>
                <option value="Unit Test-3">Unit Test-3</option>
                <option value="Unit Test-4">Unit Test-4</option>
                <option value="Quartely">Quartely</option>
                <option value="Half-Yearly">Half-Yearly</option>
                <option value="Pre-Final">Pre-Final</option>
                <option value="Final">Final</option>
              </select>
          </div>
          <div class="textinp">
            <label for="max_marks">Max Marks:</label>
            <input type="number" name="Max_Marks">
          </div>
          <div class="buttons">
            <button type="submit" class="btn btn-primary" name="add">ADD</button>
            <button type="submit" class="btn btn-primary" name="show">SHOW</button>
            <button type="button" class="btn btn-warning" onclick="hideTable()">CLEAR</button>
          </div>
      </div>
      </form>
        <div class="container">
        <h3 id="report_heading">Class Wise Examinations Entry</h3>
          <div class="table-wrapper">
          <table class="scrolldown" id="table">
            <th id="th">S.No</th>
            <th id="th">Class</th>
            <th id="th">Name of Examination</th>
            <th id="th">Max Marks</th>
            <tbody>
            <tr>
              <?php
              if (isset($_POST['add'])) {
                $class = $_POST['Class'];
                $exam = $_POST['Exam'];
                $max = $_POST['Max_Marks'];
                if(mysqli_num_rows(mysqli_query($link,"SELECT * FROM class_wise_examination WHERE Class = '$class' AND EXAM = '$exam'"))>=1){
                  echo "<script>alert('Class and Examination is Already Added');</script>";
                }
                else{
                mysqli_query($link,"INSERT INTO class_wise_examination VALUES('','$class','$exam','$max')");
                $sql = "SELECT * FROM `class_wise_examination`";
                $result = mysqli_query($link, $sql);
                $i =1;
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>
                <td>' . $i . '</td>
                <td>' . $row['Class'] . '</td>
                <td>' . $row['Exam'] . '</td>
                <td>' . $row['Max_Marks'] . '</td>
                </tr>';
                $i++;
                }
              }
            }
            elseif(isset($_POST['show'])){
              $result = mysqli_query($link,"SELECT * FROM class_wise_examination");
              $i = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
              <td>' . $i . '</td>
              <td>' . $row['Class'] . '</td>
              <td>' . $row['Exam'] . '</td>
              <td>' . $row['Max_Marks'] . '</td>
              </tr>';
              $i++;
              }
            }
              ?>
            </tr>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>
  <script src="../script.js"></script>
</body>

</html>