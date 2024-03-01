<?php
include '../link.php';
session_start();
error_reporting(0);
?>

<?php

function generatePassword()
{
    $generator = "abcdefghijklmnopqrstuvwxyz1234567890";
    $result = "";
    for ($i = 1; $i <= 7; $i++) {
        $result .= substr($generator, (rand() % (strlen($generator))), 1);
    }
    return $result;
}

if (isset($_POST['Verify'])) {
    $username = $_POST['UserName'];
    $mobile = $_POST['Mobile'];
    $verify_username = mysqli_query($link, "SELECT * FROM `admin` WHERE Admin_Id_No = '$username'");
    if (mysqli_num_rows($verify_username) == 0) {
        echo "<script>alert('Invalid Username!');</script>";
    } else {
        $verify_mobile = mysqli_query($link, "SELECT * FROM `admin` WHERE Admin_Id_No = '$username' AND Mobile = '$mobile'");
        if (mysqli_num_rows($verify_mobile) == 0) {
            echo "<script>alert('Mobile Number Not Matched!');</script>";
        } else {
            $newPassword = generatePassword();
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            $update_query = mysqli_query($link, "UPDATE `admin` SET Admin_Password = '$newPassword', Admin_Hash = '$hash' WHERE Admin_Id_No = '$username'");
            if ($update_query) {
                echo "<script>alert('New Password Updated Successfully!!')</script>";
            } else {
                echo "<script>alert('New Password Updation Failed!!')</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        document.querySelector('.sms_link').href
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/sidebar-style.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!-- Bootstrap Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <title>Viswateja School</title>
</head>
<style>
    body {
        background: #1abc9c;
    }

    #verify {
        height: 100%;
        width: 100%;
        outline: none;
        padding-left: 60px;
        border-radius: 5px;
        border: 1px solid lightgrey;
        font-size: 16px;
        transition: all 0.3s ease;
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        padding-left: 0px;
        background: #16a085;
        border: 1px solid #16a085;
        cursor: pointer;
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
    <?php if (!$_SESSION['Admin_Id_No']) { ?>
        <nav>
            <div class="logo">
                <img src="../Images/Viswateja Logo.png" alt="..." width="70px">
            </div>
            <div class="heading">
                <h3>Viswateja School, Duttalur</h3>
            </div>
            <input type="checkbox" id="click" />
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../about.html">About</a></li>
                <li><a href="../Gallery/gallery.html">Gallery</a></li>
                <li><a href="../contact.html">Contact</a></li>
                <li>
                    <a class="active" href="#">Login</a>
                    <ul class="login-sub-menu sub-menu">
                        <li><a class="active" href="admin_login.php">Admin Login</a></li>
                        <li><a href="../Student/student_login.php">Student Login</a></li>
                        <li><a href="../Faculty/faculty_login.php">Faculty Login</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    <?php } else { ?>
        <?php
        include 'sidebar.php';
        ?>
    <?php } ?>
    <div class="container col-lg-4">
        <div class="wrapper">
            <div class="title p-2"><span>Forgot Password</span></div>
            <form action="" method="post">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="UserName" placeholder="Enter User Name" value="<?php if (isset($_SESSION['Admin_Id_No'])) {
                                                                                                echo $_SESSION['Admin_Id_No'];
                                                                                            } ?>" <?php if (isset($_SESSION['Admin_Id_No'])) {
                                                                                                        echo "readonly";
                                                                                                    } ?> oninput="this.value = this.value.toUpperCase()" required>

                </div>
                <div class="row">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="Mobile" placeholder="Enter Registered Mobile Number" required>
                </div>
                <div class="row button">
                    <button type="submit" name="Verify" class="form-control" id="verify">Verify User</button>
                </div>
                <?php if (!$_SESSION['Admin_Id_No']) { ?>
                    <div class="pass"><a href="admin_login.php">Login</a></div>
                <?php } else { ?>
                    <div class="pass"><a href="change_pwd.php">Change Password</a></div>
                <?php } ?>
            </form>
            <?php if (isset($newPassword)) { ?>
                <label for="" style="padding-left: 50px;"><b>Your New Password is: </b><?php echo $newPassword; ?></label>
            <?php } ?>
        </div>
    </div>

    <!-- Scripts -->

    <!-- Send SMS -->
    <script>
        $('#send').on('click', () => {
            $('.sms_link').each(function() {
                mywin = window.open($(this).attr('href'), '_blank')
            });
        });
    </script>
</body>

</html>