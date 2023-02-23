<?php
    require '../Connect/Connect_dbstock.php';
    $sql_pro = "SELECT * FROM provinces ORDER BY pro_name ASC";
    $query_pro = mysqli_query($conn, $sql_pro);
    $sql_dis = "SELECT * FROM districts INNER JOIN provinces ON districts.pro_id = provinces.pro_id ORDER BY provinces.pro_name ASC";
    $query_dis = mysqli_query($conn, $sql_dis);
    $number = 1
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@200;400&display=swap');

    * {
        font-family: 'Noto Sans Lao', sans-serif;
    }
    </style>
    <!-- // todo Admin LTE -->
    <?php require '../layout/link.php' ?>
<!-- // todo Admin LTE -->
    <script src="../layout/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>

<body>
    <!-- // todo Admin LTE -->
    <?php require '../layout/navbar.php' ?>

        
    <!-- // ! ໜ້າສະແດງສະຖານະການເຂົ້າເຖິງຟາຍ -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນເມືອງ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../products/table_products.php">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນເມືອງ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
    <form class="row g-3 my-0 mx-auto" id="form_dis">
            <div class="col-auto">
                <select name="pro_name" class="form-control pro_name" id="">
                    <option selected hidden value="">ເລືອກແຂວງ</option>
                    <?php foreach($query_pro as $rows_pro){ ?>
                    <option value="<?php echo $rows_pro['pro_id'] ?>"><?php echo $rows_pro['pro_name']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ຊື່ເມືອງ</label>
                <input type="text" class="form-control dis_name" name="dis_name" id="inputPassword2"
                    placeholder="ຊື່ເມືອງ">
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ໜາຍເຫດ</label>
                <textarea class="form-control remark" placeholder="ໜາຍເຫດ" name="remark" id="inputPassword2"
                    rows="1"></textarea>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">ບັນທືກ</button>
            </div>
            <div class="col-auto">
                <button type="reset" class="btn btn-danger mb-3">ລ້າງຂໍ້ມູນ</button>
            </div>
        </form>

        <!-- ຟອມ Modal ແກ້ໄຂ -->
        <?php require 'Modal.php' ?>

        <!-- ຕາຕະລາງ -->
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ເມືອງ</th>
                    <th>ແຂວງ</th>
                    <th>ໜາຍເຫດ</th>
                    <th>ແກ້ໄຂ</th>
                    <th>ລົບ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query_dis as $rows_dis) {?>
                <tr>
                    <td><?php echo $number++ ?></td>
                    <td><?php echo $rows_dis['dis_name'] ?></td>
                    <td><?php echo $rows_dis['pro_name'] ?></td>
                    <td><?php echo $rows_dis['remark'] ?></td>
                    <td><button type="button" id="<?php echo $rows_dis['dis_id'] ?>" class="btn btn-warning edmit"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">ແກ້ໄຂ</button></td>
                    <td><button type="button" id="<?php echo $rows_dis['dis_id'] ?>"
                            class="btn btn-danger delete">ລົບ</button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require '../layout/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('#form_dis').on('submit', function(e) {
            e.preventDefault()
            var pro_name = $('.pro_name')
            var dis_name = $('.dis_name')
            var remark = $('.remark')
            if (pro_name.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນເລືອກແຂວງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (dis_name.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນຊື່ເມືອງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                // todo ສົ່ງຂໍມູນເພືອໄປກວດວ່າ ຖ້າມີ ແຂວງດັ່ງກ່າວ ມີເມືອງນີ້ແລ້ວ ບໍ່ໃຫ້ຜ່ານ
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        pro_name_check: pro_name.val(),
                        dis_name_check: dis_name.val()
                    },
                    error: function(err) {
                        console.log(err)
                    },
                    success: function(check) {
                        if (check >= 1) {
                            Swal.fire({
                                icon: 'error',
                                title: 'ແຂວງນີ້ໄດ້ມີເມືອງນີ້ຢູ່ໃນລະບົບແລ້ວ',
                                confirmButtonText: 'ຕົກລົງ'
                            })
                        } else {
                            $.ajax({
                                url: 'insert.php',
                                method: 'post',
                                data: $('#form_dis').serialize(),
                                error: function(err) {
                                    console.log(err)
                                },
                                success: function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ບັນທືກຂໍ້ມູນສຳເລັດ',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    setTimeout(() => {
                                        location.reload()
                                    }, 1500);
                                }
                            })
                        }
                    }
                })
            }
        })

        // !ລົບຂໍ້ມູນ
        $('.delete').click(function() {
            var delete_id = $(this).attr('id');
            Swal.fire({
                title: 'ທ່ານ ຢືນຢັນການລົບຂໍ້ມູນນີ້ ຫຼຶ ບໍ?',
                text: "ຖ້າທ່ານ ຢືນຢັນການລົບກະລຸນາກົດປຸ່ມ ຢືນຢັນ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ຢືນຢັນ',
                cancelButtonText: 'ຍົກເລີກ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'delete.php',
                        method: 'post',
                        data: {
                            delete: delete_id
                        },
                        error: function(err) {
                            console.log(err)
                        },
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'ລົບຂໍ້ມູນສຳເລັດແລ້ວ',
                                showConfirmButton: 'ຕົກລົງ',
                                timer: 1500
                            })
                            setTimeout(() => {
                                location.reload()
                            }, 1500)
                        }
                    })
                }
            })
        })

        // ! ຟອມແກ້ໄຂ
        $('.edmit').click(function() {
            var uid = $(this).attr('id');

            $.ajax({
                url: 'select.php',
                method: 'post',
                data: {
                    uid: uid
                },
                error: function(err) {
                    console.log(err)
                },
                success: function(data) {
                    var Json_data = JSON.parse(data);
                    $('#edmit_dis_id').val(Json_data.dis_id)
                    $('#select').val(Json_data.pro_id).text(Json_data.pro_name)
                    $('.edmit_dis_name').val(Json_data.dis_name)
                    $('.edmit_remark').val(Json_data.remark)
                }
            })
        })

        // ! ຕົກລົງແກ້ໄຂ
        $('#form_edmit_dis').on('submit', function(e) {
            e.preventDefault();
            var edmit_dis_id = $('#edmit_dis_id')
            var pro_id = $('#edmit_pro_name')
            var edmit_dis_name = $('.edmit_dis_name')
            var edmit_remark = $('.edmit_remark')
            if (pro_id.val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: "ກະລຸນາເລືອກແຂວງ",
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (edmit_dis_name.val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: "ກະລຸນາປ້ອນຊື່ເມືອງ",
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                $.ajax({
                    url: "update.php",
                    method: "post",
                    data: $("#form_edmit_dis").serialize(),
                    error: function(err) {
                        console.log(err)
                    },
                    success: function() {
                        Swal.fire({
                            icon: 'success',
                            title: "ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ",
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(() => {
                            location.reload()
                        }, 1500)
                    }
                })
            }
        })
    })
    </script>
</body>

</html>