<x-app-layout>
    <x-slot name="title">
        Kategori
    </x-slot>

    <x-card>
        <x-slot name="title">All Kategori</x-slot>
        <x-slot name="option">
            <a href="{{ route('admin.kategori.tambah') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>
            </a>
        </x-slot>

        <div class="row">
            <div class="col">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" method="GET" action="{{ route('admin.kategori.cari') }}">
                      <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Masukkan ID" aria-label="Search" value="{{ old('id') }}">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      <a class="btn btn-outline-primary" href="{{ route('admin.kategori') }}">Reset</a>
                    </form>
                </nav>
            </div>
        </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hovered" id="table">
            <thead>
                <tr align="center">
                    <th width="5%">ID</th>
                    <th>Nama Kategori</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $b)
                <tr align="center">
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->nama_kategori }}</td>
                    <td >
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.kategori.edit',[$b->id]) }}" class="btn btn-warning btn-sm">Edit
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="{{ route('admin.kategori.delete',[$b->id]) }}"
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
