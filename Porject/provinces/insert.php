<?php
require '../Connect/Connect_dbstock.php';
    if (isset($_POST['pro_name'])) {
        $pro_name = mysqli_real_escape_string($conn, $_POST['pro_name']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);
        $sql = "INSERT INTO provinces (pro_name, remark) VALUES('$pro_name', '$remark')";
        $query = mysqli_query($conn, $sql);
    }
?>