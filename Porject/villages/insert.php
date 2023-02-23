<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['pro']) && isset($_POST['dis']) && isset($_POST['vill'])) {
        $pro = mysqli_real_escape_string($conn, $_POST['pro']);
        $dis = mysqli_real_escape_string($conn, $_POST['dis']);
        $vill = mysqli_real_escape_string($conn, $_POST['vill']);
        $remark= mysqli_real_escape_string($conn, $_POST['remark']);
        $sql = "INSERT INTO villages (vill_name, pro_id, dis_id, remark) VALUES('$vill', $pro, $dis, '$remark')";
        $query = mysqli_query($conn, $sql);
    }

?>