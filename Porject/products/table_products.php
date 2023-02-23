<?php 
    require '../Connect/Connect_dbstock.php';
    require 'ebitModal.php';
    
        $sql_select_tables = "SELECT * FROM products INNER JOIN categories ON products.cate_id = categories.cate_id";
        $query_sql_tables = mysqli_query($conn,$sql_select_tables);
        $number = 1;
        $cont = mysqli_num_rows($query_sql_tables)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ຂໍ້ມູນສິນຄ້າ</title>
    <link sizes="76x76" href="../img/111.png">
    <link rel="icon" type="image/png" href="../img/111.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- // todo Admin LTE -->
    <?php require '../layout/link.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!-- // todo Admin LTE -->
    <script src="../layout/script.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- // todo Admin LTE -->
    <?php require '../layout/navbar.php' ?>

    <!-- // ! ໜ້າສະແດງສະຖານະການເຂົ້າເຖິງຟາຍ -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນສິນຄ້າ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../products/table_products.php">ໜ້າຫຼັກ</a></li>
                        <li class="breadcrumb-item active">ຂໍ້ມູນສິນຄ້າ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ການລາຍງານສິນຄ້າ -->
   <div class="row">
   <div class="col">
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>
            <p>New Orders</p>
        </div>
        <div class="icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
    </div>

    <div class="col">
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>
            <p>New Orders</p>
        </div>
        <div class="icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
    </div>

    <div class="col">
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>
            <p>New Orders</p>
        </div>
        <div class="icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
    </div>

    <div class="col">
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>
            <p>New Orders</p>
        </div>
        <div class="icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
    </div>

   </div>

    <div class="container">
        <div class="table-responsive">
            <button type="button" id="add_pro" data-bs-toggle="modal" data-bs-target="#insert" class="btn btn-outline-success mb-2">ເພິ່ມສິນຄ້າ</button>
            <table class="table table-dark table-hover">
                <thead class="">
                    <caption>ຂໍ້ມູນສິນຄ້າ</caption>
                    <tr>
                        <th>ລຳດັບ</th>
                        <th>ບາໂຄດ</th>
                        <th>ຊືີ່ສິນຄ້າ</th>
                        <th>ປະເພດສິນຄ້າ</th>
                        <th>ຈຳນວນ</th>
                        <th>ລາຄາຊື້</th>
                        <th>ລາຄາຂາຍ</th>
                        <th>ໜາຍເຫດ</th>
                        <th>ແກ້ໄຂ</th>
                        <th>ລົບ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($query_sql_tables)) { ?>
                    <tr class="table-primary">
                        <td scope="row"><?php echo $number++?></td>
                        <td><input type="button" class="input_edmit_id" value="<?php echo $row['prod_id'] ?>"></td>
                        <td><input type="button" class="form-control input_edmit_name"
                                id="<?php echo $row['prod_id'] ?>" value="<?php echo $row['prod_name']?>"></td>
                        <td><?php echo $row['cate_name']?></td>
                        <td><?php echo $row['qty']?></td>
                        <td><?php echo number_format($row['sprice'])?> ກີບ</td>
                        <td><?php echo number_format($row['bprice'])?> ກີບ</td>
                        <td><?php echo $row['remarck']?></td>
                        <td><button type="button" id="<?php echo $row['prod_id'] ?>"
                                class="btn btn-outline-warning btnEdit">ແກ້ໄຂ <i
                                    class="bi bi-pencil-square"></i></button></td>
                        <td><button type="button" id="<?php echo $row['prod_id']?>"
                                class="btn btn-outline-danger btnDelete">ລົບ <i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
                            <?php require 'ebitModal.php' ?>
                            <?php require 'insertModal.php' ?>
    </div>

    <!-- // todo Admin LTE -->
    <?php require '../layout/footer.php' ?>
    <script nonce="17430cc2-69fd-4b09-9d51-919f01acd653" src="table_products.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
    </style>
</body>

</html>