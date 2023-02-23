<?php
    include_once '../Connect/Connect_dbstock.php';
    $delete_id = $_POST['delete_id'];

        $sql = "DELETE FROM categories WHERE cate_id = $delete_id";
        $query = mysqli_query($conn,$sql);
?>