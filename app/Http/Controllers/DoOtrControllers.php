<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoOtrControllers extends Controller
{
    public function delivery_order(Request $request)
    {
        $cari = $request->input('cari');

        $data = DB::table("deliveri_order as do")
            ->join('customer as c', "c.id_customer", "=", "do.customer_id")
            ->join('produk as p', "p.id_produk", "=", "do.produk_id")
            ->join('users as u', "u.id", "=", "do.created_by")
            ->where(function ($data) use ($cari) {
                $data->where('do.no_do', 'LIKE', '%' . $cari . '%')
                    ->orWhere('c.nama_customer', 'LIKE', '%' . $cari . '%')
                    ->orWhere('do.tanggal_do', 'LIKE', '%' . $cari . '%')
                    ->orWhere('c.telepon', 'LIKE', '%' . $cari . '%')
                    ->orWhere('p.nama_produk', 'LIKE', '%' . $cari . '%')
                    ->orWhere('u.name', 'LIKE', '%' . $cari . '%')
                    ->orWhere('p.qty', 'LIKE', '%' . $cari . '%');
            })
            ->select('do.id', 'do.catatan', 'do.no_do', 'do.tanggal_do', "p.nama_produk", "p.qty", "do.flag", "p.harga", "c.nama_customer", "c.telepon", "u.name as created_by")
            ->get();

        foreach ($data as $key => $value) {
            $data[$key]->tanggal_do =  Carbon::parse($value->tanggal_do)->format('d M Y - H:m:s');
        }
        return view('DO.index', ['do' => $data]);
    }

    public function create_do()
    {
        $cust = DB::table('customer')->select("id_customer", "nama_customer", "telepon")->get();
        $produk = DB::table('produk')->select('id_produk', 'nama_produk')->get();
        return view("DO.create", ['customer' => $cust, 'produk' => $produk]);
    }

    public function simpan_do(Request $request)
    {
        $no_do = $request->nomor_do;
        $tanggal_do = $request->tanggal_do;
        $created_by = $request->id_pembuat;
        $id_customer = $request->customer_id;
        $id_produk = $request->produk_id;

        $iu_do = [
            'no_do' => $no_do,
            'tanggal_do' => $tanggal_do,
            'created_by' => $created_by,
            'customer_id' => $id_customer,
            'produk_id' => $id_produk,
            'catatan' => $request->catatan,
        ];
        $id = $request->id_do;
        $msg = "saved";

        if (isset($id) && !empty($id)) {
            DB::table("deliveri_order")->where("id", $id)->update($iu_do);
            $msg = "updated";
        } else {
            DB::table("deliveri_order")->insert($iu_do);
        }

        return redirect('/delivery_order')->with('alert', [
            'type' => 'success',
            'msg' => 'Delivery order data ' . $msg . ' successfully'
        ]);
    }

    public function update_do($id)
    {
        $cust = DB::table('customer')->select("id_customer", "nama_customer")->get();
        $produk = DB::table('produk')->select('id_produk', 'nama_produk')->get();
        $do = DB::table('deliveri_order')->where("id", $id)->first();
        $do->tanggal_do = date("Y-m-d\TH:i:s", strtotime($do->tanggal_do));
        return view("DO.edit", ['customer' => $cust, 'produk' => $produk, 'do' => $do]);
    }

    public function hapus_do($id)
    {
        DB::table('deliveri_order')->where("id", $id)->delete();
        return redirect('/delivery_order')->with('alert', [
            'type' => 'success',
            'msg' => 'Delivery order data deleted successfully'
        ]);
    }


    public function otr(Request $request)
    {
        $cari = $request->input('cari');

        $data = DB::table("otr")
            ->join("deliveri_order as do", "do.id", "=", "otr.id_do")
            ->join('customer as c', "c.id_customer", "=", "do.customer_id")
            ->join('produk as p', "p.id_produk", "=", "do.produk_id")
            ->join('users as u', "u.id", "=", "do.created_by")
            // ->join('users as uotr', "u.id", "=", "otr.validated_by")
            ->where(function ($data) use ($cari) {
                $data->where('do.no_do', 'LIKE', '%' . $cari . '%')
                    ->orWhere('c.nama_customer', 'LIKE', '%' . $cari . '%')
                    ->orWhere('do.tanggal_do', 'LIKE', '%' . $cari . '%')
                    ->orWhere('otr.no_otr', 'LIKE', '%' . $cari . '%')
                    ->orWhere('c.telepon', 'LIKE', '%' . $cari . '%')
                    ->orWhere('p.nama_produk', 'LIKE', '%' . $cari . '%')
                    ->orWhere('u.name', 'LIKE', '%' . $cari . '%')
                    ->orWhere('p.qty', 'LIKE', '%' . $cari . '%');
            })
            ->select(
                'otr.id',
                "otr.no_otr",
                "otr.flag",
                'do.no_do',
                'do.tanggal_do',
                "p.nama_produk",
                "p.qty",
                "p.harga",
                "c.nama_customer",
                "c.telepon",
                "u.name as created_by",
                "otr.validated_by",
                "p.id_produk"
            )
            //    ->groupBy("otr.no_otr", "otr.id", "otr.flag")
            ->get();

        foreach ($data as $key => $value) {
            $data[$key]->tanggal_do =  Carbon::parse($value->tanggal_do)->format('d M Y - H:m:s');
            $data[$key]->lokasi_gudang = $this->get_lokasi_produk($value->id_produk)->lokasi_gudang ?? "-";
            $data[$key]->validated_by = $this->get_firt_by_id("users", $value->validated_by)->name ?? "-";
        }
        return view('OTR.index', ['do' => $data]);
    }

    public function create_otr()
    {
        $do = DB::table('deliveri_order')->select('id', 'no_do')->where('flag', 0)->get();
        return view("OTR.create", ['do' => $do]);
    }


    // ALTER TABLE `otr`
    // ADD COLUMN `valid_otr` VARCHAR(255) NULL DEFAULT NULL AFTER `flag`;


    public function simpan_otr(Request $request)
    {
        $iu_do = [
            'id_do' => $request->id_do,
            'no_otr' => $request->nomor_otr,
            'validated_by' => $request->id_pembuat,
            'valid_otr' => null
        ];


        $is_valid = $request->valid_otr;

        if (isset($is_valid)) {
            $iu_do['valid_otr'] = implode(";", $is_valid);
        }

        $ket = $request->simpan;

        if ($ket == 1) {
            $iu_do['flag'] = 1;
            DB::table("deliveri_order")->where('id', $request->id_do)->update(['flag' => 1, 'catatan' => $request->catatan]);
        } else {
            DB::table("deliveri_order")->where('id', $request->id_do)->update(['flag' => 0, 'catatan' => $request->catatan]);
        }

        $id = $request->id_otr;
        $msg = "saved";

        if (isset($id) && !empty($id)) {
            DB::table("otr")->where("id", $id)->update($iu_do);
            $msg = "updated";
        } else {
            DB::table("otr")->insert($iu_do);
        }

        return redirect('/otr')->with('alert', [
            'type' => 'success',
            'msg' => 'Outgoing Transaction data ' . $msg . ' successfully'
        ]);
    }

    public function update_otr($id)
    {
        $otr = DB::table('otr')->where("id", $id)->first();
        $otr->valid_otr = explode(";", $otr->valid_otr);
        $do = DB::table('deliveri_order')->select('id', 'no_do')->where('id', $otr->id_do)->get();
        return view("OTR.edit", ['otr' => $otr, 'do' => $do]);
    }

    public function hapus_otr($id)
    {
        DB::table('otr')->where("id", $id)->delete();
        return redirect('/otr')->with('alert', [
            'type' => 'success',
            'msg' => 'Outgoing Transaction data deleted successfully'
        ]);
    }

    function print_do_otr($id, $jenis)
    {
        if ($jenis == 'do') {
            $data = DB::table("deliveri_order as do")
                ->join('customer as c', "c.id_customer", "=", "do.customer_id")
                ->join('produk as p', "p.id_produk", "=", "do.produk_id")
                ->join('users as u', "u.id", "=", "do.created_by")
                ->where("do.id", $id)
                ->select('do.id', 'do.catatan', 'do.no_do', 'do.tanggal_do', "p.nama_produk", "p.qty", "p.harga", "c.nama_customer", "c.telepon", "u.name as created_by")
                ->first();

            $data->jenis = 'do';
            $data->title = "DELIVERY ORDER";
        }

        if ($jenis == 'otr') {
            $data = DB::table("otr")
                ->join("deliveri_order as do", "do.id", "=", "otr.id_do")
                ->join('customer as c', "c.id_customer", "=", "do.customer_id")
                ->join('produk as p', "p.id_produk", "=", "do.produk_id")
                ->join('users as u', "u.id", "=", "do.created_by")
                // ->join('users as uotr', "u.id", "=", "otr.validated_by")
                ->where("otr.id", $id)
                ->select(
                    'otr.id',
                    "otr.no_otr",
                    "do.catatan",
                    'do.no_do',
                    'do.tanggal_do',
                    "p.nama_produk",
                    "p.qty",
                    "p.harga",
                    "c.nama_customer",
                    "c.telepon",
                    "u.name as created_by",
                    "otr.validated_by",
                    "p.id_produk"
                )
                ->first();
            $data->lokasi_gudang = $this->get_lokasi_produk($data->id_produk)->lokasi_gudang ?? "-";
            $data->validated_by = $this->get_firt_by_id("users", $data->validated_by)->name ?? "-";
            $data->jenis = 'otr';
            $data->title = "OUTGOING TRANSACTION";
        }
        return view('DO.cetakDoOtr', ['data' => $data]);
    }
}
