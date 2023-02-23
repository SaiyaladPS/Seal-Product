<?php
    require '../Connect/Connect_dbstock.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $bprice = $_POST['bprice'];
    $amount = $_POST['amount'];
    $remark = $_POST['remark'];
    $number = '';
    
    $sql = "INSERT INTO receives (bill_no, prod_id, rqty, bprice, amount, rdate, rtime, remark) 
    VALUES('$number','$id',$qty,$bprice,'$amount',curdate(),curtime(),'$remark')";
    $query = mysqli_query($conn,$sql);
        echo $query
?>
