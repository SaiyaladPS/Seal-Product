<?php
    require_once '../Connect/Connect_dbstock.php';
    
        $edit_id = $_POST['edit_id'];

            $sql = "SELECT * FROM  categories WHERE cate_id = $edit_id";
            $query = mysqli_query($conn,$sql);
        $row_edit = mysqli_fetch_assoc($query);

    echo json_encode($row_edit);
    ?>