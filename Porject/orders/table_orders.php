<?php
    require '../Connect/Connect_dbstock.php';
    $sql_date = "SELECT DISTINCT odate  FROM orders";
    $query = mysqli_query($conn, $sql_date);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@200;400&display=swap');

    * {
        font-family: 'Noto Sans Lao', sans-serif;
    }
    </style>
    <!-- // todo Admin LTE -->
    <?php require '../layout/link.php' ?>
    <script src="../layout/script.js"></script>
</head>

<body>
    <!-- //todo     Admin LTE -->
    <?php require '../layout/navbar.php'  ?>

        <!-- // ! ໜ້າສະແດງສະຖານະການເຂົ້າເຖິງຟາຍ -->

        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນການຂາຍສິນຄ້າ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../products/table_products.php">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນການຂາຍສິນຄ້າ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="mb-3">
            <label for="exampleDataList">ປີ-ເດືອນ-ວັນ</label>
            <input type="text" placeholder="ປ້ອນ ປີ-ເດືອນ-ວັນ" name="" class="form-control date_one"
                list="datalistOptions">
            <small id="error"></small>
            <datalist id="datalistOptions">
                <?php foreach($query as $option){ ?>
                <option><?php echo $option['odate'] ?></option>
                <?php } ?>
            </datalist>
        </div>
        <div class="mb-3" id="input_date">

        </div>
        <!-- ເປິດລະຫວ່າງ -->
        <div class="mb-3" id="btn ">
            <button type="button" id="btnOn" class="btn btn-outline-warning">ເປິດລະຫວ່າງ</button>
            <button type="button" id="btnOff" class="btn btn-outline-danger d-none">ປິດລະຫວ່າງ</button>
        </div>
        <button type="button" class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#insert-orders">ເພິ່ມການຂາຍ</button>
        <?php require '../orders/inser_orders_Modal.php' ?>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ລະຫັດສິນຄ້າ</th>
                    <th>ຊື່ສິນຄ້າ</th>
                    <th>ຈຳນວນ</th>
                    <th>ລາຄາຂາຍ</th>
                    <th>ເງີນລວ່ມ</th>
                    <th>ວັນທີ່ ແລະ ເວລາ</th>
                    <th>ໜາຍເຫດ</th>
                </tr>
            </thead>
            <tbody id="show_data">

            </tbody>
        </table>
    </div>

    <!-- //todo     Admin LTE -->
    <?php require '../layout/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
    $(document).ready(function() {
        // *ຫາຂໍ້ມູນທັ້ງໝົດ
        $.ajax({
            method: 'post',
            url: 'selectdate.php',
            success: function(data_all) {
                var data_allJson = JSON.parse(data_all)
                // TODO ເປັນການນຳຂໍ້ມູນ Json ມາເຮັດຊ້ຳ ດວ້ຍ index ກໍຄື ຈຳນວນຂໍ້ມູນ value ອ້າງອີງເຖິງ ຂໍ້ມູນ
                $.each(data_allJson, function(index, value) {
                    var tr = `
                        <tr>
                        <td>${index}</td>
                        <td>${value.prod_id}</td>
                        <td>${value.prod_name}</td>
                        <td>${value.o_qty}</td>
                        <td>${Math.floor(value.sprice)} ກີບ</td>
                        <td>${Math.floor(value.amount)} ກີບ</td>
                        <td>${value.odate} ${value.otime}</td>
                        <td>${value.remark}</td>
                        </tr>
                        `
                    $('#show_data').append(tr)
                })
            },
            error: function(err) {
                console.log(error)
            }
        })

        // ! input date_one
        $('.date_one').keyup(function() {
            $('#show_data').html('')
            var date_one = $(this).val();
            if (date_one == '') {
                $('#error').html('<p class="text-danger">ກຸລຸນາປ້ອນວັນທີ່ເພືອຄົນຫາ</p>')
            } else {
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        date_one: date_one
                    },
                    success: function(data) {
                        var dataJson = JSON.parse(data)
                        $.each(dataJson, function(key, value) {
                            var trdate = `
                            <tr>
                                <td>${key}</td>
                                <td>${value.prod_id}</td>
                                <td>${value.prod_name}</td>
                                <td>${value.o_qty}</td>
                                <td>${Math.floor(value.sprice)} ກີບ</td>
                                <td>${Math.floor(value.amount)} ກີບ</td>
                                <td>${value.odate} ${value.otime}</td>
                                <td>${value.remark}</td>
                             </tr>
                            `
                            $('#show_data').append(trdate)
                        })
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })
            }
        })

        // ! ເມືອມີການກົດປຸ່ມເປິດລະຫວ່າງ
        $('#btnOn').click(function() {
            if ($('.date_one').val() == '') {
                Swal.fire({
                    icon : 'error',
                    title : 'ກະລຸນາປ້ອນວັນທີ່ເລິ່ມຕົ້ນກ່ອນ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                $('.date_one').prop('disabled', true)
            $(this).hide()
            $('#btnOff').removeClass('d-none')
            var option = ` 
            <label for="exampleDataList">ປີ-ເດືອນ-ວັນ</label>
            <input type="text" placeholder="ປ້ອນ ປີ-ເດືອນ-ວັນ" name="" class="form-control date_two"
                list="datalistOptions">
            <small id="error"></small>
            <datalist id="datalistOptions">
                <?php foreach($query as $option){ ?>
                <option><?php echo $option['odate'] ?></option>
                <?php } ?>
            </datalist>
        `
            $('#input_date').append(option)

                    $('.date_two').keyup(function() {
                        var dateOne = $('.date_one').val();
                        var dateTwo = $('.date_two').val();
                        
                        // TODO ສົ່ງໄປຄົ້ນຫາ ລະຫວ່າງ dateOne and dateTwo
                        $.ajax({
                            url : 'select.php',
                            method : 'post',
                            data : {
                                dateOne : dateOne,
                                dateTwo : dateTwo
                            },
                            success: function(data) {
                                var data_two_json = JSON.parse(data);
                                $.each(data_two_json, function(key, value) {
                                    var data_two = `
                                        <tr>
                                            <td>${key}</td>
                                            <td>${value.prod_id}</td>
                                            <td>${value.prod_name}</td>
                                            <td>${value.o_qty}</td>
                                            <td>${Math.floor(value.sprice)} ກີບ</td>
                                            <td>${Math.floor(value.amount)} ກີບ</td>
                                            <td>${value.odate} ${value.otime}</td>
                                            <td>${value.remark}</td>
                                        </tr>
                                        `
                                        $('#show_data').append(data_two)
                                })
                            },
                            error : function(err) {
                                console.log(err)
                            }
                        })
                    })
            }
        })

        $('#btnOff').click(function() {})
        // ! ເມືອມີການກົດປຸ່ມປິດລະຫວ່າງ


        // !        form order insert 
        $('.prod_id').keyup(function() {
            var id = $(this).val();
            if (id == '') {
                $('#error_1').html(`<p class=' text-danger'>ກະລຸນາປ້ອນຂໍ້ມູນບາໂຄດ</p>`)
                $('#error_2').html('')
                $('.prod_name').val('')
                $('.o_qty').val('')
                $('.sprice').val('')
                $('.amount').val('')
                $('.o_qty').prop('disabled', 'true')
            } else {
                $('#error_1').html('')
                $('.amount').val('')
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        prod_id: id
                    },
                    success: function(data) {
                        var dataJson = JSON.parse(data);
                        $('.prod_name').val(dataJson.prod_name);
                        $('.o_qty').val(1)
                        $('.sprice').val(Math.floor(dataJson.sprice))
                        $('.amount').val(Math.floor(dataJson.sprice))
                        $('.o_qty').prop('disabled', '')

                        $('.o_qty').keyup(function(e) {
                            var amountcheck = $('.amount').val();
                        if (amountcheck == '') {
                            $(this).val('')
                        }
                        //dddddddddddddddd
                            var O_qty = $(this).val()
                            if (O_qty <= 0) {
                                $('#error_2').html(
                                    '<p class=" text-danger">ຫ້າມນ້ອຍກວ່າ 0</p>'
                                )
                                $('.o_qty').val('')
                            } else {
                                $('#error_2').html('')
                                var sprice = dataJson.sprice;
                                var amount = O_qty * sprice;
                                $('.amount').val(amount)
                            }


                        })
                        
                    }
                })
            }
        })

        $('#orders_form').on('submit', function(e) {
            e.preventDefault()
            var prod_id = $('.prod_id').val();
            var o_qty = $('.o_qty').val();
            var sprice = $('.sprice').val()
            var amount = $('.amount').val()
            var remark = $('#remark').val()
            if (prod_id == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນບາໂຄດກອ່ນ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (o_qty == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ກະລຸນາປ້ອນຈຳນວນທີ່ຕ້ອງການຂາຍ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                $.ajax({
                    url: 'select.php',
                    type: 'post',
                    data: {
                        prod_id: prod_id,
                    },
                    success: function(dataQty) {
                        var Jsondata = JSON.parse(dataQty)
                        var numProd = Jsondata.qty
                        if (numProd < o_qty) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'ຈຳນວນສິນຄ້າໃນສະຕ໋ອກຕອນນີ້ໝົດແລ້ວ',
                                confirmButtonText: 'ຕົກລົງ'
                            })
                        } else {
                            $.ajax({
                                url: 'insert.php',
                                method: 'post',
                                data: {
                                    prod_id: prod_id,
                                    o_qty: o_qty,
                                    sprice: sprice,
                                    amount: amount,
                                    remark: remark
                                },
                                success: function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ຂ້າຍສິນຄ້າແລ້ວ',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    $.ajax({
                                        url: 'update.php',
                                        type: 'post',
                                        data: {
                                            o_qty: o_qty,
                                            prod_id: prod_id
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



<!-- ລຳດັບ ລະຫັດສິນຄ້າ ຊື່ສິນຄ້າ ຈຳນວນ ລາຄາຂາຍ ເງີນລວ່ມ ວັນທີ່ແລະ ເວລາ ໜາຍເຫດ -->