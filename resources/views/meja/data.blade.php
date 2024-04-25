<table class="table align-items-center mb-0">
  <thead>
    <tr>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
      <th class="text-secondary opacity-7"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($meja as $mejas)
      <tr>
        <td>
          <div class="d-flex px-3 py-1">
            {{ $no += 1 }}
          </div>
        </td>
        <td>
          {{ $mejas->nomor_meja }}
        </td>
        <td>
          {{ $mejas->kapasitas }}
        </td>
        <td>
          {{ $mejas->status}}
        </td>
        <td class="align-middle">
          <button type="submit"  class="btn mt-3 btn-success btn-rounded p-0 btn-icon-only text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModal" data-mode="edit" data-id="{{ $mejas->id }}" data-nomor_meja="{{ $mejas->nomor_meja }}"data-kapasitas="{{ $mejas->kapasitas }}"data-status="{{ $mejas->status }}">
              <i class="material-icons text-sm text-white">edit</i>
          </button> 
          <form action="/meja/{{$mejas->id}}" method="POST" class="d-inline">
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