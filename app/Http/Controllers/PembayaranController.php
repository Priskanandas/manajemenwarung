<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\SettingRequest;
use Carbon\Carbon;
use App\Models\Pembayaran;
use DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();

        return view('admin.pembayaran.pembayaran', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembayaran = Pembayaran::all();

        return view('admin.pembayaran.create', compact('pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pembayaran::create([
            'tanggal_bayar' => $request->tanggal_bayar,
            'total_bayar' => $request->total_bayar,
            'total_uang' => $request->total_uang,
            'uang_kembali' => $request->uang_kembali
        ]);

        return redirect()->route('admin.pembayaran')->with('success','Data Berhasil diubah');
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

        $pembayaran = DB::table('pembayaran')
            ->where('tanggal_bayar', '=', $cari)
            ->get();

        return view('admin.pembayaran.pembayaran', ['pembayaran' =>$pembayaran]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pembayaran = Pembayaran::find($id);
        $data = Pembayaran::all();

        return view('admin.pembayaran.edit', compact('pembayaran', 'data'));
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
            'tanggal_bayar' => 'required',
            'total_bayar' => 'required',
            'total_uang' => 'required',
            'uang_kembali' => 'required'
        ]);

        $input = $request->all();
        $pembayaran = Pembayaran::find($id);
        $pembayaran->update($input);

        return redirect()->route('admin.pembayaran')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembayaran::find($id)->delete();

        return redirect()->route('admin.pembayaran')->with('success', 'Data berhasil dihapus');
    }
}
