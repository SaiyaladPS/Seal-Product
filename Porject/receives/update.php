<?php
    include '../Connect/Connect_dbstock.php';
    $id = $_POST['upid'];
    $qty = $_POST['upqty'];

    $sql = "UPDATE products SET qty = qty + $qty WHERE prod_id = '$id'";
    $query = mysqli_query($conn,$sql);
?>