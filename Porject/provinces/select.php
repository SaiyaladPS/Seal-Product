<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['pro_name'])) {
        $pro_name = mysqli_real_escape_string($conn, $_POST['pro_name']);
        $sql = "SELECT * FROM provinces WHERE pro_name = '$pro_name'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        echo json_encode($row);
    }
    if (isset($_POST['selectID'])) {
        $uid = mysqli_real_escape_string($conn , $_POST['selectID']);
        $sql_uid = "SELECT * FROM provinces WHERE pro_id = $uid";
        $query_uid = mysqli_query($conn, $sql_uid);
        $rows_uid = mysqli_fetch_assoc($query_uid);
        echo json_encode($rows_uid);
    }
?>