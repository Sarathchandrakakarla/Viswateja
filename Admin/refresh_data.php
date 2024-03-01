<?php
session_start();
if (!$_SESSION['Admin_Id_No']) {
  echo "<script>
  alert('Admin Id Not Rendered');
  location.replace('admin_login.php');
  </script>
  </script>";
}
?>
<?php
$link = mysqli_connect("localhost", "root", "", "viswateja");
if ($link === false) {
  echo "<script>alert('Could not Connect to Database!')
    location.replace('../index.html')</script>";
  //die("ERROR: Could not connect. " . mysqli_connect_error());
}
/*
if (isset($_POST['Save'])) {
  if ($_SESSION['Role'] != "Super_Admin") {
    echo "<script>alert('Only Super Admin can Save Fee Balances!!')</script>";
  } else {
    $balance_status = false;
    $van_balance_status = false;

    //Function for Updating School Balances
    function set_balance($link)
    {
      global $balance_status;
      //Arrays
      $classes = array(
        '10 CLASS', '9 CLASS', '8 CLASS', '7 CLASS', '6 CLASS', '5 CLASS', '4 CLASS', '3 CLASS', '2 CLASS', '1 CLASS',
        'UKG', 'LKG', 'PreKG'
      );
      $ids = array();
      $paid = array();
      $total = array();
      $balance = array();


      //Queries
      foreach ($classes as $class) {
        $query2 = mysqli_query($link, "SELECT Id_No FROM `student_master_data` WHERE Stu_Class = '$class'");
        $temp = array();
        while ($row2 = mysqli_fetch_assoc($query2)) {
          array_push($temp, $row2['Id_No']);
        }
        $ids[$class] = $temp;
      }

      //Fetching Paid and Total Data of each Student
      foreach (array_keys($ids) as $class) {
        foreach ($ids[$class] as $id) {
          $query3 = mysqli_query($link, "SELECT Fee FROM `stu_paid_fee` WHERE Id_No = '$id' AND Type = 'School Fee'");
          $query4 = mysqli_query($link, "SELECT Last_Balance,Current_Balance FROM `stu_fee_master_data` WHERE Id_No = '$id' AND Type = 'School Fee'");
          if (mysqli_num_rows($query3) == 0) {
            $paid[$id] = 0;
          } else {
            $sum = 0;
            while ($row3 = mysqli_fetch_assoc($query3)) {
              $sum += (int)$row3['Fee'];
            }
            $paid[$id] = $sum;
          }

          if (mysqli_num_rows($query4) == 0) {
            continue;
          } else {
            while ($row4 = mysqli_fetch_assoc($query4)) {
              $total[$id] = (int)$row4['Last_Balance'] + (int)$row4['Current_Balance'];
            }
          }
        }
      }

      //Calculating Balances of Each Student

      foreach (array_keys($ids) as $class) {
        foreach ($ids[$class] as $id) {
          if (!array_key_exists($id, $paid) || !array_key_exists($id, $total)) {
            if (!array_key_exists($id, $total)) {
              continue;
            }
            if (!array_key_exists($id, $paid)) {
              $balance[$id] = (int)$total[$id];
            }
          } else {
            $balance[$id] = (int)$total[$id] - (int)$paid[$id];
          }
        }
      }

      //Update Balances in stu_fee_master_data
      foreach (array_keys($balance) as $id) {
        if (mysqli_num_rows(mysqli_query($link, "SELECT First_Name FROM `stu_fee_master_data` WHERE Id_No = '$id' AND Type = 'School Fee'")) == 0) {
          continue;
        } else {
          $query5 = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Last_Balance = '$balance[$id]' WHERE Id_No = '$id' AND Type = 'School Fee'");
          if ($query5) {
            $balance_status = true;
          } else {
            $balance_status = false;
            echo '<script>alert("Fee Updation Interrupted due to Query Error!!")</script>';
            break;
          }
        }
      }
    }

    //Function for Updating Van Balances
    function set_van_balance($link)
    {
      global $van_balance_status;
      //Arrays
      $routes = array();
      $ids = array();
      $paid = array();
      $total = array();
      $balance = array();


      //Queries

      //Getting Routes
      $route_query = mysqli_query($link, "SELECT Van_Route FROM `van_route`");
      while ($route_row = mysqli_fetch_assoc($route_query)) {
        array_push($routes, $route_row['Van_Route']);
      }

      foreach ($routes as $route) {
        $query2 = mysqli_query($link, "SELECT Id_No FROM `stu_fee_master_data` WHERE Route = '$route'");
        $temp = array();
        while ($row2 = mysqli_fetch_assoc($query2)) {
          array_push($temp, $row2['Id_No']);
        }
        $ids[$route] = $temp;
      }

      //Fetching Paid and Total Data of each Student
      foreach (array_keys($ids) as $route) {
        foreach ($ids[$route] as $id) {
          $query3 = mysqli_query($link, "SELECT Fee FROM `stu_paid_fee` WHERE Id_No = '$id' AND Type = 'Vehicle Fee'");
          $query4 = mysqli_query($link, "SELECT Last_Balance,Current_Balance FROM `stu_fee_master_data` WHERE Id_No = '$id' AND Type = 'Vehicle Fee'");
          if (mysqli_num_rows($query3) == 0) {
            $paid[$id] = 0;
          } else {
            $sum = 0;
            while ($row3 = mysqli_fetch_assoc($query3)) {
              $sum += (int)$row3['Fee'];
            }
            $paid[$id] = $sum;
          }
          if (mysqli_num_rows($query4) == 0) {
            continue;
          } else {
            while ($row4 = mysqli_fetch_assoc($query4)) {
              $total[$id] = (int)$row4['Last_Balance'] + (int)$row4['Current_Balance'];
            }
          }
        }
      }

      //Calculating Balances of Each Student

      foreach (array_keys($ids) as $route) {
        foreach ($ids[$route] as $id) {
          if (!array_key_exists($id, $paid) || !array_key_exists($id, $total)) {
            if (!array_key_exists($id, $total)) {
              continue;
            }
            if (!array_key_exists($id, $paid)) {
              $balance[$id] = (int)$total[$id];
            }
          } else {
            $balance[$id] = (int)$total[$id] - (int)$paid[$id];
          }
        }
      }
      //Update Balances in stu_fee_master_data
      foreach (array_keys($balance) as $id) {
        if (mysqli_num_rows(mysqli_query($link, "SELECT First_Name FROM `stu_fee_master_data` WHERE Id_No = '$id' AND Type = 'Vehicle Fee'")) == 0) {
          continue;
        } else {
          $query5 = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Last_Balance = '$balance[$id]' WHERE Id_No = '$id' AND Type = 'Vehicle Fee'");
          if ($query5) {
            $van_balance_status = true;
          } else {
            $van_balance_status = false;
            echo '<script>alert("Fee Updation Interrupted due to Query Error!!")</script>';
            break;
          }
        }
      }
    }

    /*

    set_balance($link);
    set_van_balance($link);

    if ($balance_status || $van_balance_status) {
      if ($balance_status) {
        echo "<script>alert('All School Fee Balances Updated!!')</script>";
      }
      if ($van_balance_status) {
        echo "<script>alert('All Vehicle Fee Balances Updated!!')</script>";
      }
      $save_status = true;
    } else {
      $save_status = false;
    }
  }
}
*/

