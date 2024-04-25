@extends('layout')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Tabel Pelanggan</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Tambah  
            </button>
            <a href="/pelangganexport/excel" class="btn btn-success mx-3">
              Export  
            </a>
            <button type="button" class="btn btn-warning mx-3" data-bs-toggle="modal" data-bs-target="#import">
              Import  
            </button>
            <div class="table-responsive p-0">
              
              @include('pelanggan.data')
            </div>
          </div>
        </div>
      </div>
      @include('footer')
    </div>
    {{-- Modal Import --}}
    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center mr-3 py-3">
              <h3 class="modal-title" id="staticBackdropLabel">Import Data</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('import_titipan') }}" method="POST" class="form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                  <div class="form-group">
                    <input type="file" name="file" required>
                  </div>
              </div>
              <div class="modal-footer pt-3 pb-0">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary" id="simpan">Simpan Perubahan</button>
              </div>
            </div>
          </form>
      </div>
    </div>
</div>
    
    
@include('pelanggan.form')
@endsection


@push('script')
    <script>
      // Modal Form
      $('#exampleModal').on('show.bs.modal', function(e){
        console.log('bro')
        let button = $(e.relatedTarget);
        let id = button.data('id');
        let nomorMeja = button.data('nomor_meja');
        let kapasitas = button.data('kapasitas');
        let status = button.data('status');
        let mode = button.data('mode');
        console.log(button.data('mode'));
        // let mode = button.data('mode');
        let modal = $(this);
        if(mode === 'edit'){
          modal.find('.modal-title').text('Edit Data');
          modal.find('#nomor_meja').val(nomorMeja);
          modal.find('#kapasitas').val(kapasitas);
          modal.find('#status').val(status);
          let halo = modal.find('.form').attr('action', '{{ url("pelanggan") }}/'+id);
          modal.find('#simpan').text('Simpan Perubahan');
          modal.find('#method').html('@method("PATCH")');
          // console.log(btn);
        }else{
          modal.find('.modal-title').text('Tambah Data');
          modal.find('#nomor_meja').val('');
          modal.find('#kapasitas').val('');
          modal.find('#status').val('');
          modal.find('.form').attr('action', 'pelanggan');
          modal.find('#simpan').text('Simpan');
          modal.find('#method').html('');
        }
      })
    </script>
@endpush