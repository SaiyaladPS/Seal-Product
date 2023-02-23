<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['delete'])) {
        $delete = mysqli_real_escape_string($conn, $_POST['delete']);
        echo $delete;
        $sql = "DELETE FROM villages WHERE vill_id = $delete";
        $query = mysqli_real_query($conn, $sql);
    }
?>