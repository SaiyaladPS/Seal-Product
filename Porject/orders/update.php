<?php
require '../Connect/Connect_dbstock.php';
    if (isset($_POST['o_qty']) && isset($_POST['prod_id'])) {
    $prod_id = mysqli_real_escape_string($conn, $_POST['prod_id']);
    $o_qty = mysqli_real_escape_string($conn, $_POST['o_qty']);
    $sql = "UPDATE products SET qty = qty - $o_qty WHERE prod_id = '$prod_id'";
    $query = mysqli_query($conn, $sql);
    }

?>