if (isset($_POST['Refresh'])) {
  if ($_SESSION['Role'] != "Super_Admin") {
    echo "<script>alert('Only Super Admin can Refresh Data!!')</script>";
  } else {
    $refresh_status = false;
    $table_status = false;

    function truncate($link)
    {
      global $table_status, $refresh_status;
      $year = date('y');
      //Arrays
      $tables = array("stu_paid_fee", "stu_marks", "commit_date", "tran_details", "attendance_daily", "stu_att_master", "working_days", "holidays","address_temp","employee_attendance");
      $ids = array();
      //Queries
      foreach ($tables as $table) {
        $query1 = mysqli_query($link, "TRUNCATE TABLE `$table`");
        if ($query1) {
          $table_status = true;
          echo '<script>alert("' . $table . '\'s Data Cleared!!")</script>';
        } else {
          $table_status = false;
          echo '<script>alert("Table Data Deletion Failed about ' . $table . '!!")</script>';
          break;
        }
      }
      $query2 = mysqli_query($link, "SELECT Id_No FROM `student_master_data` WHERE Stu_Class = 'OthersPassedout-$year' OR Stu_Class = '%DROP%' OR Stu_Class = '%Drop%' OR Stu_Class = '%drop%'");
      while ($row2 = mysqli_fetch_assoc($query2)) {
        array_push($ids, $row2['Id_No']);
      }
      $login_status = false;
      foreach ($ids as $id) {
        if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM `student` WHERE Id_No = '$id'")) == 0) {
          continue;
        } else {
          $login_sql = mysqli_query($link, "DELETE FROM `student` WHERE Id_No = '$id'");
          if (!$login_sql) {
            echo '<script>alert("Login Deletion Failed about ' . $id . '!!")</script>';
            $login_status = false;
            break;
          } else {
            $login_status = true;
          }
        }
      }
      if ($login_status) {
        echo '<script>alert("Login Deletion for Passedout and Dropped Students Deleted!!")</script>';
      }
    }
    truncate($link);
    if ($table_status) {
      echo "<script>alert('All Tables Cleared!!')</script>";
      $refresh_status = true;
    } else {
      $refresh_status = false;
    }
  }
}

