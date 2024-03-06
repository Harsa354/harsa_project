<!-- Modal -->
<div class="modal fade" id="modalFormTitipan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Titipan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="titipan" class="form">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="nama_produk" name="nama_produk">
            </div>
          </div>
          <div class="form-group row">
            <label for="nama_supplier" class="col-sm-4 col-form-label">Nama Supplier</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="nama_supplier" name="nama_supplier">
            </div>
          </div>
          <div class="form-group row">
            <label for="harga_beli" class="col-sm-4 col-form-label">Harga Beli</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="harga_beli" name="harga_beli">
            </div>
          </div>
          <div class="form-group row">
            <label for="harga_jual" class="col-sm-4 col-form-label">Harga Jual</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="harga_jual" name="harga_jual">
            </div>
          </div>
          <div class="form-group row">
            <label for="stok" class="col-sm-4 col-form-label">stok</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="stok" name="stok">
            </div>
          </div>
          <div class="form-group row">
            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="keterangan" name="keterangan">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>