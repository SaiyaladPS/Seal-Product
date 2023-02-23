<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 my-0 mx-auto" id="form_edmit">
        <input type="hidden" name="edmit_vill_id" id="edmit_vill_id">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ເລືອກແຂວງ</label>
                <select name="edmit_pro" id="edmit_pro" class="form-control">
                    <?php foreach($query as $rows){ ?>
                    <option value="<?php echo $rows['pro_id'] ?>"><?php echo $rows['pro_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ເລືອກເມືອງ</label>
                <select name="edmit_dis" id="edmit_dis" class="form-control">
                    <option value="" hidden>ເລືອກເມືອງ</option>
                </select>
            </div>
            <div class="col-auto">
                <input type="text"  name="edmit_vill" class="form-control" id="edmit_vill" placeholder="ຊື່ບ້ານ">
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ໜາຍເຫດ</label>
                <textarea class="form-control edmit_remark"  placeholder="ໜາຍເຫດ" name="edmit_remark" id="inputPassword2"
                    rows="1"></textarea>
            </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
        <button type="submit" class="btn btn-primary">ແກ້ໄຂ</button>
      </div>
      </form>
    </div>
  </div>
</div>