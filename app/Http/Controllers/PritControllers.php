<?php

namespace App\Http\Controllers;

use App\Model\ItrModel;
use App\PurchaseRequest;
use App\PurchaseRequestProduct;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PritControllers extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;

        $data = DB::table('purchase_request as pr')
            ->where(function ($data) use ($cari) {
                if (!empty($cari)) {
                    $data->where('pr.no_pr', 'LIKE', '%' . $cari . '%')
                        ->orWhere('pr.total', 'LIKE', '%' . $cari . '%');
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

        $product_id = $request->produk_id;
        $qty        = $request->qty;

        $total  = 0;

        if ($id) {
            $msg = "updated";

            $harga          = $request->harga;
            $created_by     = $request->id_pembuat;
            $main_note      = $request->main_note ?? NULL;
            $no_pr          = $request->nomor_pr;
            $note           = $request->note;
            $product_id     = $request->produk_id;
            $qty            = $request->qty;
            $tanggal        = date("Y-m-d H:i:s", strtotime($request->tanggal_pr));
            $vendor_id      = $request->vendor_id;

            $total  = 0;

            $data   = [
                'created_by'    => $created_by,
                'no_pr'         => $no_pr,
                'note'          => $main_note,
                'note'          => $main_note,
                'tanggal'       => $tanggal,
                'total'         => $total,
            ];

            PurchaseRequest::where('id', $id)->update($data);

            PurchaseRequestProduct::where('pr_id', $id)->delete();

            for($i = 0; $i < count($vendor_id); $i++) {
                for($j = 0; $j < count($product_id[$i]); $j++) {

                    if(array_key_exists($i, $note)) {
                        if(array_key_exists($j, $note[$i])) {
                            $catatan = $note[$i][$j];
                        } else {
                            $catatan = NULL;
                        }
                    } else {
                        $catatan = NULL;
                    }
                    
                    $data   = [
                        'pr_id'         => $id,
                        'note'          => $catatan,
                        'product_id'    => $product_id[$i][$j],
                        'qty'           => $qty[$i][$j],
                        'vendor_id'     => $vendor_id[$i],
                    ];

                    PurchaseRequestProduct::create($data);

                    $harga  = DB::table('produk')
                        ->where('id_produk', $product_id[$i][$j])
                        ->first()
                        ->harga;

                    $harga  = ($harga * $qty[$i][$j]);

                    $total  += $harga;
                }
            }

            $data   = [
                'total' => $total,
            ];

            PurchaseRequest::where('id', $id)
                ->update($data);
        } else {
            $msg = "saved";

            $harga          = $request->harga;
            $created_by     = $request->id_pembuat;
            $main_note      = $request->main_note ?? NULL;
            $no_pr          = $request->nomor_pr;
            $note           = $request->note;
            $produk_id      = $request->produk_id;
            $qty            = $request->qty;
            $tanggal        = date("Y-m-d H:i:s", strtotime($request->tanggal_pr));
            $vendor_id      = $request->vendor_id;

            $total  = 0;

            $data   = [
                'created_by'    => $created_by,
                'no_pr'         => $no_pr,
                'note'          => $main_note,
                'note'          => $main_note,
                'tanggal'       => $tanggal,
                'total'         => $total,
            ];

            $pr = PurchaseRequest::create($data);

            $pr_id  = $pr->id;
            
            for($i = 0; $i < count($vendor_id); $i++) {
                for($j = 0; $j < count($product_id[$i]); $j++) {

                    if(array_key_exists($i, $note)) {
                        if(array_key_exists($j, $note[$i])) {
                            $catatan = $note[$i][$j];
                        } else {
                            $catatan = NULL;
                        }
                    } else {
                        $catatan = NULL;
                    }
                    
                    $data   = [
                        'pr_id'         => $pr_id,
                        'note'          => $catatan,
                        'product_id'    => $product_id[$i][$j],
                        'qty'           => $qty[$i][$j],
                        'vendor_id'     => $vendor_id[$i],
                    ];

                    PurchaseRequestProduct::create($data);

                    $harga  = DB::table('produk')
                        ->where('id_produk', $product_id[$i][$j])
                        ->first()
                        ->harga;

                    $harga  = ($harga * $qty[$i][$j]);

                    $total  += $harga;
                }
            }

            $data   = [
                'total' => $total,
            ];

            PurchaseRequest::where('id', $pr_id)
                ->update($data);
        }

        return redirect('/purchase')->with('alert', [
            'type' => 'success',
            'msg' => 'Purchace Request data ' . $msg . ' successfully'
        ]);
    }

    public function update_pr($id)
    {
        $vendor         = DB::table('vendor')->select('id_vendor', 'nama_vendor')->get();
        $produk         = DB::table('produk')->select('id_produk', 'nama_produk')->get();
        $ret            = DB::table('purchase_request')->where('id', $id)->first();
        $ret->tanggal   = date("Y-m-d\TH:i:s", strtotime($ret->tanggal));

        $ret->requester = User::where('id', $ret->created_by)
            ->first()
            ->name;

        if($ret->acc_by) {
            $ret->approved_by = User::where('id', $ret->acc_by)
                ->first()
                ->name;
        } else {
            $ret->approved_by = NULL;
        }

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
           
            $data = DB::table('purchase_request')
                ->where('id', $id)
                ->first();
            $data->jenis = 'pr';
            $data->title = "PUCHASE REQUEST";
        }
        
        if ($jenis == 'itr') {                           
           $data = DB::table('itr as i')
            ->join('purchase_request as pr', 'pr.id', '=', 'i.id_pr')
            ->select("i.status", "i.flag", "i.tanggal_itr as tanggal", "i.no_itr", "pr.no_pr", "pr.id as id", 'pr.created_by', 'pr.acc_by', 'pr.note')
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
        } else if($tb == 'list_pr') {
            $ret    = PurchaseRequestProduct::join('produk', 'produk.id_produk', '=', 'purchase_request_products.product_id')
                ->join('vendor', "vendor.id_vendor", "=", "purchase_request_products.vendor_id")
                ->select([
                    'purchase_request_products.id', 'purchase_request_products.qty', 'produk.nama_produk', 'produk.harga',
                    'purchase_request_products.note', 'vendor.nama_vendor', 'purchase_request_products.is_checked'
                ])
                ->where('purchase_request_products.pr_id', $id)
                ->get();
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
            ->select("i.id", "i.status", "i.flag", "i.tanggal_itr as tanggal", "i.no_itr", "pr.no_pr", "pr.total", 'pr.id as pr_id')
            ->where(function ($data) use ($cari) {
                if (!empty($cari)) {
                    $data->where('pr.no_pr', 'LIKE', '%' . $cari . '%')
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

        $vendor = DB::table('vendor')->select('id_vendor', 'nama_vendor')->get();
        $produk = DB::table('produk')->select('id_produk', 'nama_produk')->get();

        $prList = PurchaseRequestProduct::join('produk', 'produk.id_produk', '=', 'purchase_request_products.product_id')
            ->join('vendor', "vendor.id_vendor", "=", "purchase_request_products.vendor_id")
            ->select([
                'purchase_request_products.id', 'purchase_request_products.qty', 'produk.nama_produk', 'produk.harga',
                'purchase_request_products.note', 'vendor.nama_vendor', 'purchase_request_products.is_checked'
            ])
            ->where('purchase_request_products.pr_id', $itr->id_pr)
            ->get();

        $data['vendor'] = $vendor;
        $data['produk'] = $produk;
        $data['pr']     = $pr;
        $data['prList'] = $prList;
        $data['itr']    = $itr;
        return view('ITR.edit', ['data' => $data]);
    }

    public function simpan_itr(Request $request)
    {
        $msg = "saved";
        $id = $request->id_itr;
        if (!empty($id)) {
            $id_validator   = $request->id_validator;
            $nomor_itr      = $request->nomor_itr;
            $nomor_pr       = $request->nomor_pr;
            $prr_id         = $request->prr_id;
            $tanggal_itr    = $request->tanggal_itr;

            $jumlahProduk = PurchaseRequestProduct::where('purchase_request_products.pr_id', $nomor_pr)
                ->count();

            if(count($prr_id) == $jumlahProduk) {
                $data   = [
                    'is_checked' => 1
                ];

                PurchaseRequestProduct::where('pr_id', $nomor_pr)
                    ->update($data);

                $data   = [
                    'status'    => 1,
                    'acc_by'    => $id_validator
                ];

                PurchaseRequest::where('id', $nomor_pr)
                    ->update($data);

                $data   = [
                    'flag'          => 1,
                    'id_validator'  => $id_validator,
                    'no_itr'        => $nomor_itr,
                    'id_pr'         => $nomor_pr,
                    'tanggal_itr'   => $tanggal_itr,
                ];

                ItrModel::where('id', $id)->update($data);
            } else {
                for($i = 0; $i < count($prr_id); $i++) {
                    $data   = [
                        'is_checked' => 1
                    ];

                    PurchaseRequestProduct::where('id', $prr_id[$i])
                        ->update($data);
                }

                $data   = [
                    'flag'          => 0,
                    'id_validator'  => $id_validator,
                    'no_itr'        => $nomor_itr,
                    'id_pr'         => $nomor_pr,
                    'tanggal_itr'   => $tanggal_itr,
                ];

                ItrModel::where('id', $id)->update($data);
            }
            
            $msg = 'updated';
        } else {
            $id_validator   = $request->id_validator;
            $nomor_itr      = $request->nomor_itr;
            $nomor_pr       = $request->nomor_pr;
            $prr_id         = $request->prr_id;
            $tanggal_itr    = $request->tanggal_itr;

            $jumlahProduk = PurchaseRequestProduct::where('purchase_request_products.pr_id', $nomor_pr)
                ->count();

            if(count($prr_id) == $jumlahProduk) {
                $data   = [
                    'is_checked' => 1
                ];

                PurchaseRequestProduct::where('pr_id', $nomor_pr)
                    ->update($data);

                $data   = [
                    'status'    => 1,
                    'acc_by'    => $id_validator
                ];

                PurchaseRequest::where('id', $nomor_pr)
                    ->update($data);

                $data   = [
                    'flag'          => 1,
                    'id_validator'  => $id_validator,
                    'no_itr'        => $nomor_itr,
                    'id_pr'         => $nomor_pr,
                    'tanggal_itr'   => $tanggal_itr,
                ];

                ItrModel::create($data);
            } else {
                for($i = 0; $i < count($prr_id); $i++) {
                    $data   = [
                        'is_checked' => 1
                    ];

                    PurchaseRequestProduct::where('id', $prr_id[$i])
                        ->update($data);
                }

                $data   = [
                    'flag'          => 0,
                    'id_validator'  => $id_validator,
                    'no_itr'        => $nomor_itr,
                    'id_pr'         => $nomor_pr,
                    'tanggal_itr'   => $tanggal_itr,
                ];

                ItrModel::create($data);
            }
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
