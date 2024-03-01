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
            <div class="row justify-content-center mt-5">
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
                    <input type="text" class="form-control" placeholder="Enter Id No." oninput="this.value = this.value.toUpperCase()" onchange="fetchExam()" name="Id_No" id="id_no">
                </div>
            </div>
            <div class="row justify-content-center mt-3" id="class_row">
                <div class="p-2 col-lg-4 rounded">
                    <select class="form-select" name="Class" id="class" onchange="fetchExam(this.value)" aria-label="Default select example">
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
            <div class="row justify-content-center mt-3">
                <label for="exam_name" class="col-lg-2 col-form-label">Examination Name</label>
                <div class="col-sm-3">
                    <select class="form-select" name="Exam" id="exam">
                        <option value="selectexam">--Select Exam--</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <label for="exam_name" class="col-lg-1 col-form-label">Subjects</label>
                <div class="col-lg-8">
                    <textarea name="Subs" id="subs" cols="100" rows="2"></textarea>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <label for="exam_name" class="col-lg-1 col-form-label">Dates</label>
                <div class="col-lg-8">
                    <textarea name="Dates" id="dates" cols="100" rows="2"></textarea>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <label for="exam_name" class="col-lg-1 col-form-label">Syllabus</label>
                <div class="col-lg-8">
                    <textarea name="Syllabus" id="syllabus" cols="100" rows="6"></textarea>
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
    <!--
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-lg-5" style="color: red;">
                NOTE: 1. Please Give Margin: Minimum in Page Setup
            </div>
        </div>
    </div>
    -->
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-3">
                <h3><b>Hall Ticket</b></h3>
            </div>
        </div>
    </div>
    <div class="container table-container" id="tbody">
        <?php

        if (isset($_POST['Ok'])) {
            $stu_type = $_POST['stu_type'];
            if ($stu_type == "Single") {
                echo "<script>
                document.getElementById('single').checked = true;
                document.getElementById('id_row').hidden = '';
                document.getElementById('class_row').hidden = 'hidden';
                </script>";

                //Arrays
                $details = array();
                if ($_POST['Id_No']) {
                    $id = $_POST['Id_No'];
                    echo "<script>document.getElementById('id_no').value = '" . $id . "'</script>";
                    if ($_POST['Exam']) {
                        $exam = $_POST['Exam'];
                        $query1 = mysqli_query($link, "SELECT Adm_No,First_Name,Father_Name,Stu_Class,Stu_Section FROM `student_master_data` WHERE Id_No = '$id'");
                        while ($row1 = mysqli_fetch_assoc($query1)) {
                            $details[$id] = array($row1['Adm_No'], $row1['First_Name'], $row1['Father_Name']);
                            $class = $row1['Stu_Class'];
                            $section = $row1['Stu_Section'];
                        }
                        $subs = $_POST['Subs'];
                        echo "<script>document.getElementById('subs').value = '" . $subs . "'</script>";
                        $dates = $_POST['Dates'];
                        echo "<script>document.getElementById('dates').value = '" . $dates . "'</script>";
                        $syllabus = $_POST['Syllabus'];
                        echo "<script>document.getElementById('syllabus').innerHTML = '" . $syllabus . "'</script>";

                        echo '
                            <div class="container" style="margin-bottom:3%;">
                                <table style="width:100%;border:2px solid black;">
                                    <tr>
                                        <td style="width:75%;height:100%;font-size:20px;font-weight:bold;text-align:center;">VISWATEJA ENGLISH MEDIUM SCHOOL<br>Duttalur, SPSR NELLORE</td>
                                        <td>Phone No:8985274900</td>
                                    </tr>
                                </table>
                                <table style="border-top:2px solid black;border-left:2px solid black;border-right:2px solid black;">
                                    <tr>
                                        <td style="width:85%;font-size:20px;text-align:center;">Hall-Ticket</td>
                                        <td style="font-size:15px;text-align:left;padding-right:50px;"><b>Date:</b>' . date('d/M/Y') . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 20px;"><b>Name of the Examination: </b>' . $exam . '</td>
                                        <td><b>Class: </b>' . $class . ' ' . $section . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 20px;"><b>Name of the Student: </b>' . $details[$id][1] . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 20px;"><b>Student ID: </b>' . $id . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 20px;"><b>Father\'s Name: </b>' . $details[$id][2] . '</td>
                                    </tr>
                                </table>
                                <table style="width:100%;border-left:3px solid black;border-right:3px solid black;border-bottom:3px solid black;">
                                    <tr>
                                        <td style="height:40px;border-top:3px solid black;border-bottom:2px solid black;border-left:3px solid black;border-right:3px solid black;">
                                            <b>Subject</b>
                                            <span style="padding-left:10px;">' . $subs . '</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;border-bottom:2px solid black;border-left:3px solid black;border-right:3px solid black;">
                                            <b>Date</b>
                                            <span style="padding-left:10px;">' . $dates . '</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:25px;text-align:center;">Syllabus Details</td>
                                    </tr>
                                    <tr>
                                        <td style="height:100px;padding:5px 20px;"><pre>' . $syllabus . '</pre></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top:10px;text-align:right;">
                                            <img src="/Viswateja/Images/sign.png" width="70px" style="bottom:30px;left:120px;position:relative;" />
                                            Sign of the Headmaster
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            ';
                    } else {
                        echo "<script>alert('Please Select Exam!!')</script>";
                    }
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
                        if ($_POST['Exam']) {
                            $exam = $_POST['Exam'];
                            $subs = $_POST['Subs'];
                            echo "<script>document.getElementById('subs').value = '" . $subs . "'</script>";
                            $dates = $_POST['Dates'];
                            echo "<script>document.getElementById('dates').value = '" . $dates . "'</script>";
                            $syllabus = $_POST['Syllabus'];
                            echo "<script>document.getElementById('syllabus').value = '" . $syllabus . "'</script>";

                            //Arrays
                            $ids = array();
                            $details = array();

                            //Queries
                            $query1 = mysqli_query($link, "SELECT Id_No FROM `student_master_data` WHERE Stu_Class = '$class' AND Stu_Section = '$section'");

                            while ($row1 = mysqli_fetch_assoc($query1)) {
                                array_push($ids, $row1['Id_No']);
                            }
                            foreach ($ids as $id) {
                                $query2 = mysqli_query($link, "SELECT Adm_No,First_Name,Father_Name FROM `student_master_data` WHERE Id_No = '$id'");
                                while ($row2 = mysqli_fetch_assoc($query2)) {
                                    $details[$id] = array($row2['Adm_No'], $row2['First_Name'], $row2['Father_Name']);
                                }
                            }

                            foreach ($ids as $id) {

                                echo '
                            <div class="container" style="height:50%;">
                                <table style="width:100%;border:2px solid black;">
                                    <tr>
                                        <td style="width:75%;font-size:20px;font-weight:bold;text-align:center;">VISWATEJA ENGLISH MEDIUM SCHOOL<br>Duttalur, SPSR NELLORE</td>
                                        <td>Phone No:8985274900</td>
                                    </tr>
                                </table>
                                <table style="border-top:2px solid black;border-left:2px solid black;border-right:2px solid black;">
                                    <tr>
                                        <td style="width:85%;font-size:20px;text-align:center;">Hall-Ticket</td>
                                        <td style="font-size:15px;text-align:left;padding-right:50px;"><b>Date:</b>' . date('d/M/Y') . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 20px;"><b>Name of the Examination: </b>' . $exam . '</td>
                                        <td><b>Class: </b>' . $class . ' ' . $section . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 20px;"><b>Name of the Student: </b>' . $details[$id][1] . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 20px;"><b>Student ID: </b>' . $id . '</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 20px;"><b>Father\'s Name: </b>' . $details[$id][2] . '</td>
                                    </tr>
                                </table>
                                <table style="width:100%;border-left:3px solid black;border-right:3px solid black;border-bottom:3px solid black;">
                                    <tr>
                                        <td style="height:40px;border-top:3px solid black;border-bottom:2px solid black;border-left:3px solid black;border-right:3px solid black;">
                                            <b>Subject</b>
                                            <span style="width:100%;padding-left:10px;">' . $subs . '</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;border-bottom:2px solid black;border-left:3px solid black;border-right:3px solid black;">
                                            <b>Date</b>
                                            <span style="padding-left:10px;">' . $dates . '</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:25px;text-align:center;">Syllabus Details</td>
                                    </tr>
                                    <tr>
                                        <td style="height:130px;padding:5px 20px;"><pre>' . $syllabus . '</pre></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top:10px;text-align:right;">
                                            <img src="/Viswateja/Images/sign.png" width="70px" style="bottom:30px;left:120px;position:relative;" />
                                            Sign of the Headmaster
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            ';
                            }
                            /*

                            //Table Creation
                            echo ' <table style="margin-top:0.5cm;margin-left: 4.2cm;">
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $details[$ids[0]][0] . '</td>
                            <td style="width: 120px;"></td>
                            <td style="font-size: 15px;font-family:' . 'Arial' . '">' . date('d-m-Y') . '</td>
                        </tr>
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $exam . '</td>
                        </tr>
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $details[$ids[0]][1] . '</td>
                            <td style="width: 175px;"></td>
                            <td style="font-size: 15px;font-family:' . 'Arial' . '">' . $class . ' ' . $section . '</td>
                        </tr>
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $ids[0] . '</td>
                        </tr>
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $details[$ids[0]][2] . '</td>
                        </tr>
                    </table>';
                            foreach ($ids as $id) {
                                echo ' <table style="padding-top:85px;margin-top:6cm;margin-left: 4.1cm;">
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $details[$id][0] . '</td>
                            <td style="width: 120px;"></td>
                            <td style="font-size: 15px;font-family:' . 'Arial' . '">' . date('d-m-Y') . '</td>
                        </tr>
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $exam . '</td>
                        </tr>
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $details[$id][1] . '</td>
                            <td style="width: 170px;"></td>
                            <td style="font-size: 15px;font-family:' . 'Arial' . '">' . $class . ' ' . $section . '</td>
                        </tr>
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $id . '</td>
                        </tr>
                        <tr style="line-height: 30px;">
                            <td style="font-size: 18px;font-family:' . 'Arial' . '">' . $details[$id][2] . '</td>
                        </tr>
                    </table>';
                            }
                            */
                        } else {
                            echo "<script>alert('Please Select Exam!!')</script>";
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