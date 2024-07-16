<?php
include_once('../../link.php');
session_start();
if (!$_SESSION['Admin_Id_No']) {
    echo "<script>alert('Admin Id Not Rendered');
    location.replace('../admin_login.php');</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    body {
        overflow-x: scroll;
    }

    .table-container {
        max-width: 1200px;
        max-height: 500px;
        margin-left: 8%;
        overflow-x: scroll;
    }

    th,
    td {
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
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6">
                <h3><b>Class Wise Strength Particulars</b></h3>
            </div>
        </div>
        <div class="row justify-content-center mt-4 p-1">
            <div class="col-lg-2">
                <button class="btn btn-success" onclick="printDiv();return false;">Print</button>
            </div>
        </div>
    </div>
    <?php
    $classes = array("PreKG", "LKG", "UKG", "1 CLASS", "2 CLASS", "3 CLASS", "4 CLASS", "5 CLASS", "6 CLASS", "7 CLASS", "8 CLASS", "9 CLASS", "10 CLASS");
    $sections = array('A', 'B', 'C', 'D');
    $total = 0;
    foreach ($classes as $class) {
        foreach ($sections as $section) {
            $rows = mysqli_num_rows(mysqli_query($link, "SELECT Id_No FROM `student_master_data` WHERE Stu_Class = '$class' AND Stu_Section = '$section'"));
            if ($rows > 0) {
                $strength[$class][$section] = $rows;
                $total += $strength[$class][$section];
            }
        }
    }
    ?>

    <div class="container table-container">
        <table class="table table-striped table-hover" border="1">
            <thead class="bg-secondary text-white">
                <th>Class</th>
                <th>Total</th>
            </thead>
            <?php
            foreach ($classes as $class) {
                foreach ($sections as $section) {
                    if (array_key_exists($section, $strength[$class])) {
                        echo '
                <tr style="height: 50px;" style="height: 50px;">
                    <td>' . $class . ' ' . $section . '</td>
                    <td>' . $strength[$class][$section] . '</td>
                </tr>
                ';
                    }
                }
            }
            ?>

            <tr>
                <td><b>Total</b></td>
                <td><b><?php echo $total; ?></b></td>
            </tr>
        </table>
    </div>
    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>


    <!-- Scripts -->

    <!-- Print Table -->
    <script type="text/javascript">
        function printDiv() {
            window.frames["print_frame"].document.body.innerHTML = "<h1 style='text-align:center;'>VISWATEJA HIGH SCHOOL</h1>";
            window.frames["print_frame"].document.body.innerHTML += "<h2 style='text-align:center;'>Strength Particulars</h2>";
            window.frames["print_frame"].document.body.innerHTML += document.querySelector('.table-container').innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
</body>

</html>