<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="menu" class="form">
          @csrf
          <div id="method"></div>
          <div class="form-group row row-cols-1">
            <div class="col">
              <label for="nama_menu" class="col-sm-4 col-form-label">Nama Menu</label>
              <div class="col-sm-8">
                <input type="text" class="form-control-plaintext" id="nama_menu" name="nama_menu">
              </div>
            </div>
            <div class="col">
              <label for="harga" class="col-sm-4 col-form-label">Harga</label>
              <div class="col-sm-8">
                <input type="text" class="form-control-plaintext" id="harga" name="harga">
              </div>
            </div>
            <div class="col">
              <label for="image" class="col-sm-4 col-form-label">image</label>
              <div class="col-sm-8">
                <input type="text" class="form-control-plaintext" id="image" name="image">
              </div>
            </div>
            <div class="col">
              <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
              <div class="col-sm-8">
                <input type="text" class="form-control-plaintext" id="deskripsi" name="deskripsi">
              </div>
            </div>
            <div class="mb-3">
                <label for="jenis_id" class="col-form-label">Jenis</label>
                <select name="jenis_id" id="jenis_id" class="form-control-plaintext">
                  <option value="" hidden>Pilih Jenis</option>
                    @foreach ($jenis as $c => $nama)
                        <option value="{{ $c }}">{{ $nama }}</option>
                    @endforeach
                </select>
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