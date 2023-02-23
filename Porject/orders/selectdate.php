<?php
require '../Connect/Connect_dbstock.php';
$sql_select_all = "SELECT * FROM products INNER JOIN orders ON products.prod_id = orders.prod_id";
    $query_all = mysqli_query($conn,$sql_select_all);
foreach($query_all as $rowall) {
    $data_Arr[] = array(
        'prod_id' => $rowall['prod_id'],
        'prod_name' => $rowall['prod_name'],
        'o_qty' => $rowall['oqty'],
        'sprice' => $rowall['sprice'],
        'amount' => $rowall['amount'],
        'odate' => $rowall['odate'],
        'otime' => $rowall['otime'],
        'remark' => $rowall['remark']
    );
}
 echo  json_encode($data_Arr);
?>