<?php
    require '../Connect/Connect_dbstock.php';
    $prod_id = $_POST['prod_id'];
    $prod_name = $_POST['prod_name'];
    $prod_qty = $_POST['prod_qty'];
    $prod_sp = $_POST['prod_sp'];
    $prod_bp = $_POST['prod_bp'];
    $cate_id = $_POST['cate_id'];
    $prod_rmk = $_POST['prod_rmk'];

    $sql = "INSERT INTO products(prod_id, cate_id, prod_name, qty, bprice, sprice, remarck) 
    VALUES('$prod_id', $cate_id, '$prod_name', $prod_qty, $prod_bp, $prod_sp, '$prod_rmk')";
    $query = mysqli_query($conn,$sql);
?>