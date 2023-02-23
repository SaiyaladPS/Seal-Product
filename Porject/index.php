<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link sizes="76x76" href="img/111.png">
    <link rel="icon" type="image/png" href="img/111.png">
    <title>ເຂົ້າສູ່ລະບົບ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@200;400&display=swap');

    * {
        font-family: 'Noto Sans Lao', sans-serif;
    }

    .defaulti {
        animation-name: slide;
        animation-duration: 2s;
    }

    @keyframes slide {
        0% {
            transform: translateX(0px);
            opacity: 100%;
        }

        50% {
            transform: translateX(-180px);
            opacity: 0;
        }

        100% {
            transform: translateX(0px);
            opacity: 0;
        }
    }

    .mydlay {
        animation: dlay;
        animation-duration: 2s;
    }

    @keyframes dlay {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 100%;
        }
    }

    #gologin {
        cursor: pointer;
    }
    </style>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>

<body>

    <div class="container w-50">
        <h3 class="text-center bg-primary">ເຂົ້າສູ່ລະບົບ</h3>

        <div id="showlogin" class="container overflow-hidden d-none">
            <div class="row gx-5">
                <div class="col">
                    <div class="img-2 bg-primary p-4">
                        <img src="img/logo.jpg" class="rounded-circle" alt="...">
                    </div>
                </div>
                <div class="col">
                    <form id="login">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" name="username" class="form-control username" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">ຊື່ຜູ້ໃຊ້</label>
                    </div>
                    <div class="form-floating mb-3 mt-4">
                        <input type="password" name="password" class="form-control password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">ລະຫັດຜ່ານ</label>
                    </div>
                    <div class="btn">
                        <button type="submit" id="login" class="btn btn-outline-primary">ເຂົ້າສູ່ລະບົບ</button>
                        <button type="reset" class="btn btn-danger">ລ້າງ</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div id="addslide" class="container w-50">
            <div id="gologin" class="card bg-dark text-white">
                <div class="img-3">
                    <img src="img/logo.jpg " class="card-img " alt="...">
                </div>
                <div class="card-img-overlay">
                    <div class="d-flex justify-content-center">

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('#gologin').click(function() {
            $('#addslide').addClass('deg')
            $('#addslide').addClass('defaulti')
            setTimeout(() => {
                $('#addslide').addClass('d-none')
                $('#showlogin').removeClass('d-none')
                $('#showlogin').addClass('mydlay')
            }, 1000);
        })

        // !  ກົດປຸ່ມເຂົ້າສູ່ລະບົບ
        $('#login').on('submit' ,function(e) {
            e.preventDefault()
            var username = $('.username');
            var password = $('.password')
                
                if (username.val() == ''){
                    Swal.fire({
                        icon : 'warning',
                        title : 'ກະລຸນາປ້ອນ ຊື່ຜູ້ໃຊ້',
                        confirmButtonText : 'ຕົກລົງ'
                    })
                } else if (password.val() == '') {
                    Swal.fire({
                        icon : 'warning',
                        title : 'ກະລຸນາປ້ອນລະຫັດຜ່ານ',
                        confirmButtonText : 'ຕົກລົງ'
                    })
                } else {
                    $.ajax({
                        url : 'villages/select.php',
                        method : 'post',
                        data : $('#login').serialize(),
                        error : function(err){
                            console.log(err)
                        },
                        success : function(data_check) {
                            if (data_check >= 1) {
                                Swal.fire({
                                    icon : 'success',
                                    title : 'ເຂົ້າສູ່ລະບົບສຳເລັດ',
                                    showConfirmButton : false,
                                    timer : 1500
                                })
                                setTimeout(() => {
                                    location = 'argon-dashboard-master'
                                }, 1500)
                            } else {
                                Swal.fire({
                                    icon : 'error',
                                    title : 'ລະຫັດຜ່ານ ຫຼຶ ຊື່ຜູ້ໃຊ້ບໍ່ຖືກຕ້ອງ',
                                    confirmButtonText : 'ຕົກລົງ'
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