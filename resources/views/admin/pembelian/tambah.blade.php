<x-app-layout>
    <x-slot name="title">Tambah Pembelian</x-slot>

    {{-- show alert if there is errors --}}
    <x-alert-error />

    @if(session()->has('success'))
    <x-alert type="success" message="{{ session()->get('success') }}" />
    @endif

    <div class="row mb-3">

        <div class="col text-right">
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <form action="{{ route('admin.pembelian.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exampleSelect">Nama Barang</label>
            <select name="id_barang" class="form-control" id="id_barang">
                <option value="" disabled>Pilih Barang</option>
                @foreach($barang as $b)
                <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleSelect">Tanggal Beli</label>
            <input class="form-control" placeholder="Tanggal Beli" name="tanggal_beli" type="date" required>
        </div>

        <div class="form-group">
            <label for="exampleSelect">Jumlah Beli</label>
            <input class="form-control" placeholder="masukan jumlah beli" name="jml_beli" type="text" required>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-success text-right">Simpan</button>
        </div>

    </form>


</x-app-layout>
