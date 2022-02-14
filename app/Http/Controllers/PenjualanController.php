<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\SettingRequest;
use Carbon\Carbon;
use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\User;
use App\Models\Pembayaran;
use DB;
use Illuminate\Support\Arr;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $penjualan = DB::table('penjualan')
        ->join('barang', 'penjualan.id_barang', '=', 'barang.id')
        ->join('users', 'penjualan.id_pelayan', '=', 'users.id')
        ->join('pembayaran', 'penjualan.id_pembayaran', '=', 'pembayaran.id')

        ->select('penjualan.*', 'barang.nama_barang', 'users.name', 'pembayaran.*')
        ->get();
        return view('admin.penjualan.penjualan',['penjualan'=>$penjualan]);
    }
    
    public function create()
    {
        $barang = Barang::all();
        $users = User::all();
        $pembayaran = Pembayaran::all();

        return view ('admin.Penjualan.create',compact('barang','users', 'pembayaran'));

    }
    
    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required',
            'tanggal' => 'required',
            'harga_barang' => 'required',
            'jml_beli' => 'required',
            'total_harga' => 'required'


        ]);
        
        Penjualan::create($request->all());
      
        return redirect()->route('admin.penjualan')
                        ->with('success','penjualan created successfully');
    }
    
    public function edit($id)
    {
        $penjualan = Penjualan::find($id);
        $barang = Barang::all();
    
        return view('admin.Penjualan.edit',compact('Penjualan','barang'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_beli' => 'required',
            'jml_beli' => 'required'

        ]);
        $input=$request->all();
        $penjualan = Penjualan::find($id);
        $penjualan ->update {$input};
      
    
        return redirect()->route('admin.Penjualan')
                        ->with('success','Penjualan updated successfully');
    }
    
    public function delete($id)
    {
        Penjualan::find($id)->delete();
        return redirect()->route('admin.Penjualan')
                        ->with('success','Penjualan deleted successfully');
    }
}