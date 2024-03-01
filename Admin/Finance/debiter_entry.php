<?php
session_start();
if (!$_SESSION['Admin_Id_No']) {
    echo "<script>
  alert('Admin Id Not Rendered');
  location.replace('../admin_login.php');
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
if (isset($_POST["add"])) {
    $ac = $_POST['AC_No'];
    $name = $_POST['Name'];
    if ($_POST['Address']) {
        $address = $_POST['Address'];
    } else {
        $address = 0;
    }
    if ($_POST['Mobile']) {
        $mobile = $_POST['Mobile'];
    } else {
        $mobile = 0;
    }
    if ($_POST['Amount']) {
        $amount = $_POST['Amount'];
    } else {
        $amount = 0;
    }
    if ($_POST['DOC']) {
        $doc = $_POST['DOC'];
    } else {
        $doc = 0;
    }

    $query = mysqli_query($link, "SELECT * FROM `debiter_master_data` WHERE AC_No = '$ac'");
    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            echo "<script>alert('Account No. Already Exists!!')</script>";
        } else {
            $sql = mysqli_query($link, "INSERT INTO `debiter_master_data` VALUES('','$ac','$name','$address','$mobile','$amount','$doc')");
            if ($sql) {
                echo "<script>alert('Debiter Inserted Successfully!!')</script>";
            } else {
                echo "<script>alert('Debiter Insertion Failed!')</script>";
            }
        }
    }
}
if (isset($_POST["update"])) {
    $ac = $_POST['AC_No'];
    $name = $_POST['Name'];
    if ($_POST['Address']) {
        $address = $_POST['Address'];
    } else {
        $address = 0;
    }
    if ($_POST['Mobile']) {
        $mobile = $_POST['Mobile'];
    } else {
        $mobile = 0;
    }
    if ($_POST['Amount']) {
        $amount = $_POST['Amount'];
    } else {
        $amount = 0;
    }
    if ($_POST['DOC']) {
        $doc = $_POST['DOC'];
    } else {
        $doc = 0;
    }

    $query = mysqli_query($link, "SELECT * FROM `debiter_master_data` WHERE AC_No = '$ac'");
    if ($query) {
        if (mysqli_num_rows($query) == 0) {
            echo "<script>alert('Account No.Not Found! Please Insert Debiter!')</script>";
        } else {
            $sql = mysqli_query($link, "UPDATE `debiter_master_data` SET Name = '$name',Address = '$address',
                Mobile = '$mobile',Amount = '$amount',DOC = '$doc' WHERE AC_No = '$ac'");
            if ($sql) {
                echo "<script>alert('Debiter Updated Successfully!!')</script>";
            } else {
                echo "<script>alert('Debiter Updation Failed!')</script>";
            }
        }
    }
}
if (isset($_POST["delete"])) {
    $ac = $_POST['AC_No'];

    $query = mysqli_query($link, "SELECT * FROM `debiter_master_data` WHERE AC_No = '$ac'");
    if ($query) {
        if (mysqli_num_rows($query) == 0) {
            echo "<script>alert('Account No.Not Found!')</script>";
        } else {
            $sql = mysqli_query($link, "DELETE FROM `debiter_master_data` WHERE AC_No = '$ac'");
            if ($sql) {
                echo "<script>alert('Debiter Deleted Successfully!!')</script>";
            } else {
                echo "<script>alert('Debiter Deletion Failed!')</script>";
            }
        }
    }
}
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
</head>
<style>
.container {
        margin: 50px 350px;
        max-width: 700px;
        height: 650px;
        width: 100%;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        background-image: linear-gradient(to top, #37ecba 0%, #72afd3 100%);
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

    <div class="container">

        <div class="content">
            <div class="title">Debiter's Entry</div>
            <form action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">AC No. <span class="required">*</span></span>
                        <input type="text" placeholder="Enter AC No" id="ac_no" name="AC_No" value="<?php if (isset($ac)) {
                                                                                                        echo $ac;
                                                                                                    } else {
                                                                                                        echo "";
                                                                                                    } ?>" oninput="this.value = this.value.toUpperCase()" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Full Name <span class="required">*</span></span>
                        <input type="text" placeholder="Enter Fullname" id="name" name="Name" value="<?php if (isset($name)) {
                                                                                                            echo $name;
                                                                                                        } else {
                                                                                                            echo "";
                                                                                                        } ?>" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" placeholder="Enter Address" id="address" name="Address" value="<?php if (isset($address)) {
                                                                                                                echo $address;
                                                                                                            } else {
                                                                                                                echo "";
                                                                                                            } ?>" />
                    </div>
                    <div class="input-box">
                        <span class="details">Mobile Number</span>
                        <input type="text" maxlength="10" id="mobile" placeholder="Enter Mobile No." name="Mobile" value="<?php if (isset($mobile)) {
                                                                                                                                echo $mobile;
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?>" />
                    </div>
                    <div class="input-box">
                        <span class="details">Amount</span>
                        <input type="text" placeholder="Enter Amount" id="amount" name="Amount" value="<?php if (isset($amount)) {
                                                                                                            echo $amount;
                                                                                                        } else {
                                                                                                            echo "";
                                                                                                        } ?>" />
                    </div>
                    <div class="input-box">
                        <span class="details">Date of Commencement</span>
                        <input type="date" name="DOC" id="doc" value="<?php if (isset($doc)) {
                                                                            echo $doc;
                                                                        } else {
                                                                            echo date("Y-m-d");
                                                                        } ?>" />
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="add" value="Insert" onclick="if(!confirm('Confirm to Insert Debiter Data?')){return false;}else{return true;}" />
                    <input type="reset" value="Clear" />
                    <input type="submit" name="find" value="Find" onclick="find_ac();return false;" />
                    <input type="submit" name="update" value="Update" onclick="if(!confirm('Confirm to Update Debiter Data?')){return false;}else{return true;}" />
                    <input type="submit" name="delete" value="Delete" onclick="if(!confirm('Confirm to Delete Debiter Data?')){return false;}else{return true;}" />
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->

    <!-- Get Debiter Details on Find -->
    <script type="text/javascript">
        function find_ac() {
            ac = document.getElementById('ac_no').value;
            $.ajax({
                type: 'post',
                url: 'temp.php',
                data: {
                    AC_No: ac
                },
                success: function(data) {
                    if (data == "0") {
                        alert('Debiter Not Found');
                    } else {
                        arr = data.split(",");
                        $('#ac_no').val(arr[0]);
                        $('#name').val(arr[1]);
                        $('#address').val(arr[2]);
                        $('#mobile').val(arr[3]);
                        $('#amount').val(arr[4]);
                        date = "";
                        arr1 = arr[5].split("/");
                        if (arr1[2].startsWith("20")) {
                            date += arr1[2] + "-";
                        } else {
                            date += "20" + arr1[2] + "-";
                        }
                        date += arr1[1] + "-" + arr1[0];
                        $('#doc').val(date);
                    }
                }
            });
        }
    </script>
</body>

</html>