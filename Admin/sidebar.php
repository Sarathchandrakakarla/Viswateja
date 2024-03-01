<nav>
    <div class="logo">
        <img src="/Viswateja/Images/Viswateja Logo.png" alt="..." width="70px">
    </div>
    <div class="heading">
        <h3>Viswateja School, Duttalur</h3>
    </div>
    <input type="checkbox" id="click" />
    <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
    </label>
    <ul>
        <li>
            <img src="/Viswateja/Images/<?php echo $_SESSION['Admin_Id_No']; ?>.jpg" alt="Admin Image">
        </li>
        <li>
            <a href="#"><?php echo $_SESSION['Admin_Id_No'];
                        if ($_SESSION['Role'] == "Admin") {
                            echo "(Administrator)";
                        } else {
                            echo "(Super Admin)";
                        } ?></a>
            <ul class="login-sub-menu sub-menu">
                <li>
                    <p style="color: #f2f2f2;">Upload New Photo</p>
                    <input type='file' id="getFile" name="img" accept=".png,.jpg,.jpeg" onchange="saveImg()">
                </li>
                <li><a href="/Viswateja/php/logout.php">Sign Out</a></li>
            </ul>
        </li>
        <li id="sign-out"><a href="/Viswateja/php/logout.php">Sign Out</a></li>
    </ul>
