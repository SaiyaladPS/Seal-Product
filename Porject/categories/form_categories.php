<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@200;400&display=swap');
        * {
            font-family: 'Noto Sans Lao', sans-serif;
        }
        </style>
</head>
<body>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h1  class="text-center bg-info mt-5">ຟ້ອມປະເທດສິນຄ້າ</h1>
            <div class="mb-3">
              <label for="cate_name" class="form-label">ປະເພດສິນຄ້າ</label>
              <input type="text"
                class="form-control" name="" id="cate_name" aria-describedby="helpId" placeholder="ປ້ອນປະເພດສິນຄ້າ...">
            </div>
            <div class="mb-3">
              <label for="remark" class="form-label">ໜາຍເຫດ</label>
              <input type="text"
                class="form-control" name="" id="remark" aria-describedby="helpId" placeholder="">
            </div>
            <button type="button" id="seno" class="btn btn-outline-primary">ບັນທືກຂໍ້ມູນ <i class="bi bi-cloud-download-fill"></i></button>
            <button type="reset" class="btn btn-outline-danger">ລ້າງຂໍ້ມູນ <i class="bi bi-trash"></i></button>
            <a href="select_categories.php" class="btn btn-outline-warning">ເບິ່ງຂໍ້ມູນ</a>
        </div>
        <div class="col-sm-3"></div>
    </div>
        <div class="show"></div>

    <script>
        $(document).ready(function () {
            $('#seno').click(function (e) { 
                e.preventDefault();
                    var cate_1 = $('#cate_name').val();
                    var cate_2 = $('#remark').val();
                    if (cate_1 == ''){
                        swal.fire({
                        icon: 'error',
                        title: 'ກະລຸນາປ້ອນປະເພດສິນຄ້າ',
                        confirmButtonText: 'ຕົກລົງ'
                       })
                    } else {
                        $.post('insert_categories.php',{
                        cate_name : cate_1,
                        remark : cate_2
                        }, (e)=>{
                            $('.show').html(e)
                        })
                    }
                    
            });
        });
    </script>
</body>
</html>