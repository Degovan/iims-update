<?php

namespace App\Http\Controllers;

use App\Cp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CpController extends Controller
{
    public function index($id_vendor)
    {
        $cp = Cp::where('id_vendor', $id_vendor)
            ->orderBy('nama', 'ASC')
            ->get();

        $name = DB::table('vendor')
            ->where('id_vendor', $id_vendor)
            ->first()
            ->nama_vendor;

        $data = [
            'cp'        => $cp,
            'id_vendor' => $id_vendor,
            'name'      => $name
        ];

        return view('cp', $data);
    }

    public function search(Request $request, $id_vendor)
    {
        $cari = $request->cari;

        $cp = Cp::where('id_vendor', $id_vendor)
                ->where(function($row) use ($cari) {
                    $row->where('nama', 'like', '%'.$cari.'%')
                        ->orWhere('email', 'like', '%'.$cari.'%')
                        ->orWhere('hp', 'like', '%'.$cari.'%');
                })
                ->orderBy('nama', 'ASC')
                ->get();

        $name = DB::table('vendor')
            ->where('id_vendor', $id_vendor)
            ->first()
            ->nama_vendor;

        $data = [
            'cp'        => $cp,
            'id_vendor' => $id_vendor,
            'name'      => $name
        ];

        return view('cp', $data);
    }

    public function create($id_vendor)
    {
        $name = DB::table('vendor')
            ->where('id_vendor', $id_vendor)
            ->first()
            ->nama_vendor;

        $data   = [
            'id_vendor' => $id_vendor,
            'name'      => $name,
        ];

        return view('addCp', $data);
    }

    public function store(Request $request)
    {
        $nama       = $request->nama;
        $email      = $request->email;
        $hp         = $request->hp;
        $id_vendor  = $request->id_vendor;

        $data   = [
            'nama'      => $nama,
            'email'     => $email,
            'hp'        => $hp,
            'id_vendor' => $id_vendor,
        ];

        Cp::create($data);

        $url = '/cp/'.$id_vendor;

        return redirect($url);
    }

    public function update(Request $request, $id_cp)
    {
        $nama       = $request->nama;
        $email      = $request->email;
        $hp         = $request->hp;
        $id_vendor  = $request->id_vendor;

        $data   = [
            'nama'      => $nama,
            'email'     => $email,
            'hp'        => $hp,
            'id_vendor' => $id_vendor,
        ];

        Cp::where('id_cp', $id_cp)
            ->update($data);

        $url = '/cp/'.$id_vendor;

        return redirect($url);
    }

    public function edit($id_cp)
    {
        $cp = Cp::where('id_cp', $id_cp)
                ->first();

        $data = [
            'cp'        => $cp,
        ];

        return view('editCp', $data);
    }

    public function delete($id_cp)
    {
        $id_vendor  =  Cp::where('id_cp', $id_cp)
            ->first()
            ->id_vendor;

        $url = '/cp/'.$id_vendor;

        Cp::where('id_cp', $id_cp)
            ->delete();

        return redirect($url);
    }
}
