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
<?php
include '../../link.php';
function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//For Show
if (isset($_POST['show'])) {
  if ($_POST['show_id']) {
    $id = validate($_POST['show_id']);

    $sql = "SELECT * FROM student_master_data WHERE Id_No = '$id'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $stu_id = $row['Id_No'];
      $stu_adm = $row['Adm_No'];
      $firstname = $row['First_Name'];
      $surname = $row['Sur_Name'];
      $fathername = $row['Father_Name'];
      $mothername = $row['Mother_Name'];
      $dob = $row['DOB'];
      $gender = $row['Gender'];
      $mobile = $row['Mobile'];
      $aadhar = $row['Aadhar'];
      $class = $row['Stu_Class'];
      $section = $row['Stu_Section'];
      $religion = $row['Religion'];
      $caste = $row['Caste'];
      $category = $row['Category'];
      $houseno = $row['House_No'];
      $area = $row['Area'];
      $village = $row['Village'];
      $doj = $row['DOJ'];
      $previous = $row['Previous_School'];
      $van = $row['Van_Route'];
      $refer = $row['Referred_By'];
      $siblings = $row['Siblings'];
      $_SESSION['Stu_Id_No'] = $stu_id;
      $_SESSION['Stu_Adm_No'] = $stu_adm;
      $_SESSION['First_Name'] = $firstname;
      $_SESSION['Sur_Name'] = $surname;
      $_SESSION['Father_Name'] = $fathername;
      $_SESSION['Mother_Name'] = $mothername;
      $_SESSION['DOB'] = $dob;
      $_SESSION['Gender'] = $gender;
      $_SESSION['Mobile'] = $mobile;
      $_SESSION['Aadhar'] = $aadhar;
      $_SESSION['Stu_Class'] = $class;
      $_SESSION['Stu_Section'] = $section;
      $_SESSION['Religion'] = $religion;
      $_SESSION['Caste'] = $caste;
      $_SESSION['Category'] = $category;
      $_SESSION['House_No'] = $houseno;
      $_SESSION['Area'] = $area;
      $_SESSION['Village'] = $village;
      $_SESSION['DOJ'] = $doj;
      $_SESSION['Previous_School'] = $previous;
      $_SESSION['Van_Route'] = $van;
      $_SESSION['Referred_By'] = $refer;
      $_SESSION['Siblings'] = $siblings;
      //echo "<script>window.open('show_student_details.php','_blank')</script>";
      header('Location: show_student_details.php');
    } else {
      echo "<script>alert('Incorrect ID');</script>";
    }
  } else {
    echo "<script>alert('Please Enter Id');</script>";
  }
}

// For Update
if (isset($_POST['update'])) {
  if ($_POST['show_id']) {
    $id = validate($_POST['show_id']);

    $sql = "SELECT * FROM student_master_data WHERE Id_No = '$id'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $stu_id = $row['Id_No'];
      $stu_adm = $row['Adm_No'];
      $firstname = $row['First_Name'];
      $surname = $row['Sur_Name'];
      $fathername = $row['Father_Name'];
      $mothername = $row['Mother_Name'];
      $dob = $row['DOB'];
      $gender = $row['Gender'];
      $mobile = $row['Mobile'];
      $aadhar = $row['Aadhar'];
      $class = $row['Stu_Class'];
      $section = $row['Stu_Section'];
      $religion = $row['Religion'];
      $caste = $row['Caste'];
      $category = $row['Category'];
      $houseno = $row['House_No'];
      $area = $row['Area'];
      $village = $row['Village'];
      $doj = $row['DOJ'];
      $previous = $row['Previous_School'];
      $van = $row['Van_Route'];
      $refer = $row['Referred_By'];
      $siblings = $row['Siblings'];
      $siblings_status = ($siblings != "" || $siblings != NULL) ? 'Yes':'No';
      $_SESSION['Stu_Id_No'] = $stu_id;
      $_SESSION['Stu_Adm_No'] = $stu_adm;
      $_SESSION['First_Name'] = $firstname;
      $_SESSION['Sur_Name'] = $surname;
      $_SESSION['Father_Name'] = $fathername;
      $_SESSION['Mother_Name'] = $mothername;
      $_SESSION['DOB'] = $dob;
      $_SESSION['Gender'] = $gender;
      $_SESSION['Mobile'] = $mobile;
      $_SESSION['Aadhar'] = $aadhar;
      $_SESSION['Stu_Class'] = $class;
      $_SESSION['Stu_Section'] = $section;
      $_SESSION['Religion'] = $religion;
      $_SESSION['Caste'] = $caste;
      $_SESSION['Category'] = $category;
      $_SESSION['House_No'] = $houseno;
      $_SESSION['Area'] = $area;
      $_SESSION['Village'] = $village;
      $_SESSION['DOJ'] = $doj;
      $_SESSION['Previous_School'] = $previous;
      $_SESSION['Van_Route'] = $van;
      $_SESSION['Referred_By'] = $refer;
      $_SESSION['Siblings'] = $siblings;
      $_SESSION['Sibling_Status'] = $siblings_status;
      //echo "<script>window.open('update_student.php','_blank')</script>";
      header('Location: update_student.php');
    } else {
      echo "<script>alert('Incorrect ID');</script>";
    }
  } else {
    echo "<script>alert('Please Enter Id');</script>";
  }
}

//For Delete
if (isset($_POST['delete'])) {
  if ($_POST['show_id']) {
    $id = validate($_POST['show_id']);
    $sql_search = "SELECT * FROM `student_master_data` WHERE Id_No = '$id'";
    $result = mysqli_query($link, $sql_search);
    if (mysqli_num_rows($result) == 0) {
      echo "<script>alert('Student ID is Not Available in Student Database');</script>";
    } else {
      $sql = "DELETE FROM `student_master_data` WHERE Id_No = '$id'";

      if (mysqli_query($link, $sql)) {
        echo "<script>alert('Student Details Deleted Successfully!Please Delete the student login also!');</script>";
      } else {
        echo "<script>alert('Deletion Failed (SQL Error)');</script>";
      }
    }
  }
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
  @media screen and (max-width:576px) {
    .container {
      width: 70%;
    }

    .card {
      width: 50%;
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
  <div class="container col-lg-4 mt-5">
    <div class="card bg-secondary p-3" style="width: 25rem;">
      <div class="card-title text-light">
        <h4>Show/Modify Student Details</h4>
      </div>
      <div class="card-body">
        <form action="" method="post" id="form">
          <input type="text" class="form-control" id="id" name="show_id" value="<?php if (isset($id)) {
                                                                                  echo $id;
                                                                                } else {
                                                                                  echo "";
                                                                                } ?>" placeholder="Student Id No." oninput="this.value = this.value.toUpperCase()" required>
          <div class="buttons mt-3">
            <button class="btn btn-primary" type="submit" name="show">Show</button>
            <button class="btn btn-warning" type="submit" name="update">Modify</button>
            <button class="btn btn-danger" type="submit" name="delete" onclick="if(!confirm('Confirm to Delete Student Data?')){return false;}else{return true;}">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>