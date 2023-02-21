<?php
include("form_submit.php");
if (isset($_GET['emp_id'])) {
    $emp_id = $_REQUEST['emp_id'];
    $query = "select * from `employee_data` where emp_id = '$emp_id'";
    $result1 = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($result1);
    //print_r($data); exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Employee Management - Add</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <b style="color: #fff;">Employee Management</b>
            </a>
            <a href="index.php"><button class="btn btn-outline-primary">BACK</button></a>
        </div>
    </nav>
    <div class="content">
        <div class="container" style="width: 40%;">
            <h2 class="mt-3 mb-3" style="text-align: center;">Add / Update Employee</h2>
            <div class="form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php echo '<div class="text-danger">' . $emptyErr . '</div>'; ?>
                    <div class="ps-3 pt-2 ">
                        <label class="form-label" for="empname"><span class="text-danger">*</span> Employee Name</label>
                        <input type="text" class="form-control" name="empname" placeholder="Enter employee name." value="<?php echo isset($data['emp_name']) ? $data['emp_name'] : ''; ?>">
                        <input type="hidden" name="emp_id" value="<?php echo isset($data['emp_id']) ? $data['emp_id'] : ''; ?>">
                        <?php echo '<div class="text-danger">' . $nameErr . '</div>'; ?>
                    </div>
                    <div class="ps-3 pt-2">
                        <label class="form-label" for="email"><span class="text-danger">*</span> E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="example@gmail.com" value="<?php echo isset($data['mail_id']) ? $data['mail_id'] : ''; ?>">
                        <?php echo '<div class="text-danger">' . $mailErr . '</div>'; ?>
                        <?php echo '<div class="text-danger">' . $duplicateErr . '</div>'; ?>
                    </div>
                    <div class="ps-3 pt-2">
                        <label class="form-label" for="desgn"><span class="text-danger">*</span> Designation</label>
                        <input type="text" class="form-control" name="desgn" placeholder="Enter your designation." value="<?php echo isset($data['emp_designation']) ? $data['emp_designation'] : ''; ?>">
                        <?php echo '<div class="text-danger">' . $desgErr . '</div>'; ?>
                    </div>
                    <div class="ps-3 pt-2">
                        <label class="form-label" for="image">Profile Image</label>
                        <input type="file" class="form-control" name="emp_image" id="image" value="<?php echo isset($data['emp_image']) ? $data['emp_image'] : ''; ?>">
                        <input type="hidden" name="existFile" value="<?php echo isset($data['emp_image']) ? $data['emp_image'] : ''; ?>">
                        <?php echo '<div class="text-danger">' . $filetypErr . '</div>'; ?>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                        <?php
                        if (isset($_GET['emp_id'])) {
                        ?>
                            <button type="submit" name="update" class="btn btn-lg btn-primary addbtn">Update</button>
                        <?php
                        } else {
                        ?>
                            <button type="submit" name="submit" class="btn btn-lg btn-primary addbtn">Save</button>
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>