<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['edmit_dis_id']) && isset($_POST['edmit_pro_name']) && isset($_POST['edmit_dis_name'])) {
        $dis_id = mysqli_real_escape_string($conn, $_POST['edmit_dis_id']);
        $pro_name = mysqli_real_escape_string($conn, $_POST['edmit_pro_name']);
        $dis_name = mysqli_real_escape_string($conn, $_POST['edmit_dis_name']);
        $edmit_remark = mysqli_real_escape_string($conn, $_POST['edmit_remark']);
        $sql = "UPDATE districts SET dis_name = '$dis_name', pro_id = $pro_name, remark = '$edmit_remark' WHERE dis_id = $dis_id";
        mysqli_query($conn, $sql);
    }