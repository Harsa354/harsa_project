<table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Menu</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stok</th>
            <th class="text-secondary opacity-7"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stok as $index => $stok)
        <tr>
            <td>
                <div class="d-flex px-3 py-1">
                    {{ $no += 1 }}
                </div>
            </td>
            <td>{{ $stok->menu->nama_menu }}</td>
            <td>{{ $stok->jumlah }}</td>
            {{-- <td>{{ $stok->kategori->nama }}</td> --}}
            <td class="align-middle">
                <button type="button"  class="btn mt-3 btn-success btn-rounded p-0 btn-icon-only text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModal" data-mode="edit" data-id="{{ $stok->id }}" data-menu_id="{{ $stok->menu_id }}" data-jumlah="{{ $stok->jumlah }}">
                    <i class="material-icons text-sm text-white">edit</i>
                </button> 
                <form action="/stok/{{$stok->id}}" method="POST" class="d-inline">
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