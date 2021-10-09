<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_lokasi_produk($id_produk)
    {
        $ret = DB::table("produk")->join('inventory as i', 'i.id_inventory', '=', 'produk.id_inventory')->where('produk.id_produk', $id_produk)->select("i.*")->first();
        return $ret;
    }

    public function get_firt_by_id($tb, $id)
    {
        return DB::table($tb)->where('id', $id)->first();
    }
}
