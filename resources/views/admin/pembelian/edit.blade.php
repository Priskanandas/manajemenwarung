<x-app-layout>
    <x-slot name="title">
        Edit Pembelian
    </x-slot>

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
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.pembelian.update',[$pembelian->id]) }}" method="POST">
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
                        <label for="InputTgl">Tanggal Beli</label>
                        <input type="date" class="form-control" name="tanggal_beli" value="{{ $pembelian->tanggal_beli }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Inputjml">Jumlah Beli</label>
                        <input type="text" class="form-control" name="jml_beli" value="{{ $pembelian->jml_beli }}" required>
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
