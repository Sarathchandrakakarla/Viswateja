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

    <!-- Excel Links -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

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
        max-width: 700px;
        max-height: 500px;
        overflow-x: scroll;
    }

    #section {
        text-align: center;
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
    <form action="" method="post">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
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
        </div>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-4">
                    <button class="btn btn-primary print" type="submit" name="show">Show</button>
                    <button class="btn btn-warning">Clear</button>
                    <button class="btn btn-warning print" onclick="printDiv();return false;">Print</button>
                    <button class="btn btn-success" onclick="return false;" id="export">Export To Excel</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-5">
                <h3><b>Actual Fee Details Report</b></h3>
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
                <td id="fee_label" style="font-size:20px;"></td>
            </tr>
        </table>
        <table class="table table-striped table-hover" border="1" style="width: 100%;">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>S.No</th>
                    <th>Class/Route</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <tr>
                    <?php
                    if (isset($_POST['show'])) {
                        $type = $_POST['Type'];
                        echo "<script>document.getElementById('type').value = '" . $type . "';</script>";
                        if ($type == "") {
                            echo "<script>alert('Please Select Fee Type')</script>";
                        } else {
                            echo "<script>document.getElementById('fee_label').innerHTML = '" . $type . "'</script>";
                            $sql = "SELECT * FROM `actual_fee` WHERE Type = '$type' ORDER BY S_No";
                            $result = mysqli_query($link, $sql);
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                        <td style="padding:5px;">' . $i . '</td>';
                        if($type == "Vehicle Fee"){
                            echo '<td style="padding:5px;">' . $row['Route'] . '</td>';
                        }
                        else{
                            echo '<td style="padding:5px;">' . $row['Class'] . '</td>';
                        }
                        echo '<td style="padding:5px;">' . $row['Fee'] . '</td>
                        </tr>';
                                $i++;
                            }
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
            window.frames["print_frame"].document.body.innerHTML = "<h2 style = 'text-align:center;'>VISWATEJA HIGH SCHOOL</h2>";
            window.frames["print_frame"].document.body.innerHTML += "<h2 style = 'text-align:center;'>Actual Fee Details</h2>";
            window.frames["print_frame"].document.body.innerHTML += "<div class = 'container'><table style='margin-bottom:10px;'><tr><td style='font-size:15px;'>Type of Fee:</td><td style='font-size:15px;'><?php echo $type; ?></td></tr><br></table></div>";
            window.frames["print_frame"].document.body.innerHTML += document.querySelector('.table-container').innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>

    <!-- Export Table to Excel -->
    <script type="text/javascript">
        $('#export').on('click', function() {
            type = '<?php echo $type; ?>';
            filename = type;
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById('table-container');
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
</body>

</html>