<x-app-layout>
    <x-slot name="title">
        Barang
    </x-slot>

    <div class="row mb-3">
        <div class="col">
            <h4 class="card-title">Tambah Barang</h4>
        </div>
        <div class="col text-right">
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.barang.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Kode Barang</label>
                    <input type="text" class="form-control" name="kd_barang" placeholder="Masukkan Kode Barang" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Barang" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Satuan</label>
                    <select name="satuan" id="satuan" class="form-control">
                        <option value="" selected disabled>==Pilih Satuan==</option>
                        <option value="Kg">Kg</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Liter">Liter</option>
                        <option value="Dus">Dus</option>
                        <option value="Botol">Botol</option>
                        <option value="Bungkus">Bungkus</option>
                        <option value="Buah">Buah</option>
                        <option value="Batang">Batang</option>
                        <option value="Kaleng">Kaleng</option>
                        <option value="Lembar">Lembar</option>
                        <option value="Pasang">Pasang</option>
                        <option value="Sachet">Sachet</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-control">
                        <option value="" selected disabled>==Pilih Kategori==</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->id }}-{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Stok</label>
                    <input type="text" class="form-control" name="stok" placeholder="Masukkan Stok" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Total Barang</label>
                    <input type="text" class="form-control" name="total_barang" placeholder="Masukkan Total Barang" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Harga Ecer</label>
                    <input type="text" class="form-control" name="harga_ecer" placeholder="Masukkan Harga Ecer" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Harga Grosir</label>
                    <input type="text" class="form-control" name="harga_grosir" placeholder="Masukkan Harga Grosir" required>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success text-right">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('dist/js/demo/chart-area-demo.js') }}"></script>
    </x-slot>
</x-app-layout>
