<!-- Modal -->
<div class="modal fade" id="insert_receives" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ການນຳເຂົ້າສິນຄ້າ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" id="form_receives">
            <div class="form-floating mb-3">
                <input type="text" class="form-control prod_id" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ບາໂຄດ</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control qty" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ຈຳນວນ</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control prod_name ber" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ຊື່ສິນຄ້າ</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control amount ber" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ເງີນລວ່ມ</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control bp ber" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ລາຄາຊື້</label>
            </div>

            <div class="form-floating">
                <textarea class="form-control remark" placeholder="Leave a comment here"
                    id="floatingTextarea"></textarea>
                <label for="floatingTextarea">ໜາຍເຫດ</label>
            </div>

        
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ </button>
        <button type="button" id="send" class="btn btn-outline-primary">ນຳເຂົ້າ</button>
      </div>
      </form>
    </div>
  </div>
</div>