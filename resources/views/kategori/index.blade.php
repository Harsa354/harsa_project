@extends('layout')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Tabel Kategori</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Tambah  
            </button>
            <div class="table-responsive p-0">
              
              @include('kategori.data')
            </div>
          </div>
        </div>
      </div>
      @include('footer')
    </div>
</div>
    
    
@include('kategori.form')
@endsection


@push('script')
    <script>
      // Modal Form
      $('#exampleModal').on('show.bs.modal', function(e){
        console.log('bro')
        let button = $(e.relatedTarget);
        let id = button.data('id');
        let nama = button.data('nama');
        let mode = button.data('mode');
        console.log(button.data('mode'));
        // let mode = button.data('mode');
        let modal = $(this);
        if(mode === 'edit'){
          modal.find('.modal-title').text('Edit Data');
          modal.find('#nama').val(nama);
          let halo = modal.find('.form').attr('action', '{{ url("kategori") }}/'+id);
          modal.find('#simpan').text('Simpan Perubahan');
          modal.find('#method').html('@method("PATCH")');
          // console.log(btn);
        }else{
          modal.find('.modal-title').text('Tambah Data');
          modal.find('#nama').val('');
          modal.find('.form').attr('action', 'kategori');
          modal.find('#simpan').text('Simpan');
          modal.find('#method').html('');
        }
      })
    </script>
@endpush