</nav>
<div class="sidebar close">
    <div class="logo-details">
        <i class="bx bx-menu"></i>
        <span class="logo_name">Administrator</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="/Viswateja/Admin/admin_dashboard.php">
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
                <li><a href="/Viswateja/Admin/Student/Stu_Register.php">Student Details Entry</a></li>
                <li><a href="/Viswateja/Admin/Student/show_student_page.php">Show/Modify Student Details</a></li>
                <li>
                    <a class="link_name" href="#" id="view"><label for="">View</label></a>
                </li>
                <li><a href="/Viswateja/Admin/Reports/class_wise_stu_report.php">Class wise Student Report</a></li>
                <li><a href="/Viswateja/Admin/Reports/search_student.php">Search Student</a></li>
                <li><a href="/Viswateja/Admin/Reports/address.php">Address</a></li>
                <li><a href="/Viswateja/Admin/Reports/address_no_wise.php">Address Number Wise</a></li>
                <li><a href="/Viswateja/Admin/Reports/route_wise_report.php">Route wise Report</a></li>
                <li><a href="/Viswateja/Admin/Reports/strength.php">Strength Particulars</a></li>
                <li><a href="/Viswateja/Admin/Reports/consolidated_route.php">Consolidated Route</a></li>
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
                <li><a href="/Viswateja/Admin/Marks/class_wise_examination.php">Class Wise Examinations Entry</a></li>
                <li><a href="/Viswateja/Admin/Marks/class_wise_subjects.php">Class Wise Subjects Entry</a></li>
                <li><a href="/Viswateja/Admin/Marks/class_marks.php">Class Wise Marks Entry</a></li>
                <li>
                    <a class="link_name" href="#" id="view"><label for="">View</label></a>
                </li>
                <li><a href="/Viswateja/Admin/Reports/class_wise_marks.php">Class wise Marks View</a></li>
                <li><a href="/Viswateja/Admin/Reports/individual_marks.php">Individual Marks View</a></li>
                <li><a href="/Viswateja/Admin/Reports/marks_entry_slip.php">Marks Entry Slip</a></li>
                <li><a href="/Viswateja/Admin/Marks/hallticket.php">Hall Ticket</a></li>
                <li><a href="/Viswateja/Admin/Marks/marklist.php">Mark List</a></li>
                <li><a href="/Viswateja/Admin/Marks/merit_certificate.php">Cerificate of Merit</a></li>
                <li><a href="/Viswateja/Admin/Marks/class_wise_graph.php">Class Wise Marks Graph</a></li>
                <li><a href="/Viswateja/Admin/Reports/consolidated_marks.php">Consolidated Marks</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class="bx bx-user-check"></i>
                    <span class="link_name">Attendance</span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li>
                    <a class="link_name" href="#"><label for="">Attendance</label></a>
                </li>
                <li><a href="/Viswateja/Admin/Attendance/att_daily.php">Attendance Daily Entry</a></li>
                <li><a href="/Viswateja/Admin/Attendance/att_monthly.php">Attendance Monthly Entry</a></li>
                <li><a href="/Viswateja/Admin/Attendance/working_days.php">Working Days</a></li>
                <li>
                    <a class="link_name" href="#" id="view"><label for="">View</label></a>
                </li>
                <li><a href="/Viswateja/Admin/Attendance/date_wise.php">Date Wise Attendance View</a></li>
                <li><a href="/Viswateja/Admin/Attendance/class_wise.php">Class Wise Attendance View</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class="bx bx-user"></i>
                    <span class="link_name">Employee</span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li>
                    <a class="link_name" href="#"><label for="">Employee</label></a>
                </li>
                <li><a href="/Viswateja/Admin/Employee/Emp_register.php">Employee Details Entry</a></li>
                <li><a href="/Viswateja/Admin/Employee/show_emp_page.php">Show/Modify Employee Details</a></li>
                <li><a href="/Viswateja/Admin/Reports/search_employee.php">Search Employee</a></li>
                <li><a href="/Viswateja/Admin/Reports/employee_list.php">Employee List</a></li>
                <li><a href="/Viswateja/Admin/Reports/referred_by.php">Referred By</a></li>
            </ul>
        </li>
        <!--
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class="bx bx-envelope"></i>
                    <span class="link_name">SMS</span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li>
                    <a class="link_name" href="#"><label for="">SMS</label></a>
                </li>
                <li><a href="/Viswateja/Admin/SMS/absent.php">Student Absent</a></li>
                <li><a href="/Viswateja/Admin/SMS/fee.php">Student Fee</a></li>
                <li><a href="/Viswateja/Admin/SMS/special.php">Special SMS</a></li>
                <li><a href="/Viswateja/Admin/SMS/credentials.php">Credentials SMS</a></li>
            </ul>
        </li>
        -->
        <!--
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class="bx bx-log-in"></i>
                    <span class="link_name">Login</span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li>
                    <a class="link_name" href="#"><label for="">Login</label></a>
                </li>
                <li><a href="/Viswateja/Admin/Login/bulk_excel_upload.php">Student Credentials Bulk Upload</a></li>
                <li>
                    <a class="link_name" href="#" id="view"><label for="">View</label></a>
                </li>
                <li><a href="/Viswateja/Admin/Login/class_wise_credentials.php">Class Wise Credentials View</a></li>
                <li><a href="/Viswateja/Admin/Login/faculty_credentials.php">Faculty Credentials View</a></li>
            </ul>
        </li>
        -->
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class="bx bx-user"></i>
                    <span class="link_name"><?php if ($_SESSION['Role'] == "Admin") {
                                                echo "Admin";
                                            } else {
                                                echo "Super Admin";
                                            } ?></span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li>
                    <a class="link_name" href="#"><label for=""><?php if ($_SESSION['Role'] == "Admin") {
                                                                    echo "Admin";
                                                                } else {
                                                                    echo "Super Admin";
                                                                } ?></label></a>
                </li>
                <?php if ($_SESSION['Role'] != "Admin") { ?>
                    <li><a href="/Viswateja/Admin/add_user.php">Add Admin User</a></li>
                    <li><a href="/Viswateja/Admin/image.php">Add Images</a></li>
                    <li><a href="/Viswateja/Admin/home_text.php">Manage Home Page Text</a></li>
                <?php } ?>
                <!--
                <li><a href="/Viswateja/Admin/add_stu_user.php">Add Student/Faculty User</a></li>
                <li><a href="/Viswateja/Admin/stu_pass_change.php">Change Student/Faculty Password</a></li>
                -->
                <li><a href="/Viswateja/Admin/backup_db.php">Backup Database</a></li>
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
                <?php if ($_SESSION['Role'] != "Admin") { ?>
                    <li><a href="/Viswateja/Admin/refresh_data.php">Refresh Data</a></li>
                <?php } ?>
                <li><a href="/Viswateja/Admin/change_pwd.php">Reset Password</a></li>
            </ul>
        </li>
    </ul>
</div>

<script src="/Viswateja/js/script.js"></script>