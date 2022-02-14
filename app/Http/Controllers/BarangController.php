<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\SettingRequest;
use Carbon\Carbon;
use App\Models\Kategori;
use App\Models\Barang;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('barang')
            ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
            ->select('barang.*', 'kategori.nama_kategori')
            ->get();

        $kategori = Kategori::all();

  return view('admin.barang.barang', compact('barang', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view ('admin.barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Barang::create([
            'id_kategori' => $request->id_kategori,
            'kd_barang' => $request->kd_barang,
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'total_barang' => $request->total_barang,
            'harga_ecer' => $request->harga_ecer,
            'harga_grosir' => $request->harga_grosir
        ]);

        return redirect()->route('admin.barang')->with('status','Data Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cari = $request->cari;

        $kategori = Kategori::all();

        $sbarang = DB::table('barang')
            ->join('kategori', 'kategori.id', '=', 'barang.id_kategori')
            ->where('kategori.id', '=', $cari)
            ->select('barang.*', 'kategori.nama_kategori')
            ->get();

        return view('admin.barang.barang', ['barang' => $sbarang], ['kategori' => $kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        $kategori = Kategori::all();
        return view('admin.barang.edit',compact('barang','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'kd_barang' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
            'total_barang' => 'required',
            'harga_ecer' => 'required',
            'harga_grosir' => 'required'
        ]);

        $input = $request->all();
        $barang = Barang::find($id);
        $barang->update($input);

        return redirect()->route('admin.barang')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::find($id)->delete();
        return redirect()->route('admin.barang')->with('success','Data Berhasil Dihapus');
    }
}
