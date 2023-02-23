<?php
    include '../Connect/Connect_dbstock.php';
    $sql = "SELECT * FROM receives INNER JOIN products ON receives.prod_id = products.prod_id ORDER BY rtime DESC";
    $query = mysqli_query($conn,$sql);
    $number = 1;

    $sql_date = "SELECT DISTINCT rdate FROM receives";
    $query_date = mysqli_query($conn,$sql_date);
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
    <!-- // TODO   admin let link -->
    <?php require '../layout/link.php' ?>
    <!-- // TODO    Admin let script -->
    <script  src="../layout/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<body>
<!-- // TODO Admin let navbar -->
<?php require '../layout/navbar.php' ?>

  <!-- // ! ໜ້າສະແດງສະຖານະການເຂົ້າເຖິງຟາຍ -->
  <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນການນຳເຂົ້າສິນຄ້າ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../products/table_products.php">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນການນຳເຂົ້າສິນຄ້າ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="mb-3">
        <label for="exampleDataList" class="form-label fs-4">ປີ-ເດືອນ-ວັນ</label>
        <input class="form-control sechdate" list="datalistOptions" id="exampleDataList"
            placeholder="ປ້ອນ ປີ-ເດືອນ-ວັນ">
        <datalist id="datalistOptions">

            <?php foreach($query_date as $row) { ?>
            <option value="<?php echo $row['rdate']?>"><?php echo $row['rdate']?></option>
            <?php } ?>
        </datalist>
        <samp id="error"></samp>

    </div>
    <div class="mb-3">
        <button type="button" id="btnaddDate" class="btn btn-outline-warning">ລະຫວ່າງ</button>
    </div>
    <div class="mb-3 btnOn">
        <button type='button' class='btn btn-outline-danger' id='btnoff'>ປິດລະຫວ່າງ</button>
    </div>


    <div class="mb-3 show">
        <label for="exampleDataList" class="form-label fs-4">ປີ-ເດືອນ-ວັນ</label>
        <input class="form-control sechdate_tow" list="datalistOptions" id="exampleDataList" placeholder="ປີ-ເດືອນ-ວັນ">
        <datalist id="datalistOptions">
            <?php foreach($query_date as $row) { ?>
            <option value="<?php echo $row['rdate']?>"><?php echo $row['rdate']?></option>
            <?php } ?>
        </datalist>
    </div>

        <!-- alert sum -->
        <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">ລ່ວມຍອດເງີນ</h4>
        <p id="showSum"></p>
    </div>

    <button type="button" id="add_receives" data-bs-toggle="modal" data-bs-target="#insert_receives" class=" btn btn-outline-success">ເພິ່ມລາຍການ</button>
    <!-- //!        ການສະແດງ Modal insert -->
    <?php require '../receives/insert-Modal.php' ?>

    <table class="table table-bordered border-primary" id="tables">
        <thead>
            <tr>
                <th>ລຳດັບ</th>
                <th>ບາໂຄດ</th>
                <th>ຊື່ສິນຄ້າ</th>
                <th>ຈຳນວນນຳເຂົ້າ</th>
                <th>ລາຄາຊື່</th>
                <th>ເງີນລ່ວມ</th>
                <th>ວັນທີ່ ແລະ ເວລາ</th>
                <th>ໜາຍເຫດ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($query as $row) { ?>
            <tr>
                <td><?php echo $number++ ?></td>
                <td><?php echo $row['prod_id']?></td>
                <td><?php echo $row['prod_name']?></td>
                <td><?php echo $row['rqty']?></td>
                <td><?php echo number_format($row['bprice']) . 'ກີບ'?></td>
                <td><?php echo number_format($row['amount']) . ' ກີບ'?></td>
                <td><?php echo $row['rdate'] . " / " . $row['rtime']?></td>
                <td><?php echo $row['remark']?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="showtable"></div>
    <table class="table table-bordered border-primary" id="showdatatow">
        <thead>
            <tr>
                <th>ລຳດັບ</th>
                <th>ບາໂຄດ</th>
                <th>ຊື່ສິນຄ້າ</th>
                <th>ຈຳນວນນຳເຂົ້າ</th>
                <th>ລາຄາຊື່</th>
                <th>ເງີນລ່ວມ</th>
                <th>ວັນທີ່ ແລະ ເວລາ</th>
                <th>ໜາຍເຫດ</th>
            </tr>
        </thead>
        <tbody id="shwodataSelect">
        
        </tbody>
    </table>
</div>

<!-- // todo    Admin LET footer -->
<?php require '../layout/footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('#showdatatow').hide()
        $('.sechdate').keyup(function() {
            $('.sechdate').attr('placeholder', 'ປ້ອນ ປີ-ເດືອນ-ວັນ')
            $('.sechdate').removeClass('border border-danger')
            $('#showdatatow').show()
            var dateOne = $('.sechdate').val();
            if (dateOne == '') {
                $.ajax({
                    url: 'selectDefault.php',
                    success: function(data) {
                        $('#shwodataSelect').html(data)
                    }
                })
            } else {
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        date_one: dateOne
                    },
                    success: function(data) {
                        $('#tables').hide()
                        $('#shwodataSelect').html(data)
                        // SUM
                        $.ajax({
                            url: 'select.php',
                            method: 'post',
                            data: {
                                date_sum: dateOne
                            },
                            success: function(sum) {
                                var sumJson = JSON.parse(sum)
                                $('#showSum').html(Math.floor(sumJson[0].sum) +
                                    ' ກີບ')
                            }
                        })
                    }
                })
            }
        })
        $('#btnoff').hide()

        // ປິດລະຫວ່າງ
        $('#btnoff').click(function() {
            $(this).hide()
            $('.show').hide()
            $('#btnaddDate').show()
            var dateOne = $('.sechdate').val();
             // ເປິດdate_1
             $('.sechdate').prop('disabled', '')
            if (dateOne == '') {
                $.ajax({
                    url: 'selectDefault.php',
                    success: function(data) {
                        $('#shwodataSelect').html(data)
                    }
                })
            } else {
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        date_one: dateOne
                    },
                    success: function(data) {
                        $('#tables').hide()
                        $('#shwodataSelect').html(data)
                    }
                })
                $.ajax({
                    url: 'select.php',
                    method: 'post',
                    data: {
                        date_sum: dateOne
                    },
                    success: function(sum) {
                        var sumJson = JSON.parse(sum)
                        $('#showSum').html(Math.floor(sumJson[0].sum) + ' ກີບ')
                    }
                })
                $('.sechdate').keyup(function() {
                    var dateOne = $('.sechdate').val();
                    $.ajax({
                        url: 'select.php',
                        method: 'post',
                        data: {
                            date_one: dateOne
                        },
                        success: function(data) {
                            $('#tables').hide()
                            $('#shwodataSelect').html(data)
                        }
                    })
                    // SUM
                    $.ajax({
                        url: 'select.php',
                        method: 'post',
                        data: {
                            date_sum: dateOne
                        },
                        success: function(sum) {
                            var sumJson = JSON.parse(sum)
                            $('#showSum').html(Math.floor(sumJson[0].sum) + ' ກີບ')
                        }
                    })
                })
           
            }
                
        })

        $('.show').hide()

        // ເປິດລະຫວ່າງ
        $('#btnaddDate').click(function() {


            if ($('.sechdate').val() == '') {
                $('.sechdate').addClass('border border-danger')
                $('#error').html('<p class=" text-danger">ກະລຸນາປ້ອນຂໍ້ມູນກ່ອນ</p>')
            } else {
                $('#error').html('')
                $('.sechdate_tow').val('')
                $(this).hide()
                $('#btnoff').show()
                $('.show').show()
                $('.sechdate_tow').keyup(function() {
                    var date_tow = $('.sechdate_tow').val()
                    var date_One = $('.sechdate').val();
                    if (date_One == '') {
                        $('.sechdate').attr('placeholder', 'ກະລຸນາປ້ອນວັນທີ່ເລິ່ມຕົ້ນກ່ອນ')
                        $('.sechdate').addClass('border border-danger')
                    } else {

                        $.ajax({
                            method: 'post',
                            url: 'select.php',
                            data: {
                                date_1: date_One,
                                date_2: date_tow
                            },
                            success: function(data) {
                                $('#shwodataSelect').html(data)
                            }
                        })
                        // SUM
                        $.ajax({
                            method: 'post',
                            url: 'select.php',
                            data: {
                                date_sum_One: date_One,
                                data_sum_two: date_tow
                            },
                            success: function(data) {
                                var dataJson = JSON.parse(data)
                                $('#showSum').html(Math.floor(dataJson[0].sumTow) +
                                    ' ກີບ');
                            }
                        })

                    }
                })

                $('.sechdate').keyup(function() {
                    var date_tow = $('.sechdate_tow').val()
                    var date_One = $('.sechdate').val();
                    if (date_One == '') {
                        $('.sechdate').attr('placeholder', 'ກະລຸນາປ້ອນວັນທີ່ເລິ່ມຕົ້ນກ່ອນ')
                        $('.sechdate').addClass('border border-danger')
                    } else {
                        $.ajax({
                            method: 'post',
                            url: 'select.php',
                            data: {
                                date_1: date_One,
                                date_2: date_tow
                            },
                            success: function(data) {
                                $('#shwodataSelect').html(data)
                            }
                        })
                    }
                })
                 //    ປິດ date_1
            var date_1 = $('.sechdate')
            if (date_1.val() == '') {} else {
                date_1.prop('disabled', 'true')
            }
            }

           

        })

        // !        form insert
        $('.prod_id').keyup(function(e) {
            e.preventDefault()
            $('.prod_id').css('color', 'red');
            var checkid = $('.prod_id').val()
            $('.prod_name').val(`ບໍ່ພົບຂໍ້ມູຂອງ ${checkid}`).css('color', 'red');
            $('.bp').val(`ບໍ່ພົບຂໍ້ມູນຂອງ: ${checkid}`).css('color', 'red')
            $('.amount').val(`ບໍ່ພົບຂໍ້ມູນຂອງ: ${checkid}`).css('color', 'red');

            $.ajax({
                url: 'check.php',
                method: 'post',
                data: {
                    prod_id: checkid
                },
                success: function(data) {
                    var DataJson = JSON.parse(data)
                    var id = DataJson.prod_id

                    $('.prod_id').css('color', 'green')
                    $('.prod_name').val(DataJson.prod_name).css('color', 'green')
                    $('.bp').val(Math.floor(DataJson.bprice)).css('color', 'green')
                    $('.amount').val(Math.floor(DataJson.bprice)).css('color',
                        'blue');
                    $('.qty').val('1').css('color', 'red');
                    $('.qty').keyup(function() {
                        $(this).css('color', 'blue')
                        var qty = $(this).val() * DataJson.bprice;
                        $('.amount').val(qty)
                    })
                },
            })
        })

        $('.prod_id').add(function() {
            if ($('.prod_id').val() == '') {
                $('.ber').attr('type', 'button')
            }
        })

        $('#send').click(function() {
            var id = $('.prod_id').val();
            var name = $('.prod_name').val();
            var bp = $('.bp').val()
            var qty = $('.qty').val()
            var amount = $('.amount').val();
            var remark = $('.remark').val()
            if (id == '') {
                Swal.fire({
                    icon: 'warning',
                    title: `ກະລຸນາປ້ອນ ບາໂຄດ`,
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ ແລະ ປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ',
                    confirmButtonText: 'ຕົກລົງ',
                })
            } else if (qty == '') {
                Swal.fire({
                    icon: 'warning',
                    title: `ກະລຸນາປ້ອນ ຈຳນວນ`,
                    text: 'ກວດສອບຂໍ້ມູນໃຫ້ແນ່ໃຈ ແລະ ປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ',
                    confirmButtonText: 'ຕົກລົງ',
                })
            } else {
                $.ajax({
                    url: 'insert.php',
                    method: 'post',
                    data: {
                        id: id,
                        name: name,
                        qty: qty,
                        bprice: bp,
                        amount: amount,
                        remark: remark
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: `ບັນທືກຂໍ້ມູນສຳເລັດ`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        if (data == 1) {
                            $.ajax({
                                url: 'update.php',
                                method: 'post',
                                data:  {
                                    upid : id,
                                    upqty : qty
                                }
                            })
                        }
                        setTimeout(() => {location = 'select_receives.php'},1500)
                    }
                })
            }

        })
    })
    </script>
</body>

</html>