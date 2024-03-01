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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        max-width: 1250px;
        max-height: 500px;
        margin-left: 8%;
        overflow-x: scroll;
    }

    label {
        font-weight: bold;
    }

    .bx-trash {
        cursor: pointer;
        font-size: 30px;
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
    <form action="" method="POST">
        <div class="container form-container">
            <div class="row justify-content-center mt-3">
                <label for="id_no" class="col-lg-1 col-form-label">Id No.</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="Id_No" oninput="this.value = this.value.toUpperCase()" id="id_no">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
                    <button class="btn btn-primary" type="submit" name="show">Show Previous</button>
                    <button class="btn btn-primary" type="submit" name="add">Insert</button>
                    <button class="btn btn-primary" type="submit" onclick="if(!confirm('Confirm to Delete All Previous Records?')){return false;}else{return true;}" name="delete_all">Delete All</button>
                    <button class="btn btn-warning" type="reset" onclick="hideTable()">Clear</button>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-3">
                    <button class="btn btn-success" onclick="printDiv();return false;">Print</button>
                    <button class="btn btn-success" onclick="return false;" id="export">Export To Excel</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-4">
                <h3><b>Address Number Wise</b></h3>
            </div>
        </div>
    </div>
    <div class="container table-container" id="table-container">
        <table class="table table-striped table-hover" border="1">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>S.No</th>
                    <th>Id No.</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Father Name</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Door No.</th>
                    <th>Area</th>
                    <th>Village</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <tr>
                    <?php
                    if (isset($_POST['show'])) {
                        $i = 1;
                        $main_query = mysqli_query($link, "SELECT * FROM `address_temp`");
                        if (mysqli_num_rows($main_query) == 0) {
                            echo "<script>alert('No Previous Records Found!!')</script>";
                        } else {
                            while ($main_row = mysqli_fetch_assoc($main_query)) {
                                echo '<tr>
                    <td>' . $i . '</td>
                    <td>' . $main_row['Id_No'] . '</td>
                    <td>' . $main_row['First_Name'] . '</td>
                    <td>' . $main_row['Sur_Name'] . '</td>
                    <td>' . $main_row['Father_Name'] . '</td>
                    <td>' . $main_row['Gender'] . '</td>
                    <td>' . $main_row['Class'] . ' ' . $main_row['Section'] . '</td>
                    <td>' . $main_row['House_No'] . '</td>
                    <td>' . $main_row['Area'] . '</td>
                    <td>' . $main_row['Village'] . '</td>
                    <td>' . $main_row['Mobile'] . '</td>
                    <td><i class="bx bx-trash delete"></i></td>
                    </tr>';
                                $i++;
                            }
                        }
                    }
                    if (isset($_POST['add'])) {
                        if ($_POST['Id_No']) {
                            $id = $_POST['Id_No'];
                            echo "<script>document.getElementById('id_no').value = '" . $id . "'</script>";
                            $query1 = mysqli_query($link, "SELECT * FROM `student_master_data` WHERE Id_No = '$id'");
                            if (mysqli_num_rows($query1) == 0) {
                                echo "<script>alert('No Student Found');</script>";
                            } else {
                                while ($row1 = mysqli_fetch_assoc($query1)) {
                                    $name = $row1['First_Name'];
                                    $surname = $row1['Sur_Name'];
                                    $father_name = $row1['Father_Name'];
                                    $gender = $row1['Gender'];
                                    $class = $row1['Stu_Class'];
                                    $section = $row1['Stu_Section'];
                                    $house = $row1['House_No'];
                                    $area = $row1['Area'];
                                    $village = $row1['Village'];
                                    $mobile = $row1['Mobile'];
                                }
                                if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM `address_temp` WHERE Id_No = '$id'")) >= 1) {
                                    echo "<script>alert('Student Already Added!!');</script>";
                                } else {
                                    $query2 = mysqli_query($link, "INSERT INTO `address_temp` VALUES('','$id','$name','$surname','$father_name',
                            '$gender','$class',' $section','$house','$area','$village','$mobile')");
                                    if ($query2) {
                                        echo "<script>alert('Student Added Successfully!!');</script>";
                                    } else {
                                        echo "<script>alert('Student Addition Failed due to internal Error!!');</script>";
                                    }
                                    $sql = "SELECT * FROM `address_temp`";
                                    $result = mysqli_query($link, $sql);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                <td>' . $i . '</td>
                <td>' . $row['Id_No'] . '</td>
                <td>' . $row['First_Name'] . '</td>
                <td>' . $row['Sur_Name'] . '</td>
                <td>' . $row['Father_Name'] . '</td>
                <td>' . $row['Gender'] . '</td>
                <td>' . $row['Class'] . ' ' . $row['Section'] . '</td>
                <td>' . $row['House_No'] . '</td>
                <td>' . $row['Area'] . '</td>
                <td>' . $row['Village'] . '</td>
                <td>' . $row['Mobile'] . '</td>
                <td><i class="bx bx-trash delete"></i></td>
                </tr>';
                                        $i++;
                                    }
                                }
                            }
                        } else {
                            echo "<script>alert('Please Enter Id No.!')</script>";
                        }
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
    <?php

    if (isset($_POST['delete_all'])) {
        $sql = mysqli_query($link, "TRUNCATE TABLE `address_temp`");
        if ($sql) {
            echo "<script>alert('Previous Records Deleted Successfully!!')</script>";
        } else {
            echo "<script>alert('Previous Records Deletion Failed!!')</script>";
        }
    }

    ?>


    <!-- Scripts -->

    <!-- Print Table -->
    <script type="text/javascript">
        function printDiv() {
            window.frames["print_frame"].document.body.innerHTML = "<p style='text-align:center;font-size:30px;font-family:'Times New Roman''>VISWATEJA HIGH SCHOOL</p>";
            window.frames["print_frame"].document.body.innerHTML += document.querySelector('.table-container').innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>

    <!-- Export Table to Excel -->
    <script type="text/javascript">
        $('#export').on('click', function() {
            filename = "Address_No_Wise"
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
    <!-- delete row -->
    <script type="text/javascript">
        $(".delete").click(function() {
            id = $(this).parent().siblings().eq(1).text();
            if (!confirm('Confirm to delete ' + id + '?')) {
                return;
            } else {
                $.ajax({
                    type: 'post',
                    url: 'delete_row.php',
                    data: {
                        Id_No: id
                    },
                    success: function(data) {
                        alert('Student Deleted Successfully!! Click Show Previous to get Updated Data!!')
                    }
                });
            }
        });
    </script>

</body>

</html>