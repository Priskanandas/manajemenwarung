<x-app-layout>
    <x-slot name="title">
        penjualan
    </x-slot>

    @if(session()->has('success'))
    <x-alert type="success" message="{{ session()->get('success') }}" />
    @endif
    <x-card>
        <x-slot name="title">All Penjualan</x-slot>
        <x-slot name="option">
            <a href="{{ route('admin.penjualan.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>
            </a>
        </x-slot>

        <table class="table table-bordered">
            <thead>
                <tr align="center">
                    <th >ID</th>
                    <th >Barang</th>
                    <th>Pelayan</th>
                    <th>Satuan</th>
                    <th >Tanggal Jual </th>
                    <th>Harga</th>
                    <th >Jumlah</th>
                    <th>Total Harga</th>
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penjualan as $p)
                <tr  align="center">
                    <td>{{ $p->id }}</td>
                    <td >{{ $p->nama_barang }}</td>
                    <td >{{ $p->name }}</td>
                    <td >{{ $p->satuan }}</td>
                    <td >{{ $p->tanggal }}</td>
                    <td >{{ $p->harga_barang}}</td>
                    <td >{{ $p->jml_beli }}</td>
                    <td >{{ $p->total_harga }}</td>

                    <td >
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.penjualan.edit',[$p->id]) }}" class="btn btn-warning btn-sm">Edit
                                <i class="mdi mdi-tooltip-edit"></i>
                            </a>
                            <a href="{{ route('admin.penjualan.delete',[$p->id]) }}"
                                onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">Hapus
                                <i class="mdi mdi-delete-forever"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    	</x-card>


        <x-slot name="script">
            <script src="{{ asset('dist/js/demo/chart-area-demo.js') }}"></script>
        </x-slot>
</x-app-layout>

