<?php 
    require '../Connect/Connect_dbstock.php';

    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM products WHERE prod_id = '$delete_id'";
    $query = mysqli_query($conn,$sql);
?>