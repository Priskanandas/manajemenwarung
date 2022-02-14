<x-app-layout>
    <x-slot name="title">
        Barang
    </x-slot>

    <x-card>
        <x-slot name="title">All Barang</x-slot>
        <x-slot name="option">
            <a href="{{ route('admin.barang.tambah') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>
            </a>
        </x-slot>
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" method="GET" action="{{ route('admin.barang.cari') }}">
                        <select name="cari" class="form-control">
                            <option value="" selected disabled>==Pilih Kategori==</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->id }}--{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      <a class="btn btn-outline-primary" href="{{ route('admin.barang') }}">Reset</a>
                    </form>
                </nav>
            </div>
        </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hovered" id="table">
            <thead>
                <tr align="center">
                    <th width="5%">ID</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Total Barang</th>
                    <th>Harga Ecer</th>
                    <th>Harga Grosir</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $b)
                <tr align="center">
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->kd_barang }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->satuan}}</td>
                    <td>{{ $b->nama_kategori }}</td>
                    <td>{{ $b->stok }}</td>
                    <td>{{ $b->total_barang}}</td>
                    <td>{{ $b->harga_ecer }}</td>
                    <td>{{ $b->harga_grosir }}</td>
                    <td >
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.barang.edit',[$b->id]) }}" class="btn btn-warning btn-sm">Edit
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="{{ route('admin.barang.delete',[$b->id]) }}"
                                onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">Hapus
                                <i class="mdi mdi-delete-forever"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-card>



    <x-slot name="script">
        <script src="{{ asset('dist/js/demo/chart-area-demo.js') }}"></script>
    </x-slot>
</x-app-layout>
