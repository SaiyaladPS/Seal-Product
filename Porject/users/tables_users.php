<?php
    require '../Connect/Connect_dbstock.php';
    $sql = "SELECT * FROM users INNER JOIN provinces ON provinces.pro_id = users.pro_id INNER JOIN districts ON districts.dis_id = users.dis_id INNER JOIN villages ON villages.vill_id = users.vill_id ORDER BY users.user_id  DESC;";
    $query = mysqli_query($conn, $sql);
    $number = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <h1 class="m-0">ຂໍ້ມູນຜູ້ໃຊ້ງານ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../products/table_products.php">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນຜູ້ໃຊ້ງານ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ລຳດັບ</th>
                <th>ຊື່</th>
                <th>ນາມສະກຸນ</th>
                <th>ເພດ</th>
                <th>ວັນເດືອນປີເກີດ</th>
                <th>ເບີໂທ</th>
                <th>ແຂວງ</th>
                <th>ເມືອງ</th>
                <th>ບ້ານ</th>
                <th>ສະຖານະ</th>
                <th>ຊື່ຜູ້ໃຊ້</th>
                <th>ແກ້ໄຂ</th>
                <th>ລົບ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($query as $rows) { ?>
            <tr>
                <td><?php echo $number++ ?></td>
                <td><?php echo $rows['fname'] ?></td>
                <td><?php echo $rows['lname'] ?></td>
                <td><?php echo $rows['gender'] ?></td>
                <td><?php echo $rows['dob'] ?></td>
                <td><?php echo $rows['tel'] ?></td>
                <td><?php echo $rows['pro_name'] ?></td>
                <td><?php echo $rows['dis_name'] ?></td>
                <td><?php echo $rows['vill_name'] ?></td>
                <td><?php if ($rows['status'] == 'admin') {
                    echo "ຜູ້ບໍລິຫານ";
                } else if ($rows['status'] == 'users') {
                    echo "ຜູ້ນຳໃຊ້ທົ່ວໄປ";
                } else if ($rows['status'] == 'sell') {
                    echo "ຜູ້ຂາຍ";
                }?></td>
                <td><?php echo $rows['username'] ?></td>
                <td><button type="button" id="<?php echo $rows['user_id']?>" class="btn btn-warning edmit"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">ແກ້ໄຂ</button></td>
                <td><button type="button" id="<?php echo $rows['user_id'] ?>" class="btn btn-danger delete">ລົບ</button>
                </td>
            </tr>
            <?php } ?>
            <?php require 'Modal.php' ?>
        </tbody>
    </table>
    <?php require '../layout/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        // ລົບຂໍ້ມູນ
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
                                title: 'ລົບຂໍ້ມູນສຳເລັດ',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(() => {
                                location.reload()
                            }, 1500);
                        }
                    })
                }
            })
        })

        // ! ຟອມແກ້ໄຂ
        $('.edmit').click(function() {
            var edmit_id = $(this).attr('id')
            $.ajax({
                url: 'select.php',
                method: 'post',
                data: {
                    edmit_id: edmit_id
                },
                error: function(err) {
                    console.log(err)
                },
                success: function(data) {
                    var dataJson = JSON.parse(data)
                    $.each(dataJson, function(key, value) {
                        $('.user_id').val(value.user_id)
                        $('.edmit_fname').val(value.fname)
                        $('.edmit_lname').val(value.lname)

                        // ເພດ
                        if (value.gender == 'ຊາຍ') {
                            $('#form_ganger').prop('checked', true)
                            $('#form_ganger_M').prop('checked', false)
                        } else if (value.gender == 'ຍີງ') {
                            $('#form_ganger_M').prop('checked', true)
                            $('#form_ganger').prop('checked', false)
                        }

                        $('.edmit_dob').val(value.dob)
                        $('.edmit_Tel').val(value.tel)
                        $('.edmit_pro').append(`
                        <option selected hidden value="${value.pro_id}">${value.pro_name}</option>
                        `)
                        $('.password').val(value.password)

                        // ! ຄົ້ນຫາບ້ານທີ່ຢູ່ໃນແຂວງທີ່ສົ່ງມາ
                        $('.edmit_dis').html('')
                        $.ajax({
                            url: 'select.php',
                            method: 'post',
                            data: {
                                pro_id: value.pro_id
                            },
                            error: function(err) {
                                console.log(err)
                            },
                            success: function(data) {
                                var dataJson = JSON.parse(data)
                                $.each(dataJson, function(key, val) {
                                    $('.edmit_dis').append(`
                                        <option value="${val.dis_id}">${val.dis_name}</option>
                                    `)
                                })
                            }
                        })

                        // todo ນຳຊື່ເມືອງເຂົ້້າໄປໃນ input
                        $('.edmit_dis').append(`
                        <option selected hidden value="${value.dis_id}">${value.dis_name}</option>
                        `)

                        // ! ຄົ້ນຫາບ້ານຂອງລະຫັດເມືອງດັ່ງກ່າວ
                        $('.edmit_vill').html('')
                        $.ajax({
                            url: 'select.php',
                            method: 'post',
                            data: {
                                dis_id: value.dis_id
                            },
                            error: function(err) {
                                console.log(err)
                            },
                            success: function(data) {
                                var dataJson = JSON.parse(data)
                                $.each(dataJson, function(key,
                                    val_vill) {
                                    $('.edmit_vill').append(`
                                        <option value="${val_vill.vil_id}">${val_vill.vill_name}</option>
                                    `)
                                })
                            }
                        })

                        // todo ນຳຊື່ບ້ານ ເຂົ້າໄປໃນ input
                        $('.edmit_vill').append(`
                            <option selected hidden value="${value.vill_id}">${value.vill_name}</option>
                        `)

                        if (value.status == 'admin') {
                            $('.edmit_status').append(`
                            <option selected hidden value="${value.status}">ຜູ້ບໍລິຫານ</option>
                            `)
                        } else if (value.status == 'users') {
                            $('.edmit_status').append(`
                            <option selected hidden value="${value.status}">ຜູ້ໃຊ້ງານທົ່ວໄປ</option>
                        `)
                        } else if (value.status == 'sell') {
                            $('.edmit_status').append(`
                            <option selected hidden value="${value.status}">ຜູ້ຂາຍ</option>
                        `)
                        }

                        // todo ນຳຊື່ username and ເຂົ້າໄປໃນ input
                        $('.edmit_username').val(value.username)
                        $('.edmit_remark').val(value.remark)
                    })
                }
            })

            // !ເມືອມີການກົດເລືອກແຂວງໃຫມ່
            $('.edmit_pro').change(function() {
                $('.edmit_dis').html('<option selected hidden value="">ເລືອກເມືອງ</option>')
                $('.edmit_vill').html('<option selected hidden value="">ເລືອກບ້ານ</option>')
                    .prop('disabled', true)
                var pro_id = $(this).val();
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        pro_id: pro_id
                    },
                    error: function(err) {
                        console.log(err)
                    },
                    success: function(data) {
                        var dataJson = JSON.parse(data)
                        $.each(dataJson, function(key, value_dis) {
                            $('.edmit_dis').append(`
                            <option value="${value_dis.dis_id}">${value_dis.dis_name}</option>
                        `)
                        })
                    }
                })
            })

            // ! ເມືອມີການເລືອກເມືອງໃຫມ່
            $('.edmit_dis').change(function() {
                $('.edmit_vill').prop('disabled', false).html(
                    '<option selected hidden value="">ເລືອກບ້ານ</option>')
                var dis_id = $(this).val()
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        dis_id: dis_id
                    },
                    error: function(err) {
                        console.log(err)
                    },
                    success: function(data) {
                        var dataJson = JSON.parse(data)
                        $.each(dataJson, function(key, val_dis) {
                            $('.edmit_vill').append(`
                                <option value="${val_dis.vill_id}">${val_dis.vill_name}</option>
                            `)
                        })
                    }
                })
            })

            // ! ສົ່ງຂໍ້ມູນໄປແກ້ໄຂ
            $('#form_edmit_users').on('submit', function(e) {
                e.preventDefault();
                var username = $('.edmit_username').val()
                var password = $('.password').val()
                var user_id = $('.user_id').val()
                var fname = $('.edmit_fname').val()
                var lname = $('.edmit_lname').val()
                var Tel = $('.edmit_Tel').val()
                if (password == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'ກະລຸນາປ້ອນ ລະຫັດຜ່ານ',
                        confirmButtonText: 'ຕົກລົງ'
                    })
                } else if (user_id == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'ກະລຸນາປ້ອນ ຊື່ຜູ້ໃຊ້',
                        confirmButtonText: 'ຕົກລົງ'
                    })
                } else if (fname == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'ກະລຸນາປ້ອນ ຊື່',
                        confirmButtonText: 'ຕົກລົງ'
                    })
                } else if (lname == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'ກະລຸນາປ້ອນ ນາມສະກຸນ',
                        confirmButtonText: 'ຕົກລົງ'
                    })
                } else if (Tel == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'ກະລຸນາປ້ອນ ເບີໂທ',
                        confirmButtonText: 'ຕົກລົງ'
                    })
                } else if (username == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'ກະລຸນາປ້ອນ ຊື່ຜູ້ໃຊ້',
                        confirmButtonText: 'ຕົກລົງ'
                    })
                } else {
                    Swal.fire({
                        title: 'ທ່ານຢືນຍັນທີ່ຈະປ່ຽນແປງຂໍ້ມູນ ຫຼຶ ບໍ?',
                        text: "ຖ້າທ່ານຕ້ອງການກະທຸນາກົດທີ່ປຸ່ມຢືນຢັນຈະຂໍ້ມູນເກົ່າຈະຖືກປ່ຽນແປງ!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ຢືນຢັນ',
                        cancelButtonText : 'ຍົກເລີກ'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'update.php',
                                method: 'post',
                                data:$('#form_edmit_users').serialize(),
                                error: function(err) {
                                    console.log(err)
                                },
                                success: function() {
                                    Swal.fire({
                                        icon : 'success',
                                        title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
                                        showConfirmButton : false,
                                        timer : 1500
                                    })
                                    setTimeout(() => {
                                        location.reload()
                                    }, 1500);
                                }
                            })
                        }
                    })
                }
            })
        })
    })
    </script>
</body>

</html>