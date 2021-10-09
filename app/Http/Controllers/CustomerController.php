<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
  
    public function index()
    {
        $customer = DB::table('customer')->get();
        return view('customer',['customer'=>$customer]);
    }
    public function edit($id_customer){
        $customer = DB::table('customer')->where('id_customer', $id_customer)->get();
        return view('editCustomer',['customer'=> $customer]);
    }
    public function update(Request $request){
        DB::table('customer')->where('id_customer', $request->id_customer)->update([
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'telepon' => $request->telepon,
            'fax' => $request->fax,
            'email' => $request->email,
            'customer_cp' => $request->customer_cp,
            'nama' => $request->nama,
            'hp' => $request->hp,
            'catatan' => $request->catatan,
        ]);
        return redirect('/customer');
    }
    public function hapus($id_customer){
        DB::table('customer')->where('id_customer', $id_customer)->delete();
        return redirect('/customer');
    }

    public function cari(Request $request){
        $cari = $request->cari;
        $customer = DB::table('customer')
        ->where('nama_customer','like',"%".$cari."%")
        ->orWhere('alamat_customer','like',"%".$cari."%")
        ->orWhere('telepon','like',"%".$cari."%")
        ->orWhere('fax','like',"%".$cari."%")
        ->orWhere('email','like',"%".$cari."%")
        ->orWhere('customer_cp','like',"%".$cari."%")
        ->orWhere('nama','like',"%".$cari."%")
        ->orWhere('hp','like',"%".$cari."%")
        ->orWhere('catatan','like',"%".$cari."%")
        ->paginate();

        return view('customer',['customer' =>$customer]);
    }
    public function tambah(){
        return view('addCustomer');
    }
    public function simpan(Request $request){
        DB::table('customer')->insert([
            'nama_customer'=>$request->nama_customer,
            'alamat_customer'=>$request->alamat_customer,
            'telepon'=>$request->telepon,
            'fax'=>$request->fax,
            'email'=>$request->email,
            'customer_cp'=>$request->customer_cp,
            'nama'=>$request->nama,
            'hp'=>$request->hp,
            'catatan'=>$request->catatan,
        ]);
        return redirect('/customer');
    }
}
