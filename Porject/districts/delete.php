<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['delete'])) {
        $delete = mysqli_real_escape_string($conn, $_POST['delete']);
        $sql = "DELETE FROM districts WHERE dis_id = $delete";
        $query = mysqli_query($conn, $sql);
    }
?>