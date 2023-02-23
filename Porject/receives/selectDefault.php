<?php
    include '../Connect/Connect_dbstock.php';
    $sql = "SELECT * FROM receives INNER JOIN products ON receives.prod_id = products.prod_id ORDER BY rtime DESC";
    $query = mysqli_query($conn,$sql);
    $number = 1;

    foreach($query as $row) {
        echo "<tr>
        <td>" . $number++."</td>
        <td>" . $row['prod_id'] ."</td>
        <td>" . $row['prod_name']. "</td>
        <td>" . $row['rqty']."</td>
        <td>" . number_format($row['bprice'])." ກິບ</td>
        <td>" . number_format($row['amount'])." ກີບ</td>
        <td>" . $row['rdate'] . " " . $row['rtime']."</td>
        <td>" . $row['remark']."</td>
        </tr>";
    }
?>