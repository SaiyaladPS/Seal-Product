<?php
require '../Connect/Connect_dbstock.php';
    if (isset($_POST['prod_id'])) {
    $prod_id = mysqli_real_escape_string($conn, $_POST['prod_id']);
    $o_qty = mysqli_real_escape_string($conn, $_POST['o_qty']);
    $sprice = mysqli_real_escape_string($conn, $_POST['sprice']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);
        $sql_inser = "INSERT INTO orders(prod_id, oqty, sprice, amount, odate, otime, remark)
        VALUES('$prod_id', $o_qty, $sprice, '$amount',curdate(),curtime(), '$remark')";
    $query_inser = mysqli_query($conn, $sql_inser);
}

?>