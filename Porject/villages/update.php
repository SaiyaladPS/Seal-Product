<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['edmit_vill_id']) && isset($_POST['edmit_pro']) && isset($_POST['edmit_dis']) && isset($_POST['edmit_vill'])) {
        $vill_id = mysqli_real_escape_string($conn, $_POST['edmit_vill_id']);
        $pro_id = mysqli_real_escape_string($conn, $_POST['edmit_pro']);
        $dis_id = mysqli_real_escape_string($conn, $_POST['edmit_dis']);
        $vill_name = mysqli_real_escape_string($conn, $_POST['edmit_vill']);
        $remark = mysqli_real_escape_string($conn, $_POST['edmit_remark']);

        $update = "UPDATE villages SET vill_name = '$vill_name', pro_id = $pro_id, dis_id = $dis_id , remark = '$remark' WHERE vill_id = $vill_id";
        $query = mysqli_real_query($conn, $update);
    }
?>