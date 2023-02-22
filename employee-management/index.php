<?php
include "connect_db.php";

/*$query = "select * from `employee_data` order by emp_name";
$result = mysqli_query($connection, $query);*/

$limit = 5;
if (isset($_GET['page'])) {
    $pageno = $_GET['page'];
} else {
    $pageno = 1;
}
$start_from = ($pageno - 1) * $limit;

$sql = "select * from `employee_data` limit $start_from, $limit";
$result1 = mysqli_query($connection, $sql);
//print_r($sql);
//exit;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Employee Management</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <b style="color: #fff;">Employee Management</b>
            </a>
            <a href="emp_addform.php"><button class="btn btn-outline-primary">ADD EMPLOYEE</button></a>
        </div>
    </nav>
    <div class="content">
        <h1 class="mt-3 mb-3" style="text-align: center;">EMPLOYEE MASTER</h1>
        <div class="container">
            <table class="table table-sm">
                <thead class="table-light">
                    <tr>
                        <th colspan="2" style="text-align: center;">Employee Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Edit / Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rows = mysqli_fetch_assoc($result1)) {

                    ?>
                        <tr>
                            <?php
                            if ($rows['emp_image'] != '') {
                            ?>
                                <td><img src="employee_uploads/<?php echo $rows['emp_image']; ?>" alt="Image" width="30"></td>
                            <?php
                            } else {
                            ?>
                                <td><img src="images/propic.svg" alt="Image" width="40" title="No profile photo"></td>
                            <?php
                            }
                            ?>
                            <td><?php echo $rows['emp_name']; ?></td>
                            <td><?php echo $rows['emp_designation'] ?></td>
                            <td><?php echo $rows['mail_id'] ?></td>
                            <td>
                                <a href="emp_addform.php?emp_id=<?php echo $rows['emp_id'] ?>" class="btn btn-primary">Edit</a>
                                <a onClick="javascript: return confirm('Please confirm before deletion.');" href="delete_employee.php?emp_id=<?php echo $rows['emp_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                        //$sno++;
                    }
                    ?>
                </tbody>

            </table>
            <ul class="pagination">
                <?php require("pagination.php"); ?>
            </ul>
        </div>
    </div>
</body>

</html>
