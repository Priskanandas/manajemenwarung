<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\SettingRequest;
use Carbon\Carbon;
use \App\Models\Warung;

class WarungController extends Controller
{
    /**
    * Show Warung
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {

        //Ambil data kategori dari database
        $data = array(
            'warung' => Warung::all()
        );
        //menampilkan view
        return view('admin.warung.warung',$data);
    }

    //function menampilkan view tambah data
    public function tambah()
    {
        return view('admin.warung.tambah');
    }

    public function store(Request $request)
    {
        //Simpan datab ke database
        Warung::create([
            'nama_warung' => $request->nama_warung,
            'alamat' => $request->alamat

        ]);

        //lalu reireact ke route admin.warung dengan mengirim flashdata(session) berhasil tambah data untuk manampilkan alert succes tambah data
        return redirect()->route("admin.warung")
        ->with('success','Warung created successfully');
    }

    public function update($id,Request $request)
    {
        //ambil data sesuai id dari parameter
        $warung = Warung::FindOrFail($id);
        //lalu ambil apa aja yang mau diupdate
        $warung->nama_warung = $request->nama_warung;
        $warung->alamat = $request->alamat;

        //lalu simpan perubahan
        $warung->save();
        return redirect()->route('admin.warung')
        ->with('success','Warung updated successfully');
    }

    //function menampilkan form edit
    public function edit($id)
    {
        $data = array(
            'warung' => $warung = Warung::FindOrFail($id)
        );
        return view('admin.warung.edit',$data);
    }

    public function delete($id)
    {
        //hapus data sesuai id dari parameter
        Warung::destroy($id);

        return redirect()->route('admin.warung')
                        ->with('success','Warung deleted successfully');    }
}
