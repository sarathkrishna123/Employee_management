<?php
include "connect_db.php";

$error = array();
$emptyErr = '';
$nameErr = '';
$mailErr = '';
$desgErr = '';
$filetypErr = '';
$duplicateErr = '';


if (isset($_POST["submit"])) {
    $emp_name = $_POST["empname"];
    $email = $_POST["email"];
    $designation = $_POST["desgn"];
    $image = $_FILES["emp_image"]["name"];
    $tmp_name = $_FILES["emp_image"]["tmp_name"];
    $filepath = "./employee_uploads/" . $image;
    $file_type = pathinfo($filepath, PATHINFO_EXTENSION);

    $check = mysqli_query($connection, "select * from `employee_data` where mail_id = '$email'");

    if (empty($emp_name) && empty($email) && empty($designation)) {
        array_push($error, $emptyErr = '<span class="badge bg-danger">Warning!</span>Fields marked <span class="text-danger">*</span> cannot be left blank!!');
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $emp_name)) {
        array_push($error, $nameErr = "* Please enter a valid name");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, $mailErr = "* Please enter a valid email");
    } elseif (mysqli_num_rows($check)) {
        array_push($error, $duplicateErr = "* This mail id already in use!");
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $designation)) {
        array_push($error, $desgErr = "* Please enter a valid designation");
    }
    if ($_FILES["emp_image"]["name"]) {
        if ($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png") {
            if (move_uploaded_file($tmp_name, $filepath)) {
                $upfile = "File uploaded.";
            }
        } else {
            array_push($error, $filetypErr = "*jpg, jpeg, png files only supported.");
        }
    }

    if (count($error) == 0) {
        $query = "insert into `employee_data` (`emp_name`, `emp_designation`, `mail_id`, `emp_image`) values ('$emp_name','$designation','$email','$image')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo '<script> 
                alert("Employee added successfully.");
                window.location = "./";
            </script>';
        }
    }
}
if (isset($_POST['update'])) {
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["empname"];
    $email = $_POST["email"];
    $designation = $_POST["desgn"];
    $existfile = $_POST['existFile'];
    $image = $_FILES["emp_image"]["name"];
    $tmp_name = $_FILES["emp_image"]["tmp_name"];
    $location = "employee_uploads/";
    $filepath = "./employee_uploads/" . $image;
    $file_type = pathinfo($filepath, PATHINFO_EXTENSION);

    if (empty($emp_name) && empty($email) && empty($designation)) {
        array_push($error, $emptyErr = '<span class="badge bg-danger">Warning!</span>Fields marked <span class="text-danger">*</span> cannot be left blank!!');
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $emp_name)) {
        array_push($error, $nameErr = "* Please enter a valid name");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, $mailErr = "* Please enter a valid email");
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $designation)) {
        array_push($error, $desgErr = "* Please enter a valid designation");
    }
    if ($_FILES["emp_image"]["name"]) {
        if ($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png") {
            if (move_uploaded_file($tmp_name, $filepath)) {
                $upfile = "File uploaded.";
            }
        } else {
            array_push($error, $filetypErr = "*jpg, jpeg, png files only supported.");
        }
    } else {
        $image = $existfile;
    }

    if (count($error) == 0) {
        $query = "update `employee_data` set `emp_name`='$emp_name',`emp_designation`='$designation',`mail_id`='$email',`emp_image`='$image' where emp_id = '$emp_id'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo '<script> 
                alert("Employee updated successfully.");
                window.location = "./";
            </script>';
        }
    }
}
?>