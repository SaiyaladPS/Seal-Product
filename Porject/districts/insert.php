<?php
require '../Connect/Connect_dbstock.php';
    if (isset($_POST['pro_name']) && isset($_POST['dis_name'])) {
        $pro_name = mysqli_real_escape_string($conn, $_POST['pro_name']);
        $dis_name = mysqli_real_escape_string($conn, $_POST['dis_name']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);
        echo $pro_name . $dis_name . $remark;
        $sql = "INSERT INTO districts(dis_name,pro_id,remark) 
        VALUES('$dis_name', $pro_name,'$remark')";
        $query = mysqli_query($conn,$sql);
    }
?>