<!-- Modal -->
<div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">ບັນທືກ ຂໍ້ມູນສິນຄ້າ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container mt-2">
        <form id="insertPord">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">ລະຫັດສິນຄ້າ</label>
                        <input type="text" name="" id="prod_id" class="form-control" placeholder="ປ້ອນລະຫັດສິນຄ້າ..."
                            aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ຊື່ສິນຄ້າ</label>
                        <input type="text" name="" id="prod_name" class="form-control" placeholder="ປ້ອນຊື່ສິນຄ້າ..."
                            aria-describedby="helpId">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ຈຳນວນ</label>
                        <input type="number" class="form-control" name="" id="prod_qty" aria-describedby="helpId"
                            placeholder="ປ້ອນຈຳນວນ...">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ລາຄາຊື້</label>
                        <input type="number" class="form-control" name="" id="prod_sp" aria-describedby="helpId"
                            placeholder="ປ້ອນລາຄາຊື້...">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">ລາຄາຂາຍ</label>
                        <input type="number" class="form-control" name="" id="prod_bp" aria-describedby="helpId"
                            placeholder="ປ້ອນລາຄາຂາຍ">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ປະເພດສິນຄ້າ</label>
                        <select class="form-select form-select-lg select_cate" name="" id="cate_id">
                            <option selected class="d-none" value="">ເລືອກປະເພດສິນຄ້າ</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ໜາຍເຫດ</label>
                        <textarea class="form-control" name="" id="prod_rmk" rows="4"></textarea>
                    </div>
                </div>
            </div>       
    </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
        <button type="submit" class="btn btn-outline-primary">ບັນທືກ</button>
        <a href="table_products.php" class="btn btn-outline-warning">ເບິ່ງຂໍ້ມູນ</a>
      </div>
      </form>
    </div>
  </div>
</div>