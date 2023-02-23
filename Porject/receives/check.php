<?php
    require '../Connect/Connect_dbstock.php';


        $id = $_POST['prod_id'];
        $sql = "SELECT * FROM products WHERE prod_id = '$id' ";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
    
?>