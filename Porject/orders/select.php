<?php
require '../Connect/Connect_dbstock.php';
// TODO ຮັບການຄົ້ນຫາຂໍ້ມູນຂອງລະຫັດສິນຄ້າ
if (isset($_POST['prod_id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['prod_id']);
    $sql = "SELECT * FROM products WHERE prod_id = '$id'";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($query);
    $number = mysqli_num_rows($query);
    echo json_encode($rows);
}
// TODO ຮັບຄ່າຂອງຄົ້ນຫາວັນທີ່ໂຕທີ່ 1
if (isset($_POST['date_one'])) {
    $date_one = mysqli_real_escape_string($conn, $_POST['date_one']);
    $sql_one = "SELECT * FROM orders INNER JOIN products ON products.prod_id = orders.prod_id WHERE orders.odate = '$date_one'";
    $query_one = mysqli_query($conn,$sql_one);
    foreach($query_one as $One) {
        $date_Arr[] = array(
            'prod_id' => $One['prod_id'],
            'prod_name' => $One['prod_name'],
            'o_qty' => $One['oqty'],
            'sprice' => $One['sprice'],
            'amount' => $One['amount'],
            'odate' => $One['odate'],
            'otime' => $One['otime'],
            'remark' => $One['remark']
        );
    }
    echo json_encode($date_Arr);
}
// TODO ຮັບຄ່າຂອງຄົ້ນຫາວັນທີ່ 1 ລະຫວ່າງ ວັນທີ່ 2
if (isset($_POST['dateOne']) && isset($_POST['dateTwo'])) {
    $date_1 = mysqli_real_escape_string($conn, $_POST['dateOne']);
    $date_2 = mysqli_real_escape_string($conn, $_POST['dateTwo']);
    $sql_date = "SELECT * FROM orders INNER JOIN products ON products.prod_id = orders.prod_id WHERE orders.odate BETWEEN '$date_1'  AND '$date_2'" ;
    $query_date = mysqli_query($conn,$sql_date);
    foreach($query_date as $OneandTwo) {
        $dateTwo_Arr[] = array(
            'prod_id' => $OneandTwo['prod_id'],
            'prod_name' => $OneandTwo['prod_name'],
            'o_qty' => $OneandTwo['oqty'],
            'sprice' => $OneandTwo['sprice'],
            'amount' => $OneandTwo['amount'],
            'odate' => $OneandTwo['odate'],
            'otime' => $OneandTwo['otime'],
            'remark' => $OneandTwo['remark']
        );
    }
    echo json_encode($dateTwo_Arr);
}
?>