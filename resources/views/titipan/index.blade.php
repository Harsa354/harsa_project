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
          <div class="card-body px-2 pb-2">

            @if (session('success'))
            <div class="mt-2 alert alert-success alert-dismissible fade show mx-3 text-white" role="alert">
              <strong>Selamat!</strong> {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if ($errors->any())
            <div class="mt-2 alert alert-danger alert-dismissible fade show mx-3 text-white" role="alert">
              <strong>Holy guacamole!</strong> You should check in on some of those fields below.
              <ul>
                @foreach ($errors->all() as $error)
                    <li>Data {{ $error }} categori belum di isi</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
          @endif
            <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-mode="tambah" data-bs-target="#modalFormTitipan">
              Tambah  
            </button>
            <a href="/titipan/export/excel" class="btn btn-success mx-3">
              Export  
            </a>
            <button type="button" class="btn btn-warning mx-3" data-bs-toggle="modal" data-bs-target="#import">
              Import  
            </button>
            <div class="table-responsive p-0">
              
              @include('titipan.data')
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