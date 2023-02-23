<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ການແກ້ໄຂຂໍ້ມູນ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formUpdata">
                    <input type="hidden" name="prod_id" id="id_edit">
                    <div class="form-floating mb-3">
                        <input type="text" name="prod_name" class="form-control prod_name" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ຊື່ສິນຄ້າ</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select select_prod" name="prod_type" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option id="editdefault"></option>
                        </select>
                        <label for="floatingSelect">ປະເພດສິນຄ້າ</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control qty" name="prod_qty" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">ຈຳນວນ</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control sprice" name="prod_sprice" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ລາຄາຊື້</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control bprice" name="prod_bprice" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ລາຄາຂາຍ</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control remarck" name="remarck" placeholder="Leave a comment here"
                            id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">ໜາຍເຫດ</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
                <button type="submit" id="btnEdit" class="btn btn-outline-primary">ການແກ້ໄຂຂໍ້ມູນ</button>
            </div>
            </form>
        </div>
    </div>
</div>