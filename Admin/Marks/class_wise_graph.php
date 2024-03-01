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

  <!-- Graph CDN -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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
        <div class="p-2 col-lg-4 rounded">
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
    </div>
    <div class="container">
      <div class="row justify-content-center mt-4">
        <div class="col-lg-4">
          <button class="btn btn-primary" type="submit" name="show">Show</button>
          <button class="btn btn-warning" type="reset" onclick="hideTable()">Clear</button>
          <button class="btn btn-success" onclick="printDiv();return false;">Print</button>
        </div>
      </div>
    </div>
  </form>
  <div class="container">
    <div class="row justify-content-center mt-4">
      <div class="col-lg-5">
        <h3><b>Class Wise Marks Graph</b></h3>
      </div>
    </div>
  </div>
  <div class="container table-container" id="table-container">
    <?php
    if (isset($_POST['show'])) {
      if ($_POST['Class']) {
        $class = $_POST['Class'];
        echo "<script>document.getElementById('class').value='$class';</script>";
        if ($_POST['Section']) {
          $section = $_POST['Section'];
          echo "<script>document.getElementById('sec').value='$section';</script>";

          //Arrays
          $ids = array();
          $names = array();
          $exams = array();
          $totals = array();

          //Queries
          $query1 = mysqli_query($link, "SELECT Id_No,First_Name FROM `student_master_data` WHERE Stu_Class = '$class' AND Stu_Section = '$section'");
          $query2 = mysqli_query($link, "SELECT Exam FROM `class_wise_examination` WHERE Class = '$class'");

          if (mysqli_num_rows($query1) == 0) {
            echo "<script>alert('Invalid Class or Section!')</script>";
          } else {
            //Getting Id Nos and First Names
            while ($row1 = mysqli_fetch_assoc($query1)) {
              array_push($ids, $row1['Id_No']);
              $names[$row1['Id_No']] = $row1['First_Name'];
            }

            //Getting Exams of that Class
            while ($row2 = mysqli_fetch_assoc($query2)) {
              array_push($exams, $row2['Exam']);
            }

            //Getting Totals of each Student for each Exam
            foreach ($ids as $id) {
              $temp = array();
              foreach ($exams as $exam) {
                $query3 = mysqli_query($link, "SELECT Total FROM `stu_marks` WHERE Id_No = '$id' AND Exam = '$exam'");
                while ($row3 = mysqli_fetch_assoc($query3)) {
                  $temp[$exam] = $row3['Total'];
                }
              }
              $totals[$id] = $temp;
            }

            //Designing a Vertical Bar Graph
            foreach ($ids as $id) {

              echo '
              <div id="marks_chart_' . $id . '" style="margin-bottom:13%;height: 250px;">
                <p style="text-align:center;">' . $names[$id] . '  (' . $id . ')</p>
              </div>';
              echo "
            <script>
            function Graph() {
              new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'marks_chart_" . $id . "',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                  ";
              foreach ($exams as $exam) {
                echo "{ Exam:'" . $exam . "', Total:" . $totals[$id][$exam] . "},";
              }
              echo "
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'Exam',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['Total'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Total'],
                title: ['Marks'],
              });
            }
            Graph();
            </script>
            ";
            }
          }
        } else {
          echo "<script>alert('Please Select Section!')</script>";
        }
      } else {
        echo "<script>alert('Please Select Class!')</script>";
      }
    }
    ?>
  </div>
  <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>


  <!-- Scripts -->

  <!-- Print Table -->
  <script type="text/javascript">
    function printDiv() {
      window.frames["print_frame"].document.body.innerHTML += document.querySelector('.table-container').innerHTML;
      window.frames["print_frame"].window.focus();
      window.frames["print_frame"].window.print();
    }
  </script>
</body>

</html>