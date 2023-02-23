<?php 
    require('../Connect/Connect_dbstock.php');

        if (isset($_POST['prod_id'])) {
            $prod_id = $_POST['prod_id'];
            $prod_name = $_POST['prod_name'];
            $prod_type = $_POST['prod_type'];
            $prod_qty = $_POST['prod_qty'];
            $prod_sprice = $_POST['prod_sprice'];
            $prod_bprice = $_POST['prod_bprice'];
            $remarck = $_POST['remarck'];
                $sql = "UPDATE products SET cate_id = $prod_type, prod_name = '$prod_name', qty = $prod_qty, bprice = $prod_bprice, sprice = $prod_sprice, remarck = '$remarck' WHERE prod_id = '$prod_id'";
            $query = mysqli_query($conn,$sql);
        }
        if (isset($_POST['key'])) {
            $key = $_POST['key'];
            $name = $_POST['value'];
            $sql_Updata = "UPDATE products SET prod_name = '$name' WHERE prod_id = '$key'";
            mysqli_query($conn,$sql_Updata);
        }
?>