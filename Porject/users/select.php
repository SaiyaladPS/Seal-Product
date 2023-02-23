<?php
    require '../Connect/Connect_dbstock.php';
        if (isset($_POST['pro_id'])) {
            $pro_id = mysqli_real_escape_string($conn, $_POST['pro_id']);
            $sql_pro = "SELECT * FROM provinces INNER JOIN districts ON districts.pro_id = provinces.pro_id WHERE provinces.pro_id = $pro_id";
            $query_pro = mysqli_query($conn, $sql_pro);
            foreach($query_pro as $rows_pro) {
                $arr[] = array(
                    "dis_id" => $rows_pro['dis_id'],
                    "dis_name" => $rows_pro['dis_name']
                ); 
            };
            echo json_encode($arr);
        }

        if (isset($_POST['dis_id'])) {
            $dis_id = mysqli_real_escape_string($conn, $_POST['dis_id']);
            $sql_dis = "SELECT * FROM districts INNER JOIN villages ON districts.dis_id = villages.dis_id WHERE districts.dis_id = $dis_id";
            $query_dis = mysqli_query($conn,$sql_dis);
            foreach($query_dis as $row_dis) {
                $arr_dis[] = array(
                    "vill_id" => $row_dis['vill_id'],
                    "vill_name" => $row_dis['vill_name']
                );
            };
            echo json_encode($arr_dis);
        }

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $passowrd = mysqli_real_escape_string($conn, $_POST['password']);
            $passowrdmd5 = md5($passowrd);
            $sql_check = "SELECT * FROM users WHERE username = '$username' AND password = '$passowrdmd5'";
            $query_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_num_rows($query_check);
            echo $row_check;
        }

        // ຮັບຄ່າຈາກຕົວແກ້ໄຂ
        if (isset($_POST['edmit_id'])) {
            $user_id = mysqli_real_escape_string($conn, $_POST['edmit_id']);
            $sql_edmit = "SELECT * FROM users INNER JOIN provinces ON provinces.pro_id = users.pro_id INNER JOIN districts ON districts.dis_id = users.dis_id INNER JOIN villages ON villages.vill_id = users.vill_id WHERE users.user_id = $user_id";
            $query_edmit = mysqli_query($conn, $sql_edmit);
            foreach($query_edmit as $row_edmit) {
                $arr_edmit[] = array(
                    "user_id" => $row_edmit['user_id'],
                    "fname" => $row_edmit['fname'],
                    "lname" => $row_edmit['lname'],
                    "gender" => $row_edmit['gender'],
                    "dob" => $row_edmit['dob'],
                    'tel' => $row_edmit['tel'],
                    'pro_id' => $row_edmit['pro_id'],
                    'pro_name' => $row_edmit['pro_name'],
                    'dis_id' => $row_edmit['dis_id'],
                    'dis_name' => $row_edmit['dis_name'],
                    'vill_id' => $row_edmit['vill_id'],
                    'vill_name' => $row_edmit['vill_name'],
                    'status' => $row_edmit['status'],
                    'username' => $row_edmit['username'],
                    'password' => $row_edmit['password'],
                    'remark' => $row_edmit['remark']
                );
            }
            echo json_encode($arr_edmit);
        }
?>