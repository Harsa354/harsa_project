<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Meja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="meja" class="form">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="nomor_meja" class="col-sm-4 col-form-label">no meja </label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="nomor_meja" name="nomor_meja">
            </div>
          </div>
          <div class="form-group row">
            <label for="kapsitas" class="col-sm-4 col-form-label">Kapsitas</label>
            <div class="col-sm-8">
              <input type="number" class="form-control-plaintext" id="kapasitas" name="kapasitas">
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label">Status</label>
            <div class="col-sm-8">
              <input type="text" class="form-control-plaintext" id="status" name="status">
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