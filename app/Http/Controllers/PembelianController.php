<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\SettingRequest;
use Carbon\Carbon;
use App\Models\Pembelian;
use App\Models\Barang;
use DB;
use Illuminate\Support\Arr;

class PembelianController extends Controller
{
    public function index(Request $request)
    {
        $pembelian = DB::table('pembelian')
        ->join('barang', 'pembelian.id_barang', '=', 'barang.id')
        ->select('pembelian.*', 'barang.nama_barang')
        ->get();
        return view('admin.pembelian.pembelian',['pembelian'=>$pembelian]);
    }

    public function tambah()
    {
        $barang = Barang::all();
        return view ('admin.pembelian.tambah',compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_beli' => 'required',
            'jml_beli' => 'required'

        ]);

        Pembelian::create($request->all());

        return redirect()->route('admin.pembelian')
                        ->with('success','Pembelian created successfully');
    }

    public function edit($id)
    {
        $pembelian = Pembelian::find($id);
        $barang = Barang::all();

        return view('admin.pembelian.edit',compact('pembelian','barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_beli' => 'required',
            'jml_beli' => 'required'

        ]);
        $input=$request->all();
        $pembelian = Pembelian::find($id);
        $pembelian ->update ($input);


        return redirect()->route('admin.pembelian')
                        ->with('success','Pembelian updated successfully');
    }

    public function delete($id)
    {
        Pembelian::find($id)->delete();
        return redirect()->route('admin.pembelian')
                        ->with('success','Pembelian deleted successfully');
    }
}
