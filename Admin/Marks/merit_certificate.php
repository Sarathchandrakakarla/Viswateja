<?php
include_once('../../link.php');
session_start();
if (!$_SESSION['Admin_Id_No']) {
    echo "<script>alert('Admin Id Not Rendered');
    location.replace('../admin_login.php');</script>";
}
error_reporting(0);
function month($date)
{
    $arr = explode('-', $date);
    $temp = array();
    switch ($arr[1]) {
        case '01':
            array_push($temp, str_split($arr[1])[1]);
            $arr[1] = "January";
            break;
        case '02':
            array_push($temp, str_split($arr[1])[1]);
            $arr[1] = "February";
            break;
        case '03':
            array_push($temp, str_split($arr[1])[1]);
            $arr[1] = "March";
            break;
        case '04':
            array_push($temp, str_split($arr[1])[1]);
            $arr[1] = "April";
            break;
        case '05':
            array_push($temp, str_split($arr[1])[1]);
            $arr[1] = "May";
            break;
        case '06':
            array_push($temp, str_split($arr[1])[1]);
            $arr[1] = "June";
            break;
        case '07':
            array_push($temp, str_split($arr[1])[1]);
            $arr[1] = "July";
            break;
        case '08':
            array_push($temp, str_split($arr[1])[1]);
            $arr[1] = "August";
            break;
        case '09':
            array_push($temp, str_split($arr[1])[1]);
            $arr[1] = "September";
            break;
        case '10':
            array_push($temp, $arr[1]);
            $arr[1] = "October";
            break;
        case '11':
            array_push($temp, $arr[1]);
            $arr[1] = "November";
            break;
        case '12':
            array_push($temp, $arr[1]);
            $arr[1] = "December";
            break;
    }
    array_push($temp, $arr[1]);
    return $temp;
}
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
        max-width: 1000px;
        max-height: 500px;
        overflow-x: scroll;
    }

    #section {
        text-align: center;
    }

    @media screen and (max-width:576px) {
        .container {
            width: 80%;
            margin-left: 20%;
            overflow-x: scroll;
        }
    }

    @media print {
        * {
            display: none;
        }

        #table-container {
            display: block;
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

<body class="bg-light">
    <?php
    include '../sidebar.php';
    ?>
    <form action="" method="POST">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stu_type" id="class_wise" onchange="stuType()" checked value="Class_Wise">
                        <label class="form-check-label" for="class_wise">Class Wise</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stu_type" id="single" onchange="stuType()" value="Single">
                        <label class="form-check-label" for="single">Single</label>
                    </div>
                </div>
                <div class="col-lg-3" id="id_row" hidden>
                    <input type="text" class="form-control" placeholder="Enter Id No." oninput="this.value = this.value.toUpperCase()" name="Id_No" id="id_no">
                </div>
            </div>
            <div class="row justify-content-center mt-5" id="class_row">
                <div class="p-2 col-lg-4 rounded">
                    <select class="form-select" name="Class" id="class" onchange="fetchExam()" aria-label="Default select example">
                        <option selected disabled>-- Select Class --</option>
                        <option value="PreKG">PreKG</option>
                        <option value="LKG">LKG</option>
                        <option value="UKG">UKG</option>
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            echo '<option value="' . $i . ' CLASS">' . $i . ' CLASS</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="p-2 col-lg-4 rounded">
                    <select class="form-select" name="Section" id="sec" aria-label="Default select example">
                        <option selected disabled>-- Select Section --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exam_type" id="sa-2" checked value="SA-2">
                        <label class="form-check-label" for="sa-2">SA-2 (Annual)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exam_type" id="sa-1" value="SA-1">
                        <label class="form-check-label" for="sa-1">SA-1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-3">
                    <button class="btn btn-primary" type="submit" name="Ok">OK</button>
                    <button class="btn btn-warning" type="reset" onclick="hideTable()">Clear</button>
                    <button class="btn btn-success" onclick="printDiv();return false;">Print</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-3">
                <h3><b>Cerificate of Merit</b></h3>
            </div>
        </div>
    </div>
    <div class="container table-container" id="table-container">
        <?php

        if (isset($_POST['Ok'])) {

            $stu_type = $_POST['stu_type'];
            $exam_type = $_POST['exam_type'];
            echo "<script>
                document.getElementById('" . strtolower($exam_type) . "').checked = true;
                </script>";
            if ($stu_type == "Single") {
                echo "<script>
                document.getElementById('single').checked = true;
                document.getElementById('id_row').hidden = '';
                document.getElementById('class_row').hidden = 'hidden';
                </script>";

                if ($_POST['Id_No']) {
                    $id = $_POST['Id_No'];
                    echo "<script>document.getElementById('id_no').value = '" . $id . "'</script>";
                    $exam = 'FA-1';
                    $class_sql = mysqli_query($link, "SELECT First_Name,Stu_Class,Stu_Section FROM `student_master_data` WHERE Id_No = '$id'");
                    while ($class_row = mysqli_fetch_assoc($class_sql)) {
                        $name = $class_row['First_Name'];
                        $class = $class_row['Stu_Class'];
                        $section = $class_row['Stu_Section'];
                    }

                    $max_sql = mysqli_query($link, "SELECT Max_Marks FROM `class_wise_examination` WHERE Class = '$class' AND Exam = '$exam'");
                    while ($max_row = mysqli_fetch_assoc($max_sql)) {
                        $max = $max_row['Max_Marks'];
                    }
                    $no_of_subs = mysqli_num_rows(mysqli_query($link, "SELECT Subjects FROM `class_wise_subjects` WHERE Class = '$class' AND Exam = '$exam'"));
                    $max_total = (int)($no_of_subs) * (int)($max);

                    $total_query = mysqli_query($link, "SELECT Total FROM `stu_marks` WHERE Id_No = '$id' AND Exam = '$exam'");
                    while ($total_row = mysqli_fetch_assoc($total_query)) {
                        $total_marks = $total_row['Total'];
                    }

                    $percentage = round(($total_marks / $max_total) * 100, 1);

                    echo '
                        <div class="container" style="border:2px solid black;margin-bottom:8%;">
                            <table width="100%;">
                                <tr>
                                    <td style="padding-left:10px;border-bottom:2px solid black;">
                                        <img src="/Viswateja/Images/Viswateja Logo.png" width="100px;" />
                                    </td>
                                    <td style="padding:10px;padding-left:15px;border-bottom:2px solid black;">
                                        <span style="font-size:25px;font-family:' . 'Times New Roman' . ';"><b>VISWATEJA E.M SCHOOL,<br>DUTTALUR.<br></b></span>
                                        <span style="font-size:25px;font-family:' . 'algerian' . ';font-style:' . 'italic' . ';">CERTIFICATE OF MERIT</span>
                                    </td>
                                </tr>
                            </table>
                            <table style="padding:10px;">
                                <tr>
                                    <td style="font-family:' . 'Times New Roman' . ';font-size:25px;line-height:50px;">
                                        <b>
                                            This is to certify that <span style="font-size:20px;font-family:' . 'algerian' . ';font-style:' . 'italic' . ';"><u style="text-decoration:none;border-bottom:1px dashed black;">' . $name . '</span> <span style="font-size:20px;
                                            padding-left:20px;font-style:' . 'italic' . ';"> (' . $id . ')</u> </span> Studying Class  <span style="font-size:20px;font-family:' . 'algerian' . ';font-style:' . 'italic' . ';"><u style="text-decoration:none;border-bottom:1px dashed black;">' . $class . ' ' .   $section . '</u></span> have completed ' . date('Y') - 1 . ' - ' . date('y') . ' academic year at    Viswateja English Medium School by scoring <u style="text-decoration:none;border-bottom:1px dashed black;">' . $percentage . '</u>% in ' . $exam_type . ' examinations.  He / She promoted to next class.
                                        </b>
                                    </td>
                                </tr>
                            </table>
                            <table width:100%;>
                                <tr>
                                    <td style="padding-top:50px;padding-left:500px;text-align:right;font-family:' . 'Times New Roman' . ';font-style:' . 'italic' . '">
                                    <img src="/Viswateja/Images/sign.png" width="70px" style="bottom:30px;left:90px;position:relative;" />
                                        Head Master<br>Viswateja E.M School,<br>Duttalur.
                                    </td>
                                </tr>
                            </table>
                        </div>
                        ';
                } else {
                    echo "<script>alert('Please Enter Id_No')</script>";
                }
            } else {
                if ($_POST['Class']) {
                    $class = $_POST['Class'];
                    echo "<script>document.getElementById('class').value = '" . $class . "'</script>";
                    if ($_POST['Section']) {
                        $section = $_POST['Section'];
                        echo "<script>document.getElementById('sec').value = '" . $section . "'</script>";

                        $exam = 'FA-1';
                        //Arrays
                        $ids = array();
                        $names = array();
                        $totals = array();
                        $percentages = array();

                        //Queries
                        $query1 = mysqli_query($link, "SELECT Id_No,First_Name FROM `student_master_data` WHERE Stu_Class = '$class' AND Stu_Section = '$section'");
                        $query2 = mysqli_query($link, "SELECT Max_Marks FROM `class_wise_examination` WHERE Class = '$class' AND Exam = '$exam'");
                        $no_of_subs = mysqli_num_rows(mysqli_query($link, "SELECT Subjects FROM `class_wise_subjects` WHERE Class = '$class' AND Exam = '$exam'"));

                        while ($row1 = mysqli_fetch_assoc($query1)) {
                            array_push($ids, $row1['Id_No']);
                            $names[$row1['Id_No']] = $row1['First_Name'];
                        }

                        //Getting Max Marks for that Exam (ANNUAL)
                        while ($row2 = mysqli_fetch_assoc($query2)) {
                            $max = $row2['Max_Marks'];
                        }
                        $max_total = (int)($no_of_subs) * (int)($max);

                        //Getting Totals
                        foreach ($ids as $id) {
                            $total_query = mysqli_query($link, "SELECT Total FROM `stu_marks` WHERE Id_No = '$id' AND Exam = '$exam'");
                            while ($total_row = mysqli_fetch_assoc($total_query)) {
                                $totals[$id] = $total_row['Total'];
                            }
                        }

                        //Percentage Calculation
                        foreach ($ids as $id) {
                            $percentages[$id] = round(($totals[$id] / $max_total) * 100, 1);
                        }

                        foreach ($ids as $id) {
                            echo '
                        <div class="container" style="border:2px solid black;margin-bottom:8%;">
                            <table width="100%;">
                                <tr>
                                    <td style="padding-left:10px;border-bottom:2px solid black;">
                                        <img src="/Viswateja/Images/Viswateja Logo.png" width="100px;" />
                                    </td>
                                    <td style="padding:10px;padding-left:15px;border-bottom:2px solid black;">
                                        <span style="font-size:25px;font-family:' . 'Times New Roman' . ';"><b>VISWATEJA E.M SCHOOL,<br>DUTTALUR.<br></b></span>
                                        <span style="font-size:25px;font-family:' . 'algerian' . ';font-style:' . 'italic' . ';">CERTIFICATE OF MERIT</span>
                                    </td>
                                </tr>
                            </table>
                            <table style="padding:10px;">
                                <tr>
                                    <td style="font-family:' . 'Times New Roman' . ';font-size:25px;line-height:50px;">
                                        <b>
                                            This is to certify that <span style="font-size:20px;font-family:' . 'algerian' . ';font-style:' . 'italic' . ';"><u style="text-decoration:none;border-bottom:1px dashed black;">' . $names[$id] . '</span> <span style="font-size:20px;
                                            padding-left:20px;font-style:' . 'italic' . ';"> (' . $id . ')</u> </span> Studying Class  <span style="font-size:20px;font-family:' . 'algerian' . ';font-style:' . 'italic' . ';"><u style="text-decoration:none;border-bottom:1px dashed black;">' . $class . ' ' .   $section . '</u></span> have completed ' . date('Y') - 1 . ' - ' . date('y') . ' academic year at    Viswateja English Medium School by scoring <u style="text-decoration:none;border-bottom:1px dashed black;">' . $percentages[$id] . '</u>% in ' . $exam_type . ' examinations.  He / She promoted to next class.
                                        </b>
                                    </td>
                                </tr>
                            </table>
                            <table width:100%;>
                                <tr>
                                    <td style="padding-top:50px;padding-left:500px;text-align:right;font-family:' . 'Times New Roman' . ';font-style:' . 'italic' . '">
                                    <img src="/Viswateja/Images/sign.png" width="70px" style="bottom:30px;left:90px;position:relative;" />
                                        Head Master<br>Viswateja E.M School,<br>Duttalur.
                                    </td>
                                </tr>
                            </table>
                        </div>
                        ';
                        }
                    } else {
                        echo "<script>alert('Please Select Section!!')</script>";
                    }
                } else {
                    echo "<script>alert('Please Select Class!!')</script>";
                }
            }
        }

        ?>
    </div>
    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>




    <!-- Scripts -->

    <!-- Change labels -->
    <script type="text/javascript">
        function stuType() {
            id_row = document.getElementById('id_row');
            class_row = document.getElementById('class_row');
            if (document.getElementById('class_wise').checked) {
                id_row.hidden = 'hidden';
                class_row.hidden = '';
            } else if (document.getElementById('single').checked) {
                id_row.hidden = '';
                class_row.hidden = 'hidden';
            }
        }
    </script>

    <!-- Fetch Exam -->
    <script type="text/javascript">
        function fetchExam() {
            if (document.getElementById('class_wise').checked) {
                cls = $('#class').val();
                $('#exam').html('');
                $.ajax({
                    type: 'post',
                    url: 'temp.php',
                    data: {
                        class: cls
                    },
                    success: function(data) {
                        $("#exam").html(data);
                    }
                })
            } else if (document.getElementById('single').checked) {
                id = $('#id_no').val();
                console.log(id);
                $('#exam').html('');
                $.ajax({
                    type: 'post',
                    url: 'temp.php',
                    data: {
                        Id_No: id
                    },
                    success: function(data) {
                        $("#exam").html(data);
                    }
                })
            }
        }
    </script>

    <!-- Print Table -->
    <script type="text/javascript">
        function printDiv() {
            window.frames["print_frame"].document.body.innerHTML = document.querySelector('.table-container').innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
</body>

</html>