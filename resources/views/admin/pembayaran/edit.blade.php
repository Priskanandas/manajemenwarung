<x-app-layout>
    <x-slot name="title">
        Pembayaran
    </x-slot>

    <div class="row mb-3">
        <div class="col">
            <h4 class="card-title">Edit Pembayaran</h4>
        </div>
        <div class="col text-right">
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <script>
        function sum() {
              var totalbayar = document.getElementById('total_bayar').value;
              var totaluang = document.getElementById('total_uang').value;
              var result = parseInt(totaluang) - parseInt(totalbayar);
              if (!isNaN(result)) {
                 document.getElementById('uang_kembali').value = result;
              }
        }
    </script>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.pembayaran.update', $pembayaran->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleSelect">Tanggal Bayar</label>
                    <input type="date" class="form-control" name="tanggal_bayar" value="{{ $pembayaran->tanggal_bayar }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Total Bayar</label>
                    <input type="text" class="form-control" name="total_bayar" id="total_bayar" onkeyup="sum();" placeholder="Masukkan Total Bayar" value="{{ $pembayaran->total_bayar }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Total Uang</label>
                    <input type="text" class="form-control" name="total_uang" id="total_uang" onkeyup="sum();" placeholder="Masukkan Total Uang" value="{{ $pembayaran->total_uang }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Uang Kembali</label>
                    <input type="text" class="form-control" name="uang_kembali" id="uang_kembali" placeholder="Masukkan Uang Kembali" value="{{ $pembayaran->uang_kembali }}" required>
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
