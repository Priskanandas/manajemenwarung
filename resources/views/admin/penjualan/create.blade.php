<x-app-layout>
    <x-slot name="title">Tambah Penjualan</x-slot>

    {{-- show alert if there is errors --}}
    <x-alert-error />

    @if(session()->has('success'))
    <x-alert type="success" message="{{ session()->get('success') }}" />
    @endif

    <div class="col text-right">
        <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
    </div>
  
    <script>
    function sum() {
        var hargabarang = document.getElementById('harga_barang').value;
        var jmlbeli = document.getElementById('jml_beli').value;
        var result = parseInt(jmlbeli) * parseInt(hargabarang);
        if (!isNaN(result)) {
            document.getElementById('total_harga').value = result;
        }
    }
    </script>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.penjualan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                        @foreach ($barang as $b)
                        <option value="{{ $b->id }}">{{ $b->id }}-{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Pelayan</label>
                    <select name="id" id="id" class="form-control">
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
             
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername1">Satuan</label>
                    <select name="satuan" id="satuan" class="form-control">
                        <option value="" disabled selected>Pilih Satuan</option>
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
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Tanggal Jual</label>
                    <input type="date" class="form-control" name="tanggal">
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername1">Harga Barang</label>
                    <input type="text" class="form-control" name="harga_barang" id="harga_barang" onkeyup="sum();"
                        placeholder="Masukkan Harga Barang">
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername1">Jumlah Beli</label>
                    <input type="text" class="form-control" name="jml_beli" id="jml_beli" onkeyup="sum();"
                        placeholder="Masukkan Jumlah Beli">
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername1">Total Harga</label>
                    <input type="text" class="form-control" name="total_harga" id="total_harga"
                        placeholder="Masukkan Total Harga">
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