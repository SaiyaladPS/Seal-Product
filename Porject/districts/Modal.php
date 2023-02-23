
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ການແກ້ໄຂ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 my-0 mx-auto" id="form_edmit_dis">
        <input type="hidden" name="edmit_dis_id" id="edmit_dis_id">
            <div class="col-auto">
                <select name="edmit_pro_name" class="form-control edmit_pro_name" id=" edmit_pro_name">
                    <option id="select" hidden value=""></option>
                    <?php foreach($query_pro as $rows_pro){ ?>
                    <option value="<?php echo $rows_pro['pro_id'] ?>"><?php echo $rows_pro['pro_name']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ຊື່ແຂວງ</label>
                <input type="text" class="form-control edmit_dis_name" name="edmit_dis_name" id="inputPassword2"
                    placeholder="ຊື່ເມືອງ">
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ໜາຍເຫດ</label>
                <textarea class="form-control edmit_remark" placeholder="ໜາຍເຫດ" name="edmit_remark" id="inputPassword2"
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