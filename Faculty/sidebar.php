<nav>
    <div class="logo">
      <img src="/Victory/Images/Victory Logo.png" alt="..." width="70px">
    </div>
    <div class="heading">
      <h3>Victory Schools, Kodur</h3>
    </div>
    <input type="checkbox" id="click" />
    <label for="click" class="menu-btn">
      <i class="fas fa-bars"></i>
    </label>
    <ul>
      <li>
        <img src="/Victory/Images/<?php echo $_SESSION['Id_No']; ?>.jpg" alt="Faculty Image">
      </li>
      <li>
        <a href="#"><?php echo $_SESSION['Id_No'] . "(Faculty)"; ?></a>
        <ul class="login-sub-menu sub-menu">
          <li><a href="/Victory/php/logout.php">Sign Out</a></li>
        </ul>
      </li>
      <li id="sign-out"><a href="/Victory/php/logout.php">Sign Out</a></li>
    </ul>
  </nav>
  <div class="sidebar close">
    <div class="logo-details">
      <i class="bx bx-menu"></i>
      <span class="logo_name">Faculty</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="/Victory/Faculty/faculty_dashboard.php">
          <i class="bx bx-home"></i>
          <span class="link_name">Dashboard</span>
        </a>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bx bx-user"></i>
            <span class="link_name">Student</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li>
            <a class="link_name" href="#"><label for="">Student</label></a>
          </li>
          <li><a href="/Victory/Faculty/Reports/show_student_page.php">Show Student Details</a></li>
          <li><a href="/Victory/Faculty/Reports/class_wise_stu_report.php">Class wise Student Report</a></li>
          <li><a href="/Victory/Faculty/Reports/search_student.php">Search Student</a></li>
          <li><a href="/Victory/Faculty/Reports/address.php">Address</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bx bx-book"></i>
            <span class="link_name">Examinations</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li>
            <a class="link_name" href="#"><label for="">Examinations</label></a>
          </li>
          <li><a href="/Victory/Faculty/Reports/class_wise_marks.php">Class wise Marks View</a></li>
          <li><a href="/Victory/Faculty/Reports/individual_marks.php">Individual Marks View</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="link_name">Settings</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li>
            <a class="link_name" href="#"><label for="">Settings</label></a>
          </li>
          <li><a href="/Victory/Faculty/change_pwd.php">Reset Password</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <script src="/Victory/js/script.js"></script>