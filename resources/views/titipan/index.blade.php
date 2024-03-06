@extends('layout')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Tabel Titipan</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-mode="tambah" data-bs-target="#modalFormTitipan">
              Tambah  
            </button>
            <div class="table-responsive p-0">
              
              @include('titipan.data')
            </div>
          </div>
        </div>
      </div>
      @include('footer')
    </div>
</div>
    
    
@include('titipan.form')
@endsection


@push('script')

    <script>
      $('#success-alert').fadeTo(500, 500).slideUp(500, function() {
        $('#success-alert').slideUp(500)
    })

    $('#error-alert').fadeTo(1000, 500).slideUp(1000, function() {
        $('#error-alert').slideUp(500)
    })

    $(function() {
        $('#tbl-titipan'.DataTable)
    })

    //dialog hapus Data
    $('.btn-delete').on('click', function(e) {
    let nama_produk= $(this).closest('tr').find('td:eq(0)').text();
    console.log(nama_produk)
    Swal.fire({
            icon: 'error',
            title: 'Hapus Data',
            html: 'apakah data <b> %{nama_produk} </b> akan dihapus?',
            confirmButtonText: 'Ya',
            denyButtonText: 'Tidak',
            showDenyButton: true,
            focusConfirm: false
        }).then((resurt) => {
            if (result.isConfirmed) $(e.target).closest('form').submit()
            else swal.close()
        })
    })

    $('#modalFormTitipan').on('show.bs.modal', function(e) {
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const nama_produk = btn.data('nama_produk')
        const id = btn.data('id')
        const modal = $(this)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit Data titipan')
            modal.find('#nama_produk').val(nama_produk)
            modal.find('.modal-body form').attr('action', '{{ url("titipan") }}/' + id)
            modal.find('#method').html('@method("PUT")')

        } else {
            modal.find('.modal-title').text('Input Data titipan')
            modal.find('#nama_produk').val()
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("titipan") }}')
        }
    })
    </script>
@endpush