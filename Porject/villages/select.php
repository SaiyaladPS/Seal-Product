<?php
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['uid'])) {
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        $sql = "SELECT * FROM districts WHERE pro_id = $uid";
        $query = mysqli_query($conn, $sql);
        foreach ($query as $rows) {
            $data_Obj[] = array(
                "dis_id" => $rows['dis_id'],
                "dis_name" => $rows['dis_name']
            );
        };
        echo json_encode($data_Obj);
    };

    if (isset($_POST['pro_id']) && isset($_POST['dis_id']) && isset($_POST['vill_name'])) {
        $pro_id = mysqli_real_escape_string($conn, $_POST['pro_id']);
        $dis_id = mysqli_real_escape_string($conn, $_POST['dis_id']);
        $vill_name = mysqli_real_escape_string($conn, $_POST['vill_name']);
        $sql_chekc = "SELECT * FROM districts INNER JOIN provinces ON provinces.pro_id = districts.pro_id INNER JOIN villages ON villages.dis_id = districts.dis_id WHERE provinces.pro_id = $pro_id AND districts.dis_id = $dis_id AND villages.vill_name = '$vill_name'";
        $query_check = mysqli_query($conn, $sql_chekc);
        $row_check = mysqli_num_rows($query_check);
        echo $row_check;
    }

    if (isset($_POST['uid_edmit'])) {
        $uid = mysqli_real_escape_string($conn, $_POST['uid_edmit']);
        $sql_edmit = "SELECT * FROM districts INNER JOIN provinces ON provinces.pro_id = districts.pro_id INNER JOIN villages ON villages.dis_id = districts.dis_id WHERE villages.vill_id = $uid";
        $query_edmit = mysqli_query($conn, $sql_edmit);
        foreach($query_edmit as $rows_edmit) {
           $row_obj[] = array( 
            "pro_name" => $rows_edmit['pro_name'],
            "pro_id" => $rows_edmit['pro_id'],
            "dis_id" => $rows_edmit['dis_id'],
            "dis_name" => $rows_edmit['dis_name'],
            "vill_name" => $rows_edmit['vill_name'],
            "vill_id" => $rows_edmit['vill_id'],
            "remark" => $rows_edmit['remark']
           );
           };
           echo json_encode($row_obj);
        };

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $passowrd = mysqli_real_escape_string($conn, $_POST['password']);
            $passowrdHuh = md5($passowrd);
            $sql_chekc_login = "SELECT * FROM users WHERE username = '$username' AND password = '$passowrdHuh' ";
            $query_check_login = mysqli_query($conn,$sql_chekc_login);
            $row_check_login = mysqli_num_rows($query_check_login);
            
            echo json_encode($row_check_login);
        }
?>