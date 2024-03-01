<?php
include_once('../../link.php');
session_start();
if (!$_SESSION['Admin_Id_No']) {
    echo "<script>alert('Admin Id Not Rendered');
    location.replace('../admin_login.php');</script>";
}
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>Viswateja School</title>
    <link rel="shortcut icon" href="/Viswateja/Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/Viswateja/css/sidebar-style.css" />
    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Excel Links -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

    <!-- Bootstrap Links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    body {
        overflow-x: scroll;
    }

    .table-container {
        max-width: 1350px;
        max-height: 500px;
        margin-left: 8%;
        overflow-x: scroll;
    }

    @media print {
        * {
            display: none;
        }

        #table-container {
            display: block;
        }
    }

    @media screen and (max-width:576px) {
        .container {
            width: 80%;
            margin-left: 20%;
            overflow-x: scroll;
        }
    }

    #sign-out {
        display: none;
    }

    @media screen and (max-width:920px) {
        #sign-out {
            display: block;
        }
    }
</style>
<script type="text/javascript">
    function hide() {
        document.getElementById('inp_row').hidden = 'true';
        document.getElementById('route_row').hidden = 'true';
        document.getElementById('add_label').hidden = 'true';
    }
</script>

<body class="bg-light" onload="hide()">
    <?php
    include '../sidebar.php';
    ?>
    <form action="" method="POST">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fee_by" id="class_wise" checked value="Class_Wise">
                        <label class="form-check-label" for="class_wise">Class Wise</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fee_by" id="route_wise" value="Route_Wise">
                        <label class="form-check-label" for="route_wise">Route Wise</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <label for="add_by" class="col-sm-2 col-form-label">Type of Fee:</label>
                <div class="p-2 col-lg-4 rounded">
                    <select class="form-select" name="Type" id="type" aria-label="Default select example">
                        <option value="selectfeetype" selected disabled>-- Select Fee Type --</option>
                        <option value="School Fee">School Fee</option>
                        <option value="Admission Fee">Admission Fee</option>
                        <option value="Computer Fee">Computer Fee</option>
                        <option value="Vehicle Fee">Vehicle Fee</option>
                        <option value="Examination Fee">Examination Fee</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-4" id="class_row">
                <div class="p-2 text-light col-lg-4 rounded">
                    <select class="form-select" name="Class" id="class" aria-label="Default select example">
                        <option selected disabled>-- Select Class --</option>
                        <option value="PreKG">PreKG</option>
                        <option value="LKG">LKG</option>
                        <option value="UKG">UKG</option>
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            echo "<option value='" . $i . " CLASS'>" . $i . " CLASS</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="p-2 text-light col-lg-4 rounded">
                    <select class="form-select" name="Section" id="section" aria-label="Default select example">
                        <option selected disabled>-- Select Section --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-4" id="route_row" hidden>
                <label for="add_by" class="col-sm-2 col-form-label" id="add_label">Route:</label>
                <div class="col-sm-4" id="route_row">
                    <select class="form-select" name="Route" id="route" aria-label="Default select example">
                        <option selected disabled>-- Select Route --</option>
                        <?php
                        $query = mysqli_query($link, "SELECT Van_Route FROM `van_route`");
                        while ($r = mysqli_fetch_assoc($query)) {
                            echo "<option value='" . $r['Van_Route'] . "'>" . $r['Van_Route'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fee" id="wo_commit" checked value="Wo_Commit">
                        <label class="form-check-label" for="wo_commit">Without Committed Fee</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fee" id="w_commit" value="W_Commit">
                        <label class="form-check-label" for="w_commit">With Committed Fee</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-4">
                    <button class="btn btn-primary" type="submit" name="show">Show</button>
                    <button class="btn btn-warning">Clear</button>
                    <button class="btn btn-success" onclick="printDiv();return false;">Print</button>
                    <button class="btn btn-success" onclick="return false;" id="export">Export To Excel</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-4">
                <h3><b>Class Wise Fee Details Report</b></h3>
            </div>
        </div>
    </div>
    <div class="container table-container" id="table-container">
        <table hidden>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="font-size:30px;" colspan="4">VISWATEJA HIGH SCHOOL</td>
            </tr>
            <tr>
                <td style="font-size:20px;color:red">Type of Fee:</td>
                <td id="type_txt_label" style="font-size:20px;"></td>
            </tr>
            <tr>
                <td style="font-size:20px;color:red" id="label"></td>
                <td id="txt_label" style="font-size:20px;"></td>
            </tr>
        </table>
        <table class="table table-striped table-hover" border="1">
            <thead class="bg-secondary text-light">
                <tr style="padding: 5px;">
                    <th>S.No</th>
                    <th>Id No.</th>
                    <th>Name</th>
                    <th id="class_head">Class</th>
                    <th id="section_head">Section</th>
                    <th id="last_head" hidden>Last Year Balance</th>
                    <th id="current_head" hidden>Current Balance</th>
                    <th id="total_head" hidden>Total</th>
                    <th id="paid_head" hidden>Paid</th>
                    <th id="school_bal_head">School Fee Balance</th>
                    <th id="route_head" hidden>Route</th>
                    <th id="van_head" hidden>Van Total</th>
                    <th id="van_bal_head">Van Fee Balance</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (isset($_POST['show'])) {
                        $fee_by = $_POST['fee_by'];
                        if ($fee_by == "Class_Wise") {
                            echo "<script>document.getElementById('class_wise').checked = true;</script>";
                        } else {
                            echo "<script>document.getElementById('route_wise').checked = true;</script>";
                        }
                        $c_fee = $_POST['fee'];
                        if ($c_fee == "W_Commit") {
                            echo "<script>document.getElementById('w_commit').checked = true;</script>";
                        } else {
                            echo "<script>document.getElementById('wo_commit').checked = true;</script>";
                        }

                        if ($_POST['Type']) {
                            $type = $_POST['Type'];
                            echo "<script>document.getElementById('type').value = '" . $type . "';
                            document.getElementById('school_bal_head').innerHTML = '" . $type . " Balance';</script>";
                            if ($type == "Vehicle Fee" && $c_fee == "Wo_Commit") {
                                echo "<script>document.getElementById('school_bal_head').hidden = 'hidden';</script>";
                            }

                            //Arrays
                            $ids = array();
                            $names = array();
                            $mobile = array();
                            $fee = array();
                            $paid = array();
                            $balance = array();
                            $routes = array();
                            $van_fee = array();
                            $van_paid = array();
                            $van_balance = array();

                            $flag = false;

                            if ($fee_by == "Class_Wise") {
                                echo "<script>document.getElementById('class_row').hidden = '';
                                document.getElementById('route_row').hidden = 'hidden';
                                document.getElementById('class_head').hidden = 'hidden';
                                document.getElementById('section_head').hidden = 'hidden';</script>";
                                if ($_POST['Class']) {
                                    $class = $_POST['Class'];
                                    echo "<script>document.getElementById('class').value = '" . $class . "'</script>";
                                    if ($_POST['Section']) {
                                        $section = $_POST['Section'];
                                        echo "<script>
                                        document.getElementById('type_txt_label').innerHTML = '" . $type . "';
                                        document.getElementById('label').innerHTML = 'Class:';
                                        document.getElementById('txt_label').innerHTML = '" . $class . $section . "';</script>";
                                        echo "<script>document.getElementById('section').value = '" . $section . "'</script>";

                                        //Queries
                                        $sql1 = mysqli_query($link, "SELECT * FROM `student_master_data` WHERE Stu_Class = '$class' AND Stu_Section = '$section' ORDER BY Id_No");
                                        $sql2 = mysqli_query($link, "SELECT * FROM `actual_fee` WHERE Class = '$class' AND Type = '$type'");

                                        while ($row1 = mysqli_fetch_assoc($sql1)) {
                                            array_push($ids, $row1['Id_No']);
                                            $names[$row1['Id_No']] = $row1['First_Name'];
                                            $mobile[$row1['Id_No']] = $row1['Mobile'];
                                            $routes[$row1['Id_No']] = $row1['Van_Route'];
                                        }

                                        while ($row2 = mysqli_fetch_assoc($sql2)) {
                                            $actual = $row2['Fee'];
                                        }

                                        foreach ($ids as $id) {
                                            $sql3 = mysqli_query($link, "SELECT * FROM `stu_fee_master_data` WHERE Id_No = '$id' AND Type = '$type'");
                                            $temp = array();
                                            if (mysqli_num_rows($sql3) == 0) {
                                                array_push($temp, 0);
                                                array_push($temp, $actual);
                                                array_push($temp, $actual);
                                                $fee[$id] = $temp;
                                                $temp = array();
                                                if ($type == "School Fee") {
                                                    echo "<script>alert('" . $id . " Not Found in Stu Fee Master Data!')</script>";
                                                }
                                            } else {
                                                while ($row3 = mysqli_fetch_assoc($sql3)) {
                                                    array_push($temp, (int)$row3['Last_Balance']);
                                                    array_push($temp, (int)$row3['Current_Balance']);
                                                    array_push($temp, (int)$row3['Last_Balance'] + (int)$row3['Current_Balance']);
                                                    $fee[$id] = $temp;
                                                    $temp = array();
                                                }
                                            }
                                            $sql4 = mysqli_query($link, "SELECT * FROM `stu_paid_fee` WHERE Id_No = '$id' AND Type = '$type'");
                                            if (mysqli_num_rows($sql4) == 0) {
                                                $paid[$id] = 0;
                                                $balance[$id] = (int)$fee[$id][2];
                                            } else {
                                                $sum = 0;
                                                while ($row4 = mysqli_fetch_assoc($sql4)) {
                                                    $sum += (int)$row4['Fee'];
                                                }
                                                $paid[$id] = $sum;
                                                $balance[$id] = (int)$fee[$id][2] - (int)$paid[$id];
                                            }
                                        }

                                        foreach (array_keys($routes) as $id) {
                                            $sql5 = mysqli_query($link, "SELECT * FROM `stu_fee_master_data` WHERE Id_No = '$id' AND Type = 'Vehicle Fee'");
                                            if (mysqli_num_rows($sql5) == 0) {
                                                $van_fee[$id] = 0;
                                            }
                                            while ($row5 = mysqli_fetch_assoc($sql5)) {
                                                $van_fee[$id] = (int)$row5['Last_Balance'] + (int)$row5['Current_Balance'];
                                            }

                                            $sql6 = mysqli_query($link, "SELECT * FROM `stu_paid_fee` WHERE Id_No = '$id' AND Type = 'Vehicle Fee'");
                                            if (mysqli_num_rows($sql6) == 0) {
                                                $van_paid[$id] = 0;
                                                $van_balance[$id] = (int)$van_fee[$id];
                                            } else {
                                                $sum = 0;
                                                while ($row6 = mysqli_fetch_assoc($sql6)) {
                                                    $sum += (int) $row6['Fee'];
                                                }
                                                $van_paid[$id] = (int) $sum;
                                                $van_balance[$id] = (int)$van_fee[$id] - (int)$sum;
                                            }
                                        }
                                        $flag = true;
                                    } else {
                                        $flag = false;
                                        echo "<script>alert('Please Select Section!')</script>";
                                    }
                                } else {
                                    $flag = false;
                                    echo "<script>alert('Please Select Class!')</script>";
                                }
                            } else if ($fee_by == "Route_Wise") {
                                echo "<script>document.getElementById('class_row').hidden = 'hidden';
                                document.getElementById('route_row').hidden = '';
                                document.getElementById('class_head').hidden = '';
                                document.getElementById('section_head').hidden = '';</script>";
                                if ($_POST['Route']) {
                                    $route = $_POST['Route'];
                                    echo "<script>
                                    document.getElementById('type_txt_label').innerHTML = '" . $type . "';
                                    document.getElementById('label').innerHTML = 'Route:';
                                    document.getElementById('txt_label').innerHTML = '" . $route . "';</script>";
                                    echo "<script>document.getElementById('route').value = '" . $route . "'</script>";

                                    //Arrays
                                    $classes = array();
                                    $actual = array();
                                    //Queries
                                    $sql1 = mysqli_query($link, "SELECT * FROM `student_master_data` WHERE Van_Route = '$route' AND (((Stu_Class LIKE '%CLASS%') OR (Stu_Class LIKE '%KG')) AND (Stu_Class NOT LIKE '%DROP%')) ORDER BY Id_No");
                                    while ($row1 = mysqli_fetch_assoc($sql1)) {
                                        array_push($ids, $row1['Id_No']);
                                        $names[$row1['Id_No']] = $row1['First_Name'];
                                        $mobile[$row1['Id_No']] = $row1['Mobile'];
                                    }
                                    foreach ($ids as $id) {
                                        $sql2 = mysqli_query($link, "SELECT * FROM `student_master_data` WHERE Id_No = '$id'");
                                        while ($row2 = mysqli_fetch_assoc($sql2)) {
                                            $temp2 = array();
                                            array_push($temp2, $row2['Stu_Class']);
                                            array_push($temp2, $row2['Stu_Section']);
                                            $classes[$id] = $temp2;
                                        }
                                        $sql12 = mysqli_query($link, "SELECT * FROM `actual_fee` WHERE Class = '$classes[$id]' AND Type = '$type'");
                                        while ($row12 = mysqli_fetch_assoc($sql12)) {
                                            $actual[$id] = (int)$row12['Fee'];
                                        }

                                        $sql3 = mysqli_query($link, "SELECT * FROM `stu_fee_master_data` WHERE Id_No = '$id' AND Type = '$type'");

                                        if (mysqli_num_rows($sql3) == 0) {
                                            $temp = array();
                                            array_push($temp, 0);
                                            array_push($temp, $actual[$id]);
                                            array_push($temp, $actual[$id]);
                                            $fee[$id] = $temp;
                                        } else {
                                            while ($row3 = mysqli_fetch_assoc($sql3)) {
                                                $temp = array();
                                                array_push($temp, (int)$row3['Last_Balance']);
                                                array_push($temp, (int)$row3['Current_Balance']);
                                                array_push($temp, (int)$row3['Last_Balance'] + (int)$row3['Current_Balance']);
                                                $fee[$id] = $temp;
                                            }
                                        }

                                        $sql4 = mysqli_query($link, "SELECT * FROM `stu_paid_fee` WHERE Id_No = '$id' AND Type = '$type'");
                                        if (mysqli_num_rows($sql4) == 0) {
                                            $paid[$id] = 0;
                                            $balance[$id] = (int)$fee[$id][2];
                                        } else {
                                            $sum = 0;
                                            while ($row4 = mysqli_fetch_assoc($sql4)) {
                                                $sum += (int)$row4['Fee'];
                                            }
                                            $paid[$id] = (int)$sum;
                                            $balance[$id] = (int)$fee[$id][2] - (int)$sum;
                                        }

                                        $sql5 = mysqli_query($link, "SELECT * FROM `stu_fee_master_data` WHERE Id_No = '$id' AND Type = 'Vehicle Fee'");
                                        if (mysqli_num_rows($sql5) == 0) {
                                            $van_fee[$id] = 0;
                                        }
                                        while ($row5 = mysqli_fetch_assoc($sql5)) {
                                            $van_fee[$id] = (int)$row5['Last_Balance'] + (int)$row5['Current_Balance'];
                                        }

                                        $sql6 = mysqli_query($link, "SELECT * FROM `stu_paid_fee` WHERE Id_No = '$id' AND Type = 'Vehicle Fee'");
                                        if (mysqli_num_rows($sql6) == 0) {
                                            $van_paid[$id] = 0;
                                            $van_balance[$id] = (int)$van_fee[$id];
                                        } else {
                                            $van_sum = 0;
                                            while ($row1 = mysqli_fetch_assoc($sql4)) {
                                                $van_sum += (int)$row1['Fee'];
                                            }
                                            $paid[$id] = $sum;
                                            $van_balance[$id] = (int)$van_fee[$id][2] - (int)$van_sum;
                                        }
                                    }
                                    $flag = true;
                                } else {
                                    $flag = false;
                                    echo "<script>alert('Please Select Route!')</script>";
                                }
                            }
                            if ($flag) {
                                if ($c_fee == "Wo_Commit") {
                                    echo "<script>document.getElementById('last_head').hidden = 'hidden';
                                document.getElementById('current_head').hidden = 'hidden';
                                document.getElementById('total_head').hidden = 'hidden';
                                document.getElementById('paid_head').hidden = 'hidden';
                                document.getElementById('route_head').hidden = 'hidden';
                                document.getElementById('van_head').hidden = 'hidden';</script>";
                                    $i = 1;
                                    $total_bal = 0;
                                    $van_total = 0;
                                    foreach ($ids as $id) {
                                        echo '<tr style="padding: 5px;">
                  <td style="text-align:center">' . $i . '</td>
                  <td>' . $id . '</td>
                  <td style="padding:5px;">' . $names[$id] . '</td>';
                                        if ($fee_by == "Route_Wise") {
                                            echo '<td>' . $classes[$id][0] . '</td>
                                        <td style="text-align:center;">' . $classes[$id][1] . '</td>';
                                        }
                                        if ($type != "Vehicle Fee") {
                                            echo '<td style="text-align:center">' . $balance[$id] . '</td>';
                                            $total_bal += (int)$balance[$id];
                                        }
                                        $van_total += (int)$van_balance[$id];
                                        echo '<td style="text-align:center">' . $van_balance[$id] . '</td>
                  <td style="text-align:center">' . $mobile[$id] . '</td>';
                                        echo '</tr>';
                                        $i++;
                                    }
                                    if ($fee_by != "Route_Wise") {
                                        echo '<tr>
                                    <td colspan="3" style="font-weight:bold;text-align:center;">Total</td>';
                                    } else {
                                        echo '<tr>
                                    <td colspan="5" style="font-weight:bold;text-align:center;">Total</td>';
                                    }
                                    if ($type != "Vehicle Fee") {
                                        echo '<td style="font-weight:bold;text-align:center;">' . $total_bal . '</td>';
                                    }
                                    echo '<td style="font-weight:bold;text-align:center;">' . $van_total . '</td>
                                    <td></td>
                                    </tr>';
                                } else {
                                    echo "<script>document.getElementById('last_head').hidden = '';
                                document.getElementById('current_head').hidden = '';
                                document.getElementById('total_head').hidden = '';
                                document.getElementById('paid_head').hidden = '';
                                document.getElementById('route_head').hidden = '';</script>";
                                    if ($type == "Vehicle Fee") {
                                        echo "<script>document.getElementById('van_head').hidden = 'hidden';
                                document.getElementById('van_bal_head').hidden = 'hidden';</script>";
                                    } else {
                                        echo "<script>document.getElementById('van_head').hidden = '';
                                document.getElementById('van_bal_head').hidden = '';</script>";
                                    }
                                    $i = 1;
                                    $total = 0;
                                    $paid_total = 0;
                                    $balance_total = 0;
                                    $van_total = 0;
                                    $van_bal_total = 0;
                                    foreach ($ids as $id) {
                                        echo '<tr style="padding: 5px;">
                  <td style="text-align:center">' . $i . '</td>
                  <td>' . $id . '</td>
                  <td>' . $names[$id] . '</td>';
                                        if ($fee_by == "Route_Wise") {
                                            echo "<script>document.getElementById('class_head').hidden = '';
                                document.getElementById('section_head').hidden = '';
                                document.getElementById('route_head').hidden = 'hidden';</script>";
                                            echo '<td>' . $classes[$id][0] . '</td>
                    <td style="text-align:center;">' . $classes[$id][1] . '</td>';
                                        } else {
                                            echo "<script>document.getElementById('class_head').hidden = 'hidden';
                                document.getElementById('section_head').hidden = 'hidden';
                                document.getElementById('route_head').hidden = '';</script>";
                                        }
                                        $total += (int)$fee[$id][2];
                                        $paid_total += (int)$paid[$id];
                                        $balance_total += (int)$balance[$id];
                                        echo '<td style="text-align:center">' . $fee[$id][0] . '</td>
                  <td style="text-align:center">' . $fee[$id][1] . '</td>
                  <td style="text-align:center">' . $fee[$id][2] . '</td>
                  <td style="text-align:center">' . $paid[$id] . '</td>
                  <td style="text-align:center">' . $balance[$id] . '</td>';
                                        if ($fee_by != "Route_Wise") {
                                            echo '<td style="text-align:center">' . $routes[$id] . '</td>';
                                        }
                                        if ($type != "Vehicle Fee") {
                                            $van_total += (int)$van_fee[$id];
                                            $van_bal_total += (int)$van_balance[$id];
                                            echo '<td style="text-align:center">' . $van_fee[$id] . '</td>
                  <td style="text-align:center">' . $van_balance[$id] . '</td>';
                                        }
                                        echo '<td style="text-align:center">' . $mobile[$id] . '</td>';
                                        echo '</tr>';
                                        $i++;
                                    }
                                    if ($fee_by != "Route_Wise") {
                                        echo '<tr>
                                    <td colspan="5" style="font-weight:bold;text-align:center;">Total</td>';
                                    } else {
                                        echo '<tr>
                                    <td colspan="7" style="font-weight:bold;text-align:center;">Total</td>';
                                    }
                                    echo '
                                        <td style="font-weight:bold;text-align:center">' . $total . '</td>
                                        <td style="font-weight:bold;text-align:center">' . $paid_total . '</td>
                                        <td style="font-weight:bold;text-align:center">' . $balance_total . '</td>';
                                    if ($type != "Vehicle Fee") {
                                        if ($fee_by != "Route_Wise") {
                                            echo '<td></td>';
                                        }
                                        echo '
                                        <td style="font-weight:bold;text-align:center">' . $van_total . '</td>
                                        <td style="font-weight:bold;text-align:center">' . $van_bal_total . '</td>
                                        <td></td>';
                                    }
                                    echo '<td></td>
                                    <td></td>
                                    </tr>';
                                }
                            }
                        } else {
                            echo "<script>alert('Please Select Fee Type!')</script>";
                        }
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>

    <!-- Scripts -->

    <!-- Print Table -->
    <script type="text/javascript">
        function printDiv() {
            window.frames["print_frame"].document.body.innerHTML = "<p style='text-align:center;font-size:30px;font-family:'Times New Roman''>VISWATEJA HIGH SCHOOL</p>";
            <?php if ($fee_by == "Class_Wise") { ?>
                window.frames["print_frame"].document.body.innerHTML += "<p><b>Class:</b><?php echo $class . ' ' . $section ?></p>";
            <?php } else if ($fee_by == "Route_Wise") { ?>
                window.frames["print_frame"].document.body.innerHTML += "<p><b>Route:</b><?php echo $route ?></p>";
            <?php } ?>
            window.frames["print_frame"].document.body.innerHTML += "<p><b>Fee Type:</b><?php echo $type ?></p>";
            window.frames["print_frame"].document.body.innerHTML += document.querySelector('.table-container').innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>

    <!-- Export Table to Excel -->
    <script type="text/javascript">
        $('#export').on('click', function() {
            fee_by = '<?php echo $fee_by; ?>';
            if (fee_by == "Class_Wise") {
                stuclass = '<?php echo $class; ?>';
                stusection = '<?php echo $section; ?>';
                filename = 'Fee_' + stuclass + stusection;
            } else if (fee_by == "Route_Wise") {
                route = '<?php echo $route; ?>';
                filename = 'Fee_' + route;
            }
            tableID = 'table-container';
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        });
    </script>

    <!-- Change labels -->
    <script type="text/javascript">
        let route_row = document.getElementById('route_row');
        let cls_row = document.getElementById('class_row');
        document.body.addEventListener('change', function(e) {
            let target = e.target;
            switch (target.id) {
                case 'class_wise':
                    if (cls_row.hidden) {
                        cls_row.hidden = '';
                    }
                    if (!route_row.hidden) {
                        route_row.hidden = 'hidden';
                    }
                    break;
                case 'route_wise':
                    if (!cls_row.hidden) {
                        cls_row.hidden = 'hidden';
                    }
                    if (route_row.hidden) {
                        route_row.hidden = '';
                    }
                    break;
            }
        });
    </script>
</body>

</html>