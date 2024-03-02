<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Jenis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="jenis" class="form">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Jenis</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="nama_jenis" name="nama_jenis">
            </div>
            <div class="mb-3">
                <label for="kategori_id" class="col-form-label">kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control-plaintext">
                  <option value="" hidden>Pilih Kategori</option>
                    @foreach ($kategori as $c => $label)
                        <option value="{{ $c }}">{{ $label }}</option>
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