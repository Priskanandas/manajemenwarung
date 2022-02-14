<x-app-layout>
    <x-slot name="title">
        Edit Harga
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
            <form action="{{ route('admin.harga.update',[$harga->id]) }}" method="POST">
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
                        <label for="exampleSelect">ID Tanggal Pembelian Barang</label>
                        <select name="id_pembelian" class="form-control" id="id_pembelian">
                            <option value="" disabled>Pilih</option>
                            @foreach($pembelian as $p)
                            <option value="{{ $p->id }}">{{ $p->id}}- {{ $p->tanggal_beli}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect">Harga Ecer</label>
                        <input class="form-control" value="{{ $harga->harga_ecer }}" name="harga_ecer" type="text" />
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect">Harga Grosir</label>
                        <input class="form-control" value="{{ $harga->harga_grosir }}" name="harga_grosir" type="text" />
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect">Harga Jual</label>
                        <input class="form-control" value="{{ $harga->harga_jual }}" name="harga_jual" type="text" />
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="{{$harga->status}}" disabled selected>{{$harga->status}}</option>
                                        <option value="active">Active</option>
                                        <option value="non-active">non-Active</option>
                        </select>    
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
