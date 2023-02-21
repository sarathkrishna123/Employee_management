<?php
include "connect_db.php";
if(isset($_GET['emp_id'])){
    //echo $_REQUEST['emp_id'];
    //exit;
    $emp_id = $_REQUEST['emp_id'];

    $query = "delete from `employee_data` where emp_id = '$emp_id'";
    //print_r($query);
    $result = mysqli_query($connection, $query);
    if($result){
        echo '<script> 
                alert("Employee deleted successfully.");
                window.location = "./";
            </script>';
    } else {
        echo '<script> 
                alert("Something went wrong.");
                window.location = "./";
            </script>';
    }
}
?>