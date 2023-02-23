<?php
require '../Connect/Connect_dbstock.php';


    if (isset($_POST['select_id'])) {
        $select_id = $_POST['select_id'];
        $sql = "SELECT * FROM products INNER JOIN categories ON categories.cate_id = products.cate_id WHERE prod_id = '$select_id'";
        $query = mysqli_query($conn,$sql);
        $res = mysqli_fetch_assoc($query);
        echo json_encode($res);
    } else {
        $sql = "SELECT * FROM categories";
            $query = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_assoc($query)) {
                $data[] = array(
                    'cate_name' => $row['cate_name'],
                    'cate_id' => $row['cate_id']
                );
            }
            echo json_encode($data);
    }
    ?>