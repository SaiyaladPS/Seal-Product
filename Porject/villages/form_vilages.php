<?php 
    require '../Connect/Connect_dbstock.php';
    $sql = "SELECT * FROM provinces ORDER BY pro_name ASC";
    $query = mysqli_query($conn, $sql);
    $sql_body = "SELECT * FROM districts INNER JOIN provinces ON provinces.pro_id = districts.pro_id INNER JOIN villages ON villages.dis_id = districts.dis_id ORDER BY provinces.pro_name ASC ";
    $query_body = mysqli_query($conn,$sql_body);
    $number = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require '../layout/link.php' ?> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@200;400&display=swap');

    * {
        font-family: 'Noto Sans Lao', sans-serif;
    }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!-- // todo        Admin LTE    -->
    <script src="../layout/script.js"></script>
</head>

<body>

     <!-- // todo        Admin LTE    -->
    <?php require '../layout/navbar.php' ?>
            <!-- // ! ໜ້າສະແດງສະຖານະການເຂົ້າເຖິງຟາຍ -->

            <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນບ້ານ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../products/table_products.php">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນບ້ານ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form class="row g-3 my-0 mx-auto" id="form_pro">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ເລືອກແຂວງ</label>
                <select name="pro" id="pro" class="form-control">
                    <option value="" hidden>ເລືອກແຂວງ</option>
                    <?php foreach($query as $rows){ ?>
                    <option value="<?php echo $rows['pro_id'] ?>"><?php echo $rows['pro_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ເລືອກເມືອງ</label>
                <select name="dis" id="dis" disabled class="form-control">
                    <option value="" hidden>ເລືອກເມືອງ</option>
                </select>
            </div>
            <div class="col-auto">
                <input type="text" disabled name="vill" class="form-control" id="vill" placeholder="ຊື່ບ້ານ">
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ໜາຍເຫດ</label>
                <textarea class="form-control remark" disabled placeholder="ໜາຍເຫດ" name="remark" id="inputPassword2"
                    rows="1"></textarea>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">ບັນທືກ</button>
            </div>
            <div class="col-auto">
                <button type="reset" class="btn btn-danger mb-3">ລ້າງຂໍ້ມູນ</button>
            </div>
        </form>
        <!-- ຕາຕະລາງ -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ລຳດັບ​</th>
                    <th>ແຂວງ</th>
                    <th>ເມືອງ</th>
                    <th>ບ້ານ</th>
                    <th>ໜາຍເຫດ</th>
                    <th>ລົບ</th>
                    <th>ແກ້ໄຂ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query_body as $row_body) { ?>
                <tr>
                    <td><?php echo $number++ ?></td>
                    <td><?php echo $row_body['pro_name'] ?></td>
                    <td><?php echo $row_body['dis_name'] ?></td>
                    <td><?php echo $row_body['vill_name'] ?></td>
                    <td><?php echo $row_body['remark'] ?></td>
                    <td><button type="button" id="<?php echo $row_body['vill_id'] ?>"
                            class="btn btn-outline-danger delete">ລົບ</button></td>
                    <td><button type="button" id="<?php echo $row_body['vill_id'] ?>"
                            class="btn btn-outline-warning edmit" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">ແກ້ໄຂ</button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php require 'Modal.php' ?>
    </div>
    <!-- // todo        Admin LTE    -->
    <?php require '../layout/footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {

        $('#pro').change(function() {
            $('#dis').html('<option value="" hidden>ເລືອກເມືອງ</option>')
            var uid = $(this).val();
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
                    var dataJson = JSON.parse(data);
                    $('#dis').prop('disabled', false)
                    $.each(dataJson, function(key, value) {
                        var showlist =
                            `<option value="${value.dis_id}">${value.dis_name}</option>`
                        $('#dis').append(showlist)
                    })
                }
            })
        })

        $('#dis').change(function() {
            $('#vill').prop('disabled', false)
            $('.remark').prop('disabled', false)
        })

        $('#form_pro').on('submit', function(e) {
            e.preventDefault();
            var pro = $('#pro')
            var dis = $('#dis')
            var vill = $('#vill')
            // todo ກວດເຊັກຄ່າວ່າງ
            if (pro.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາເລືອກແຂວງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (dis.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາເລືອກເມືອງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (vill.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນຊື່ບ້ານ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                // todo ກວດເຊັກຄ່າຊ້ຳກັນ
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        'pro_id': pro.val(),
                        'dis_id': dis.val(),
                        'vill_name': vill.val()
                    },
                    error: function(err) {
                        console.log(err)
                    },
                    success: function(check) {
                        if (check >= 1) {
                            Swal.fire({
                                icon: 'error',
                                title: 'ມີຂໍ້ມູນນີ້ຢູ່ໃນລະບົບແລ້ວ',
                                confirmButtonText: 'ຕົກລົງ'
                            })
                        } else {
                            $.ajax({
                                url: 'insert.php',
                                method: 'post',
                                data: $('#form_pro').serialize(),
                                error: function(err) {
                                    console.log(err)
                                },
                                success: function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ບັນທືກຂໍ້ມູນສຳເລັດແລ້ວ',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    setTimeout(() => {
                                        location.reload()
                                    }, 1500)
                                }
                            })
                        }
                    }
                })
            }
        })

        // ! ລົບຂໍ້ມູນ
        $('.delete').click(function() {
            var delete_id = $(this).attr('id');
            Swal.fire({
                title: 'ທ່ານຍືນຍັນຈະລົບຂໍ້ມູນນີ້ ຫຼຶ ບໍ?',
                text: "ຖ້າຫາກລົບແລ້ວກະລຸນາກົດທີ່ ຢືນຢັນ!",
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

        // ! form ແກ້ໄຂ້
        $('.edmit').click(function() {
            var uid = $(this).attr('id')
            $.ajax({
                url: 'select.php',
                method: 'post',
                data: {
                    uid_edmit: uid
                },
                error: function(err) {
                    console.log(err)
                },
                success: function(data) {
                    var dataJson = JSON.parse(data);
                    $.each(dataJson, function(key, value) {
                        $('#edmit_vill_id').val(value.vill_id);
                        $('#edmit_pro').append(
                            `<option hidden selected value="${value.pro_id}">${value.pro_name}</option>`
                        )
                        $('#edmit_dis').append(
                            `<option hidden selected value="${value.dis_id}">${value.dis_name}</option>`
                        )
                        $('#edmit_vill').val(value.vill_name)
                        $('#edmit_remark').val(value.remark)

                        // ຄົ້ນເມືອງຂອງແຂວງທີ່ແກ້ໄຂ
                        $('#edmit_dis').html('')
                        var uid = $('#edmit_pro').val()
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
                                var dataJson = JSON.parse(data)
                                $.each(dataJson, function(key, value) {
                                    $("#edmit_dis").append(
                                        `<option value="${value.dis_id}">${value.dis_name}</option>`
                                    )
                                })
                            }
                        })

                        $('#edmit_pro').change(function() {
                            // ຄົ້ນເມືອງຂອງແຂວງທີ່ເລືອກໃນການແກ້ໄຂ້ ແລ້ວກົດເລືອກແຂວງ
                            $('#edmit_dis').html('')
                            var uid = $(this).val()
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
                                    var dataJson = JSON.parse(
                                        data)
                                    $.each(dataJson, function(
                                        key, value) {
                                        $("#edmit_dis")
                                            .append(
                                                `<option value="${value.dis_id}">${value.dis_name}</option>`
                                            )
                                    })
                                }
                            })
                        })
                    })
                }
            })
        })

        // !  ສົ່ງຄ່າເພືອໄປແກ້ໄຂຂໍ້ມູນໃນຖານຂໍ້ມູນ
        $('#form_edmit').on('submit', function(e) {
            e.preventDefault();
            var pro_id = $('#edmit_pro')
            var dis_id = $('#edmit_dis')
            var vill_name = $('#edmit_vill');
            if (pro_id.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາເລືອກແຂວງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (dis_id.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາເລືອກເມືອງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (vill_name.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນຊື່ບ້ານ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        pro_id: pro_id.val(),
                        dis_id: dis_id.val(),
                        vill_name: vill_name.val()
                    },
                    error: function(err) {
                        console.log(err)
                    },
                    success: function(check) {
                        if (check >= 1) {
                            Swal.fire({
                                icon : 'warning',
                                title : "ເກີດຂໍ້ຜິດພາດບາງຢ່າງ",
                                text : 'ກະລຸນາກວດສອບຂໍ້ມູນທີ່ທ່ານປ້ອນມາອາດຈະມີຂໍ້ມູນນີ້ຢູ່ແລ້ວ',
                                confirmButtonText : 'ຕົກລົງ'
                            })
                        } else {
                            Swal.fire({
                                title: 'ທ່ານຢືນຢັນການແກ້ໄຂຂໍ້ມູນນີ້ ຫຼຶ ບໍ?',
                                text: "ຖ້າທ່ານຢືນຢັນຂໍ້ມູນເກົ່າທີ່ຖືກແກ້ໄຂຈະຖືກລົບຖິ້ມ!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'ຢືນຢັນ',
                                cancelButtonText: 'ຍົກເລີກ'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: 'update.php',
                                        method: 'post',
                                        data: $('#form_edmit').serialize(),
                                        error: function(err) {
                                            console.log(err)
                                        },
                                        success: function() {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            setTimeout(() => {
                                                location
                                                .reload()
                                            }, 1500)
                                        }
                                    })

                                }
                            })
                        }
                    }
                })
            }
        })

    })
    </script>
</body>

</html>