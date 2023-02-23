<?php
    require_once '../Connect/Connect_dbstock.php';
    
        $edit_id = $_POST['edit_id'];
        $edit_name = $_POST['edit_name'];
        $edit_remark = $_POST['edit_remark'];

    $sql = "UPDATE categories SET cate_name = '$edit_name', remark = '$edit_remark' WHERE cate_id = $edit_id";
    $query = mysqli_query($conn,$sql);
    
?>

