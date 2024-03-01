<?php
session_start();
if (!$_SESSION['Admin_Id_No']) {
    echo "<script>
  alert('Admin Id Not Rendered');
  location.replace('/Viswateja/Admin/admin_login.php');
  </script>
  </script>";
}
?>
<?php

if (isset($_POST['update'])) {
    if ($_SESSION['Role'] != "Super_Admin") {
        echo "<script>alert('Only Super Admin Can Access This!')</script>";
    } else {
        $myfile = fopen("../test.txt", "w");
        $type = $_POST['text_type'];
        if ($type == "" || $type == "Link") {
            if ($_POST['Text']) {
                $text = $_POST['Text'];
                if ($type == "") {
                    $status = fwrite($myfile, $text);
                } else if ($type == "Link") {
                    $arr = explode(',', $text);
                    if ($arr[0] == "" || $arr[1] == "") {
                        echo "<script>alert('Please Provide Text in Valid Format!!')</script>";
                    } else {
                        $link_text = "<a href='" . $arr[0] . "' target='_blank'>" . $arr[1] . "</a>";
                        $status = fwrite($myfile, $link_text);
                    }
                }
                fclose($myfile);
                if ($status) {
                    echo "<script>alert('Text Updated Successfully!')</script>";
                } else {
                    echo "<script>alert('Text Updation Failed!')</script>";
                }
            } else {
                echo "<script>alert('Please Enter Text!')</script>";
            }
        } else {
            if ($_POST['File_Text']) {
                $text = $_POST['File_Text'];
                if ($type == "File") {
                    $ext = explode('.', $_FILES["File"]["name"])[1];
                    $location = "home_files/" . 'file.' . $ext;
                    if (move_uploaded_file($_FILES['File']['tmp_name'], $location)) {
                        $link_text = "<a href='Admin/" . $location . "' download>" . $text . "</a>";
                        $status = fwrite($myfile, $link_text);
                    } else {
                        echo '<script>alert("Failed to Upload File!!")</script>';
                    }
                }
            }
            fclose($myfile);
            if ($status) {
                echo "<script>alert('Text Updated Successfully!')</script>";
            } else {
                echo "<script>alert('Text Updation Failed!')</script>";
            }
        }
    }
}

if (isset($_POST['reset'])) {
    if ($_SESSION['Role'] != "Super_Admin") {
        echo "<script>alert('Only Super Admin Can Access This!')</script>";
    } else {
        $myfile = fopen("../test.txt", "w");
        $reset_status = fwrite($myfile, '');
        fclose($myfile);
        echo "<script>alert('Text Reset Successfully!')</script>";
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

    <!-- Bootstrap Links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Boxiocns CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<style>
    body {
        background: #f2f2f2;
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
    include 'sidebar.php';
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-4">
                    <label for="" style="color: red;">NOTE: For Link, Format: URL,Text to Display in Page</label>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-lg-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="text_type" id="text" checked value="Text">
                        <label class="form-check-label" for="text">Text</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="text_type" id="link" value="Link">
                        <label class="form-check-label" for="link">Link</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="text_type" id="file" value="File">
                        <label class="form-check-label" for="file">File</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3" id="inp_row">
            <div class="col-lg-1">
                <label for=""><b>Text:</b></label>
            </div>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="text" name="Text">
            </div>
        </div>
        <div class="row justify-content-center mt-3" id="file_row" hidden>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-1">
                    <label for=""><b>Text:</b></label>
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control" id="file_text" name="File_Text">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-lg-1">
                    <label for=""><b>File:</b></label>
                </div>
                <div class="col-lg-4">
                    <input type="file" class="form-control" id="inp_file" name="File">
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-2">
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                    <button class="btn btn-warning" type="submit" name="reset" onclick="if(!confirm('Confirm to Reset Text?')){return false;}else{return true;}">Reset Text</button>
                </div>
            </div>
        </div>
    </form>
</body>

<!-- Change labels -->
<script type="text/javascript">
    let inp_row = document.getElementById('inp_row');
    let file_row = document.getElementById('file_row');
    document.body.addEventListener('change', function(e) {
        let target = e.target;
        switch (target.id) {
            case 'text':
                if (inp_row.hidden) {
                    inp_row.hidden = '';
                }
                if (!file_row.hidden) {
                    file_row.hidden = 'hidden';
                }
                break;
            case 'link':
                if (!inp_row.hidden) {
                    inp_row.hidden = '';
                }
                if (!file_row.hidden) {
                    file_row.hidden = 'hidden';
                }
                break;
            case 'file':
                if (!inp_row.hidden) {
                    inp_row.hidden = 'hidden';
                }
                if (file_row.hidden) {
                    file_row.hidden = '';
                }
                break;
        }
    });
</script>

<!-- Getting Existing Text -->
<script type="text/javascript">
    $.ajax({
        type: 'post',
        url: 'temp.php',
        data: {
            text: ''
        },
        success: function(data) {
            document.getElementById('text').value = data;
        }
    });
</script>

</html>