<?php
session_start();
if (!$_SESSION['Admin_Id_No']) {
  echo "<script>
  alert('Admin Id Not Rendered');
  location.replace('../admin_login.php');
  </script>
  </script>";
}
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
    margin-left: 50px;
    border-radius: 10px;
  }

  @media screen and (max-width:576px) {
    .container {
      margin-left: 17%;
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

<body>
  <?php
  include '../sidebar.php';
  ?>
  <div class="container mt-4">
    <table class="table table-bordered table-hover">
      <tbody>
        <tr>
          <th class="bg-secondary text-light">Id No.</th>
          <td width="70%"><?php echo $_SESSION['Emp_Id_No']; ?></td>
          <td rowspan="4"><img src="/Victory/Images/emp_img/<?php echo $_SESSION['Emp_Id_No'] . ".jpg" ?>" alt="Employee Image" width="100px"></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">First Name</th>
          <td><?php echo $_SESSION['First_Name']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Surname</th>
          <td><?php echo $_SESSION['Sur_Name']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Father Name</th>
          <td colspan="3"><?php echo $_SESSION['Father_Name']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Qualification</th>
          <td colspan="3"><?php echo $_SESSION['Qualification']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Date of Birth</th>
          <td colspan="3"><?php echo $_SESSION['DOB']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Relation</th>
          <td colspan="3"><?php echo $_SESSION['Relation']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Mobile Number</th>
          <td colspan="3"><?php echo $_SESSION['Mobile']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Aadhar Number</th>
          <td colspan="3"><?php echo $_SESSION['Aadhar']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">House No.</th>
          <td colspan="3"><?php echo $_SESSION['House_No']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Area</th>
          <td colspan="3"><?php echo $_SESSION['Area']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Village/Town</th>
          <td colspan="3"><?php echo $_SESSION['Village']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Date of Join</th>
          <td colspan="3"><?php echo $_SESSION['DOJ']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Designation</th>
          <td colspan="3"><?php echo $_SESSION['Designation']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Salary</th>
          <td colspan="3"><?php echo $_SESSION['Salary']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">PF</th>
          <td colspan="3"><?php echo $_SESSION['PF']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Date of PF Commit</th>
          <td colspan="3"><?php echo $_SESSION['DOPF']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Working Status</th>
          <td colspan="3"><?php echo $_SESSION['Status']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Bank A/c No.</th>
          <td colspan="3"><?php echo $_SESSION['AC_No']; ?></td>
        </tr>
        <tr>
          <th class="bg-secondary text-light">Bank Name</th>
          <td colspan="3"><?php echo $_SESSION['Bank_Name']; ?></td>
        </tr>
      </tbody>
  </div>
  </div>
</body>

</html>