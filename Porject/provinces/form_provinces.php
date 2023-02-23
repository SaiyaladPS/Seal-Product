<?php
    require_once '../Connect/Connect_dbstock.php';
    $sql = "SELECT * FROM provinces ORDER BY pro_name ASC";
    $query = mysqli_query($conn, $sql);
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
                    <h1 class="m-0">ຂໍ້ມູນແຂວງ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../products/table_products.php">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນແຂວງ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form class="row g-3 my-0 mx-auto" id="form_pro">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ຊື່ແຂວງ</label>
                <input type="text" class="form-control pro_name" name="pro_name" id="inputPassword2"
                    placeholder="ຊື່ແຂວງ">
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

        <!-- ຕາຕະລາງ -->
        <table class="table table-dark table-borderless">
            <thead>
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ຊື່ແຂວງ</th>
                    <th>ໜາຍເຫດ</th>
                    <th>ລົບ</th>
                    <th>ແກ້ໄຂ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($query as $row) {?>
                <tr>
                    <td><?php echo $number++ ?></td>
                    <td><?php echo $row['pro_name'] ?></td>
                    <td><?php echo $row['remark'] ?></td>
                    <td><button type="button" class="btn btn-danger delete"
                            id="<?php echo $row['pro_id'] ?>">ລົບ</button></td>
                    <td><button type="button" class="btn btn-warning edmit" id="<?php echo $row['pro_id']?>"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">ແກ້ໄຂ</button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- ຟອມແກ້ໄຂ -->
    <?php require 'Modalupdate.php' ?>

        <!-- // todo Admin LTE -->
        <?php require '../layout/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('#form_pro').on('submit', function(e) {
            e.preventDefault()
            var pro_name = $('.pro_name');
            if (pro_name.val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນຊື່ແຂວງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                // TODO ສົ່ງຄ່າໄປກວດສອບຫາຂໍ້ມູນທີ່ຊ້ຳແລ້ວຫ້າມບັນທືກ
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        pro_name: pro_name.val()
                    },
                    success: function(data) {
                        if (data >= 1) {
                            // TODO ຖ້າວ່າມີຂໍ້ມູນນີ້ຢູ່ແລ້ວ
                            Swal.fire({
                                icon: 'error',
                                title: `ລະບົບມີຂໍ້ມູນ ${pro_name.val()} ແລ້ວ`,
                                text: 'ກະລຸນາປ້ອນຂໍ້ມູນໃໝ່ທີ່ບໍ່ມີຢູ່ໃນລະບົບ',
                                confirmButtonText: 'ຕົກລົງ'
                            })
                        } else {
                            // * ຖ້າວ່າບໍ່ມີຂໍ້ມູນຊ້ຳກັນ
                            $.ajax({
                                url: 'insert.php',
                                method: 'post',
                                data: $('#form_pro').serialize(),
                                success: function() {
                                    // TODO ຖ້າວ່າບັນທືກສຳເລັດແລ້ວ
                                    Swal.fire({
                                        icon: 'success',
                                        title: `ບັນທືກແຂວງ ${pro_name.val()} ສຳເເລັດແລ້ວ`,
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    setTimeout(() => {
                                        location.reload()
                                    }, 1500)
                                },
                                error: function(err) {
                                    console.log(err)
                                }
                            })
                        }
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })
            }
        })

        // ! ລົບຂໍ້ມູນ
        $('.delete').click(function() {
            Swal.fire({
                title: 'ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼຶ ບໍ?',
                text: "ຖ້າທ່ານລົບແລ້ວຈະບໍ່ສາມາດກູ້ຄືນໄດ້ອີກ!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ຍືນຍັນ    ',
                cancelButtonText: 'ຍົກເລີກ'
            }).then((result) => {
                if (result.isConfirmed) {
                    var delete_id = $(this).attr('id')
                    $.ajax({
                        url: 'delete.php',
                        method: 'post',
                        data: {
                            delete: delete_id
                        },
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: `ລົບຂໍ້ມູນສຳເລັດແລ້ວ`,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(() => {
                                location.reload()
                            }, 1500)
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    })
                }
            })

        })
        // TODO FORM ແກ້ໄຂ
        $('.edmit').click(function() {
            var uid = $(this).attr('id');
            $.ajax({
                url: 'select.php',
                method: 'post',
                data: {
                    selectID: uid
                },
                error: function(err) {

                },
                success: function(data) {
                    var dataJson = JSON.parse(data)
                    $('#edmit_id').val(dataJson.pro_id)
                    $('.edmit_name').val(dataJson.pro_name);
                    $('.edmit_remark').val(dataJson.remark)
                }
            })
        })

        // ! ແກ້ໄຂຂໍ້ມູນ
        $('#form_edmit').on('submit', function(e) {
            e.preventDefault()
            var edmit_name = $('.edmit_name')
            var edmit_remark = $('.edmit_remark')
            var edmit_id = $('#edmit_id')
                if (edmit_name.val() == '') {
                    Swal.fire({
                        icon : 'warning',
                        title : 'ກະລຸນາປ້ອນຊື່ແຂວງທີ່ຕ້ອງການປ່ຽນ',
                        confirmButtonText : 'ຕົກລົງ'
                    })
                } else {
                    $.ajax({
                        method : 'post',
                        url : 'update.php',
                        data : $('#form_edmit').serialize(),
                        error : function (err) {
                            console.log(err);
                        },
                        success : function () {
                            Swal.fire({
                                icon : 'success',
                                title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
                                showConfirmButton : false,
                                timer : 1500
                            })
                            setTimeout(() => {location.reload()},1500)
                        }
                    })
                }
        })
    })
    </script>
</body>

</html>