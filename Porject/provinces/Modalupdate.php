
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ແກ້ໄຂຂໍ້ມູນ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 my-0 mx-auto" id="form_edmit">
        <!-- ຖືກເຊືອງໄວ້ -->
        <input type="hidden" name="edmit_id" id="edmit_id">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ຊື່ແຂວງ</label>
                <input type="text" class="form-control edmit_name" name="edmit_name" id="inputPassword2"
                    placeholder="ຊື່ແຂວງ">
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">ໜາຍເຫດ</label>
                <textarea class="form-control edmit_remark" placeholder="ໜາຍເຫດ" name="edmit_remark" id="inputPassword2"
                    rows="1"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">ແກ້ໄຂຂໍ້ມູນ</button>
        </div>
    </form>
    </div>
  </div>
</div>