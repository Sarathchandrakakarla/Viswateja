<?php
include '../../link.php';
session_start();
if (!$_SESSION['Admin_Id_No']) {
    echo "<script>
  alert('Admin Id Not Rendered');
  location.replace('../admin_login.php');
  </script>";
}
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Viswateja School</title>
    <link rel="shortcut icon" href="/Viswateja/Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/Viswateja/css/sidebar-style.css" />
    <link rel="stylesheet" href="/Viswateja/css/form-style.css" />
    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
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
    include '../sidebar.php';
    ?>

    <div class="container">

        <div class="content">
            <div class="title">Student Personal Details</div>
            <form action="" method="POST" onsubmit="if(!confirm('Confirm to Add Student Data?')){return false;}else{return true;}">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Id No. <span class="required">*</span></span>
                        <input type="text" placeholder="Enter Id No" id="id_no" name="Id_No" oninput="this.value = this.value.toUpperCase()" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Admission No.
                            <input type="text" placeholder="Enter Admission No" id="adm_no" name="Adm_No" />
                    </div>
                    <div class="input-box">
                        <span class="details">Full Name <span class="required">*</span></span>
                        <input type="text" placeholder="Enter Fullname" id="first_name" name="First_Name" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Surname <span class="required">*</span></span>
                        <input type="text" placeholder="Enter Surname" id="sur_name" name="Sur_Name" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Father Name <span class="required">*</span></span>
                        <input type="text" placeholder="Enter Father Name" id="father_name" name="Father_Name" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Mother Name <span class="required">*</span></span>
                        <input type="text" placeholder="Enter Mother Name" id="mother_name" name="Mother_Name" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Class <span class="required">*</span></span>
                        <select name="Stu_Class" id="class">
                            <option value="selectclass" selected disabled>--Select Class --</option>
                            <option value="PreKG">PreKG</option>
                            <option value="LKG">LKG</option>
                            <option value="UKG">UKG</option>
                            <?php
                            for ($i = 1; $i <= 10; $i++) {
                                echo "<option value='" . $i . " CLASS" . "'>" . $i . " CLASS" . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Section <span class="required">*</span></span>
                        <select name="Stu_Section" id="section">
                            <option value="selectsection" selected disabled>--Select Section --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="gender-details">
                        <span class="gender-title">Gender <span class="required">*</span></span>
                        <div class="category">
                            <input type="radio" id="boy" value="Boy" name="Gender" />
                            <span><label for="boy">Boy</label></span>
                            <input type="radio" id="girl" value="Girl" name="Gender" />
                            <span><label for="girl">Girl</label></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Date Of Birth <span class="required">*</span></span>
                        <input type="date" name="DOB" id="dob" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Mobile Number <span class="required">*</span></span>
                        <input type="text" minlength="10" id="mobile" placeholder="Enter Mobile No." name="Mobile" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Aadhar Number
                            <input type="text" placeholder="Enter Aadhar No." id="aadhar" maxlength="12" name="Aadhar" />
                    </div>
                </div>
                <div class="title">Student Address Details</div>
                <div class="user-details">
                    <div class="gender-details">
                        <span class="gender-title">Religion <span class="required">*</span></span>
                        <div class="category">
                            <input type="radio" id="hindu" value="Indian-Hindu" name="Religion" />
                            <span><label for="hindu">Indian-Hindu</label></span>
                            <input type="radio" id="islam" value="Indian-Islam" name="Religion" />
                            <span><label for="islam">Indian-islam</label></span>
                            <input type="radio" id="christian" value="Indian-Christian" name="Religion" />
                            <span><label for="christian">Indian-Christian</label></span>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Caste <span class="required">*</span></span>
                        <input type="text" placeholder="Enter Caste" name="Caste" id="caste" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Category <span class="required">*</span></span>
                        <select name="Category" id="category">
                            <option value="selectcategory" selected disabled>--Select Category--</option>
                            <option value="OC">OC</option>
                            <option value="BC">BC</option>
                            <option value="ST">ST</option>
                            <option value="SC">SC</option>
                            <option value="Mi">Mi</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">House No.
                            <input type="text" placeholder="Enter House No." id="house_no" name="House_No" />
                    </div>
                    <div class="input-box">
                        <span class="details">Street</span>
                        <input type="text" placeholder="Enter Area" name="Area" id="area" />
                    </div>
                    <div class="input-box">
                        <span class="details">Village/Town <span class="required">*</span></span>
                        <input type="text" placeholder="Enter Village" name="Village" id="village" required />
                    </div>
                </div>
                <div class="title">Other Details</div>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Date of Join <span class="required">*</span></span>
                        <input type="date" name="DOJ" id="doj" value="<?php if (isset($doj)) {
                                                                            echo '';
                                                                        } else {
                                                                            echo date("Y-m-d");
                                                                        } ?>" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Previous School</span>
                        <input type="text" placeholder="Enter Previous School" id="previous_school" name="Previous_School" />
                    </div>
                    <div class="input-box">
                        <span class="details">Van Route</span>
                        <select class="form-control" name="Van_Route" id="van_route">
                            <option value="NULL">-- Select Route --</option>
                            <?php
                            $van_sql = mysqli_query($link, "SELECT Van_Route FROM `van_route`");
                            while ($van_row = mysqli_fetch_assoc($van_sql)) {
                                echo '<option value="' . $van_row['Van_Route'] . '" >' . $van_row['Van_Route'] . '</option>';
                            }
                            ?>
                        </select>
                        <!--
            <input type="text" placeholder="Enter Van Route" id="van_route" name="Van_Route" />
            -->
                    </div>
                    <div class="input-box">
                        <span class="details">Referred By</span>
                        <input type="text" placeholder="Enter Referred By" id="referred_by" name="Referred_By" />
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="add" value="Insert" />
                    <input type="reset" value="Clear" />
                </div>
            </form>
        </div>
    </div>

    <?php
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_POST["add"])) {
        $id = validate($_POST['Id_No']);
        $admno = validate($_POST['Adm_No']);
        $firstname = validate($_POST['First_Name']);
        $surname = validate($_POST['Sur_Name']);
        $fathername = validate($_POST['Father_Name']);
        $mothername = validate($_POST['Mother_Name']);
        $dob = validate($_POST['DOB']);
        $mobile = validate($_POST['Mobile']);
        $aadhar = validate($_POST['Aadhar']);
        $caste = validate($_POST['Caste']);
        $houseno = validate($_POST['House_No']);
        $area = validate($_POST['Area']);
        $village = validate($_POST['Village']);
        $doj = validate($_POST['DOJ']);
        $previous_school = validate($_POST['Previous_School']);
        $route = validate($_POST['Van_Route']);
        $referred_by = validate($_POST['Referred_By']);

        echo "<script>document.getElementById('id_no').value = '" . $id . "'</script>";
        echo "<script>document.getElementById('adm_no').value = '" . $admno . "'</script>";
        echo "<script>document.getElementById('first_name').value = '" . $firstname . "'</script>";
        echo "<script>document.getElementById('sur_name').value = '" . $surname . "'</script>";
        echo "<script>document.getElementById('father_name').value = '" . $fathername . "'</script>";
        echo "<script>document.getElementById('mother_name').value = '" . $mothername . "'</script>";
        echo "<script>document.getElementById('dob').value = '" . $dob . "'</script>";
        echo "<script>document.getElementById('gender').value = '" . $gender . "'</script>";
        echo "<script>document.getElementById('mobile').value = '" . $mobile . "'</script>";
        echo "<script>document.getElementById('aadhar').value = '" . $aadhar . "'</script>";
        echo "<script>document.getElementById('religion').value = '" . $religion . "'</script>";
        echo "<script>document.getElementById('caste').value = '" . $caste . "'</script>";
        echo "<script>document.getElementById('house_no').value = '" . $houseno . "'</script>";
        echo "<script>document.getElementById('area').value = '" . $area . "'</script>";
        echo "<script>document.getElementById('village').value = '" . $village . "'</script>";
        echo "<script>document.getElementById('doj').value = '" . $doj . "'</script>";
        echo "<script>document.getElementById('previous_school').value = '" . $previous_school . "'</script>";
        echo "<script>document.getElementById('van_route').value = '" . $route . "'</script>";
        echo "<script>document.getElementById('referred_by').value = '" . $referred_by . "'</script>";

        if ($_POST['Stu_Class']) {
            $class = validate($_POST['Stu_Class']);
            echo "<script>document.getElementById('class').value = '" . $class . "'</script>";
            if ($_POST['Stu_Section']) {
                $section = validate($_POST['Stu_Section']);
                echo "<script>document.getElementById('section').value = '" . $section . "'</script>";
                if ($_POST['Gender']) {
                    $gender = validate($_POST['Gender']);
                    if ($gender == "Boy") {
                        echo "<script>document.getElementById('boy').checked = true;</script>";
                    } else if ($gender == "Girl") {
                        echo "<script>document.getElementById('girl').checked = true;</script>";
                    }
                    if ($_POST['Religion']) {
                        $religion = validate($_POST['Religion']);
                        if ($religion == "Indian-Hindu") {
                            echo "<script>document.getElementById('hindu').checked = true;</script>";
                        } else if ($religion == "Indian-Islam") {
                            echo "<script>document.getElementById('islam').checked = true;</script>";
                        } else if ($religion == "Indian-Christian") {
                            echo "<script>document.getElementById('christian').checked = true;</script>";
                        }
                        if ($_POST['Category']) {
                            $category = validate($_POST['Category']);
                            echo "<script>document.getElementById('category').value = '" . $category . "'</script>";

                            $d = explode('-', $dob);
                            $j = explode('-', $doj);
                            //Removing 20 from 2023
                            if (substr($j[0], 0, strlen("20")) == "20") {
                                $j[0] = substr($j[0], strlen("20"));
                            }
                            //Removing 19 from 1998
                            else if (substr($j[0], 0, strlen("19")) == "19") {
                                $j[0] = substr($j[0], strlen("19"));
                            }
                            $dob = $d[2] . "-" . $d[1] . "-" . $d[0];
                            $doj = $j[2] . "-" . $j[1] . "-" . $j[0];

                            if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM `student_master_data` WHERE Id_No = '$id'")) != 0) {
                                echo "<script>alert('Student with Id: " . $id . " Already Exists!!')</script>";
                            } else {
                                if ($route == "NULL") {
                                    $sql = mysqli_query($link, "INSERT INTO `student_master_data` VALUES('', '$id','$admno', '$firstname', '$surname', '$fathername', '$mothername',
            '$dob', '$gender', '$mobile', '$aadhar','$class','$section', '$religion', '$caste', '$category', '$houseno', '$area','$village',
             '$doj','$previous_school',NULL,'$referred_by',NULL)");
                                } else {
                                    $sql = mysqli_query($link, "INSERT INTO `student_master_data` VALUES('', '$id','$admno', '$firstname', '$surname', '$fathername', '$mothername',
            '$dob', '$gender', '$mobile', '$aadhar','$class','$section', '$religion', '$caste', '$category', '$houseno', '$area','$village',
             '$doj','$previous_school','$route','$referred_by',NULL)");
                                }
                                if ($sql) {
                                    echo
                                    "
		<script>
		alert('Student Inserted Successfully!');
        location.replace('');
		</script>
		";
                                } else {
                                    echo
                                    "
		<script>
		alert('Student Data Insertion Failed!');
		</script>
		";
                                }
                            }
                        } else {
                            echo "<script>alert('Please Select Category!')</script>";
                        }
                    } else {
                        echo "<script>alert('Please Select Religion!')</script>";
                    }
                } else {
                    echo "<script>alert('Please Select Gender!')</script>";
                }
            } else {
                echo "<script>alert('Please Select Section!')</script>";
            }
        } else {
            echo "<script>alert('Please Select Class!')</script>";
        }
    }
    ?>
</body>

</html>