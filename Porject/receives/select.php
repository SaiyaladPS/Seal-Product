<?php
require '../Connect/Connect_dbstock.php';

    if (isset($_POST['date_one'])) {
        $dateOne = $_POST['date_one'];

    $sql = "SELECT * FROM receives INNER JOIN products ON receives.prod_id = products.prod_id WHERE rdate = '$dateOne'";
    $query = mysqli_query($conn,$sql);
    $check = mysqli_num_rows($query);
    $number = 1;
        if ($check >= 1) {
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
            };
        } else {
        echo "<div class='alert alert-danger text-center translate-middle-y w-100' role='alert'>
        ບໍ່ພົບຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ
        </div>";
        }
    };


    if (isset($_POST['date_1']) && isset($_POST['date_2'])) {
        $date_1 = $_POST['date_1'];
        $date_2 = $_POST['date_2'];
        $numberbet = 1;

        $sqlbet = "SELECT * FROM receives INNER JOIN products ON receives.prod_id = products.prod_id WHERE receives.rdate BETWEEN '$date_1' AND '$date_2'";
        $querybet = mysqli_query($conn,$sqlbet);
    $check_two = mysqli_num_rows($querybet);
       if ($check_two >= 1) {
        foreach($querybet as $rowbet) {
            echo "<tr>
            <td>" . $numberbet++."</td>
            <td>" . $rowbet['prod_id'] ."</td>
            <td>" . $rowbet['prod_name']. "</td>
            <td>" . $rowbet['rqty']."</td>
            <td>" . number_format($rowbet['bprice'])." ກິບ</td>
            <td>" . number_format($rowbet['amount'])." ກີບ</td>
            <td>" . $rowbet['rdate'] . " " . $rowbet['rtime']."</td>
            <td>" . $rowbet['remark']."</td>
            </tr>";
        };
       } else {
        echo "<div class='alert alert-danger text-center translate-middle-y w-100' role='alert'>
        ບໍ່ພົບຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ
        </div>";
       }
    };
   

    if (isset($_POST['date_sum'])) {
        $date_sum = $_POST['date_sum'];
        $sql_sum = "SELECT SUM(amount)as SUMamount FROM receives WHERE rdate = '$date_sum'";
        $query_sum = mysqli_query($conn,$sql_sum);
            $row_sum = mysqli_fetch_assoc($query_sum);
            $arr[] = array(
                'sum' => $row_sum['SUMamount']
            );
           echo json_encode($arr);
    }
    if (isset($_POST['date_sum_One']) && isset($_POST['data_sum_two'])) {
        $date_One = mysqli_real_escape_string($conn,$_POST['date_sum_One']);
        $date_tow = mysqli_real_escape_string($conn,$_POST['data_sum_two']);
        $sql_sum_ting = "SELECT SUM(amount) AS sumting FROM receives WHERE rdate BETWEEN '$date_One' AND '$date_tow' ";
        $query_sumting = mysqli_query($conn,$sql_sum_ting);
        $row_sumting = mysqli_fetch_assoc($query_sumting);
            $arr_sumtring[] = array(
                'sumTow' => $row_sumting['sumting']
            );
            echo json_encode($arr_sumtring);
    }
?>