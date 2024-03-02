@foreach ($jenis as $j)
  <h3>{{ $j->nama_jenis }}</h3>
  <div class="row row-cols-1 row-cols-lg-3 my-2">
    @foreach ($j->menu as $menu)
      <a href="#" class="col text-decoration-none text-dark">
        <div class="card m-0 menu-item " data-id="{{$menu->id}}" data-nama_menu="{{$menu->nama_menu}}" data-harga="{{$menu->harga}}">
          <div class="card-body">
            <p class="menu">{{ $menu->nama_menu }}</p>
            <p class="menu">{{ $menu->deskripsi }}</p>
            <p class="">Rp. {{ $menu->harga }}</p>
          </div>
        </div>
      </a>
    @endforeach
  </div>
@endforeach