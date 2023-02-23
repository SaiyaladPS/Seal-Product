<?php 
    require '../Connect/Connect_dbstock.php';
    if (isset($_POST['user_id'])) {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
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
        $sql = "UPDATE users SET fname = '$fname', lname = '$lname', gender = '$gander', dob = '$dob', tel = '$Tel', pro_id = $pro, dis_id = $dis, vill_id = $vill, status = '$status', username = '$username',  password = '$password' WHERE user_id = $user_id";
        $query = mysqli_real_query($conn, $sql);
    }

?>