<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function index()
    {
        $vendor = DB::table('vendor')->get();
        return view('vendor', ['vendor' => $vendor]);
    }

    public function edit($id_vendor)
    {
        $vendor = DB::table('vendor')->where('id_vendor', $id_vendor)->get();
        return view('editVendor', ['vendor' => $vendor]);
    }
    public function update(Request $request)
    {
        DB::table('vendor')->where('id_vendor', $request->id_vendor)->update([
            'nama_vendor' => $request->nama_vendor,
            'alamat_vendor' => $request->alamat_vendor,
            'telp' => $request->telp,
            'fax' => $request->fax,
        ]);
        return redirect('/vendor');
    }
    public function hapus($id_vendor)
    {
        DB::table('vendor')->where('id_vendor', $id_vendor)->delete();
        return redirect('/vendor');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $vendor = DB::table('vendor')
            ->where('nama_vendor', 'like', "%" . $cari . "%")
            ->orWhere('alamat_vendor', 'like', "%" . $cari . "%")
            ->orWhere('telp', 'like', "%" . $cari . "%")
            ->orWhere('fax', 'like', "%" . $cari . "%")
            ->paginate();

        return view('vendor', ['vendor' => $vendor]);
    }
    public function tambah()
    {
        return view('addVendor');
    }
    public function simpan(Request $request)
    {
        DB::table('vendor')->insert([
            'nama_vendor' => $request->nama_vendor,
            'alamat_vendor' => $request->alamat_vendor,
            'telp' => $request->telp,
            'fax' => $request->fax,
        ]);
        return redirect('/vendor');
    }
}
