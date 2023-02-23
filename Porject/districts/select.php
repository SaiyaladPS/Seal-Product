<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['uid'])) {
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        $sql = "SELECT * FROM districts INNER JOIN provinces ON districts.pro_id = provinces.pro_id WHERE dis_id = $uid";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($query);
        echo json_encode($rows);
    }

    if (isset($_POST['pro_name_check']) && isset($_POST['dis_name_check'])) {
        $pro_id = mysqli_real_escape_string($conn, $_POST['pro_name_check']);
        $dis_name = mysqli_real_escape_string($conn, $_POST['dis_name_check']);
        $sql_check = "SELECT * FROM provinces INNER JOIN districts ON provinces.pro_id = districts.pro_id WHERE provinces.pro_id = '$pro_id' AND districts.dis_name = '$dis_name'";
        $query_check = mysqli_query($conn, $sql_check);
        $row = mysqli_num_rows($query_check);
        echo $row;
    }
?>