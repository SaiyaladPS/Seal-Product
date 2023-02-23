<?php 
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $gander = mysqli_real_escape_string($conn, $_POST['gander']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $Tel = mysqli_real_escape_string($conn, $_POST['Tel']);
        $pro = mysqli_real_escape_string($conn, $_POST['pro']);
        $dis = mysqli_real_escape_string($conn, $_POST['dis']);
        $vill = mysqli_real_escape_string($conn, $_POST['vill']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);

        $passwordMD5 = md5($password);

        $sql_insert = "INSERT INTO users(fname, lname, gender, dob,tel, pro_id, dis_id, vill_id,status, username, password, remark)
        VALUES ('$fname', '$lname', '$gander', '$dob','$Tel', $pro, $dis, $vill, '$status', '$username', '$passwordMD5', '$remark')";
        $query_inser = mysqli_query($conn, $sql_insert);
    }
?>