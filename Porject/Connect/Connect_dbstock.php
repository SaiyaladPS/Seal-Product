<?php
    $server = 'localhost';
    $user = 'root';
    $passowrd = '96778932';
    $dbname = 'db_stock';

        $conn = mysqli_connect($server,$user,$passowrd,$dbname);

        if (!$conn) {
            echo "Connect Error" . mysqli_connect_error();
        } else {
            // echo "Connect Success";
        }
?>

