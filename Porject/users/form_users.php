<?php
    require '../Connect/Connect_dbstock.php';
    $sql_pro = "SELECT * FROM provinces";
    $query_pro = mysqli_query($conn, $sql_pro);
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>

<body>

    <div class="container px-4">
        <h3 class="bg-primary text-center  fs-2 p-3">ຟ້ອມບັນທືກຜູ້ນຳໃຊ້</h3>
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 border bg-light">

                    <form id="form_users">
                        <div class="form-floating mb-3">
                            <input type="text" name="fname" class="form-control fname" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">ຊື່</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="lname" class="form-control lname" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">ນາມສະກຸນ</label>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input gander" type="radio" value="ຊາຍ" name="gander" id="form_ganger">
                                <label class="form-check-label" for="form_ganger">
                                    ເພດ : ຊາຍ
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input gander" type="radio" value="ຍີງ" name="gander" id="form_ganger_M">
                                <label class="form-check-label" for="form_ganger_M">
                                    ເພດ : ຍິງ
                                </label>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="dob" class="form-control dob" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">ວັນເດືອນປີເກີດ</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="Tel" class="form-control Tel" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">ເບີໂທ</label>
                        </div>

                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">

                    <div class="mb-5 mt-3">
                        <select class="form-select pro" name="pro" id="pro" aria-label="Default select example">
                            <option selected value="" hidden>ເລືອກແຂວງ</option>
                            <?php foreach($query_pro as $row_pro){  ?>
                            <option value="<?php echo $row_pro['pro_id'] ?>"><?php echo $row_pro['pro_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-5">
                        <select class="form-select dis" name="dis" id="dis" disabled aria-label="Default select example">
                            <option selected value="" hidden>ເລືອກເມືອງ</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <select class="form-select vill" name="vill" id="vill" disabled aria-label="Default select example">
                            <option selected value="" hidden>ເລືອກບ້ານ</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <select class="form-select status" name="status" id="status" aria-label="Default select example">
                            <option selected value="" hidden>ເລືອກສະຖານະ</option>
                            <option value="users">ຜູ້ໃຊ້ທົ່ວໄປ</option>
                            <option value="admin">ຜູ້ບໍລິຫານ</option>
                            <option value="sell">ຜູ້ຂາຍ</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">

                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control username" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ຊື່ຜູ້ໃຊ້</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control password" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ລະຫັດຜ່ານ </label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="c_password" class="form-control c_password" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ຢືນຢັນລະຫັດຜ່ານ</label>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" hidden id="show_password" value="option1">
                            <label class="form-check-label" for="show_password"><i id="show_font"
                                    class="fa-solid fa-eye"></i></label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="inputPassword2" class="visually-hidden">ໜາຍເຫດ</label>
                        <textarea class="form-control remark" placeholder="ໜາຍເຫດ" name="remark" id="inputPassword2"
                            rows="3"></textarea>
                    </div>

                </div>
            </div>

        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-outline-success">ບັນທືກ</button>
            <button type="reset" class="btn btn-outline-danger">ລ້າງ</button>
            <a href="tables_users.php" class="btn btn-outline-warning">ເບິ່ງຂໍ້ມູນ</a>
        </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        $('#pro').change(function() {
            $('#dis').html('').prop('disabled', false)
            // todo ສົ່ງຄ່າໄປຄົ້ນຫາເມືອງ ທີ່ເປັນແຂວງທີ່ສົ່ງໄປ
            var pro_id = $(this).val()
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
                    $.each(dataJson, function(key, value) {
                        $('#dis').append(`<option selected value="" hidden>ເລືອກເມືອງ</option>
                            <option value="${value.dis_id}">${value.dis_name}</option>`);
                    })
                }
            })
        })

        // todo ສົ່ງຄ່າໄປຄົ້ນຫາບ້ານ ຂອງເມືອງທີ່ເລືອກ
        $('#dis').change(function() {

            $('#vill').prop('disabled', false).html('')
            var dis_id = $(this).val()
            $.ajax({
                url: "select.php",
                method: 'post',
                data: {
                    dis_id: dis_id
                },
                error: function(err) {
                    console.log(err)
                },
                success: function(data) {
                    var datajson_dis = JSON.parse(data);
                    $.each(datajson_dis, function(key, value) {
                        $('#vill').append(`<option selected value="" hidden>ເລືອກບ້ານ</option>
                        <option value="${value.vill_id}">${value.vill_name}</option>`);
                    })
                }
            })
        })


        // ! ເປັນການຕັ້ງຄ່າ ສະແດງລະຫັດຜ່ານລະ ຢືນຢັນລະຫັດຜ່ານ

        $('#show_password').click(function() {
            var check = $(this).is(':checked');
            if (check) {
                $('.password').attr('type', 'text')
                $('.c_password').attr('type', 'text')
                $('#show_font').attr('class', 'fa-solid fa-eye-slash')
            } else {
                $('.password').attr('type', 'password')
                $('.c_password').attr('type', 'password')
                $('#show_font').attr('class', 'fa-solid fa-eye')
            }
        })

        $('#form_users').on('submit', function(e) {
            e.preventDefault();
            var fname = $('.fname');
            var lname = $('.lname')
            var gander = $('input[name=gander]:checked', '#form_users')
            var dob = $('.dob')
            var Tel = $('.Tel')
            var pro = $('.pro')
            var dis = $('.dis')
            var vill = $('.vill')
            var status = $('.status')
            var username = $('.username')
            var password = $('.password')
            var c_password = $('.c_password')
            var remark = $('.remark')

            if (fname.val() == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນຊື່',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (lname.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນນາມສະກຸນ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (gander.val() == undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນເພດ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (dob.val() == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນວັນເດືອນປີເກີດ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (Tel.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນເບີໂທ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (pro.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາເລືອກແຂວງ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (dis.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາເລືອກເມືອງ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (vill.val() == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາເລືອກບ້ານ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (status.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາເລືອກສະຖານະ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (username.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (password.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນລະຫັດຜ່ານ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (c_password.val() == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາຢຶນຢັນລະຫັດຜ່ານ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (password.val() != c_password.val()) {
                Swal.fire({
                    icon: 'error',
                    title: 'ລະຫັດຜ່ານບໍ່ຕົງກັນ',
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: $('#form_users').serialize(),
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
                                data: $('#form_users').serialize(),
                                error: function(err) {
                                    console.log(err)
                                },
                                success: function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ບັນທືກຂໍ້ມູນສຳເລັດແລ້ວ',
                                        confirmButtonText: 'ຕົກລົງ'
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