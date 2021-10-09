<?php

namespace App\Http\Controllers;

use App\Model\ItrModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PritControllers extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;

        $data = DB::table('purchase_request as pr')
            ->join('vendor as v', "v.id_vendor", "=", "pr.vendor_id")
            ->join('produk as p', "p.id_produk", "=", "pr.produk_id")
            ->select("pr.id", "pr.status", "pr.tanggal", "pr.no_pr", "v.nama_vendor", "v.telp", "pr.qty", "p.harga", "p.nama_produk")
            ->where(function ($data) use ($cari) {
                if (!empty($cari)) {
                    $data->where('pr.no_pr', 'LIKE', '%' . $cari . '%')
                        ->orWhere('v.nama_vendor', 'LIKE', '%' . $cari . '%')
                        ->orWhere('v.telp', 'LIKE', '%' . $cari . '%')
                        ->orWhere('p.nama_produk', 'LIKE', '%' . $cari . '%')
                        ->orWhere('pr.qty', 'LIKE', '%' . $cari . '%');
                }
            })
            ->get();

        return view('PR.index', ['pr' => $data]);
    }

    public function craete_pr()
    {
        $vendor = DB::table('vendor')->select('id_vendor', 'nama_vendor')->get();
        $produk = DB::table('produk')->select('id_produk', 'nama_produk')->get();
        $data['vendor'] = $vendor;
        $data['produk'] = $produk;
        return view('PR.create', ['data' => $data]);
    }

    public function simpan_pr(Request $request)
    {
        $id = $request->id_pr;

        $insert = [
            'no_pr' => $request->nomor_pr,
            'tanggal' => date("Y-m-d H:i:s", strtotime($request->tanggal_pr)),
            'vendor_id' => $request->vendor_id,
            'produk_id' => $request->produk_id,
            'created_by' => $request->id_pembuat,
            'qty' => $request->qty
        ];
        if ($id) {
            DB::table('purchase_request')->where("id", $id)->update($insert);
            $msg = "updated";
        } else {
            $msg = "saved";
            DB::table('purchase_request')->insert($insert);
        }

        return redirect('/purchase')->with('alert', [
            'type' => 'success',
            'msg' => 'Purchace Request data ' . $msg . ' successfully'
        ]);
    }

    public function update_pr($id)
    {
        $vendor = DB::table('vendor')->select('id_vendor', 'nama_vendor')->get();
        $produk = DB::table('produk')->select('id_produk', 'nama_produk')->get();
        $ret = DB::table('purchase_request')->where('id', $id)->first();
        $ret->tanggal = date("Y-m-d\TH:i:s", strtotime($ret->tanggal));

        $data['vendor'] = $vendor;
        $data['produk'] = $produk;
        $data['pr'] = $ret;
        return view('PR.edit', ['data' => $data]);
    }

    public function view_pr($id)
    {
        $vendor = DB::table('vendor')->select('id_vendor', 'nama_vendor')->get();
        $produk = DB::table('produk')->select('id_produk', 'nama_produk')->get();
        $ret = DB::table('purchase_request')->where('id', $id)->first();
        $ret->tanggal = date("Y-m-d\TH:i:s", strtotime($ret->tanggal));

        $data['vendor'] = $vendor;
        $data['produk'] = $produk;
        $data['pr'] = $ret;

        return view('PR.view', ['data' => $data]);
    }

    function  print_pr_itr($id, $jenis)
    {
        if ($jenis == 'pr') {
           
            $data = DB::table('purchase_request as pr')
            ->join('vendor as v', "v.id_vendor", "=", "pr.vendor_id")
            ->join('produk as p', "p.id_produk", "=", "pr.produk_id")
            ->select("pr.id", "pr.status", "pr.tanggal", "pr.no_pr", "v.nama_vendor", "v.telp", "pr.qty", "p.harga", "p.nama_produk")
            ->where('pr.id', $id)
            ->first();
            $data->jenis = 'pr';
            $data->title = "PUCHASE REQUEST";
        }
        
        if ($jenis == 'itr') {                           
           $data = DB::table('itr as i')
            ->join('purchase_request as pr', 'pr.id', '=', 'i.id_pr')
            ->join('vendor as v', "v.id_vendor", "=", "pr.vendor_id")
            ->join('produk as p', "p.id_produk", "=", "pr.produk_id")
            ->select("i.id", "i.status", "i.flag", "i.tanggal_itr as tanggal", "i.no_itr", "pr.no_pr", "v.nama_vendor", "v.telp", "i.qty", "p.harga", "p.nama_produk")
            ->where('i.id', $id)
            ->first();

            $data->jenis = 'itr';
            $data->title = "INCOMING TRANSACTION";
        }
        return view('PR.cetak', ['data' => $data]);
    }



    public function delete_pr($id)
    {
        DB::table('purchase_request')->where('id', $id)->delete();
        return redirect('/purchase')->with('alert', [
            'type' => 'success',
            'msg' => 'Purchace Request data deleted successfully'
        ]);
    }

    public function ajax_dyanmic(Request $request)
    {
        $tb  = $request->table;
        $id  = $request->id;
        if ($tb == 'vendor') {
            $ret =  DB::table('vendor')->select('telp', 'nama_vendor', 'fax')->where('id_vendor', $id)->first();
        } else if ($tb == 'produk') {
            $ret = DB::table('produk')->select('harga', 'nama_produk', "qty")->where('id_produk', $id)->first();
        } else if ($tb == 'customer') {
            $ret = DB::table('customer')->select('telepon')->where('id_customer', $id)->first();
        } else if ($tb == 'deliveri_order') {
            $ret = DB::table("deliveri_order as do")
                ->join('customer as c', "c.id_customer", "=", "do.customer_id")
                ->join('produk as p', "p.id_produk", "=", "do.produk_id")
                ->join('users as u', "u.id", "=", "do.created_by")
                ->select('do.catatan', 'do.no_do', 'do.tanggal_do', "p.nama_produk", "p.qty", "p.harga", "c.nama_customer", "c.telepon", "u.name as created_by")
                ->where('do.id', $id)
                ->first();
            $ret->tanggal_do = date("Y-m-d\TH:i:s", strtotime($ret->tanggal_do));
        } else {
            $ret =  DB::table('purchase_request as pr')
                ->join('vendor as v', "v.id_vendor", "=", "pr.vendor_id")
                ->join('produk as p', "p.id_produk", "=", "pr.produk_id")
                ->select("pr.id", "pr.status", "pr.tanggal", "pr.no_pr", "v.nama_vendor", "v.telp", "pr.qty", "p.harga", "p.nama_produk")
                ->where('pr.id', $id)
                ->first();
        }
        return response()->json($ret);
    }

    public function itr(Request $request)
    {
        $cari = $request->input('cari');

        $data =
            DB::table('itr as i')
            ->join('purchase_request as pr', 'pr.id', '=', 'i.id_pr')
            ->join('vendor as v', "v.id_vendor", "=", "pr.vendor_id")
            ->join('produk as p', "p.id_produk", "=", "pr.produk_id")
            ->select("i.id", "i.status", "i.flag", "i.tanggal_itr as tanggal", "i.no_itr", "pr.no_pr", "v.nama_vendor", "v.telp", "i.qty", "p.harga", "p.nama_produk")
            ->where(function ($data) use ($cari) {
                if (!empty($cari)) {
                    $data->where('pr.no_pr', 'LIKE', '%' . $cari . '%')
                        ->orWhere('v.nama_vendor', 'LIKE', '%' . $cari . '%')
                        ->orWhere('v.telp', 'LIKE', '%' . $cari . '%')
                        ->orWhere('p.nama_produk', 'LIKE', '%' . $cari . '%')
                        ->orWhere('i.qty', 'LIKE', '%' . $cari . '%');
                }
            })
            ->get();

        return view('ITR.index', ['itr' => $data]);
    }

    public function create_itr()
    {
        $pr  = DB::table('purchase_request')->where('status', 0)->select('id', 'no_pr')->get();
        $vendor = DB::table('vendor')->select('id_vendor', 'nama_vendor')->get();
        $produk = DB::table('produk')->select('id_produk', 'nama_produk')->get();
        $data['vendor'] = $vendor;
        $data['produk'] = $produk;
        $data['pr'] = $pr;

        return view('ITR.create', ['data' => $data]);
    }

    public function edit_itr($id)
    {
        $pr  = DB::table('purchase_request')->where('status', 0)->select('id', 'no_pr')->get();
        $itr  = DB::table('itr')->where('id', $id)->first();
        $itr->tanggal_itr = date("Y-m-d\TH:i:s", strtotime($itr->tanggal_itr));
        $itr->valid_itr = explode(";", $itr->valid_itr);

        $vendor = DB::table('vendor')->select('id_vendor', 'nama_vendor')->get();
        $produk = DB::table('produk')->select('id_produk', 'nama_produk')->get();
        $data['vendor'] = $vendor;
        $data['produk'] = $produk;
        $data['pr'] = $pr;
        $data['itr'] = $itr;
        return view('ITR.edit', ['data' => $data]);
    }

    public function simpan_itr(Request $request)
    {
        $no_itr = $request->nomor_itr;
        $tgl_itr = $request->tanggal_itr;
        $id_pr = $request->nomor_pr;
        $qty = $request->qty;
        $ket = $request->simpan;

        //     ALTER TABLE `itr`
        // ADD COLUMN `valid_itr` VARCHAR(255) NULL DEFAULT NULL AFTER `flag`;

        $iu_itr = [
            'qty' => $qty,
            'no_itr' => $no_itr,
            'tanggal_itr' => $tgl_itr,
            'id_pr' => $id_pr,
            'id_validator' => $request->id_validator,
            'valid_itr' => null
        ];

        // return json_encode($request->all());
        $is_valid = $request->valid_itr;
        if (isset($is_valid)) {
            $iu_itr['valid_itr'] = implode(";", $is_valid);
        }



        if ($ket == 1) {
            DB::table('purchase_request')->where('id', $id_pr)->update(['status' => 1]);
            $iu_itr['flag'] = 1;
        }

        $msg = "saved";
        $id = $request->id_itr;
        if (!empty($id)) {
            ItrModel::where('id', $id)->update($iu_itr);
            $msg = 'updated';
        } else {
            ItrModel::insert($iu_itr);
        }

        return redirect('/itr')->with('alert', [
            'type' => 'success',
            'msg' => 'Data itr ' . $msg . ' successfully'
        ]);
    }

    public function delete_itr($id)
    {
        DB::table('itr')->where('id', $id)->delete();
        return redirect('/itr')->with('alert', [
            'type' => 'success',
            'msg' => 'Itr data deleted successfully'
        ]);
    }
}
