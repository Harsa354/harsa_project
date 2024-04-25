<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="pelanggan" class="form">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="nama" name="nama">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control-plaintext" id="email" name="email">
            </div>
          </div>
          <div class="form-group row">
            <label for="nomor_telepon" class="col-sm-4 col-form-label">No Telepon</label>
            <div class="col-sm-8">
              <input type="number" class="form-control-plaintext" id="nomor_telepon" name="nomor_telepon">
            </div>
          </div><div class="form-group row">
            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="alamat" name="alamat">
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