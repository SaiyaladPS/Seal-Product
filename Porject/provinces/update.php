<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['edmit_id']) && isset($_POST['edmit_name']) && isset($_POST['edmit_remark'])) {
        $id = mysqli_real_escape_string($conn, $_POST['edmit_id']);
        $name = mysqli_real_escape_string($conn, $_POST['edmit_name']);
        $remark = mysqli_real_escape_string($conn, $_POST['edmit_remark']);
        $sql = "UPDATE provinces SET pro_name = '$name', remark = '$remark' WHERE pro_id = $id";
        $query = mysqli_query($conn, $sql);
    }
?>