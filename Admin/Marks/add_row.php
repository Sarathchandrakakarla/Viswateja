<?php
include '../../link.php';
if (isset($_POST['page'])) {
    $page = $_POST['page'];
    if ($page == "sub") {
        $class = $_POST['Class'];
        $exam = $_POST['Exam'];
        $subject = $_POST['Subject'];
        $max_sql = mysqli_query($link, "SELECT Max_Marks FROM `class_wise_examination` WHERE Class = '$class' AND Exam = '$exam'");
        while ($max_row = mysqli_fetch_assoc($max_sql)) {
            $max = $max_row['Max_Marks'];
        }
        if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM `class_wise_subjects` WHERE Class = '$class' AND Exam = '$exam' AND Subjects = '$subject'")) >= 1) {
            echo "exists";
        } else {
            mysqli_query($link, "INSERT INTO `class_wise_subjects` VALUES('','$class','$exam','$subject','$max')");
            $sql = mysqli_query($link, "SELECT * FROM `class_wise_subjects` WHERE Class='$class' AND Exam='$exam'");
            $i = 1;
            while ($row = mysqli_fetch_assoc($sql)) {
                echo '<tr>
                <td>' . $i . '</td>
                <td>' . $row['Class'] . '</td>
                <td>' . $row['Exam'] . '</td>
                <td>' . $row['Subjects'] . '</td>
                <td>' . $row['Max_Marks'] . '</td>
                </tr>';
                $i++;
            }
        }
    }
}
