<table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Produk</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Supplier</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Beli</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Jual</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stok</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
            <th class="text-secondary opacity-7"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($titipan as $index => $titipan)
        <tr>
            <td>
                <div class="d-flex px-3 py-1">
                    {{ $no += 1 }}
                </div>
            </td>
            <td>{{ $titipan->nama_produk }}</td>
            <td>{{ $titipan->nama_supplier }}</td>
            <td>{{ $titipan->harga_beli }}</td>
            <td>{{ $titipan->harga_jual }}</td>
            <td>{{ $titipan->stok }}</td>
            <td>{{ $titipan->keterangan }}</td>
            <td class="align-middle">
                <button type="submit"  class="btn mt-3 btn-success btn-rounded p-0 btn-icon-only text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modalFormTitipan" data-mode="edit" data-id="{{ $titipan->id }}" data-nama_titipan="{{ $titipan->nama_titipan }}" data-titipan_id="{{ $titipan->titipan_id }}">
                    <i class="material-icons text-sm text-white">edit</i>
                </button> 
                <form action="/titipan/{{$titipan->id}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn mt-3 btn-primary btn-rounded p-0 btn-icon-only text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    <i class="material-icons text-sm text-white">delete</i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>