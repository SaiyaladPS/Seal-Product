<!-- 
<?php  
    require_once '../../Connect/Connect_dbstock.php';
    $select = mysqli_query($conn,"SELECT * FROM categories");
    $number = 1; 
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link sizes="76x76" href="../img/111.png">
    <link rel="icon" type="image/png" href="../img/111.png">
    <title>ຂໍ້ມູນປະເທດສິນຄ້າ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@200;400&display=swap');
        * {
            font-family: 'Noto Sans Lao', sans-serif;
        }
        </style>
</head>
<body> -->
        <div class="container">
            <div class="text-info text-center"><h2>ຂໍ້ມູນປະເທດສິນຄ້າ</h2></div>
            <button class="btn btn-success">ເພິ່ມຂໍ້ມູນ</button>
        <table class="table table-dark text-info">
  <thead>
    <tr>
        <th>ລຳດັບ</th>
        <th>ຊື່ປະເພດສິນຄ້າ</th>
        <th>ໜາຍເຫດ</th>
        <th>ແກ້ໄຂ</th>
        <th>ລົບ</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($select)) { ?>
        <tr>
            <td><?php  echo $number++ ?></td>
            <td><?php echo $row['cate_name']?> </td>
            <td><?php echo $row['remark']?> </td>
            <td><button type="button" id="<?php echo $row['cate_id']?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop" value="<?php echo $row['cate_name']?>" class="btn btn-warning edit">ແກ້ໄຂ <i class="bi bi-pencil-square"></i></a></td>
            <td><button type="button" id="<?php echo $row['cate_id']?>" value="<?php echo $row['cate_name']?>" class="btn btn-danger delete">ລົບ <i class="bi bi-trash3-fill"></i></a></td>
        </tr>
        <?php } ?>
  </tbody>
</table>
        </div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ການແກ້ໄຂຂໍ້ມູູນ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
        <h1  class="text-center bg-info mt-5">ຟ້ອມປະເທດສິນຄ້າ</h1>
            <div class="mb-3">
              <input type="hidden" name="" id="cate_id">
              <label for="cate_name" class="form-label">ປະເພດສິນຄ້າ</label>
              <input type="text"
                class="form-control" name="" id="cate_name" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
              <label for="remark" class="form-label">ໜາຍເຫດ</label>
              <input type="text"
                class="form-control" name="" id="remark" aria-describedby="helpId" placeholder="">
            </div>
            <button type="button" id="seno" class="btn btn-outline-primary">ແກ້ໄຂຂໍ້ມູນ <i class="bi bi-cloud-download-fill"></i></button>
            <button type="reset" class="btn btn-outline-danger">ລ້າງຂໍ້ມູນ <i class="bi bi-trash"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.delete').click(function (e) {
                    e.preventDefault();
                    var delete_id = $(this).attr("id");
                    var delete_name = $(this).val()
                  
                    Swal.fire({
                        title: `ທ່ານຕ້ອງການລົບ ${delete_name} ຫຼຶ ບໍ`,
                       
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: 'green',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ຍືນຍັນ',
                        cancelButtonText: 'ຍົກເລີກ',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.post('delete.php', {
                          delete_id : delete_id  
                        } , function () {
                            Swal.fire({
                              title: 'ລົບຂໍ້ມູນສຳເລັດແລ້ວ',
                              icon: 'success',
                              showConfirmButton: false,
                              timer: 1500
                            })
                            setTimeout(()=>{location.reload()},2000)
                        })
                        }
                    })
                });
                $(".edit").click(function(e){
                    e.preventDefault();
                    var edit_id = $(this).attr("id")

                    $.ajax({
                        method: "post",
                        url: "fetch.php",
                        data: {edit_id : edit_id},
                        dataType: "json",
                        success: function (data) {
                            $("#cate_id").val(data.cate_id)
                            $("#cate_name").val(data.cate_name)
                            $("#remark").val(data.remark)
                        }
                    });
                })
                $("#seno").click((e)=>{
                  e.preventDefault()
                  Swal.fire({
                  title: "ທ່ານຍືນຍັນການປ່ຽນຂໍ້ມູນຫຼຶບໍ",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ຍືນຍັນ',
                  cancelButtonText: 'ຍົກເລີກ'
                }).then((result) => {
                  if (result.isConfirmed) {
                    var update_id = $('#cate_id').val()
                    var update_name = $('#cate_name').val()
                    var update_remark = $('#remark').val()
                        $.ajax({
                          url: "edit.php",
                          method: 'post',
                          data: {
                            edit_id : update_id,
                            edit_name : update_name,
                            edit_remark : update_remark
                          },
                          success: () => {
                            Swal.fire({
                              title: 'ປ່ຽນແປງຂໍ້ມູນສຳຄັນ',
                              icon: 'success',
                              showConfirmButton: false,
                              timer: 1500
                            })
                            setTimeout(()=>{location.reload()},2000)
                          }
                        })
                  }
                })
                })
            });
        </script>
<!-- </body>
</html> -->