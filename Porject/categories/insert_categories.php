<?php
    require_once '../Connect/Connect_dbstock.php';

    $cate_name = $_POST['cate_name'];
    $remark = $_POST['remark'];

        $selec_cate_name = "SELECT * FROM categories WHERE '$cate_name' = cate_name";
        $row_cate_name = mysqli_query($conn, $selec_cate_name);
        
        if (mysqli_num_rows($row_cate_name) == 1){
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'ມີປະເພດສິນຄ້ານີ້ຢູ່ແລ້ວ',
                text: 'ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ',
                confirmButtonText: 'ຕົກລົງ'
            })
            </script>";
        } else {
            $insert_catte_name = "INSERT INTO categories (cate_name,remark) VALUES ('$cate_name','$remark') ";
            $insert_query = mysqli_query($conn,$insert_catte_name);
              if ($insert_query){
                echo "
            <script>
            Swal.fire({
                icon: 'success',
                title: 'ບັນທືກຂໍ້ມູນສຳເລັດ',
                showConfirmButton: false,
                timer: 1500
            })
            
            setTimeout(()=>{location = 'select_categories.php'},2000)
            
            </script>
            ";
              }
        }
?>