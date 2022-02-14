<x-app-layout>
    <x-slot name="title">
        Kategori
    </x-slot>

    <div class="row mb-3">
        <div class="col">
            <h4 class="card-title">Edit Kategori</h4>
        </div>
        <div class="col text-right">
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori" value="{{ $kategori->nama_kategori }}" required>
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
