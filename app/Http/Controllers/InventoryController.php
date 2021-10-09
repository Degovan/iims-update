<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
  
    public function index()
    {
        $inventory = DB::table('inventory')->get();
        return view('inventory',['inventory'=>$inventory]);
    }
    public function edit($id_inventory){
        $inventory = DB::table('inventory')->where('id_inventory', $id_inventory)->get();
        return view('editInventory',['inventory'=> $inventory]);
    }
    public function update(Request $request){
        DB::table('inventory')->where('id_inventory', $request->id_inventory)->update([
            'lokasi_gudang' => $request->lokasi_gudang,
            'lokasi_rak' => $request->lokasi_rak,
            'lokasi_barisRak' => $request->lokasi_barisRak,
            'lokasi_kolomRak' => $request->lokasi_kolomRak,
        ]);
        return redirect('/inventory');
    }
    public function hapus($id_inventory){
        DB::table('inventory')->where('id_inventory', $id_inventory)->delete();
        return redirect('/inventory');
    }
    public function tambah(){
        return view('addInventory');
    }
    public function simpan(Request $request){
        DB::table('inventory')->insert([
            'lokasi_gudang'=>$request->lokasi_gudang,
            'lokasi_rak'=>$request->lokasi_rak,
            'lokasi_barisRak'=>$request->lokasi_barisRak,
            'lokasi_kolomRak'=>$request->lokasi_kolomRak,
        ]);
        return redirect('/inventory');
    }
    public function cari(Request $request){
        $cari = $request->cari;
        $inventory = DB::table('inventory')
        ->where('lokasi_gudang','like',"%".$cari."%")
        ->orWhere('lokasi_rak','like',"%".$cari."%")
        ->orWhere('lokasi_barisRak','like',"%".$cari."%")
        ->orWhere('lokasi_kolomRak','like',"%".$cari."%")
        ->paginate();

        return view('inventory',['inventory' =>$inventory]);
    }

}
