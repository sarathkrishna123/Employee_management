<?php
//include "connect_db.php";

$query = "select count(*) from `employee_data`";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_row($result);
//print_r($row);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
$pagelink = '<li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>';

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $pageno)
        $pagelink .= "<li class='page-item'><a href='index.php?page=" . $i . "'><span class='mx-3'>" . $i . "</span></a></li>";
    else
        $pagelink .= "<li class='page-item'><a href='index.php?page=" . $i . "'><span class='mx-3'>" . $i . "</span></a></li>";
};
$pagelink .= "<li class='page-item'>
                <a class='page-link' href='' aria-label='Next'>
                    <span aria-hidden='true'>&raquo;</span>
                </a>
            </li>";
echo $pagelink;
?>