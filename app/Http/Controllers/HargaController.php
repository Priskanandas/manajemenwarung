<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\SettingRequest;
use Carbon\Carbon;
use App\Models\Harga;
use App\Models\Pembelian;
use App\Models\Barang;
use Response;
use DB;

class HargaController extends Controller
{


    public function simpan_data (Request $request){
    //    dd($request->all());

    $data = new Hrg;

    $data->nim = $request->nim;
    $data->nama = $request->nama;
    $data->jeniskelamin = $request->jeniskelamin;
    $data->jurusan = $request->jurusan;
    $data->notelp = $request->notelp;
    $data->email = $request->email;
    $data->alamat = $request->alamat;

    $data->save();

    return redirect()->back()->with('ok');
    
  

        
    } 
    public function index()
    {

        $harga = DB::table('harga')
            ->join('barang', 'harga.id_barang', '=', 'barang.id')
            ->join('pembelian', 'harga.id_pembelian', '=', 'pembelian.id')
            ->select('harga.*', 'barang.nama_barang', 'pembelian.tanggal_beli')
            ->get();
  
  return view('admin.harga.harga',['harga'=>$harga]);
    }

    public function create(Request $request)
    { 
        $harga = Harga::all();
        $barang = Barang::all();
        $pembelian = Pembelian::all();

        return view ('admin.harga.create',compact('barang', 'pembelian', 'harga'));
    }

    public function ajax($id){
       
        //$data = Mahasiswa::all();
        //$data = DB::table('harga')
        //$harga = Harga::all();

        $data = Harga::where('id_barang', $id)->first();
        //dd($data);
       // return response()->json($harga, $barang);

        //return response()->json($data, 200);
        return json_encode($data);
       // $harga = Harga::where('id_barang', $request->get('id'))
         //   ->pluck('harga_ecer', 'id');

        //return response()->json($harga);
        //$harga = DB::table('harga')->pluck("harga_ecer","id");
        //return view('admin.harga.create',compact('harga'));
    }
    public function getBarang($id) 
    {
        $barang = DB::table("barang")->where("id_barang",$id)->pluck("harga_ecer","id");
        return json_encode($barang);
    }

    
    public function store(Request $request)
    {
        $request->validate([

            'harga_jual' => 'required',
            'status' => 'required'
        ]);
        
        Harga::create($request->all());
        return redirect()->route('admin.harga')
                        ->with('success','Harga created successfully');
                        
    }
    
    public function edit($id)
    {
        $harga = Harga::find($id);
        $barang = Barang::all();
        $pembelian = Pembelian::all();

        return view('admin.harga.edit',compact('harga','barang','pembelian'));
    }
    
    public function update(Request $request, $id)
    {
        $harga = Harga::find($id);
                $harga->update([
                    'harga_ecer' => $request->harga_ecer,
                    'harga_grosir' => $request->harga_grosir,
                    'harga_jual' => $request->harga_jual,
                    'status' => $request->status
                ]);
      
    
        return redirect()->route('admin.harga')
                        ->with('success','Harga updated successfully');
    }
    
    public function delete($id)
    {
        Harga::find($id)->delete();
        return redirect()->route('admin.harga')
                        ->with('success','Harga deleted successfully');
    }
}

