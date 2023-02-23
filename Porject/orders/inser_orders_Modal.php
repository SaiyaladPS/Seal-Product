<!-- Modal -->
<div class="modal fade" id="insert-orders" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="insert-ordersLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="orders_form">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control prod_id" name="prod_id" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">ບາໂຄດ</label>
                        <small id="error_1"></small>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" disabled class="form-control o_qty" name="o_qty" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">ຈຳນວນ</label>
                        <small id="error_2"></small>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" disabled class="form-control prod_name" name="prod_name"
                            id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">ຊື່ສິນຄ້າ</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" disabled class="form-control sprice" name="sprice" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">ລາຄາ</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" disabled class="form-control amount" name="amount" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">ລ່ວມ</label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ໜາຍເຫດ</label>
                        <textarea class="form-control" name="remark" id="remark" rows="2"></textarea>
                    </div>
                    
            </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
            <button type="submit" id="send" class=" btn btn-outline-primary">ຂາຍ</button>
        </div>
        </form>
    </div>
</div>
</div>