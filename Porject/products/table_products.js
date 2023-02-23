$(document).ready(function() {

    $('.btnDelete').click(function(e) {
        e.preventDefault()
        Swal.fire({
            title: 'ທ່ານຍືນຈະລົບສິນຄ້ານີ້ ຫຼຶ ບໍ່?',
            text: "ຖ້າທ່ານຍືນຍັນທີ່ຈະລົບ ຂໍ້ມູນຈະສາມາດກູູ້ຄືນໄດ້ອີກ!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ຕົກລົງ',
            cancelButtonText: 'ຍົກເລີກ'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr("id")
                console.log(id)
                $.ajax({
                    url: 'delete.php',
                    method: 'post',
                    data: {
                        delete_id: id
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
                        },1500)
                    },
                    error : function(err) {
                        SWal.fire({
                            icon : 'error',
                            text :`'ເກິດຂໍ້ຜິດຜາດທີ່ ${err}`,
                            confirmButtonText : 'ຕົກລົງ'
                        })
                    }
                })
            }
        })
    })

    $('.btnEdit').mouseenter(function() {
        $(this).attr({
            'data-bs-toggle': 'modal',
            'data-bs-target': '#exampleModal'
        })
    })
    $('.btnEdit').click(function() {
        var id = $(this).attr("id");
        $('#editdefault').hide()
        $.ajax({
            url: 'select.php',
            method: 'post',
            data: {
                select_id: id
            },
            dataType: 'json',
            success: function(res) {
                $('#id_edit').val(res.prod_id)
                $('.prod_name').val(res.prod_name)
                $('#editdefault').val(res.cate_id)
                $('#editdefault').text(res.cate_name)
                $('.qty').val(res.qty)
                $('.sprice').val(Math.floor(res.sprice))
                $('.bprice').val(Math.floor(res.bprice))
                $('.remarck').val(res.remarck)
            }
        })
    })

    // ຍິງຂໍຂໍ້ມູນ ປະເພດສິນຄ້າ
    $('.select_prod').add(function() {
        $.ajax({
            url: 'select.php',
            dataType: 'json',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    var option =
                        `<option value='${data[i].cate_id}'>${data[i].cate_name}</option>`
                    $('.select_prod').append(option)
                }
            }
        })
    })

    // ຍິງແກ້ໄຂ ສົງຂໍ້ມູນ ໃນ input ທັງໝົດທີ່ຢູ່ໃນ form ທີ່ເລືອກ ຈຸດສຳຄັນຄື name
    $('#formUpdata').on('submit', function(e) {
        e.preventDefault()
        Swal.fire({
            title: 'ທ່ານຍືນຍັນການປ່ຽນຂໍ້ມູນຫຼຶບໍ?',
            text: "ຖ້າທ່ານຍືືນຍັນການປ່ຽນຂໍ້ມູນເກົ່າຈະຖືກປ່ຽນແປງແລະ ຈະບໍ່ສາມາດກັບຂໍ້ມູນເກົ່າໄດ້ອີກ!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ຍືນຍັນ',
            cancelButtonText: 'ຍົກເລີກ'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'Updata.php',
                    method: 'post',
                    data: (
                        $("#formUpdata").serialize()
                    ),
                    success: function() {
                        Swal.fire({
                            title: 'ແກ້ໄຂສຳເລັດ!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(() => {
                            location.reload()
                        }, 1500)
                    }
                })
            }
        })
    })


    // ກົດສອງເທືືອ ແລະ ແກ້ໄຂຂໍ້ມູນ
    $('.input_edmit_name').css({
        'background': 'none',
        'border': 'none',
        'width': '150px',
        'text-align': 'left',
        'outline': 'none'
    })
    $('.input_edmit_name').blur(function(e) {
        e.preventDefault()
        if (this.type == 'text') {
            $(this).attr('type', 'button');
            $(this).css('background', 'none')
        }
    }).dblclick(function(e) {
        e.preventDefault()
        $(this).attr('type', 'text');
        $(this).css('background', '#fff')
        $(this).keydown(function(eve) {
            var name = $(this).val()
            var id = $(this).attr("id");
            if (eve.key == 'Enter') {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'Updata.php',
                            method: 'post',
                            data: {
                                key: id,
                                value: name
                            },
                            success: function() {
                                Swal.fire({
                                    title: 'ແກ້ໄຂສຳເລັດ!',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        })
                    } else {
                        location.reload()
                    }
                })
            }
        })
    })

    $('.input_edmit_id').css({
        'background': 'none',
        'border': 'none'
    })

    // ! insert_form
    $.ajax({
        url: 'select.php',
        dataType: 'json',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                var option = `<option value='${data[i].cate_id}'>${data[i].cate_name}</option>`;
                $('.select_cate').append(option)
            }
        }
    })

    function check(val, title, ) {
        if (val == "") {
            Swal.fire({
                icon: 'warning',
                title: `ກະລຸນາປ້ອນ${title}`,
                text: 'ກວດສອບຂໍ້ມູນ ແລະ ປ້ອນໃຫ້ຄົບ',
                confirmButtonText: 'ຕົກລົງ'
            })
        }
    }
    $("#insertPord").on('submit', function(e) {
        e.preventDefault()
        var id = $('#prod_id').val();
        var name = $("#prod_name").val()
        var qty = $('#prod_qty').val()
        var sp = $('#prod_sp').val()
        var bp = $('#prod_bp').val()
        var cate = $('#cate_id').val()
        var rmk = $('#prod_rmk').val()
        // Check empty
        check(id, "ບາໂຄດ")
        check(name, "ຊື່ສິນຄ້າ")
        check(qty, "ຈຳນວນສິນຄ້າ")
        check(bp, "ລາຄາຂາຍ")
        check(sp, "ລາຄາຊື້")
        check(cate, "ປະເພດສິນຄ້າ")
        if (id != '' && name != '' && qty != '' && sp != '' && bp != '' && cate != '') {
            $.ajax({
                url: 'select_products.php',
                method: 'POST',
                data: {
                    select_id: id
                },
                success: function(data) {
                    if (data >= 1) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'ມີຂໍ້ມູນຂອງສິນຄ້າໂຕນີ້ແລ້ວ',
                            text: 'ເນືອງຈາກວ່າມີຂໍ້ມູນຂອງສິນຄ້າໂຕນີ້ແລ້ວທ່ານຈຶງບໍ່ສາມາດບັນທືກລົງໄປໄດ້ອີກ',
                            confirmButtonText: 'ຕົກລົງ'
                        })
                    } else {
                        $.ajax({
                            url: 'insert_products.php',
                            method: 'POST',
                            data: {
                                prod_id: id,
                                prod_name: name,
                                prod_qty: qty,
                                prod_sp: sp,
                                prod_bp: bp,
                                cate_id: cate,
                                prod_rmk: rmk
                            },
                            success: function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ບັນທືກຂໍ້ມູນສຳເລັດ',
                                    showConfirmButton: false,
                                    timer: 1500
                                })

                                setTimeout(()=>{location = 'table_products.php'},1500)
                            }
                        })
                    }
                }
            })
        }

    })
});