if (isset($_POST['Promotion'])) {
  if ($_SESSION['Role'] != "Super_Admin") {
    echo "<script>alert('Only Super Admin can Refresh Data!!')</script>";
  } else {
    $promotion_status = false;
    /*
    $actual_status = false;
    $van_actual_status = false;
    $table_status = false;
    */

    //Function for Promoting Classes
    function promotion($link)
    {
      global $promotion_status;
      //Arrays
      $classes = array(
        '10 CLASS', '9 CLASS', '8 CLASS', '7 CLASS', '6 CLASS', '5 CLASS', '4 CLASS', '3 CLASS', '2 CLASS', '1 CLASS',
        'UKG', 'LKG', 'PreKG'
      );
      $ids = array();

      //Queries

      //Getting Id Nos for each class
      foreach ($classes as $class) {
        $query1 = mysqli_query($link, "SELECT Id_No FROM `student_master_data` WHERE Stu_Class = '$class'");
        $temp = array();
        while ($row1 = mysqli_fetch_assoc($query1)) {
          array_push($temp, $row1['Id_No']);
        }
        $ids[$class] = $temp;
      }

      //Promoting Classes
      $year = date('y');
      $i = 9;
      foreach (array_keys($ids) as $class) {
        if ($class == "10 CLASS") {
          foreach ($ids[$class] as $id) {
            $sql = mysqli_query($link, "UPDATE `student_master_data` SET Stu_Class = 'OthersPassedout-$year', Stu_Section = '' WHERE Id_No = '$id'");
            /*
            $sql1 = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Class = 'OthersPassedout-$year', Section = '' WHERE Id_No = '$id'");
            if ($sql && $sql1) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
            */
            if ($sql) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
          }
        } else if ($class == $i . " CLASS") {
          foreach ($ids[$class] as $id) {
            $sql = mysqli_query($link, "UPDATE `student_master_data` SET Stu_Class = '" . ($i + 1) . " CLASS' WHERE Id_No = '$id'");
            /*
            $sql1 = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Class = '" . ($i + 1) . " CLASS' WHERE Id_No = '$id'");
            if ($sql && $sql1) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
            */
            if ($sql) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
          }
          $i--;
        } else if ($class == "UKG") {
          foreach ($ids[$class] as $id) {
            $sql = mysqli_query($link, "UPDATE `student_master_data` SET Stu_Class = '1 CLASS' WHERE Id_No = '$id'");
            /*
            $sql1 = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Class = '1 CLASS' WHERE Id_No = '$id'");
            if ($sql && $sql1) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
            */
            if ($sql) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
          }
        } else if ($class == "LKG") {
          foreach ($ids[$class] as $id) {
            $sql = mysqli_query($link, "UPDATE `student_master_data` SET Stu_Class = 'UKG' WHERE Id_No = '$id'");
            /*
            $sql1 = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Class = 'UKG' WHERE Id_No = '$id'");
            if ($sql && $sql1) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
            */
            if ($sql) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
          }
        } else if ($class == "PreKG") {
          foreach ($ids[$class] as $id) {
            $sql = mysqli_query($link, "UPDATE `student_master_data` SET Stu_Class = 'LKG' WHERE Id_No = '$id'");
            /*
            $sql1 = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Class = 'LKG' WHERE Id_No = '$id'");
            if ($sql && $sql1) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
            */
            if ($sql) {
              $promotion_status = true;
            } else {
              break 2;
              echo '<script>alert("' . $class . ' Promotion Updation Failed!!")</script>';
              $promotion_status = false;
            }
          }
        }
      }
    }

    /*
    //Function for Updating Actual School Fee, Current School Balance and School Total
    function set_actual($link)
    {
      global $actual_status;
      //Arrays
      $classes = array(
        '10 CLASS', '9 CLASS', '8 CLASS', '7 CLASS', '6 CLASS', '5 CLASS', '4 CLASS', '3 CLASS', '2 CLASS', '1 CLASS',
        'UKG', 'LKG', 'PreKG'
      );
      $actual = array();

      //Deleting 10 CLASS Students from stu_fee_master_data
      $delete_query = mysqli_query($link, "DELETE FROM `stu_fee_master_data` WHERE Class LIKE '%Others%' OR Class LIKE '%DROP%'");
      if ($delete_query) {
        echo "<script>alert('Passedout students and DROPPED students Deleted from stu_fee_master_data!!')</script>";
      } else {
        echo "<script>alert('Passedout students and DROPPED students Deletion from stu_fee_master_data Failed!')</script>";
      }

      //Getting actual Fees of each class
      foreach ($classes as $class) {
        $actual_query = mysqli_query($link, "SELECT Fee FROM `actual_fee` WHERE Class = '$class' AND Type = 'School Fee'");
        while ($row = mysqli_fetch_assoc($actual_query)) {
          $actual[$class] = $row['Fee'];
        }
      }

      //Updating Actual Fee and Current Balance in stu_fee_master_data
      foreach ($classes as $class) {
        $sql = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Actual = '$actual[$class]',Current_Balance = '$actual[$class]' WHERE Class = '$class'");
        $sql1 = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Total = Last_Balance + Current_Balance WHERE Class = '$class'");
        if ($sql && $sql1) {
          $actual_status = true;
        } else {
          $actual_status = false;
          echo "<script>alert('Actual Fees or Total Updation Interrupted about " . $class . "')</script>";
          break;
        }
      }
    }
    */

    /*
    //Function for Updating Actual School Fee, Current School Balance and School Total
    function set_van_actual($link)
    {
      global $actual_van_status;
      //Arrays
      $routes = array();
      $actual = array();

      //Getting Routes
      $route_query = mysqli_query($link, "SELECT Van_Route FROM `van_route`");
      while ($route_row = mysqli_fetch_assoc($route_query)) {
        array_push($routes, $route_row['Van_Route']);
      }

      //Getting actual Fees of each Route
      foreach ($routes as $route) {
        $actual_query = mysqli_query($link, "SELECT Fee FROM `actual_fee` WHERE Route = '$route' AND Type = 'Vehicle Fee'");
        while ($row = mysqli_fetch_assoc($actual_query)) {
          $actual[$route] = $row['Fee'];
        }
      }

      //Updating Actual Fee and Current Balance in stu_fee_master_data
      foreach ($routes as $route) {
        if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM `stu_fee_master_data` WHERE Route = '$route'")) == 0) {
          continue;
        } else {
          $sql = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Actual = '$actual[$route]',Current_Balance = '$actual[$route]' WHERE Route = '$route'");
          $sql1 = mysqli_query($link, "UPDATE `stu_fee_master_data` SET Total = Last_Balance + Current_Balance WHERE Route = '$route'");
          if ($sql && $sql1) {
            $actual_van_status = true;
          } else {
            $actual_van_status = false;
            echo "<script>alert('Actual Fees or Total Updation Interrupted about " . $route . "')</script>";
            break;
          }
        }
      }
    }
    */

    promotion($link);
    //set_actual($link);
    //set_van_actual($link);

    /*
    if ($promotion_status || $balance_status || $van_balance_status || $actual_status) {
      if ($promotion_status) {
        echo "<script>alert('All Classes Promoted!!')</script>";
      }
      if ($actual_status) {
        echo "<script>alert('Actual Fee, Current Balance and Total for School Fee Updated!!')</script>";
      }
      if ($actual_van_status) {
        echo "<script>alert('Actual Fee, Current Balance and Total for Vehicle Fee Updated!!')</script>";
      }
      $class_fee_status = true;
    } else {
      $class_fee_status = false;
    }
    */
    if ($promotion_status) {
      echo "<script>alert('All Classes Promoted!!')</script>";
      $class_fee_status = true;
    } else {
      $class_fee_status = false;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Viswateja School</title>
  <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/sidebar-style.css" />
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
  include 'sidebar.php';
  ?>
  <div class="container" style="margin-top: 150px;">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-7">
        <label for="" style="color:red;font-size:large">
          <strong>Disclaimer :
            <ol>
              <li>CAUTION: Please Use this Page at the <u>End of Academic Year</u> Only!!</li>
              <li>NOTE: First, Class Promotion and Next Refresh Data</li>
              <!--
              <li>NOTE: Please Ensure that <u>New Actual Fees</u> Updated before Class Promotion</li>
              <li>NOTE: Please <u>Save Fee Balances</u> before Class Promotion & Refresh Data</li>
              -->
              <li>Please <u>Don't Refresh or Close</u> while processing</li>
              <li>An Alert will Display after Processing</li>
            </ol>
          </strong>
        </label>
      </div>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4">
        <form action="" method="post">
          <!--<button class="btn btn-primary" type="submit" name="Save" onclick="if(!confirm('Confirm to Save Fee Balances?')){return false;}else{return true;}">Save Fee Balances</button>-->
          <button class="btn btn-warning" type="submit" name="Promotion" style="margin-left:50px;" onclick="if(!confirm('Confirm to Class Promotion?')){return false;}else{return true;}">Class Promotion <!-- & Update New Actual Fee --></button>
          <button class="btn btn-success" type="submit" name="Refresh" style="margin-left:50px;" onclick="if(!confirm('Confirm to Refresh Data?')){return false;}else{return true;}">Refresh Data</button>
        </form>
      </div>
    </div>
    <!--
    <?php /*if (isset($save_status) && $save_status) { ?>
      <div class="row justify-content-center mt-4 alert-row">
        <div class="col-lg-4">
          <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            <div>
              Fee Balances Saved Successfully!!
            </div>
          </div>
        </div>
      </div>
    <?php }*/ ?>
    -->
    <?php if (isset($class_fee_status) && $class_fee_status) { ?>
      <div class="row justify-content-center mt-4 alert-row">
        <div class="col-lg-4">
          <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            <div>
              Classes Promoted and New Actual Fees Updated Successfully!!
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if (isset($refresh_status) && $refresh_status) { ?>
      <div class="row justify-content-center mt-4 alert-row">
        <div class="col-lg-4">
          <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            <div>
              Data Refreshed Successfully!!
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</body>

</html>