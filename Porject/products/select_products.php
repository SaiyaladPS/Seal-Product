<?php
include '../Connect/Connect_dbstock.php';
    $select_Check = $_POST['select_id'];
    $sql_Check = "SELECT * FROM products WHERE prod_id = $select_Check";
    $query_Check = mysqli_query($conn,$sql_Check);
    $res = mysqli_num_rows($query_Check);
    echo $res
?>