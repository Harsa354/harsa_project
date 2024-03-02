<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form stok</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="stok" class="form">
          @csrf
          <div id="method"></div>
          <div class="form-group row row-cols-1">
            <div class="mb-3">
                <label for="menu_id" class="col-form-label">Menu</label>
                <select name="menu_id" id="menu_id" class="form-control-plaintext">
                  <option value="" hidden>Pilih Menu</option>
                    @foreach ($menu as $c => $nama)
                        <option value="{{ $c }}">{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
              <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
              <div class="col-sm-8">
                <input type="text" class="form-control-plaintext" id="jumlah" name="jumlah">
              </div>
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