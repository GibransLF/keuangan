<div class="modal fade" id="editModal<?= $row["id"] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
              <div class="modal-body">
                <div class="form-group">
                  <label for="tgl">Tanggal:</label>
                  <input type="date" class="form-control" id="tgl" name="tgl" placeholder="<?= $row["tgl"] ?>" value="<?= $row["tgl"] ?>" required>
                </div>
                <!-- select -->
                <div class="form-group">
                  <label>Tipe Keuangan</label>
                  <select class="form-control" name="tipe" required>
                    <option value="pemasukan" <?php ( $row["tipe"] == "pemasukan") ? 'selected' : ''; ?>>
                      Pemasukan
                    </option>
                    <option value="pengeluaran" <?php ( $row["tipe"] == "pengeluaran") ? 'selected' : ''; ?>>
                      Pengeluaran
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="keuangan">Nominal:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="number" class="form-control" id="keuangan" name="keuangan" maxlength="11" placeholder="<?= $row["keuangan"] ?>" value="<?= $row["keuangan"] ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ket">Keterangan:</label>
                  <textarea type="text" class="form-control" id="ket" name="ket" rows="3" placeholder="<?= $row["ket"] ?>" required><?= $row["ket"] ?></textarea>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->