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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    body {
        overflow-x: scroll;
    }

    label {
        font-weight: bold;
    }

    .table-container {
        max-width: 1000px;
        max-height: 500px;
        margin-left: 8%;
        overflow-x: scroll;
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

<body class="bg-light">
    <?php
    include '../sidebar.php';
    ?>
    <form action="" method="POST" autocomplete="off">
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Search By</h2>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="stu_name" checked value="First_Name">
                        <label class="form-check-label" for="stu_name">Student Name</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="sur_name" value="Sur_Name">
                        <label class="form-check-label" for="sur_name">Surname</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="father_name" value="Father_Name">
                        <label class="form-check-label" for="father_name">Father's Name</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <label for="Search_By" class="col-sm-2 col-form-label" id="Search_Label">Student Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="txtinp" id="txtinp" required>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-3">
                    <button class="btn btn-primary" type="submit" name="show">Show</button>
                    <button class="btn btn-warning">Clear</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-5">
                <h3><b>Search Student Details Report</b></h3>
            </div>
        </div>
    </div>
    <div class="container table-container">
        <table class="table table-striped table-hover">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>S.No</th>
                    <th>Id No.</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Father Name</th>
                    <th>Class</th>
                    <th>Section</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (isset($_POST['show'])) {
                        $search = $_POST['search_by'];
                        if ($search == "First_Name") {
                            echo "<script>document.getElementById('stu_name').checked = true;
                            document.getElementById('Search_Label').innerHTML = 'Student Name';</script>";
                        } else if ($search == "Sur_Name") {
                            echo "<script>document.getElementById('sur_name').checked = true;
                            document.getElementById('Search_Label').innerHTML = 'Surname';</script>";
                        } else if ($search == "Father_Name") {
                            echo "<script>console.log(1);</script>";
                            echo "<script>document.getElementById('father_name').checked = true;
                            document.getElementById('Search_Label').innerHTML = 'Father\'s Name';</script>";
                        }
                        $txtinp = $_POST['txtinp'];
                        echo "<script>document.getElementById('txtinp').value = '" . $txtinp . "'</script>";
                        $sql = "SELECT * FROM `student_master_data`" . " WHERE " . $search . ' LIKE' . " '%$txtinp%' ORDER BY Id_No DESC";
                        $result = mysqli_query($link, $sql);
                        $i = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
              <td>' . $i . '</td>
              <td>' . $row['Id_No'] . '</td>
              <td>' . $row['First_Name'] . '</td>
              <td>' . $row['Sur_Name'] . '</td>
              <td>' . $row['Father_Name'] . '</td>
              <td>' . $row['Stu_Class'] . '</td>
              <td>' . $row['Stu_Section'] . '</td>
              </tr>';
                                $i++;
                            }
                        } else {
                            echo "<script>
                                    alert('No Student Found');
                                    </script>";
                        }
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Scripts -->

    <!-- Change labels -->
    <script type="text/javascript">
        let result = document.getElementById('Search_Label');
        document.body.addEventListener('change', function(e) {
            let target = e.target;
            let message;
            switch (target.id) {
                case 'stu_name':
                    message = "Student's Name";
                    break;
                case 'father_name':
                    message = "Father's Name";
                    break;
                case 'sur_name':
                    message = "Surname";
                    break;
            }
            result.innerHTML = message;
        });
    </script>
</body>

</html>