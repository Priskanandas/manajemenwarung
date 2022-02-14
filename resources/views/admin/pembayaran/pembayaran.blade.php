<x-app-layout>
    <x-slot name="title">
        Pembayaran
    </x-slot>

    <x-card>
        <x-slot name="title">All Pembayaran</x-slot>
        <x-slot name="option">
            <a href="{{ route('admin.pembayaran.tambah') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>
            </a>
        </x-slot>
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" method="GET" action="{{ route('admin.pembayaran.cari') }}">
                      <input class="form-control mr-sm-2" type="date" name="cari" placeholder="Masukkan tanggal" aria-label="Search" value="{{ old('tanggal_bayar') }}">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      <a class="btn btn-outline-primary" href="{{ route('admin.pembayaran') }}">Reset</a>
                    </form>
                </nav>
            </div>
        </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hovered" id="table">
            <thead>
                <tr align="center">
                    <th width="5%">ID</th>
                    <th>Tanggal Bayar</th>
                    <th>Total Bayar</th>
                    <th>Total Uang</th>
                    <th>Uang Kembali</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $b)
                <tr align="center">
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->tanggal_bayar }}</td>
                    <td>{{ $b->total_bayar }}</td>
                    <td>{{ $b->total_uang}}</td>
                    <td>{{ $b->uang_kembali }}</td>
                    <td >
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.pembayaran.edit',[$b->id]) }}" class="btn btn-warning btn-sm">Edit
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="{{ route('admin.pembayaran.delete',[$b->id]) }}"
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
