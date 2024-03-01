<?php
session_start();
if (!$_SESSION['Admin_Id_No']) {
  echo "<script>
  alert('Admin Id Not Rendered');
  location.replace('../admin_login.php');
  </script>
  </script>";
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
  <!-- Controlling Cache -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <!-- Boxiocns CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap Links -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
  
  table tbody tr td img {
    border-radius: 10px;
  }
  table{
    margin-left: 4%;
  }

  @media screen and (max-width:576px) {
    .container {
      margin-left: 17%;
    }
  }
  .bx-camera{
      font-size:25px;
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

<body>
  <?php
  include '../sidebar.php';
  ?>
  <div class="container mt-4">
    <table class="table table-bordered table-hover">
      <tbody>
        <tr>
          <th class="bg-secondary text-light">Id No.</th>
          <td width="100%"><?php echo $_SESSION['Stu_Id_No']; ?></td>
          <td rowspan="3" colspan="2" align="center"><img src="/Viswateja/Images/stu_img/<?php echo $_SESSION['Stu_Id_No'] . ".jpg" ?>" alt="Student Image" width="100px"></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Admission No.</th>
          <td><?php echo $_SESSION['Stu_Adm_No']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">First Name</th>
          <td><?php echo $_SESSION['First_Name']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Surname</th>
          <td><?php echo $_SESSION['Sur_Name']; ?></td>
          <td rowspan="3">
              <img src="/Viswateja/Images/parent_img_male/<?php echo $_SESSION['Stu_Id_No'] . ".jpg" ?>" alt="Father Image" width="100px">
              <!--
              <label for="f_photo" class="bx bx-camera"></label>
              <input type="file" accept="image/*" id="f_photo" capture="user" style="display:none;" />
              -->
          </td>
          <td rowspan="3"><img src="/Viswateja/Images/parent_img_female/<?php echo $_SESSION['Stu_Id_No'] . ".jpg" ?>" alt="Mother Image" width="100px"></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Father Name</th>
          <td><?php echo $_SESSION['Father_Name']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Mother Name</th>
          <td><?php echo $_SESSION['Mother_Name']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Class</th>
          <td colspan="5"><?php echo $_SESSION['Stu_Class']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Section</th>
          <td colspan="5"><?php echo $_SESSION['Stu_Section']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Date of Birth</th>
          <td colspan="5"><?php echo $_SESSION['DOB']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Gender</th>
          <td colspan="5"><?php echo $_SESSION['Gender']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Mobile Number</th>
          <td colspan="5"><?php echo $_SESSION['Mobile']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Aadhar Number</th>
          <td colspan="5"><?php echo $_SESSION['Aadhar']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Religion</th>
          <td colspan="5"><?php echo $_SESSION['Religion']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Caste</th>
          <td colspan="5"><?php echo $_SESSION['Caste']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Category</th>
          <td colspan="5"><?php echo $_SESSION['Category']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">House No.</th>
          <td colspan="5"><?php echo $_SESSION['House_No']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Area</th>
          <td colspan="5"><?php echo $_SESSION['Area']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Village/Town</th>
          <td colspan="5"><?php echo $_SESSION['Village']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Date of Join</th>
          <td colspan="5"><?php echo $_SESSION['DOJ']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Previous School</th>
          <td colspan="5"><?php echo $_SESSION['Previous_School']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Van Route</th>
          <td colspan="5"><?php echo $_SESSION['Van_Route']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Referred By</th>
          <td colspan="5"><?php echo $_SESSION['Referred_By']; ?></td>
        </tr>
        <?php
        if ($_SESSION['Siblings'] != "" && $_SESSION['Siblings'] != NULL) {
          $siblings = explode(',', $_SESSION['Siblings']);
          echo '
          <tr>
            <th class="bg-secondary text-light p-4" rowspan="' . count($siblings) + 1 . '" style="text-align: center;">Siblings</th>
          </tr> 
          ';
          foreach ($siblings as $sibling) {
            $query1 = mysqli_query($link, "SELECT First_Name,Stu_Class,Stu_Section FROM `student_master_data` WHERE Id_No = '$sibling'");
            while ($row1 = mysqli_fetch_assoc($query1)) {
              echo '
            <tr>
              <td colspan="5">' . $sibling . ' , ' . $row1['First_Name'] . ' , ' . $row1['Stu_Class'] . ' ' . $row1['Stu_Section'] . '</td>
            </tr>
            ';
            }
          }
        } else {
          echo '
          <tr>
            <th class="bg-secondary text-light">Siblings</th>
            <td colspan="5">No Siblings</td>
          </tr>
          ';
        }
        ?>
      </tbody>
  </div>
  </div>

</body>

</html>