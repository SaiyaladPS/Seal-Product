<?php
$sql_pro = "SELECT * FROM provinces ORDER BY pro_name ASC";
$query_pro = mysqli_query($conn, $sql_pro);

?>
<!-- Modal -->
<div class="modal fade w-100" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ການແກ້ໄຂ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form id="form_edmit_users">
    <div class="modal-body">
  

  <div class="row gx-5">
        <div class="col">
            <div class="p-3 border bg-light">

                    <input type="hidden" name="user_id" class="user_id">
                    <div class="form-floating mb-3">
                        <input type="text" name="fname" class="form-control edmit_fname" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ຊື່</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="lname" class="form-control edmit_lname" id="floatingInput"
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
                        <input type="date" name="dob" class="form-control edmit_dob" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ວັນເດືອນປີເກີດ</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" name="Tel" class="form-control edmit_Tel" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ເບີໂທ</label>
                    </div>

            </div>
        </div>
        <div class="col">
            <div class="p-3 border bg-light">

                <div class="mb-5 mt-3">
                    <select class="form-select edmit_pro" name="pro" aria-label="Default select example">
                        <?php foreach($query_pro as $row_pro){  ?>
                        <option value="<?php echo $row_pro['pro_id'] ?>"><?php echo $row_pro['pro_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-5">
                    <select class="form-select edmit_dis" name="dis" id="dis" aria-label="Default select example">
                        <option value="" selected hidden>ເລືອກເມືອງ</option>
                    </select>
                </div>

                <div class="mb-5">
                    <select class="form-select edmit_vill" name="vill" id="vill" aria-label="Default select example">
                        <option selected value="" hidden>ເລືອກບ້ານ</option>
                    </select>
                </div>

                <div class="mb-5">
                    <select class="form-select edmit_status" name="status" id="status" aria-label="Default select example">
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
                    <input type="text" name="username" class="form-control edmit_username" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">ຊື່ຜູ້ໃຊ້</label>
                </div>
                <input type="hidden" name="password" class="password">

                <div class="mb-2">
                    <label for="inputPassword2" class="visually-hidden">ໜາຍເຫດ</label>
                    <textarea class="form-control edmit_remark" placeholder="ໜາຍເຫດ" name="remark" id="inputPassword2"
                        rows="11"></textarea>
                </div>

            </div>
        </div>

    </div>

  
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
        <button type="submit" class="btn btn-primary">ແກ້ໄຂ</button>
    </div>
    </form>
    </div>
  </div>
</div>