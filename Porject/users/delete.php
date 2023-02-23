<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['delete'])) {
        $user_id = mysqli_real_escape_string($conn, $_POST['delete']);
        $sql_delete = "DELETE FROM users WHERE user_id = $user_id";
        $query_delete = mysqli_real_query($conn, $sql_delete);
    }
?>