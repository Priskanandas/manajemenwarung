<x-app-layout>
    <x-slot name="title">Tambah Harga</x-slot>

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
    <form action="{{ route('admin.harga.store') }}" method="POST">
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
            <select name="id_pembelian" class="form-control" id="id_pembelian" >
                <option value="" disabled selected>Tanggal Beli</option>
                @foreach($pembelian as $p)
                <option value="{{ $p->id }}">{{ $p->id }}-{{ $p->tanggal_beli }}</option>
                @endforeach
            </select>        
        </div>

        <div class="form-group">
            <label for="exampleSelect">Harga Ecer</label>
            <input class="form-control" id="harga_ecer" name="harga_ecer" type="text" />
        </div>

        <div class="form-group">
            <label for="exampleSelect">Harga Grosir</label>
            <input class="form-control" id="harga_grosir" name="harga_grosir" type="text" />
        </div>

        <div class="form-group">
            <label for="exampleSelect">Harga Jual</label>
            <input class="form-control" placeholder="Masukkan Harga Jual" name="harga_jual" type="text" />
        </div>
        <div class="form-group">
            <label for="exampleSelect">Status</label>
            <select name="status" class="form-control" id="status">
                <option value="" disabled>Pilih Status</option>
                <option value="active">Active</option>
                <option value="non-active">non-Active</option>

            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-success text-right">Simpan</button>
        </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
       
       <script type="text/javascript">

           $('#id_barang').on('keyup', function(){
               var id_barang = $("#id_barang").val();
               $.ajax({
                   // type: "GET",
                    url:"{{ route('admin.harga.store') }}/"+id_barang,
                  // url:'url_folder/ajax.php',
                   data:"id_barang="+id_barang ,
                   // data: {'id_barang':id_barang},
                   // dataType: 'json',
                   success : function (data) {
                         var json = data;
                          let  obj = JSON.parse(json);
                         
                           $('#harga_ecer').val(obj.harga_ecer);
                           $('#harga_grosir').val(obj.harga_grosir);

                           console.log(obj);
                           }
        
               });
           });

           
           function isi_otomatis(){
               var id_barang = $("#id_barang").val();
               $.ajax({
                   // type: "GET",
                    url:"{{ route('admin.harga.store') }}/"+id_barang,
                  // url:'url_folder/ajax.php',
                   data:"id_barang="+id_barang ,
                   // data: {'id_barang':id_barang},
                   // dataType: 'json',
                   success : function (data) {
                         var json = data;
                          let  obj = JSON.parse(json);
                         
                           $('#harga_ecer').val(obj.harga_ecer);
                           $('#harga_grosir').val(obj.harga_grosir);
                          
                           console.log(obj);
                           }
        
               });

               
           }
       </script>
<x-slot name="script">
            <script src="{{ asset('dist/js/demo/chart-area-demo.js') }}"></script>
        </x-slot>
</x-app-layout>